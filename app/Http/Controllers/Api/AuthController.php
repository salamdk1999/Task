<?php

namespace App\Http\Controllers\Api;

use App\DTO\GetResponseData;
use App\DTO\ResponseData;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\User\CreateUserRequest;
use App\Interfaces\User\UserRepositoryInterface;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class AuthController extends Controller
{
    private UserRepositoryInterface $userRepository;

    /**
     * AuthController constructor.
     *
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Register a new user.
     *
     * @param CreateUserRequest $request
     * @return ResponseData
     * @throws UnknownProperties
     */
    public function register(CreateUserRequest $request): ResponseData
    {
        // Create the user using the UserRepository
        $this->userRepository->createUser($request->validated());

        // Return the response data indicating successful user registration
        return GetResponseData::getAuthResponseData(
            null,
            null,
            __('auth.user_register_successfully'),
            200
        );
    }

    /**
     * Authenticate and log in a user.
     *
     * @param LoginRequest $request
     * @return ResponseData
     * @throws UnknownProperties
     */
    public function login(LoginRequest $request): ResponseData
    {
        // Authenticate the user using the UserRepository
        $user = $this->userRepository->authenticateUser($request->validated());

        // Create an access token for the authenticated user
        $token = $this->userRepository->createAccessToken($user);

        // Return the response data indicating successful user login
        return GetResponseData::getAuthResponseData(
            $user,
            $token,
            trans('auth.user_login_successfully'),
            200
        );
    }
}