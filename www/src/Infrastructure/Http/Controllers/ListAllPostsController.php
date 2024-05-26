<?php

declare(strict_types=1);

namespace Infrastructure\Http\Controllers;

use Application\UseCase\ListAllPosts\ListAllPostsUseCase;

class ListAllPostsController
{
    public function __construct(
        private ListAllPostsUseCase $useCase,
    )
    {
    }

    public function index()
    {
        $method = $this->useCase;
        return $method();
    }
}
