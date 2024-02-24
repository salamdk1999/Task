<?php

namespace App\Interfaces\User;

use App\Models\User;

interface UserRepositoryInterface
{
    /**
     * Create an access token for the given user.
     *
     * @param  User  $user
     * @return mixed
     */
    public function createAccessToken(User $user): mixed;

    /**
     * Authenticate a user with the given data.
     *
     * @param  array  $data
     * @return mixed
     */
    public function authenticateUser(array $data): mixed;

    /**
     * Get all users.
     *
     * @return mixed
     */
    public function getAllUsers(): mixed;

    /**
     * Get a user by ID.
     *
     * @param int  $id
     * @return mixed
     */
    public function getUserById(int $id): mixed;

    /**
     * Create a new user.
     *
     * @param  array  $data
     * @return mixed
     */
    public function createUser(array $data): mixed;

    /**
     * Update a user by ID with the given data.
     *
     * @param  mixed  $id
     * @param  array  $data
     * @return mixed
     */
    public function updateUser(int $id, array $data): mixed;

    /**
     * Delete a user by ID.
     *
     * @param  int  $id
     * @return void
     */
    public function deleteUser(int $id): void;
}