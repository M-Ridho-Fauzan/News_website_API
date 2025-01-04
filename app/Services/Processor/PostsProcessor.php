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
            'thumbnail' => isset($item->fields->thumbnail) ? $item->fields->thumbnail : asset('/img/no-post.png') ,
            'authorImage' => $this->getAuthorImage($item),
            'authorName' => $this->getAuthorName($item),
            'authorId1' => $this->getAuthorId1($item),
            'authorId2' => $this->getAuthorId2($item),
            'authorTag' => $this->getAuthorTag($item),
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
            return $tag->bylineLargeImageUrl ?? $tag->bylineImageUrl ?? asset('/img/no-profile.png');
        }
        return asset('/img/no-profile.png');
    }

    public function getAuthorName($item)
    {
        return collect($item->tags)
            ->pluck('webTitle')
            ->first() ?? 'Anonymous';
    }

    /**
     * berikan '+' di sepasi nya, jika data authorName mengandung spasi.
     *
     * @param [type] $item
     * @return void
     */
    public function getAuthorId1($item)
    {
        $authorName = $this->getAuthorName($item);
        return str_replace(' ', '+', $authorName);
    }

    public function getAuthorId2($item)
    {
        return collect($item->tags)
            ->pluck('id')
            ->first() ?? 'anonymous';
    }

    public function getAuthorTag($item)
    {
        return collect($item->tags)
            ->pluck('type')
            ->first() ?? 'anonymous';
    }
}
