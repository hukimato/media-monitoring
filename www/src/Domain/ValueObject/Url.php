<?php

declare(strict_types=1);

namespace Domain\ValueObject;

class Url
{
    private string $value;

    public function __construct(string $value)
    {
        $this->assertValidUrl($value);
        $this->value = $value;
    }

    protected function assertValidUrl(string $value): void
    {
        if (!filter_var($value, FILTER_VALIDATE_URL)) {
            throw new \InvalidArgumentException("Invalid url $value");
        }
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
