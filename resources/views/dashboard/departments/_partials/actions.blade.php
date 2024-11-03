<td>
    <div class="dropdown">
        <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">
            <i class="ti ti-dots-vertical"></i>
        </button>
        <div class="dropdown-menu dropdown-menu-end">
            <a class="dropdown-item"  href="{{route('dashboard.departments.edit',$row->id)}}">
                <i class="ti ti-pencil me-1 text-info"></i>
                <span>Edit</span>
            </a>

            @if(auth()->check() && auth()->user()->role->value != \App\Enums\UserTypeEnum::EMPLOYEE->value)
                <a class="dropdown-item" href="javascript:void(0);" onclick="delete_form(this)"
                   data-href="{{route('dashboard.departments.destroy',$row->id)}}">
                    <i class="ti ti-trash me-1 text-danger"></i>
                    <span>Delete</span>
                </a>
            @endif
        </div>
    </div>
</td>
