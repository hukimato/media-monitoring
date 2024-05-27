<?php

declare(strict_types=1);

namespace Application\ReportGenerator;

class ReportGenerator implements ReportGeneratorInterface
{

    public static function generateReportContent(array $posts): ReportDTO
    {
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

        return new ReportDTO($reportContent);
    }
}
