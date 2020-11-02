<?php


namespace App\TitlesManager\User\Service;


use App\TitlesManager\User\Models\UserEloquent;
use App\TitlesManager\User\Repository\UserRepository;

/**
 * Class UserService
 * @package App\TitlesManager\User\Service
 */
class UserService
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * UserService constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param UserEloquent $userEloquent
     * @param int $titleId
     * @param bool $like
     */
    public function likeTitleByUser(UserEloquent $userEloquent, int $titleId, bool $like)
    {
        if ($like) {
            $this->userRepository->createTitleLike(
                $titleId,
                $userEloquent->id
            );
            return;
        }

        $this->userRepository->removeTitleLike($titleId, $userEloquent->id);
    }
}
