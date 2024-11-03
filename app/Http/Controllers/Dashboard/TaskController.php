<?php

namespace App\Http\Controllers\Dashboard;

use App\Enums\UserTypeEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;
use App\Models\Task;
use App\Models\User;
use App\Services\TaskService;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TaskController extends Controller
{
    public function __construct(public TaskService $taskService)
    {

    }
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = $this->taskService->index($request);
            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('full_name',fn(Task $row)=>'<span>'.$row->user?->full_name.'</span>')
                ->editColumn('status',fn(Task $row)=>'<span class="badge bg-info">'.$row->status->name().'</span>')
                ->addColumn('created_at',fn(Task $row)=>$row->created_at->toDateString())
                ->addColumn('action',fn(Task $row)=>view('dashboard.tasks._partials.actions',compact('row')))
                ->rawColumns(['full_name','status'])
                ->make(true);
        }
        return view('dashboard.tasks.index');
    }

    public function create()
    {
        return view('dashboard.tasks.create');
    }

    public function store(TaskRequest $request)
    {
        $this->taskService->store($request);
        alert()->success('Success', 'Task created successfully');
        return  redirect()->route('dashboard.tasks.index');
    }

    public function edit(Task $task)
    {
        return view('dashboard.tasks.edit',compact('task'));
    }

    public function update(TaskRequest $request, Task $task)
    {
        $this->taskService->update($request, $task);
        alert()->success('Success', 'Task updated successfully');
        return  redirect()->route('dashboard.tasks.index');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        alert()->success('Success', 'Task deleted successfully');
        return redirect()->route('dashboard.tasks.index');
    }

    public function taskUsers(Request $request)
    {
        return $this->taskService->taskUsers($request);
    }
}
