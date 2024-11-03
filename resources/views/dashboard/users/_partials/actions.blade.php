<td>
    <div class="dropdown">
        <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">
            {{--            <i data-feather="more-vertical"></i>--}}
            <i class="ti ti-dots-vertical"></i>

        </button>
        <div class="dropdown-menu dropdown-menu-end">
            <a class="dropdown-item"  href="{{route('dashboard.users.edit',$row->id)}}">
                <i class="ti ti-pencil me-1 text-info"></i>
                <span>Edit</span>
            </a>

            @if(auth()->check() && auth()->user()->id != $row->id)
                <a class="dropdown-item" href="javascript:void(0);" onclick="delete_form(this)"
                   data-href="{{route('dashboard.users.destroy',$row->id)}}">
                    <i class="ti ti-trash me-1 text-danger"></i>
                    <span>Delete</span>
                </a>
            @endif
        </div>
    </div>
</td>
