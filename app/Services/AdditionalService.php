<?php

namespace App\Services;

use Guardian\GuardianAPI;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Exception\RequestException;

class AdditionalService
{
    private $api;

    public function __construct()
    {
        $this->api = new GuardianAPI('c3c30a7c-75e9-4a61-989a-e08d2bd1e508');
    }

    public function getSections()
    {
        try {
            $response = $this->api->sections()
                ->setQuery("business")
                ->fetch();

            dd($response);

            $results = $response->response->results;

            return $results;
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
