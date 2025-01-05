<?php

namespace App\Services;

use App\Services\Processor\PostProcessor;
use App\Traits\GuardianTrait;
// use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;
// use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Exception\RequestException;

class PostService extends PostProcessor
{
    use GuardianTrait;

    /**
     * Get a post
     *
     * @param string $contentId
     *
     * @return Collection
     */
    public function getPost(string $contentId): Collection
    {
        $api = $this->getGuardianAPI();

        try {
            $response = retry(3, function () use ($api, $contentId) {
                return $api->singleItem()
                    ->setId($contentId)
                    ->setShowFields("all")
                    ->setShowTags("contributor,blog")
                    ->setShowReferences("all")
                    ->fetch();
            }, 5000);

            $result = $response->response->content;

            if ($result) {
                return collect([$this->processPostItem($result)]);
            }

            return collect();
        } catch (RequestException $exception) {
            Log::error('Guardian API Error: ' . $exception->getMessage());
            if ($exception->hasResponse()) {
                Log::error('Response Body getPost: ' . $exception->getResponse()->getBody());
            }

            return collect();
        }
    }
}
