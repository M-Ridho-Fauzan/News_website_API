<?php

namespace App\Services\Processor;

use Illuminate\Support\Str;
use App\Traits\GuardianTrait;
use Illuminate\Support\Carbon;

class PostProcessor
{
    public function processPostItem(object $item): array
    {
    $formattedDate = Carbon::parse($item->fields->lastModified)->isoFormat('LL LT');

        return [
            'id' => $item->id,
            'section-name' => $item->sectionName,
            'section-id' => $item->sectionId,
            'type' => $item->type,
            'headline' => $item->fields->headline,
            'byline' => $item->fields->byline,
            'thumbnail' => $item->fields->thumbnail,
            'stand-first' => $item->fields->standfirst,
            'main' => $item->fields->main,
            'body' => $item->fields->body,
            'publication' => $item->fields->publication,
            'last-modified' => $formattedDate,
            'author-image' => $this->getAuthorImage($item),
            'author-name' => $this->getAuthorName($item),
            'author-url' => $this->getAuthorUrl($item),
            'author-tag' => $this->getAuthorTag($item),
            'author-bio' => $this->getAuthorBio($item),
        ];
    }

    public function getAuthorImage(object $item): string
    {
        return collect($item->tags)
            ->firstWhere('type', 'contributor')?->bylineLargeImageUrl
            ?? collect($item->tags)
            ->firstWhere('type', 'contributor')?->bylineImageUrl
            ?? asset('/img/no-profile.png');
    }

    public function getAuthorName(object $item): string
    {
        return collect($item->tags)
            ->firstWhere('type', 'contributor')?->webTitle ?? 'Anonymous';
    }

    public function getAuthorBio(object $item): string
    {
        return collect($item->tags)
            ->firstWhere('type', 'contributor')?->bio ?? 'No biography available';
    }

    public function getAuthorUrl(object $item): ?string
    {
        return collect($item->tags)
            ->firstWhere('type', 'contributor')?->webUrl;
    }

    public function getAuthorTag(object $item): string
    {
        return collect($item->tags)
            ->pluck('type')
            ->first() ?? 'anonymous';
    }
}
