<?php

declare(strict_types=1);

namespace App\Clients;

use Domain\Clients\HttpClientInterface;
use Domain\ValueObject\Url;
use Illuminate\Support\Facades\Http;

class HttpClient implements HttpClientInterface
{

    public function getPageTitle(Url $url): string
    {
        $response = Http::get($url->getValue());
        $body = $response->body();

        $res = preg_match("/<title>(.*)<\/title>/siU", $body, $title_matches);
        if (!$res)
            throw new \Exception("Could not find title in response");

        // Clean up title: remove EOL's and excessive whitespace.
        $title = preg_replace('/\s+/', ' ', $title_matches[1]);
        $title = trim($title);
        return $title;
    }
}
