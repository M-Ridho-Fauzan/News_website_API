<?php

namespace App\Services;

use App\Traits\GuardianTrait;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;
use App\Services\Processor\PostsProcessor;
use Illuminate\Http\Client\RequestException;
use Illuminate\Pagination\LengthAwarePaginator;

class PostsService extends PostsProcessor
{
    use GuardianTrait;

    public function getPosts($search, $kategori, $orderBy, $author, $addData, $paginate)
    {
        $currentPage = request('page', 1);
        $offset = ($currentPage - 1) * $paginate;

        $cacheKey = "posts_{$search}_{$kategori}_{$orderBy}_{$author}_{$addData}_{$paginate}_{$currentPage}";

        return Cache::remember(
            $cacheKey,
            now()->addMinutes(10),
            function () use ($search, $kategori, $orderBy, $author, $addData, $paginate, $offset, $currentPage) {
                $api = $this->getGuardianAPI();

                try {
                    $response = retry(3, function () use ($api, $search, $kategori, $orderBy, $author) {
                        $query = $api->content()
                            ->setQuery($search)
                            ->setOrderBy($orderBy);

                        if ($kategori) {
                            $query->setSection($kategori);
                        }

                        $query->setShowTags("contributor,blog")
                            ->setShowFields("trailText,thumbnail,short-url,lastModified,score")
                            ->setShowReferences("all");

                        if ($author) {
                            $query->setTag($author);
                        }

                        return $query->fetch();
                    }, 5000);

                    $results = $response->response->results;

                    // dd($response);
                    // dd($results);

                    if (count($results) > 0) {
                        // Get total items based on addData limit if specified
                        $totalItems = $addData > 0 ? min(count($results), $addData) : count($results);

                        // Calculate which items we need for the current page
                        $pageEndIndex = min($offset + $paginate, $totalItems);
                        $itemsNeeded = array_slice($results, $offset, $paginate);

                        // Process only the items needed for this page
                        $processedItems = collect($itemsNeeded)->map(function ($item) {
                            return $this->processNewsItem($item);
                        });

                        // dd(new LengthAwarePaginator(
                        //     $processedItems,
                        //     $totalItems,
                        //     $paginate,
                        //     $currentPage,
                        //     [
                        //         'path' => request()->url(),
                        //         'query' => array_filter(request()->except('page')),
                        //     ]
                        // ));

                        // Create paginator with correct total count
                        return new LengthAwarePaginator(
                            $processedItems,
                            $totalItems,
                            $paginate,
                            $currentPage,
                            [
                                'path' => request()->url(),
                                'query' => array_filter(request()->except('page')),
                            ]
                        );
                    }

                    // Return empty paginator if no results
                    return new LengthAwarePaginator(
                        collect([]),
                        0,
                        $paginate,
                        $currentPage,
                        [
                            'path' => request()->url(),
                            'query' => array_filter(request()->except('page')),
                        ]
                    );
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
