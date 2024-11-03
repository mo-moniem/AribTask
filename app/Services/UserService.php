<?php

namespace App\Services;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Department;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UserService
{

    public function __construct(public User $user)
    {

    }

    public function index(Request $request)
    {
        return $this->user::with(['department.manager'])
            ->ofUser(auth()->user())
            ->orderBy('id','desc')
            ->get();
    }

    public function store(UserStoreRequest $request)
    {
        $payload = $request->validated();
        $payload = $this->getPayload($request, $payload);
        return $this->user::create($payload);
    }

    public function update(UserUpdateRequest $request, User $user){
        $payload = $request->validated();
        $payload = $this->getPayload($request, $payload);
        if(empty($payload['password'])){
            unset($payload['password']);
        }
        $user->update($payload);
        return $user;
    }
    /**
     * @param  $request
     * @param mixed $payload
     * @return mixed
     */
    public function getPayload( $request, mixed $payload): mixed
    {
        if ($request->file('image')) {
            $fileName = Carbon::now()->timestamp . Str::random(4) . '-' .
                $request->file('image')->getClientOriginalName();
            $image = Storage::putFileAs('users', $request->file('image'), $fileName);
            $payload['image'] = $image;
        }
        return $payload;
    }

    public function userDepartments(Request $request)
    {
        $departments = Department::select('id','title as text')->when(!empty($request['q']??''),
            fn($q)=> $q->ofTitle($request['q']))
            ->get();
        return $departments;
    }
}
