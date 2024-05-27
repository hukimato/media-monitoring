<?php

declare(strict_types=1);

namespace Application\UseCase\CreatePostReport;

use Application\ReportGenerator\ReportGeneratorInterface;
use Application\ReportStorage\ReportStorageInterface;
use Domain\Storage\PostStorageInterface;

class CreatePostReportByIdsUseCase
{
    public function __construct(
        private PostStorageInterface         $postStorage,
        private ReportStorageInterface       $reportStorage,
        private ReportGeneratorInterface     $reportGenerator,
        private CreatePostReportByIdsRequest $request,
    )
    {
    }

    public function __invoke(): CreatePostReportByIdsResponse
    {
        $postIds = $this->request->postIds;

        $posts = [];
        foreach ($postIds as $postId) {
            $post = $this->postStorage->findById($postId);
            if (!$post)
                continue;
            $posts[] = $post;
        }

        $reportDto = $this->reportGenerator::generateReportContent($posts);
        $reportUrl = $this->reportStorage->save($reportDto->content);
        return new CreatePostReportByIdsResponse($reportUrl);
    }

}
