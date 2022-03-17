<?php

namespace App\UrlShortener;

class UrlService
{
    private array $dictionary = [];

    public function shorten(string $url): string
    {
        $shortUrl = 'https://short.url/' . (count($this->dictionary) + 1);

        $this->dictionary[$shortUrl]['visits'] = 0;

        $this->dictionary[$shortUrl]['url'] = $url;

        return $shortUrl;
    }

    public function translate(string $shortUrl): string
    {
        $this->dictionary[$shortUrl]['visits']++;

        return $this->dictionary[$shortUrl]['url'];
    }

    public function visits(string $shortUrl): int
    {
        return $this->dictionary[$shortUrl]['visits'];
    }
}