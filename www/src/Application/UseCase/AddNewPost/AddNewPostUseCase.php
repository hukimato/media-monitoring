<?php

declare(strict_types=1);

namespace Application\UseCase\AddNewPost;

use Application\DTO\PostMapper;
use Application\TitleParser\TitleParserInterface;
use DateTime;
use Domain\Entity\Post;
use Domain\Storage\PostStorageInterface;
use Domain\ValueObject\Title;

class AddNewPostUseCase
{
    public function __construct(
        private PostStorageInterface $postRepository,
        private TitleParserInterface $httpClient,
        private AddNewPostRequest    $addNewPostRequest,
    )
    {

    }

    public function __invoke(): AddNewPostResponse
    {
        $post = new Post(
            new DateTime(date('Y-m-d H:i:s')),
            $this->addNewPostRequest->url,
            new Title($this->httpClient->getPageTitle($this->addNewPostRequest->url)),
        );

        $post = $this->postRepository->save($post);

        return new AddNewPostResponse(PostMapper::map($post));
    }
}
