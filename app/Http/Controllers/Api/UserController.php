<?php

namespace App\Http\Controllers\Api;

use App\DTO\GetResponseData;
use App\DTO\ResponseData;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Interfaces\User\UserRepositoryInterface;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class UserController extends Controller
{
    private UserRepositoryInterface $userRepository;

    /**
     * UserController constructor.
     *
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the resource.
     * @throws UnknownProperties
     */
    public function index(): ResponseData
    {
        // Retrieve all users from the UserRepository
        $users = $this->userRepository->getAllUsers();

        // Return the response data with the retrieved users
        return GetResponseData::getResponseData(
            $users,
            __('message.Data_retrieved_successfully'),
            200
        );
    }

    /**
     * Store a newly created resource in storage.
     * @throws UnknownProperties
     */
    public function store(CreateUserRequest $request): ResponseData
    {
        // Create the user using the UserRepository and the validated request data
        $this->userRepository->createUser($request->validated());

        // Return the response data indicating successful user registration
        return GetResponseData::getResponseData(
            null,
            __('auth.user_register_successfully'),
            200
        );
    }

    /**
     * Display the specified resource.
     * @throws UnknownProperties
     */
    public function show(int $id): ResponseData
    {
        // Retrieve the user by ID from the UserRepository
        $user = $this->userRepository->getUserById($id);

        // Return the response data with the retrieved user
        return GetResponseData::getResponseData(
            $user,
            __('message.Data_retrieved_successfully'),
            200
        );
    }

    /**
     * Update the specified resource in storage.
     * @throws UnknownProperties
     */
    public function update(UpdateUserRequest $request, int $id): ResponseData
    {
        // Update the user in the UserRepository with the validated request data
        $user = $this->userRepository->updateUser($id, $request->validated());

        // Return the response data with the updated user
        return GetResponseData::getResponseData(
            $user,
            __('message.Data_updated_successfully'),
            200
        );
    }

    /**
     * Remove the specified resource from storage.
     * @throws UnknownProperties
     */
    public function destroy(string $id): ResponseData
    {
        // Delete the user from the UserRepository
        $this->userRepository->deleteUser($id);

        // Return the response data indicating successful deletion
        return GetResponseData::getResponseData(
            null,
            __('message.Data_deleted_successfully'),
            200
        );
    }
}