<?php

declare(strict_types=1);

namespace Domain\ValueObject;

class Title
{
    private string $value;

    public function __construct(string $value)
    {
        $this->assertValidTitle($value);
        $this->value = $value;
    }

    protected function assertValidTitle(string $value): void
    {
        if (mb_strlen($value) > 150) {
            throw new \InvalidArgumentException("Invalid title '$value'");
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
