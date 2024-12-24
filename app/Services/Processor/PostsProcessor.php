<?php

namespace App\Services\Processor;

use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class PostsProcessor
{
    public function processNewsItem($item)
    {
        $formattedDate = Carbon::parse($item->webPublicationDate)->isoFormat('LL LT');

        return [
            'id' => $item->id,
            'webTitle' => Str::limit(strip_tags($item->webTitle), 44),
            'thumbnail' => $item->fields->thumbnail ?? null,
            'publication' => $item->fields->publication,
            'authorImage' => $this->getAuthorImage($item),
            'authorName' => $this->getAuthorName($item),
            'body' => $item->fields->body,
            'shortUrl' => $item->fields->shortUrl,
            'cartegory' => $item->sectionName,
            'published' => $formattedDate,
        ];
    }

    public function getAuthorImage($item)
    {
        if (!empty($item->tags)) {
            $tag = $item->tags[0];
            return $tag->bylineLargeImageUrl ?? $tag->bylineImageUrl ?? '/../img/randomUser.png';
        }
        return null;
    }

    public function getAuthorName($item)
    {
        return collect($item->tags)
            ->pluck('webTitle')
            ->first() ?? 'Anonymous';
    }
}
