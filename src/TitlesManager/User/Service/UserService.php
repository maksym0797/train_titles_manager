<?php


namespace App\TitlesManager\User\Service;


use App\TitlesManager\Titles\Models\TitleEloquent;
use App\TitlesManager\User\Models\UserEloquent;
use App\TitlesManager\User\Models\UserTitleLikeEloquent;
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

    /**
     * @param UserEloquent $userEloquent
     * @return TitleEloquent[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Support\Collection
     */
    public function getUserFavouriteTitles(UserEloquent $userEloquent)
    {
        return $this->userRepository->findLikedByUserId($userEloquent->id)
            ->map(function (UserTitleLikeEloquent $likeEloquent) {
                return $likeEloquent->title;
        });
    }
}
