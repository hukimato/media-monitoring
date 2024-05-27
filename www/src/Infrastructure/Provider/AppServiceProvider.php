<?php

namespace Infrastructure\Provider;

use Application\ReportGenerator\ReportGenerator;
use Application\ReportGenerator\ReportGeneratorInterface;
use Application\ReportStorage\ReportStorageInterface;
use Application\TitleParser\TitleParserInterface;
use Application\UseCase\AddNewPost\AddNewPostRequest;
use Application\UseCase\CreatePostReport\CreatePostReportByIdsRequest;
use Domain\Storage\PostStorageInterface;
use Domain\ValueObject\Url;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use Infrastructure\Client\TitleParser;
use Infrastructure\Storage\PostStorage;
use Infrastructure\Storage\ReportStorage;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(PostStorageInterface::class, function (Application $app) {
            return new PostStorage();
        });
        $this->app->bind(ReportStorageInterface::class, function (Application $app) {
            return new ReportStorage();
        });
        $this->app->bind(ReportGeneratorInterface::class, function (Application $app) {
            return new ReportGenerator();
        });
        $this->app->bind(TitleParserInterface::class, function (Application $app) {
            return new TitleParser();
        });
        $this->app->bind(AddNewPostRequest::class, function (Application $app) {
            return new AddNewPostRequest(new Url(request()->get('url')));
        });
        $this->app->bind(CreatePostReportByIdsRequest::class, function (Application $app) {
            $postIds = array_map('intval', explode(',', request()->get('postIds')));
            return new CreatePostReportByIdsRequest($postIds);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
