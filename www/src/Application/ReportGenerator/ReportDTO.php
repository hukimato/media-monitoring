<?php

declare(strict_types=1);

namespace Application\ReportGenerator;

readonly class ReportDTO
{
    public function __construct(
        public string $content,
    ) {

    }
}
