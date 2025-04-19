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
    public function index(Request $request, UserService $service): Response
    {
        $page = $request->input('page', 1);
        $pageSize = $request->input('pageSize', 10);
        $sort = $request->input('sortField', 'id');
        $order = $request->input('sortOrder', 'desc');

        return $this->jsonResponse($service->list($page, $pageSize, $sort, $order));
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
    public function update(UpdateUserRequest $request, User $user, UserService $service)
    {
        return $this->jsonResponse($service->update($user, $request->only(['username', 'email'])));
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
