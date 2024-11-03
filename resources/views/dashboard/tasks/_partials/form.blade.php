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
            <label class="form-label" for="user">User</label>
            {!! HTML::select('user_id',isset($task?->user)?[$task->user_id=>$task->user->full_name]:[], null)
            ->placeholder('User')->class('select2 form-control')->attributes(['id'=>'user']) !!}
            @error('user_id')
            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-md-6 col-12">
        <div class="mb-1">
            <label class="form-label" for="role">Status</label>
            {!! HTML::select('status',\App\Enums\StatusEnum::getLabels(), null)
                ->placeholder('Status')->id('status')->class('select2 form-control') !!}
            @error('status')
            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-md-12 col-12">
        <div class="mb-1">
            <label class="form-label" for="first-name-column">Description</label>
            {!! HTML::textarea('description',null)->class('form-control')->id('first-name-column') !!}
            @error('description')
            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
            @enderror
        </div>
    </div>





    <div class="col-12">
        <button type="submit" class="btn btn-primary me-1">Submit</button>
        <button type="reset" class="btn btn-outline-secondary">Reset</button>
    </div>
</div>
