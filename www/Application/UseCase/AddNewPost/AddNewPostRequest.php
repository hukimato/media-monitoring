<?php

declare(strict_types=1);

namespace Application\UseCase\AddNewPost;

use Domain\ValueObject\Url;

readonly class AddNewPostRequest
{
    public function __construct(
        public Url $url
    )
    {
    }
}
