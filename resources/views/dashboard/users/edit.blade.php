@extends('dashboard.layout.app')
@section('title','Edit User')
@section('content')

    <div class="content-body">
        <section id="basic-input">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit User</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <a href="{{route('dashboard.users.index')}}"
                                   class="btn btn-success mb-2 waves-effect waves-light">&nbsp; All Users </a>
                                {!! Html::modelForm($user,'PUT', route('dashboard.users.update',$user))
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
        let department_id = "{{$user->department_id}}";
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
            loadSelect('#department','{{route('user.departments')}}')
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
