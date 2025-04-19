<?php
/**
 * @auhtor: xieyanjun
 * @date: 2025/4/19 13:32
 * @desc:
 */

namespace App\Http\Services;

use App\Models\User;

class UserService
{

    public function login($username, $password)
    {
        $token = \auth()->attempt(['username' => $username, 'password' => $password]);

        return [
            'token' => $token,
            'userInfo' => \auth()->user()
        ];
    }

    public function register($username, $email, $password, $groupId)
    {
        return (new User())->newQuery()->create([
            'username' => $username,
            'email' => $email,
            'password' => $this->passwordHash($password),
            'group_id' => $groupId
        ]);
    }

    public function passwordHash($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    public function passwordVerify($password, $hash): bool
    {
        return password_verify($password, $hash);
    }
}
