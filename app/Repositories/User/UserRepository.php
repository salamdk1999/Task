<?php

namespace App\Repositories\User;

use App\Helper\ImageHelper;
use App\Interfaces\User\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserRepository implements UserRepositoryInterface
{
    /**
     * Create an access token for the given user.
     *
     * @param User $user
     * @return string
     */
    public function createAccessToken(User $user): string
    {
        return $user->createToken('Personal Access Token')->plainTextToken;
    }

    /**
     * Authenticate a user with the given data.
     *
     * @param array $data
     * @return User
     *
     * @throws ValidationException
     */
    public function authenticateUser(array $data): User
    {
        $user = User::where('username', $data['username'])->firstOrFail();

        if (!$user || !Hash::check($data['password'], $user->password)) {
            throw ValidationException::withMessages([
                __('auth.password_is_incorrect'),
            ]);
        }

        return $user;
    }

    /**
     * Get all users.
     *
     * @return Collection
     */
    public function getAllUsers(): Collection
    {
        return User::all();
    }

    /**
     * Get a user by ID.
     *
     * @param int $id
     * @return User|null
     */
    public function getUserById(int $id): ?User
    {
        return User::findOrFail($id);
    }

    /**
     * Create a new user.
     *
     * @param array $data
     * @return User
     */
    public function createUser(array $data): User
    {
        $avatarPath = null;

        if (isset($data['avatar'])) {
            $avatarPath = ImageHelper::saveImage($data['avatar'], 'avatar');
        }

        $data['avatar'] = $avatarPath;

        return User::create($data);
    }

    /**
     * Update a user by ID with the given data.
     *
     * @param int $id
     * @param array $data
     * @return User
     */
    public function updateUser(int $id, array $data): User
    {
        $user = User::findOrFail($id);
        $avatarPath = null;

        if (isset($data['avatar'])) {
            $avatarPath = ImageHelper::saveImage($data['avatar'], 'avatar');
        }

        $data['avatar'] = $avatarPath;
        $user->update($data);

        return $user;
    }

    /**
     * Delete a user by ID.
     *
     * @param int $id
     * @return void
     */
    public function deleteUser(int $id): void
    {
        $user = User::findOrFail($id);
        $user->delete();
    }
}