<?php

declare(strict_types=1);

namespace Infrastructure\Storage;

use Domain\Entity\Post;
use Domain\Storage\PostStorageInterface;
use Domain\ValueObject\Title;
use Domain\ValueObject\Url;
use Infrastructure\Model\PostModel;

class PostStorage implements PostStorageInterface
{

    public function save(Post $post): Post
    {
        $postEntity = new PostModel([
            'title' => $post->getTitle(),
            'dateTime' => $post->getDateTime(),
            'sourceUrl' => $post->getSourceUrl(),
        ]);

        $postEntity->save();

        $reflectionProperty = new \ReflectionProperty(Post::class, 'id');
        $reflectionProperty->setAccessible(true);
        $reflectionProperty->setValue($post, $postEntity->getAttributeValue('id'));
        return $post;
    }

    public function findById(int $id): Post
    {
        $model = PostModel::find($id);
        $post = new Post($model->dateTime, new Url($model->sourceUrl), $model->title);

        $reflectionProperty = new \ReflectionProperty(Post::class, 'id');
        $reflectionProperty->setAccessible(true);
        $reflectionProperty->setValue($post, $model->id);

        return $post;
    }

    public function findAll(): array
    {
        $models = PostModel::all();
        $posts = [];
        foreach ($models as $model) {
            $post = new Post($model->dateTime, new Url($model->sourceUrl), new Title($model->title));

            $reflectionProperty = new \ReflectionProperty(Post::class, 'id');
            $reflectionProperty->setAccessible(true);
            $reflectionProperty->setValue($post, $model->id);

            $posts[] = $post;
        }

        return $posts;
    }
}
