<?php

declare(strict_types=1);

namespace Domain\Storage;

use Domain\Entity\Post;


interface PostStorageInterface
{
    /**
     * @param Post $post
     * @return Post
     */
    public function save(Post $post): Post;

    /**
     * @param int $id
     * @return Post
     */
    public function findById(int $id): ?Post;

    /**
     * @return Post[]
     */
    public function findAll(): array;
}
