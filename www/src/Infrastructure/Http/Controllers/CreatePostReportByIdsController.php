<?php

declare(strict_types=1);

namespace Infrastructure\Http\Controllers;

use Application\UseCase\CreatePostReport\CreatePostReportByIdsUseCase;
use Illuminate\Routing\Controller;

class CreatePostReportByIdsController extends Controller
{
    public function __construct(
        private CreatePostReportByIdsUseCase $useCase,
    )
    {
    }

    public function index()
    {
        $method = $this->useCase;
        return $method();
    }
}
