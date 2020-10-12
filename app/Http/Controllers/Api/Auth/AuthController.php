<?php


namespace App\Http\Controllers\Api\Auth;


use App\Http\Controllers\Controller;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegistrationRequest;
use App\TitlesManager\Auth\Services\AuthService;
use App\TitlesManager\User\Models\UserEloquent;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

/**
 * Class AuthController
 * @package App\Http\Controllers\Api\Auth
 */
class AuthController extends Controller
{
    /**
     * @var AuthService
     */
    private $authService;

    /**
     * AuthController constructor.
     * @param AuthService $authService
     */
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    /**
     * @param UserLoginRequest $request
     * @return JsonResponse
     */
    public function signIn(UserLoginRequest $request)
    {
        $loginRequest = $request->validated();

        if(!Auth::attempt($loginRequest)) {
            return new JsonResponse(['message' => \Lang::get('auth.failed')]);
        }

        $user = Auth::user();

        $token = $this->authService->getTokenAndRefreshRoken($user->email, $request->get('password'));

        return new JsonResponse(['user' => $user, 'token' => $token]);
    }

    /**
     * @param UserRegistrationRequest $request
     * @return JsonResponse
     */
    public function signUp(UserRegistrationRequest $request)
    {
        $registrationRequest = $request->validated();

        $user = UserEloquent::create($registrationRequest);
        $token = $this->authService->getTokenAndRefreshRoken($user->email, $request->get('password'));

        return new JsonResponse(['user' => $user, 'token' => $token]);
    }
}
