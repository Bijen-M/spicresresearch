@extends('admin.layouts.master')



@section('title', 'Menu')



@section('content')

@if (session('success'))

<div class="alert alert-success" role="alert">

    {{ session('success') }}

</div>

@endif

<div class="container">

    <div class="justify-content-center">

        @include('admin.partials._sidebar')

        @if (session('status'))

        <div class="alert alert-success" role="alert">

            {{ session('status') }}

        </div>

        @endif

        

        @if(isset($menu))

        {{ Form::model($menu, ['method'=>'put', 'url' => route('menu.update', $menu->id), 'id' => 'form', 'files' => true]) }}

        @else

        {{ Form::open(['url' => route('menu.store'), 'id' => 'form', 'files' => true]) }}

        @endif

        <div class="row">

        <div class="col-md-8">

            <div class="card">

                <div class="card-header">Menu</div>

                <div class="card-body">

                    <div class="box-body row">
                        <div class="form-group col-md-6">

                            <label>Parent </label>
                                <select name="parent_id" class="form-control">
                                    <option value="">- - - Select - - -</option>
                                    {!! $menus !!}
                                </select>
                        </div>
                        <?php /*
                        <div class="form-group col-md-6">

                            <label>Parent </label>

                            {{ Form::select('parent_id', $menus, !isset($menu) ? cache()->get('menu_id') : null, ['class' => 'form-control', 'placeholder' => '- - - Select - - -']) }}

                            {!! $errors->first('parent_id', '<label class="error">:message</label>') !!}

                        </div>
                        */ ?>

                        <div class="form-group col-md-6">

                            <label>Departments <span class="astrick">*</span></label>

                            {{ Form::select('department_id', $departments, null, ['id' => 'department', 'class' => 'form-control', isset($menu) ? 'disabled' : null]) }}

                            {!! $errors->first('department_id', '<label class="error">:message</label>') !!}

                        </div>

                        <div class="form-group col-md-6">

                            <label>Type </label>

                            {{ Form::select('type', [
                                'static' => 'Static',
                                'pages' => 'Pages',
                                'blogs' => 'Blogs',
                                'categories' => 'Categories',
                                'tags' => 'Tags',
                                'portfolios' => 'Portfolios',
                                'services' => 'Services',
                            ], null, ['id' => 'type', 'class' => 'form-control', 'placeholder' => '- - - Select - - -']) }}

                            {!! $errors->first('type', '<label class="error">:message</label>') !!}

                        </div>

                        <div class="form-group col-md-6" style="display: none">

                            <label> &nbsp; </label>

                            {{ Form::select('type_ids[]', [], null, ['id' => 'type_id', 'class' => 'form-control', 'placeholder' => '- - - Select - - -', 'multiple']) }}

                            {!! $errors->first('type_ids', '<label class="error">:message</label>') !!}

                        </div>

                        <div class="form-group col-md-12">

                            <label>Title <span class="astrick">*</span></label>

                            {{ Form::text('title', null, ['id' => 'title', 'class' => 'form-control']) }}

                            {!! $errors->first('title', '<label class="error">:message</label>') !!}

                        </div>

                        <div class="form-group col-md-12">

                            <label>Slug (URL) <span class="astrick">*</span></label>

                            {{ Form::text('slug', null, ['id' => 'slug', 'class' => 'form-control']) }}

                            {!! $errors->first('slug', '<label class="error">:message</label>') !!}

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-md-4">

            <div class="card">

                <div class="card-header">Action</div>

                <div class="card-body">

                    

                    {{ Form::submit(isset($menu) ? 'Update' : 'Create', array('class'=>'btn btn-primary')) }}

                    @if(cache()->has('menu_id'))

                    <a href="{{ route('menu.children', cache()->get('menu_id')) }}" class="btn btn-light">Back</a>

                    @else

                    <a href="{{ route('menu.index') }}" class="btn btn-light">Back</a>

                    @endif

                </div>

            </div>

        </div>

        </div>

    </div>

    

        {{ Form::close() }}

</div>

@stop



@push('script')

