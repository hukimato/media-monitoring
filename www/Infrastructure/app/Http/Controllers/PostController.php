<?php

namespace App\Http\Controllers;

use App\Clients\HttpClient;
use App\Storages\PostStorage;
use App\Storages\ReportStorage;
use Application\UseCase\AddNewPost\AddNewPostRequest;
use Application\UseCase\AddNewPost\AddNewPostUseCase;
use Application\UseCase\CreatePostReport\CreatePostReportByIdsRequest;
use Application\UseCase\CreatePostReport\CreatePostReportByIdsUseCase;
use Application\UseCase\ListAllPosts\ListAllPostsUseCase;
use Domain\ValueObject\Url;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PostController extends Controller
{
    public function list()
    {
        $res = new ListAllPostsUseCase(new PostStorage());
        $res = $res();

        return response()->json($res->posts);
    }

    public function create(Request $request)
    {
        $useCase = new AddNewPostUseCase(new PostStorage(), new HttpClient());
        $useCase(new AddNewPostRequest(new Url($request->get('url'))));
    }

    public function report(Request $request)
    {
        $useCase = new CreatePostReportByIdsUseCase(new PostStorage(), new ReportStorage());
        $result = $useCase(new CreatePostReportByIdsRequest( array_map('intval', explode(',', $request->get('postIds')))));

        return redirect($result->reportUrl->getValue());
    }
}
