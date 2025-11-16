<?php

namespace App\Services;

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

class YandexReviewParser
{
    public function parse(string $url): array
    {
        $client = new Client([
            'headers' => [
                'User-Agent' => 'Mozilla/5.0 (iPhone; CPU iPhone OS 14_0 like Mac OS X)',
                'Accept-Language' => 'ru-RU,ru;q=0.9',
            ],
        ]);

        $response = $client->get($url);
        $html = $response->getBody()->getContents();

        $crawler = new Crawler($html);

        $rating = $crawler->filter('[class*="business-rating-badge-view__rating"]')->first()->text('');

        $count = $crawler->filter('[class*="tabs-select-view__counter"]')->eq(2)->text('');

        $reviews = [];

        $crawler->filter('[class*="business-review-view__info"]')->each(function (Crawler $node) use (&$reviews) {
            $reviews[] = [
                'date'      => $node->filter('[class*="business-review-view__date"]')->text(''),
                'author'    => $node->filter('[class*="business-review-view__author"]')->text(''),
                'text'      => $node->filter('[class*="spoiler-view__text-container"]')->text(''),
                'rating'    => $node->filter('div.business-rating-badge-view__stars')->attr('aria-label'),
            ];
        });

        $reviews = array_slice($reviews, 0, 10);

        foreach ($reviews as $id => $review) {
            $reviews[$id]['rating'] = preg_match('/\d+/', $review['rating'], $matches) ? $matches[0] : '';
        }

        return [
            'rating' => $rating,
            'reviews_count' => $count,
            'reviews' => $reviews,
            'ref'=>$url,
        ];
    }
}
