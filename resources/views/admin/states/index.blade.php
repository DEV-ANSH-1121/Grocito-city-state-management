@extends('admin.layout.master')
@section('title','state List')
@section('heading','State Management')
@section('content')

<div class="card mb-4">
    <div class="card-header">
        <div class="row">
            <div class="col-2">
                <h6 class="card-title">
                <i class="fas fa-table me-1"></i> State List</h6>
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
                <a href="{{ route('admin.states.create') }}" class="float-right btn btn-primary btn-sm">
                    <i class="fa fa-plus"></i>
                    Add State
                </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($states as $state)
                    <tr>
                        <td>{{ $state->name }}</td>
                        <td>{{ $state->code }}</td>
                        <td>
                            <a href="{{ route('admin.states.edit', $state->id) }}" class="btn btn-sm btn-warning">
                                <i class="fa fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.states.destroy', $state->id) }}" method="post" class="d-inline" onsubmit="confirmDelete(this, event)">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                    </tr>
                @empty
                    <tr>
                        <td colspan="100%" class="text-center">No states found</td>
                    </tr>
                @endforelse

            </tbody>
        </table>
    </div>
    <div class="card-footer">
        {{ $states->links() }}
    </div>
</div>

@endsection
