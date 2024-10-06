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

                            <label>&nbsp;</label>

                            {{ Form::select('type_id', [], null, ['id' => 'type_id', 'class' => 'form-control', 'placeholder' => '- - - Select - - -']) }}

                            {!! $errors->first('type_id', '<label class="error">:message</label>') !!}

                        </div>

                        <div class="form-group col-md-12">

                            <label>Title <span class="astrick">*</span></label>

                            {{ Form::text('title', null, ['id' => 'title', 'class' => 'form-control']) }}

                            {!! $errors->first('title', '<label class="error">:message</label>') !!}

                        </div>

                        <div class="form-group col-md-12">

                            <label>Slug (URL) <span class="astrick">*</span></label>

                            {{ Form::text('slug', null, ['id' => 'slug', 'class' => 'form-control', 'readonly']) }}

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

        var eid = '{{ $menu->type_id }}';

        if($('#type').val()){

            $('#type_id').parent('div').show();

            if($('#type').val() == 'static'){

                $('#type_id').find('option').remove();

                $('#type_id').append('<option>- - - Select - - -</option>');

                var values = {

                    '/' : 'Home',

                    'blogs' : 'Blogs',

                    'portfolios' : 'Portfolios',

                    'services' : 'Services',

                };

                $.each( values, function(a, b){

                    $('#type_id').append($('<option>', {value:a, text:b}).attr('selected', eid==a?true:false));

                });

//                $('#type_id').removeAttr('multiple');

            } else {

//                $('#title').parent('div').hide();

//                $('#slug').parent('div').hide();

//                $('#title').attr('disabled', true);

//                $('#slug').attr('disabled', true);

                $('#type_id').find('option').remove();

                $('#type_id').append('<option>- - - Select - - -</option>');

                $.ajax({

                    url : '{{ route("menu.pluck") }}',

                    method : 'POST',

                    data : { type : $('#type').val(), depart : $('#department').val(), _token: '{{csrf_token()}}' },

                    success:function (data) {

                        console.log(data);

                        $('#type_id').find('option').remove();

                        $.each( data, function(k, v) {

                            $('#type_id').append($('<option>', {value:k, text:v}).prop('selected', eid==k?true:false));

                       });

                    },

                });

            }

        } else {

            $('#type_id').attr('disabled', true).parent('div').hide();

        }

        $('#type').on('change', function(){

            console.log($('#type').val());

            $('#title').val('');

            $('#slug').val('');

            if($('#type').val()){

                $('#type_id').attr('disabled', false).parent('div').show();

                if($('#type').val() == 'static'){

                    $('#slug').attr('readonly', true);

                    $('#type_id').find('option').remove();

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

//                    $('#title').parent('div').show();

//                    $('#slug').parent('div').show();

//                    $('#title').attr('disabled', false).val($('#type_id').find("option:selected").text());

//                    $('#slug').attr('disabled', false).val($('#type_id').val());

                } else {

//                    $('#type_id').attr('multiple', true);

//                    $('#title').parent('div').hide();

//                    $('#slug').parent('div').hide();

//                    $('#title').attr('disabled', true);

//                    $('#slug').attr('disabled', true);

                    $.ajax({

                        url : '{{ route("menu.pluck") }}',

                        method : 'POST',

                        data : { type : $('#type').val(), depart : $('#department').val(), _token: '{{csrf_token()}}' },

                        success:function (data) {

                            $('#type_id').find('option').remove();

                            $('#type_id').append('<option>- - - Select - - -</option>');

                            $.each( data, function(k, v) {

                                $('#type_id').append($('<option>', {value:k, text:v}).prop('selected', false));

                           });

                        },

                    });

                }

                

            } else {

                $('#type_id').attr('disabled', true).parent('div').hide();

                $('#title').attr('onkeyup', 'generateURL(this);');

                $('#slug').attr('readonly', false);

            }

            

        });

        $('#type_id').on('change', function(){

//            console.log($('#type_id').val());

            if($('#type_id').val()){

                $('#title').val($('#type_id').find("option:selected").text());

                var pre = '';

                if($('#type').val() == 'blogs') {

                    pre = 'blog/';

                } else if($('#type').val() == 'categories') {

                    pre = 'category/';

                } else if($('#type').val() == 'tags') {

                    pre = 'tag/';

                } else if($('#type').val() == 'portfolios') {

                    pre = 'portfolio/';

                } else if($('#type').val() == 'services') {

                    pre = 'service/';

                } 

                $('#slug').val(pre+$('#type_id').val());

            } else {

                $('#title').val('');

                $('#slug').val('');

            }

        });

    });

</script>

@endpush



