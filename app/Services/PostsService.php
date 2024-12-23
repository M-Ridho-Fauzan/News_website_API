<?php

namespace App\Services;

use Guardian\GuardianAPI;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\RequestException;

class PostsService
{
    protected $api;

    public function __construct()
    {
        $this->api = new GuardianAPI('c3c30a7c-75e9-4a61-989a-e08d2bd1e508');
    }

    public function getPosts($search, $kategori, $paginate)
    {
        try {
            $response = $this->api->content()
                ->setQuery($search)
                ->setOrderBy("relevance")
                // ->setUseDate('newest')
                ->setShowTags("contributor,blog")
                ->setShowFields("headline,thumbnail,short-url,publication,body")
                ->setShowReferences("author,isbn,opta-cricket-match")
                ->setSection($kategori)
                ->fetch();

            $results = $response->response->results;

            // dd($results);

            if (count($results) > 0) {
                $processedItems = collect($results)->random($paginate)->map(function ($item) {
                    return $this->processNewsItem($item);
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

    public function processNewsItem($item)
    {
        $formattedDate = Carbon::parse($item->webPublicationDate)->isoFormat('LL LT');

        $processedItem = [
            'id' => $item->id,
            'webTitle' => Str::limit(strip_tags($item->webTitle), 44),
            'thumbnail' => isset($item->fields->thumbnail) ? $item->fields->thumbnail : null,
            'publication' => $item->fields->publication,
            'authorImage' => $this->getAuthorImage($item),
            'authorName' => $this->getAuthorName($item),
            'body' => $item->fields->body,
            'shortUrl' => $item->fields->shortUrl,
            'cartegory' => $item->sectionName,
            'published' => $formattedDate,
        ];
        return $processedItem;
    }

    public function getAuthorImage($item)
    {
        if (!empty($item->tags)) {
            $tag = $item->tags[0];
            return $tag->bylineLargeImageUrl ?? $tag->bylineImageUrl ?? '/../img/randomUser.png';
        }
        return null;
    }

    public function getAuthorName($item)
    {
        return collect($item->tags)
            ->pluck('webTitle')
            ->first() ?? 'Anonymous';
    }
}
