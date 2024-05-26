<?php

declare(strict_types=1);

namespace Application\DTO;

readonly class PostDTO
{

    public function __construct(
//        \Domain\Entity\Post $post
        public int       $id,
        public \DateTime $dateTime,
        public string    $url,
        public string    $title,
    )
    {

    }
}
