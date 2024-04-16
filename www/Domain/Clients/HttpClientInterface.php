<?php

declare(strict_types=1);

namespace Domain\Clients;

use Domain\ValueObject\Url;

interface HttpClientInterface
{
    public function getPageTitle(Url $url): string;
}
