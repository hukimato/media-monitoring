<?php

declare(strict_types=1);

namespace Application\UseCase\CreatePostReport;

readonly class CreatePostReportByIdsRequest
{
    public function __construct(
        /**
         * @property int[] $postIds
         */
        public array $postIds
    ) {
    }
}
