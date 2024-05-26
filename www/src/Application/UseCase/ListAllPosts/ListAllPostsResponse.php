<?php

declare(strict_types=1);

namespace Application\UseCase\ListAllPosts;

use Domain\Entity\Post;

readonly class ListAllPostsResponse
{
    public function __construct(
        /**
         * @property Post[] $posts
         */
        public array $posts
    )
    {

    }
}
