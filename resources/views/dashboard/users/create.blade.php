@extends('dashboard.layout.app')
@section('title','Create User')
@section('content')

    <div class="content-body">
        <section id="basic-input">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Create User</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <a href="{{route('dashboard.users.index')}}"
                                   class="btn btn-success mb-2 waves-effect waves-light">&nbsp; All Users </a>
                                {!! Html::form('POST', route('dashboard.users.store'))
                                    ->attributes(['enctype' => 'multipart/form-data'])
                                    ->id('form')->class('form')->open() !!}
                                @include('dashboard.users._partials.form')
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
        let department_id;
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
            $('#department').closest('.col-md-6').hide()
            loadSelect('#department','{{route('user.departments')}}');
        })
        $('#role').on('change',function(){
            if($(this).val()==2){
                $('#department').closest('.col-md-6').show()
            }else{
                $('#department').closest('.col-md-6').hide()
            }
        })
    </script>
@endPushOnce
