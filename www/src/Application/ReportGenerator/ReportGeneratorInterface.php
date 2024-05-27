<?php

declare(strict_types=1);

namespace Application\ReportGenerator;

interface ReportGeneratorInterface
{
    public static function generateReportContent(array $posts): ReportDTO;
}
