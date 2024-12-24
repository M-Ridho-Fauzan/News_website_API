<?php

namespace App\Services\Processor;

use App\Traits\GuardianTrait;

class PostProcessor
{
    use GuardianTrait;

    public function processPostItem($item)
    {
        return [
            'id' => $item->id,
            'headline' => $item->fields->headline,
            'thumbnail' => $item->fields->thumbnail,
            'body' => $item->fields->body,
        ];
    }
}
