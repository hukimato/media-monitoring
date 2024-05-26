<?php

declare(strict_types=1);

namespace Application\DTO;

use Domain\Entity\Post;

class PostMapper
{
    public static function map(Post $post): PostDTO
    {
        return new PostDTO(
            $post->getId(),
            $post->getDateTime(),
            $post->getSourceUrl()->getValue(),
            $post->getTitle()->getValue(),
        );
    }

    /**
     * @param Post[] $posts
     * @return PostDTO[]
     */
    public static function mapArrayOfPosts(array $posts): array
    {
        return array_map(fn(Post $post) => static::map($post), $posts);
    }
}
