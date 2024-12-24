<?php

namespace App\Services\Processor;

use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class PostsProcessor
{
    public function processNewsItem($item)
    {
        $formattedDate = Carbon::parse($item->webPublicationDate)->isoFormat('LL LT');
        $lastModified = Carbon::parse($item->fields->lastModified)->isoFormat('LL LT');

        return [
            'id' => $item->id,
            'type' => $item->type,
            'webTitle' => Str::limit(strip_tags($item->webTitle), 44),
            'thumbnail' => $item->fields->thumbnail ?? null,
            'authorImage' => $this->getAuthorImage($item),
            'authorName' => $this->getAuthorName($item),
            'authorId' => $this->getAuthorId($item),
            'desk' => $item->fields->trailText,
            'shortUrl' => $item->fields->shortUrl,
            'kategori' => $item->sectionName,
            'kategoriLink' => $item->sectionId,
            'published' => $formattedDate,
            'updated' => $lastModified,
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

    public function getAuthorId($item)
    {
        return collect($item->tags)
            ->pluck('id')
            ->first() ?? 'anonymous';
    }
}
