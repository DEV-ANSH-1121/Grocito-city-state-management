@extends('admin.layout.master')
@section('title','City List')
@section('heading','City Management')
@section('content')

<div class="card mb-4">
    <div class="card-header">
        <div class="row">
            <div class="col-2">
                <h6 class="card-title">
                <i class="fas fa-table me-1"></i> City List</h6>
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
                <a href="{{ route('admin.cities.create') }}" class="float-right btn btn-primary btn-sm">
                    <i class="fa fa-plus"></i>
                    Add City
                </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>@sortablelink('name', 'Name')</th>
                    <th>@sortablelink('state.name', 'State')</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($cities as $city)
                    <tr>
                        <td>{{ $city->name }}</td>
                        <td>{{ $city->state->name }}</td>
                        <td>
                            <a href="{{ route('admin.cities.edit', $city->id) }}" class="btn btn-sm btn-warning">
                                <i class="fa fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.cities.destroy', $city->id) }}" method="post" class="d-inline" onsubmit="confirmDelete(this, event)">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                    </tr>
                @empty
                    <tr>
                        <td colspan="100%" class="text-center">No cities found</td>
                    </tr>
                @endforelse

            </tbody>
        </table>
    </div>
    <div class="card-footer">
        {{ $cities->links() }}
    </div>
</div>

@endsection
