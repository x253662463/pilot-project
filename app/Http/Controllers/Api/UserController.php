<?php

namespace app\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Services\UserService;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request): Response
    {
        $user = $request->user();
        $list = (new User())
            ->newQuery()
            ->orderBy($request->get('sortField', 'id'), $request->get('sortOrder', 'desc'))
            ->paginate($request->get('pageSize'));
        return $this->jsonResponse($list);
    }

    public function login(LoginRequest $request, UserService $service)
    {
        return $this->jsonResponse($service->login($request->only(['username', 'password'])));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreUserRequest $request
     * @return Response
     */
    public function store(StoreUserRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\User $user
     * @return Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\User $user
     * @return Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateUserRequest $request
     * @param \App\Models\User $user
     * @return Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->only(['username', 'email', 'group_id']));
        return $this->jsonResponse($user, 0, '更新成功');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\User $user
     * @return Response
     */
    public function destroy(User $user): Response
    {
        $user->forceDelete();
        return $this->jsonResponse($user, 0, '删除成功');
    }
}
