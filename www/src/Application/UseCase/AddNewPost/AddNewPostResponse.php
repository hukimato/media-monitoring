<?php

declare(strict_types=1);

namespace Application\UseCase\AddNewPost;

use Application\DTO\PostDTO;
use Domain\Entity\Post;

readonly class AddNewPostResponse
{
    public function __construct(
        public PostDTO $post,
    ) {
    }
}
