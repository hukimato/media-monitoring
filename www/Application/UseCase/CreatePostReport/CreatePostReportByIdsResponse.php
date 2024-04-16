<?php

declare(strict_types=1);

namespace Application\UseCase\CreatePostReport;

use Domain\ValueObject\Url;

readonly class CreatePostReportByIdsResponse
{
    public function __construct(
        public Url $reportUrl,
    ) {
    }

}
