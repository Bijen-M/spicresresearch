@extends('admin.layouts.master')

@section('title', 'Testimonials')

@section('content')
<div id="vcPageInner" class="page-inner">
    <div id="vcPageContent" class="pageContent">
        @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        @endif
        <div style="text-align: right;margin-bottom: 10px;">
            <a href="{{ route('testimonial.withtrash') }}" class="btn-sm btn-primary">All</a>
            <a href="{{ route('testimonial.index') }}" class="btn-sm btn-primary">Testimonials</a>
            <a href="{{ route('testimonial.trash') }}" class="btn-sm btn-primary">Trash</a>
            <a href="{{ route('testimonial.create') }}" class="btn-sm btn-primary">Create</a>
        </div>
        <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Designation</th>
                    <th>Department</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                @if($testimonials)
                @foreach($testimonials as $testimonial)
                <tr>
                    <td>{{ $testimonial->by }}</td>
                    <td>{{ $testimonial->designation }}</td>
                    <td>{{ $testimonial->department->title }}</td>
                    <td>
                        @if(empty($testimonial->deleted_at))
                            <a href="{{ route('testimonial.show', $testimonial->id) }}"><i class="icofont-eye"></i></a>
                            |
                            <a href="{{ route('testimonial.edit', $testimonial->id) }}"><i class="icofont-edit"></i></a>
                            |
                            <a href="{{ route('testimonial.destroy', $testimonial->id) }}"
                                onclick="event.preventDefault();
                                              document.getElementById('delete-form-{{ $testimonial->id }}').submit();">
                                 {!! __('<i class="icofont-trash"></i>') !!}
                             </a>
                            <div class="delete-item">
                            {{ Form::open(['url' => route('testimonial.destroy', $testimonial->id), 'id' => 'delete-form-'.$testimonial->id,  'style' => 'display: none;']) }}
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <!--<button type="submit" href="{{-- route('testimonial.destroy', $testimonial->id) --}}"><i class="icofont-trash"></i></button>-->
                            {{ Form::close()}}
                            </div>
                        @else
                            <a href="{{ route('testimonial.restore', $testimonial->id) }}"><i class="icofont-upload"> restore</i></a>
                            <a onclick="return confirm('Are you sure want to permanetly delete this item?')" href="{{ route('testimonial.delete', $testimonial->id) }}"><i class="icofont-trash"> delete</i></a>
                        @endif
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
            <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Designation</th>
                    <th>Department</th>
                    <th>action</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

@endsection

@push('style')
@endpush
@push('script')
@endpush