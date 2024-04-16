<?php

declare(strict_types=1);

namespace Application\UseCase\ListAllPosts;

use Domain\Storage\PostStorageInterface;

class ListAllPostsUseCase
{
    public function __construct(
        private PostStorageInterface $postRepository
    )
    {

    }

    public function __invoke(): ListAllPostsResponse
    {
        $posts = $this->postRepository->findAll();
        return new ListAllPostsResponse($posts);
    }
}
