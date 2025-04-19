<?php
/**
 * @auhtor: xieyanjun
 * @date: 2025/4/19 13:32
 * @desc:
 */

namespace App\Http\Services;

use App\Models\User;
use Exception;

class UserService
{

    public function list($page = 1, $pageSize = 10, $sortField = 'id', $sortOrder = 'desc')
    {
        return (new User())
            ->newQuery()
            ->orderBy($sortField, $sortOrder)
            ->with('group')
            ->paginate($pageSize, ['*'], 'page', $page);
    }

    public function login($credentials): array
    {
        $token = \auth()->attempt($credentials);

        if (!$token) {
            throw new Exception('validation error');
        }

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
