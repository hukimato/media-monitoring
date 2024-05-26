<?php

declare(strict_types=1);

namespace Application;

use Domain\ValueObject\Url;

interface ReportStorageInterface
{
    public function save(string $reportContent): Url;
}
