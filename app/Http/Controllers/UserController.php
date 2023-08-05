<?php

namespace App\Http\Controllers;

use App\Http\Requests\RefreshTokenRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\AuthResource;
use App\Services\UserService;
use App\Traits\ApiResponser;

class UserController extends Controller
{
    use ApiResponser;

    private UserService $userService;

    public function __construct(UserService $userService)
    {
        //We can still use $this->userService anywhere in the Controller without declaration here in php8
        $this->userService = $userService;
    }

    public function store(StoreUserRequest $request)
    {
        $response = $this->userService->store($request->validated());

        return $this->successResponse(new AuthResource($response), 'Api User Created');
    }

    public function update(RefreshTokenRequest $request, User $user)
    {
        $response = $this->userService->update($request->validated(), $user);

        return $this->successResponse(new AuthResource($response), 'Api Keys Refreshed');
    }
}
