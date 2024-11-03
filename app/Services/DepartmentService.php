<?php

namespace App\Services;

use App\Enums\UserTypeEnum;
use App\Http\Requests\DepartmentRequest;
use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class DepartmentService
{

    public function __construct(public Department $department){

    }

    public function index(Request $request)
    {
        return $this->department::withCount('users')
            ->withSum('users','salary')
            ->with(['manager'])
            ->ofManager(auth()->user())
            ->orderBy('id','desc')
            ->get();
    }

    public function store(DepartmentRequest $request){
        return Department::create($request->validated());
    }

    public function update(DepartmentRequest $request, Department $department)
    {
        return $department->update($request->validated());
    }

    public function destroy(Department $department){
//        abort_if($department->users->count()>0, 403, 'Department has users');
        if($department->users->count()>0){
            alert()->error('Error', 'Can not delete. Department has users');
            throw new HttpResponseException(redirect()->back());
        }
        return $department->delete();
    }

    public function departmentManagers(Request $request)
    {
        return  User::when(!empty($request['q']??''), fn($q)=> $q->ofName($request['q']))
            ->where('role',UserTypeEnum::MANAGER->value)
            ->get()
            ->map(fn(User $user)=>['id'=>$user->id,'text'=>$user->full_name]);
    }
}
