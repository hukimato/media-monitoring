<?php

declare(strict_types=1);

namespace Domain\Entity;

use DateTime;
use Domain\ValueObject\Title;
use Domain\ValueObject\Url;

class Post
{
    private int $id;

    public function __construct(
        protected DateTime $dateTime,
        protected Url      $sourceUrl,
        protected Title    $title,
    )
    {
    }

    public function getDateTime(): DateTime
    {
        return $this->dateTime;
    }

    public function setDateTime(DateTime $dateTime): Post
    {
        $this->dateTime = $dateTime;
        return $this;
    }

    public function getSourceUrl(): Url
    {
        return $this->sourceUrl;
    }

    public function setSourceUrl(Url $sourceUrl): Post
    {
        $this->sourceUrl = $sourceUrl;
        return $this;
    }

    public function getTitle(): Title
    {
        return $this->title;
    }

    public function setTitle(Title $title): Post
    {
        $this->title = $title;
        return $this;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function jsonSerialize(): mixed
    {
        return [
            'id' => $this->id,
            'dateTime' => $this->dateTime,
            'sourceUrl' => $this->sourceUrl->getValue(),
            'title' => $this->title,
        ];
    }
}
