@extends('dashboard.layout.app')
@section('title','Create Task')
@section('content')

    <div class="content-body">
        <section id="basic-input">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Create Task</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <a href="{{route('dashboard.tasks.index')}}"
                                   class="btn btn-success mb-2 waves-effect waves-light">&nbsp; All Tasks </a>
                                {!! Html::form('POST', route('dashboard.tasks.store'))->id('form')->class('form')->open() !!}
                                @include('dashboard.tasks._partials.form')
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
        let task_id;
        function loadSelect(id,url,data,placeholder = 'Select ...'){
            $(`${id}`).select2({
                placeholder: placeholder,
                // allowClear: true,
                ajax: {
                    url: `${url}`,
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        // console.log(1,params)
                        return {
                            q: params.term,
                            page: params.page||1,
                            ...data
                        };
                    },
                    processResults: function (data) {
                        // console.log(2,data);
                        return {
                            results: data,
                        };
                    },
                    cache: true
                }
            })
                .select2('open')
                .select2('close');
        }
        $(document).ready(function(){
            loadSelect('#user','{{route('task.users')}}');
        })
    </script>
@endPushOnce
