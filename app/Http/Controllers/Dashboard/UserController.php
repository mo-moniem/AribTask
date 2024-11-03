<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Department;
use App\Models\User;
use App\Services\UserService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function __construct(public UserService $userService)
    {

    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = $this->userService->index($request);
            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('image',fn(User $row)=>$row->image?'<img src="'.asset('storage/'.$row->image).'" width="50">':"<span>&nbsp;</span>")
                ->editColumn('full_name',fn(User $row)=>'<span>'.$row->full_name.'</span>')
                ->editColumn('phone',fn(User $row)=>'<span>'.$row->phone.'</span>')
                ->editColumn('role',fn(User $row)=>'<span class="badge bg-primary">'.$row->role->name().'</span>')
                ->editColumn('manager',fn(User $row)=>'<span>'.$row->department?->manager?->full_name.'</span>')
                ->addColumn('created_at',fn(User $row)=>$row->created_at->toDateString())
                ->addColumn('action',fn(User $row)=>view('dashboard.users._partials.actions',compact('row')))
                ->rawColumns(['phone','full_name','role','manager','image'])
                ->make(true);
        }
        return view('dashboard.users.index');
    }

    public function create()
    {
        return view('dashboard.users.create');
    }

    public function store(UserStoreRequest $request)
    {
        $this->userService->store($request);
        alert()->success('Success', 'User created successfully');
        return  redirect()->route('dashboard.users.index');
    }

    public function edit(User $user)
    {
        return view('dashboard.users.edit',compact('user'));
    }

    public function update(UserUpdateRequest $request, User $user)
    {
       $this->userService->update($request, $user);
        alert()->success('Success', 'User updated successfully');
        return  redirect()->route('dashboard.users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();
        alert()->success('Success', 'User deleted successfully');
        return redirect()->route('dashboard.users.index');
    }

    public function userDepartments(Request $request)
    {
        return $this->userService->userDepartments($request);
    }
}
