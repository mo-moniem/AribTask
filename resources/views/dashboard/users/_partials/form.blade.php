<!-- Basic multiple Column Form section start -->
<div class="row">
    <div class="col-md-6 col-12">
        <div class="mb-1">
            <label class="form-label" for="first_name">First Name</label>
            {!! HTML::text('first_name',null)->class('form-control')->id('first_name') !!}
            @error('first_name')
            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-md-6 col-12">
        <div class="mb-1">
            <label class="form-label" for="last_name">Last Name</label>
            {!! HTML::text('last_name',null)->class('form-control')->id('last_name') !!}
            @error('last_name')
            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-md-6 col-12">
        <div class="mb-1">
            <label class="form-label" for="email-id-column">Email</label>
            {!! HTML::email('email',null)->class('form-control')->id('email-id-column') !!}
            @error('email')
            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-md-6 col-12">
        <div class="mb-1">
            <label class="form-label" for="phone-number">Phone</label>
            {!! HTML::number('phone',null)->class('form-control phone-number-mask')->id('phone-number') !!}
            @error('phone')
            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-md-6 col-12">
        <div class="mb-1">
            <label class="form-label" for="role">Role</label>
            {!! HTML::select('role',\App\Enums\UserTypeEnum::getLabels(), null)
                ->placeholder('Role')->id('role')->class('select2 form-control') !!}
            @error('role')
            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-md-6 col-12">
        <div class="mb-1">
            <label class="form-label" for="department">Department</label>
            {!! HTML::select('department_id',isset($user)?[$user->department_id=>$user->department?->title]:[], null)
            ->placeholder('Department')->class('select2 form-control')->attributes(['id'=>'department']) !!}
            @error('department_id')
            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-md-6 col-12">
        <div class="mb-1">
            <label class="form-label" for="last_name">Salary</label>
            {!! HTML::number('salary',null)->class('form-control')->attributes(['step'=>0.1,'min'=>0])->id('salary') !!}
            @error('salary')
            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-md-6 col-12">
        <div class="mb-1">
            <label class="form-label" for="email-id-column">Password</label>
            <div class="input-group form-password-toggle mb-2">
                {!! HTML::password('password',['aria-describedby'=>'basic-default-password'])->class('form-control')->id('basic-default-password') !!}
                <span class="input-group-text cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye">
                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                        <circle cx="12" cy="12" r="3"></circle>
                    </svg>
                </span>
                @error('password')
                <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-md-6 col-12">
        <div class="mb-1">
            <label class="form-label" for="email-id-column">Confirm Password</label>
            <div class="input-group form-password-toggle mb-2">
                {!! HTML::password('password_confirmation',['aria-describedby'=>'basic-default-password'])->class('form-control')->id('basic-default-password') !!}
                <span class="input-group-text cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye">
                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                        <circle cx="12" cy="12" r="3"></circle>
                    </svg>
                </span>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-12">
        <div class="mb-1">
            <label class="form-label" for="image">Image</label>
            {!! HTML::file('image', null)->acceptImage('jpeg,png,jpg')->class('form-control') !!}
            @error('image')
            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-12">
        <button type="submit" class="btn btn-primary me-1">Submit</button>
        <button type="reset" class="btn btn-outline-secondary">Reset</button>
    </div>
</div>
