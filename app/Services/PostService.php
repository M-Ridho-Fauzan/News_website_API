<?php

namespace App\Services;

use App\Services\Processor\PostProcessor;
use App\Traits\GuardianTrait;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Client\RequestException;

class PostService extends PostProcessor
{
    use GuardianTrait;

    /**
     * Get a post
     *
     * @param string $contentId
     *
     * @return $results
     */
    public function getPost($contentId)
    {
        $api = $this->getGuardianAPI();

        try {
            $response = retry(3, function () use ($api, $contentId) {
                return $api->singleItem()
                    ->setId($contentId) // Set the content ID
                    ->setShowFields("headline,body,thumbnail,all") // Specify fields to show
                    ->setShowTags("contributor,blog")
                    ->setShowReferences("all")
                    ->fetch(); // Execute the request
            }, 5000);

            $results = $response->response->content ?? [];

            dd($results);

            if (count($results) > 0) {
                $processedItems = collect($results)->map(function ($item) {
                    return $this->processPostItem($item);
                });
                return $processedItems;
            } else {
                return [];
            }
        } catch (RequestException $exception) {
            Log::error('Guardian API Error: ' . $exception->getMessage());
            Log::error('Response Body getNews: ' . $exception->response->body());

            return [];
        }
    }
}

// Contoh Data:

/**
 * 
 * {#317 ▼ // app\Services\PostService.php:38
  +"id": "film/2017/nov/26/beach-rats-review"
  +"type": "article"
  +"sectionId": "film"
  +"sectionName": "Film"
  +"webPublicationDate": "2017-11-26T08:00:04Z"
  +"webTitle": "Beach Rats review – wounded beauty of a lost boy"
  +"webUrl": "https://www.theguardian.com/film/2017/nov/26/beach-rats-review"
  +"apiUrl": "https://content.guardianapis.com/film/2017/nov/26/beach-rats-review"
  +"fields": {#325 ▼
    +"headline": "Beach Rats review – wounded beauty of a lost boy"
    +"standfirst": "<p>British newcomer Harris Dickinson convinces as a Brooklyn delinquent who lusts after older men in Eliza Hittman’s superb second film</p>"
    +"trailText": "British newcomer Harris Dickinson convinces as a Brooklyn delinquent who lusts after older men in Eliza Hittman’s superb second film"
    +"byline": "Wendy Ide"
    +"main": "
<figure class="element element-image" data-media-id="b5d06a7153c1e9d0a9db6d96a77698d99e637165"> <img src="https://media.guim.co.uk/b5d06a7153c1e9d0a9db6d96a7769
 ▶
"
    +"body": "
<p>Frankie (Harris Dickinson) is adrift. “I don’t know what I like,” he mumbles. But perhaps it’s more the fact that he doesn’t want to – or can’t – admit to hi
 ▶
"
    +"newspaperPageNumber": "24"
    +"starRating": "4"
    +"wordcount": "243"
    +"commentCloseDate": "2017-12-16T14:44:00Z"
    +"commentable": "true"
    +"firstPublicationDate": "2017-11-26T08:00:04Z"
    +"isInappropriateForSponsorship": "false"
    +"isPremoderated": "false"
    +"lastModified": "2018-03-21T23:49:22Z"
    +"newspaperEditionDate": "2017-11-26T00:00:00Z"
    +"productionOffice": "UK"
    +"publication": "The Observer"
    +"shortUrl": "https://www.theguardian.com/p/7j7ec"
    +"shouldHideAdverts": "false"
    +"showInRelatedContent": "true"
    +"thumbnail": "https://media.guim.co.uk/b5d06a7153c1e9d0a9db6d96a77698d99e637165/36_0_1728_1037/500.jpg"
    +"legallySensitive": "false"
    +"lang": "en"
    +"isLive": "true"
    +"bodyText": "
Frankie (Harris Dickinson) is adrift. “I don’t know what I like,” he mumbles. But perhaps it’s more the fact that he doesn’t want to – or can’t – admit to himse
 ▶
"
    +"charCount": "1458"
    +"shouldHideReaderRevenue": "false"
    +"bylineHtml": "<a href="profile/wendy-ide">Wendy Ide</a>"
  }
  +"tags": array:1 [▼
    0 => {#323 ▼
      +"id": "profile/wendy-ide"
      +"type": "contributor"
      +"sectionId": "film"
      +"sectionName": "Film"
      +"webTitle": "Wendy Ide"
      +"webUrl": "https://www.theguardian.com/profile/wendy-ide"
      +"apiUrl": "https://content.guardianapis.com/profile/wendy-ide"
      +"references": []
      +"bio": "<p>Wendy Ide is the Observer's chief film critic<br></p>"
      +"bylineImageUrl": "https://uploads.guim.co.uk/2018/01/17/Wendy-Ide.jpg"
      +"bylineLargeImageUrl": "https://uploads.guim.co.uk/2018/01/17/Wendy_Ide,_L.png"
      +"firstName": "Wendy"
      +"lastName": "Ide"
    }
  ]
  +"references": array:2 [▼
    0 => {#309 ▼
      +"id": "imdb/tt6303866"
      +"type": "imdb"
    }
    1 => {#318 ▼
      +"id": "rich-link/https://www.theguardian.com/info/2016/feb/12/film-today-email-sign-up"
      +"type": "rich-link"
    }
  ]
  +"isHosted": false
  +"pillarId": "pillar/arts"
  +"pillarName": "Arts"
}
 */
