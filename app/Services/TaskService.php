<?php

namespace App\Services;

use App\Enums\UserTypeEnum;
use App\Http\Requests\TaskRequest;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskService
{

    public function __construct(public Task $task)
    {

    }

    public function index(Request $request)
    {
        return $this->task::with(['user'])
            ->ofUser(auth()->user())
            ->orderBy('id','desc')
            ->get();
    }

    public function store(TaskRequest $request){
        return Task::create($request->validated());
    }

    public function update(TaskRequest $request, Task $task)
    {
        return $task->update($request->validated());
    }

    public function taskUsers(Request $request)
    {
        return User::when(!empty($request['q']??''), fn($q)=> $q->ofName($request['q']))
            ->where('role',UserTypeEnum::EMPLOYEE->value)
            ->get()
            ->map(fn($user)=>['id'=>$user->id,'text'=>$user->full_name]);
    }
}
