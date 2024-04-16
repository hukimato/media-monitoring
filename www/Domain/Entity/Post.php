<?php

declare(strict_types=1);

namespace Domain\Entity;

use DateTime;
use Domain\ValueObject\Url;
use JsonSerializable;

class Post implements JsonSerializable
{
    private int $id;

    public function __construct(
        protected DateTime $dateTime,
        protected Url      $sourceUrl,
        protected string   $title,
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

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): Post
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Post
     */
    public function setId(int $id): Post
    {
        $this->id = $id;
        return $this;
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
