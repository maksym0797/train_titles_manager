<?php


namespace App\TitlesManager\User\Repository;


use App\TitlesManager\User\Models\UserTitleLikeEloquent;

/**
 * Class UserRepository
 * @package App\TitlesManager\User\Repository
 */
class UserRepository
{
    /**
     * @param int $titleId
     * @param int $userId
     * @return UserTitleLikeEloquent
     */
    public function createTitleLike(int $titleId, int $userId)
    {
        $userTitleLike = new UserTitleLikeEloquent();

        $userTitleLike->user_id = $userId;
        $userTitleLike->title_id = $titleId;
        $userTitleLike->like = true;

        $userTitleLike->save();

        return $userTitleLike;
    }

    /**
     * @param int $titleId
     * @param int $userId
     */
    public function removeTitleLike(int $titleId, int $userId)
    {
        $userTitleLike = UserTitleLikeEloquent::where('title_id', $titleId)
            ->where('user_id', $userId)
            ->first()
        ;

        if (! $userTitleLike) {
            return;
        }

        $userTitleLike->delete();
    }
}
