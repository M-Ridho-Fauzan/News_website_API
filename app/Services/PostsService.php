<?php

namespace App\Services;

use App\Traits\GuardianTrait;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;
use App\Services\Processor\PostsProcessor;
use Illuminate\Http\Client\RequestException;

class PostsService extends PostsProcessor
{
    use GuardianTrait;

    public function getPosts($search, $kategori, $author, $paginate)
    {
        $cacheKey = "posts_{$search}_{$kategori}_{$author}_{$paginate}";

        return Cache::remember(
            $cacheKey,
            now()->addMinutes(10),
            function () use ($search, $kategori, $author, $paginate) {
                $api = $this->getGuardianAPI();

                try {
                    $response = retry(3, function () use ($api, $search, $kategori, $author) {
                        return $api->content()
                            ->setQuery($search)
                            ->setOrderBy("relevance")
                            ->setTag($author)
                            // ->setUseDate('newest')
                            ->setShowTags("contributor,blog")
                            ->setShowFields("trailText,thumbnail,short-url,lastModified,score")
                            // ->setShowFields("all")
                            ->setShowReferences("all")
                            ->setSection($kategori)
                            ->fetch();
                        // } 
                    }, 5000); // Retry 3 kali dengan jeda 5 detik

                    $results = $response->response->results;

                    // dd($results);

                    // return $results;

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
                    $statusCode = $exception->getCode();
                    return response()->view(
                        "errors.$statusCode",
                        ['message' => $exception->getMessage()],
                        $statusCode
                    );
                }
            }
        );
    }
}
