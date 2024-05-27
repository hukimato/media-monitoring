<?php

declare(strict_types=1);

namespace Application\TitleParser;

readonly class TitleDTO
{
    public function __construct(
        public string $title,
    ) {

    }
}
