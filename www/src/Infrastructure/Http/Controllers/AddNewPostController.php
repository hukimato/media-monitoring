<?php

declare(strict_types=1);

namespace Infrastructure\Http\Controllers;

use Application\UseCase\AddNewPost\AddNewPostUseCase;
use Illuminate\Routing\Controller;

class AddNewPostController extends Controller
{
    public function __construct(
        private AddNewPostUseCase $useCase,
    )
    {
    }

    public function index()
    {
        return ($this->useCase)();
    }
}
