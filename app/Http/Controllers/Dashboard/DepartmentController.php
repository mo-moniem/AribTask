<?php

namespace App\Http\Controllers\Dashboard;

use App\Enums\UserTypeEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\DepartmentRequest;
use App\Models\Department;
use App\Models\User;
use App\Services\DepartmentService;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DepartmentController extends Controller
{
    public function __construct(public DepartmentService $departmentService)
    {
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = $this->departmentService->index($request);
            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('manager',fn(Department $row)=>'<span>'.$row->manager?->full_name.'</span>')
                ->addColumn('action',fn(Department $row)=>view('dashboard.departments._partials.actions',compact('row')))
                ->rawColumns(['manager','full_name'])
                ->make(true);
        }
        return view('dashboard.departments.index');
    }

    public function create()
    {
        return view('dashboard.departments.create');
    }

    public function store(DepartmentRequest $request)
    {
        $this->departmentService->store($request);
        alert()->success('Success', 'Department created successfully');
        return  redirect()->route('dashboard.departments.index');
    }

    public function edit(Department $department)
    {
        return view('dashboard.departments.edit',compact('department'));
    }

    public function update(DepartmentRequest $request, Department $department)
    {
        $this->departmentService->update($request, $department);
        alert()->success('Success', 'Department updated successfully');
        return  redirect()->route('dashboard.departments.index');
    }

    public function destroy(Department $department)
    {
        $this->departmentService->destroy($department);
        alert()->success('Success', 'Department deleted successfully');
        return redirect()->route('dashboard.departments.index');
    }

    public function departmentManagers(Request $request)
    {
        return $this->departmentService->departmentManagers($request);
    }
}
