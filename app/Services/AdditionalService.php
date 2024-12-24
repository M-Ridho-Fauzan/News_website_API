<?php

namespace App\Services;

use App\Services\Processor\KategoriProcessor;
use App\Traits\GuardianTrait;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Exception\RequestException;

class AdditionalService extends KategoriProcessor
{
    use GuardianTrait;

    public function getSections($paginate)
    {
        $api = $this->getGuardianAPI();

        try {
            $response = $api->sections()
                ->fetch();

            // dd($response);

            $results = $response->response->results;

            if (count($results) > 0) {
                $processedItems = collect($results)->random($paginate)->map(function ($item) {
                    return $this->processKategoriItem($item);
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
