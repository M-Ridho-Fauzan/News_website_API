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
            'thumbnail' => isset($item->fields->thumbnail) ? $item->fields->thumbnail : asset('/img/no-post.png'),
            'authorImage' => $this->getAuthorImage($item),
            'authorName' => $this->getAuthorName($item),
            'authorUrl' => $this->getAuthorUrl($item),
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
        return collect($item->tags)
            ->firstWhere('type', 'contributor')?->bylineLargeImageUrl
            ?? collect($item->tags)
            ->firstWhere('type', 'contributor')?->bylineImageUrl
            ?? asset('/img/no-profile.png');
    }

    public function getAuthorName($item)
    {
        return collect($item->tags)
            ->firstWhere('type', 'contributor')?->webTitle ?? 'Anonymous';
    }

    public function getAuthorUrl($item)
    {
        return collect($item->tags)
            ->firstWhere('type', 'contributor')?->webUrl;
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
            ->firstWhere('type', 'contributor')?->id ?? 'anonymous';
    }

    public function getAuthorTag($item)
    {
        return collect($item->tags)
            ->pluck('type')
            ->first() ?? 'anonymous';
    }
}
