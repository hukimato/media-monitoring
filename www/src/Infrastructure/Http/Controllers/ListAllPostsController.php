<?php

declare(strict_types=1);

namespace Infrastructure\Http\Controllers;

use Application\UseCase\ListAllPosts\ListAllPostsUseCase;
use Illuminate\Routing\Controller;

class ListAllPostsController extends Controller
{
    public function __construct(
        private ListAllPostsUseCase $useCase,
    )
    {
    }

    public function index()
    {
        $method = $this->useCase;
        $data = $method();
        return response()->json($data);
    }
}
