<?php

declare(strict_types=1);

namespace Domain\Storage;

use Domain\ValueObject\Url;

interface ReportStorageInterface
{
    public function save(string $reportContent): Url;
}
