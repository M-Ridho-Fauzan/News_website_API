<?php

namespace App\Services;

use Guardian\GuardianAPI;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Client\RequestException;

class PostService
{
    private $api;

    public function __construct()
    {
        $this->api = new GuardianAPI('c3c30a7c-75e9-4a61-989a-e08d2bd1e508');
    }

    /**
     * Get all posts
     *
     * @param string $contentId
     *
     * @return $results
     */
    public function getPost($contentId)
    {
        try {
            $response = $this->api->singleItem()
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
