<?php

declare(strict_types=1);

namespace Application\UseCase\CreatePostReport;

use Domain\Storage\PostStorageInterface;
use Domain\Storage\ReportStorageInterface;
use Domain\ValueObject\Url;

class CreatePostReportByIdsUseCase
{
    public function __construct(
        private PostStorageInterface   $postStorage,
        private ReportStorageInterface $reportStorage,
    )
    {
    }

    public function __invoke(CreatePostReportByIdsRequest $request): CreatePostReportByIdsResponse
    {
        $postIds = $request->postIds;

        $posts = [];
        foreach ($postIds as $postId) {
            $posts[] = $this->postStorage->findById($postId);
        }


        $reportContent = <<<HTML
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Report</title>
</head>
<body>
<ul>
HTML;
        foreach ($posts as $post) {
            $reportContent .= "<li><a href=\"{$post->getSourceUrl()}\">{$post->getTitle()}</a></li>";
        }
        $reportContent .= "</ul></body></html>";

        $reportUrl = $this->reportStorage->save($reportContent);

        return new CreatePostReportByIdsResponse($reportUrl);
    }

}
