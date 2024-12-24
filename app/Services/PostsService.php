<?php

namespace App\Services;

use Guardian\GuardianAPI;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use App\Services\Processor\PostsProcessor;
use App\Traits\GuardianTrait;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\RequestException;

class PostsService extends PostsProcessor
{
    use GuardianTrait;

    public function getPosts($search, $kategori, $paginate)
    {
        $api = $this->getGuardianAPI();

        try {
            $response = retry(3, function () use ($api, $search, $kategori) {
                return $api->content()
                    ->setQuery($search)
                    ->setOrderBy("relevance")
                    // ->setUseDate('newest')
                    ->setShowTags("contributor,blog")
                    ->setShowFields("headline,thumbnail,short-url,publication,body")
                    ->setShowReferences("author")
                    ->setSection($kategori)
                    ->fetch();
            }, 5000); // Retry 3 kali dengan jeda 5 detik

            $results = $response->response->results;

            if (count($results) > 0) {
                $processedItems = collect($results)->take(min($paginate, count($results)))->map(function ($item) {
                    return $this->processNewsItem($item);
                });
                return $processedItems;
            } else {
                return [];
            }
        } catch (RequestException $exception) {
            Log::error('Guardian API Error: ' . $exception->getMessage());
            $statusCode = $exception->getCode();
            return response()->view(
                "errors.$statusCode",
                ['message' => $exception->getMessage()],
                $statusCode
            );
        }
    }
}
