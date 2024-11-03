@extends('dashboard.layout.app')
@section('title','Edit Department')
@section('content')

    <div class="content-body">
        <section id="basic-input">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Department</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <a href="{{route('dashboard.departments.index')}}"
                                   class="btn btn-success mb-2 waves-effect waves-light">&nbsp; All Departments </a>
                                {!! Html::modelForm($department,'PUT', route('dashboard.departments.update',$department))
                                ->id('form')->id('form')->class('form')->open() !!}
                                @include('dashboard.departments._partials.form')
                                {!! Html::form()->close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@pushOnce('scripts')
    <script>
        let manager_id = "{{$department->manager_id}}";
        function loadSelect(id,url,data,placeholder = 'Select ...'){
            $(`${id}`).select2({
                placeholder: placeholder,
                ajax: {
                    url: `${url}`,
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        // console.log(1,params)
                        return {
                            q: params.term,
                            page: params.page,
                            ...data
                        };
                    },
                    processResults: function (data) {
                        console.log(`${id}`,data);
                        return {
                            results: data
                        };
                    },
                    cache: true
                }
            })
        }
        $(document).ready(function (){
            loadSelect('#manager','{{route('department.managers')}}')
        })

    </script>
@endPushOnce
