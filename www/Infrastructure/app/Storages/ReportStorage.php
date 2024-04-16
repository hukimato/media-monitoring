<?php

declare(strict_types=1);

namespace App\Storages;

use Domain\Storage\ReportStorageInterface;
use Domain\ValueObject\Url;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class ReportStorage implements ReportStorageInterface
{

    public function save(string $reportContent): Url
    {
        $fileName = 'reports/' . md5($reportContent) . '.html';

        if (!Storage::disk('public')->exists($fileName)) {
            Storage::disk('public')->put($fileName, $reportContent);
        }

        $redirUrl = env('APP_URL') . "$fileName";

        return new Url($redirUrl);
    }
}