<script>

    $(document).ready(function(){

        var title = '{{ old('title') }}';

        var slug = '{{ old('slug') }}';

        if($('#type').val()){

            $('#type_id').attr('disabled', false).parent('div').show();

            if($('#type').val() == 'static'){

                $('#type_id').removeAttr('multiple').find('option').remove();

                $('#type_id').append('<option>- - - Select - - -</option>');

                var values = {

                    '/' : 'Home',

                    'blogs' : 'Blogs',

                    'portfolios' : 'Portfolios',

                    'services' : 'Services',

                };

                $.each( values, function(a, b){

                    $('#type_id').append($('<option>', {value:a, text:b}));

                });

                $('#title').attr('disabled', false).removeAttr('onkeyup').val(title).parent('div').show();

                $('#slug').attr('disabled', false).attr('readonly', true).val(slug).parent('div').show();

            } else {

                $('#type_id').attr('multiple', true);

                $('#title').attr('disabled', true).parent('div').val('').hide();

                $('#slug').attr('disabled', true).parent('div').val('').hide();

                $.ajax({

                    url : '{{ route("menu.pluck") }}',

                    method : 'POST',

                    data : { type : $('#type').val(), depart : $('#department').val(), _token: '{{csrf_token()}}' },

                    success:function (data) {

                        console.log(data);

                        $('#type_id').find('option').remove();

                        $.each( data, function(k, v) {

                            $('#type_id').append($('<option>', {value:k, text:v}));

                       });

                    },

                });

            }



        } else {

            $('#type_id').attr('disabled', true).parent('div').hide();

            $('#title').attr('disabled', false).attr('onkeyup', 'generateURL(this);').val('').parent('div').show();

            $('#slug').attr('disabled', false).attr('readonly', false).val('').parent('div').show();

        }

        $('#type').on('change', function(){

            console.log($('#type').val());

            if($('#type').val()){

                $('#type_id').attr('disabled', false).parent('div').show();

                if($('#type').val() == 'static'){

                    $('#type_id').removeAttr('multiple').find('option').remove();

                    $('#type_id').append('<option>- - - Select - - -</option>');

                    var values = {

                        '/' : 'Home',

                        'blogs' : 'Blogs',

                        'portfolios' : 'Portfolios',

                        'services' : 'Services',

                    };

                    $.each( values, function(a, b){

                        $('#type_id').append($('<option>', {value:a, text:b}));

                    });

                    $('#title').attr('disabled', false).removeAttr('onkeyup').val('').parent('div').show();

                    $('#slug').attr('disabled', false).attr('readonly', true).val('').parent('div').show();

                } else {

                    $('#type_id').attr('multiple', true);

                    $('#title').attr('disabled', true).parent('div').val('').hide();

                    $('#slug').attr('disabled', true).parent('div').val('').hide();

                    $.ajax({

                        url : '{{ route("menu.pluck") }}',

                        method : 'POST',

                        data : { type : $('#type').val(), depart : $('#department').val(), _token: '{{csrf_token()}}' },

                        success:function (data) {

                            console.log(data);

                            $('#type_id').find('option').remove();

                            $.each( data, function(k, v) {

                                $('#type_id').append($('<option>', {value:k, text:v}));

                           });

                        },

                    });

                }

                

            } else {

                $('#type_id').attr('disabled', true).parent('div').hide();

                $('#title').attr('disabled', false).attr('onkeyup', 'generateURL(this);').val('').parent('div').show();

                $('#slug').attr('disabled', false).attr('readonly', false).val('').parent('div').show();

            }

            

        });

        $('#type_id').on('change', function(){

            if($('#type_id').val() && $('#type_id').val() != '- - - Select - - -'){

                $('#title').val($('#type_id').find("option:selected").text());

                $('#slug').val($('#type_id').val());

            } else {

                $('#title').val('');

                $('#slug').val('');

            }

        });

        $('#department').on('change', function(){

            $.ajax({

                url : '{{ route("menu.pluck") }}',

                method : 'POST',

                data : { type : $('#type').val(), depart : $('#department').val(), _token: '{{csrf_token()}}' },

                success:function (data) {

                    console.log(data);

                    $('#type_id').find('option').remove();

                    $.each( data, function(k, v) {

                        $('#type_id').append($('<option>', {value:k, text:v}));

                   });

                },

            });

        });

    });

</script>

@endpush



