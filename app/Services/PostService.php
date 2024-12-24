<?php

namespace App\Services;

use App\Traits\GuardianTrait;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Client\RequestException;

class PostService
{
    use GuardianTrait;

    /**
     * Get all posts
     *
     * @param string $contentId
     *
     * @return $results
     */
    public function getPost($contentId)
    {
        $api = $this->getGuardianAPI();

        try {
            $response = $api->singleItem()
                ->setId($contentId) // Set the content ID
                ->setShowStoryPackage(true) // Optionally show related story packages
                ->setShowFields("headline,body,thumbnail") // Specify fields to show
                ->fetch(); // Execute the request

            $results = $response->response->content;

            dd($results);

            return $results;
        } catch (RequestException $exception) {
            Log::error('Guardian API Error: ' . $exception->getMessage());
            Log::error('Response Body getNews: ' . $exception->response->body());

            return [];
        }
    }
}
