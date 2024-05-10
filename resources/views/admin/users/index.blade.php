@extends('admin.layout.master')
@section('title','User List')
@section('heading','User Management')
@section('content')

<div class="card mb-4">
    <div class="card-header">
        <div class="row">
            <div class="col-2">
                <h6 class="card-title">
                <i class="fas fa-table me-1"></i> User List</h6>
            </div>
            <div class="col-8">
                <form action="" method="get" class="form-inline">
                    <div class="input-group w-100">
                        <input type="text" name="search" class="form-control" placeholder="Search" value="{{ request()->get('search') }}">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary pt-1 pb-1">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-2">
                <a href="{{ route('admin.users.create') }}" class="float-right btn btn-primary btn-sm">
                    <i class="fa fa-plus"></i>
                    Add User
                </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>@sortablelink('name', 'Name')</th>
                    <th>@sortablelink('email', 'Email')</th>
                    <th>State</th>
                    <th>City</th>
                    <th>@sortablelink('pinCode.pin_code', 'Pincode')</th>
                    <th>@sortablelink('create_at', 'Registered At') </th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->pinCode->city->state->name ?? 'NA' }}</td>
                        <td>{{ $user->pinCode->city->name ?? 'NA' }}</td>
                        <td>{{ $user->pinCode->pin_code ?? 'NA' }}</td>
                        <td>{{ $user->created_at->diffForHumans() }}</td>
                        <td>
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-warning">
                                <i class="fa fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="post" class="d-inline" onsubmit="confirmDelete(this, event)">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                    </tr>
                @empty
                    <tr>
                        <td colspan="100%" class="text-center">No users found</td>
                    </tr>
                @endforelse

            </tbody>
        </table>
    </div>
    <div class="card-footer">
        {{ $users->links() }}
    </div>
</div>

@endsection
