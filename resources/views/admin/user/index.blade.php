@extends('admin.layouts.master')

@section('title', 'Users')

@section('content')
<div id="vcPageInner" class="page-inner">
    <div id="vcPageContent" class="pageContent">
        @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        @endif
        <div style="text-align: right;margin-bottom: 10px;">
            <a href="{{ route('user.withtrash') }}" class="btn-sm btn-primary">All</a>
            <a href="{{ route('user.index') }}" class="btn-sm btn-primary">Users</a>
            <a href="{{ route('user.trash') }}" class="btn-sm btn-primary">Trash</a>
            <a href="{{ route('user.create') }}" class="btn-sm btn-primary">Create</a>
        </div>
        <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Verified At</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                @if($users)
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->email_verified_at ?? 'Not Verified' }}</td>
                    <td>
                        @if(empty($user->deleted_at))
                        <a href="{{ route('user.show', $user->id) }}"><i class="icofont-eye"></i></a>
                            |
                            <a href="{{ route('user.password', $user->id) }}" title="Change Password"><i class="icofont-ui-password"></i></a>
                            |
                            <a href="{{ route('user.edit', $user->id) }}" title="Edit"><i class="icofont-edit"></i></a>
                            |
                            <a href="{{ route('user.destroy', $user->id) }}"
                                onclick="event.preventDefault();
                                              document.getElementById('delete-form-{{ $user->id }}').submit();">
                                 {!! __('<i class="icofont-trash"></i>') !!}
                             </a>
                            <div class="delete-item">
                            {{ Form::open(['url' => route('user.destroy', $user->id), 'id' => 'delete-form-'.$user->id,  'style' => 'display: none;']) }}
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <!--<button type="submit" href="{{-- route('user.destroy', $user->id) --}}"><i class="icofont-trash"></i></button>-->
                            {{ Form::close()}}
                            </div>
                        @else
                            <a href="{{ route('user.restore', $user->id) }}"><i class="icofont-upload"> restore</i></a>
                            <a onclick="return confirm('Are you sure want to permanetly delete this item?')" href="{{ route('user.delete', $user->id) }}"><i class="icofont-trash"> delete</i></a>
                        @endif
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
            <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
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