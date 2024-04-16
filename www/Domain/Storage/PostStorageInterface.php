<?php

declare(strict_types=1);

namespace Domain\Storage;

use Domain\Entity\Post;


// TODO: Надо в Infrastructure создать PostActiveRecord который будет наследовать Post и реализовывать интерфейс PostStorageInterface
interface PostStorageInterface
{
    /**
     * @param Post $post
     * @return void
     */
    public function save(Post $post): void;

    /**
     * @param int $id
     * @return Post
     */
    public function findById(int $id): Post;

    /**
     * @return Post[]
     */
    public function findAll(): array;
}
