<?php

declare(strict_types=1);

namespace Application\TitleParser;

use Domain\ValueObject\Url;

interface TitleParserInterface
{
    public function getPageTitle(Url $url): TitleDTO;
}
