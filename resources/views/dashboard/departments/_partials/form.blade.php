<!-- Basic multiple Column Form section start -->
<div class="row">
    <div class="col-md-6 col-12">
        <div class="mb-1">
            <label class="form-label" for="first-name-column">Title</label>
            {!! HTML::text('title',null)->class('form-control')->id('first-name-column') !!}
            @error('title')
            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-md-6 col-12">
        <div class="mb-1">
            <label class="form-label" for="manager">Manager</label>
            {!! HTML::select('manager_id',isset($department?->manager)?[$department->manager_id=>$department->manager->full_name]:[], null)
            ->placeholder('Manager')->class('select2 form-control')->attributes(['id'=>'manager']) !!}
            @error('manager_id')
            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-12">
        <button type="submit" class="btn btn-primary me-1">Submit</button>
        <button type="reset" class="btn btn-outline-secondary">Reset</button>
    </div>
</div>
