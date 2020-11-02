<?php


namespace App\Http\Controllers\Api\User;


use App\Http\Controllers\Controller;
use App\TitlesManager\User\Models\UserEloquent;
use App\TitlesManager\User\Service\UserService;
use Illuminate\Http\Request;

/**
 * Class UserController
 * @package App\Http\Controllers\Api\User
 */
class UserController extends Controller
{
    /**
     * @var UserService
     */
    private $userService;

    /**
     * UserController constructor.
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @param int $title
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function userLikeTitle(int $title, Request $request)
    {
        /** @var UserEloquent $user */
        $user = $request->user();
        $like = $request->get('like', false);

        $this->userService->likeTitleByUser($user, $title, $like);

        return response()->json([]);
    }
}
