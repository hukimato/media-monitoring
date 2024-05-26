<?php

declare(strict_types=1);

namespace Application\UseCase\CreatePostReport;

use Application\ReportGenerator\ReportGenerator;
use Application\ReportGenerator\ReportGeneratorInterface;
use Application\ReportStorageInterface;
use Domain\Storage\PostStorageInterface;

class CreatePostReportByIdsUseCase
{
    public function __construct(
        private PostStorageInterface   $postStorage,
        private ReportStorageInterface $reportStorage,
        private ReportGeneratorInterface $reportGenerator,
        private CreatePostReportByIdsRequest $request,
    )
    {
    }

    public function __invoke(): CreatePostReportByIdsResponse
    {
        $postIds = $this->request->postIds;

        $posts = [];
        foreach ($postIds as $postId) {
            $posts[] = $this->postStorage->findById($postId);
        }

        $reportContent = $this->reportGenerator::generateReportContent($posts);
        $reportUrl = $this->reportStorage->save($reportContent);
        return new CreatePostReportByIdsResponse($reportUrl);
    }

}
