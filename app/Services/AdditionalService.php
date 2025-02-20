<?php

namespace App\Services;

use App\Traits\GuardianTrait;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;
use GuzzleHttp\Exception\RequestException;
use App\Services\Processor\KategoriProcessor;

class AdditionalService extends KategoriProcessor
{
    use GuardianTrait;

    public function getSections($paginate)
    {
        $cacheKey = 'guardian_sections_' . $paginate;

        return Cache::remember(
            $cacheKey,
            now()->addMinutes(30),
            function () use ($paginate) {
                $api = $this->getGuardianAPI();

                try {
                    $response = $api->sections()->fetch();

                    // dd($response);

                    $results = $response->response->results;

                    return count($results) > 0
                        ? collect($results)->random($paginate)->map(fn($item) => $this->processKategoriItem($item))
                        : collect([]); // Default jika tidak ada hasil
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
