<?php

declare(strict_types=1);

namespace Application\UseCase\AddNewPost;

use DateTime;
use Domain\Clients\HttpClientInterface;
use Domain\Entity\Post;
use Domain\Storage\PostStorageInterface;

class AddNewPostUseCase
{
    public function __construct(
        private PostStorageInterface $postRepository,
        private HttpClientInterface $httpClient,
    )
    {

    }

    public function __invoke(AddNewPostRequest $request): AddNewPostResponse
    {
        $post = new Post(
            new DateTime(date('Y-m-d H:i:s')),
            $request->url,
            $this->httpClient->getPageTitle($request->url),
        );

        $this->postRepository->save($post);

        return new AddNewPostResponse($post);
    }

    private static function getPageTitle(string $url)
    {
        $fp = file_get_contents($url);
        if (!$fp)
            return null;

        $res = preg_match("/<title>(.*)<\/title>/siU", $fp, $title_matches);
        if (!$res)
            return null;

        // Clean up title: remove EOL's and excessive whitespace.
        $title = preg_replace('/\s+/', ' ', $title_matches[1]);
        $title = trim($title);
        return $title;
    }
}
