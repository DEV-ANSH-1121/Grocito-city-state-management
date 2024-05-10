@extends('admin.layout.master')
@section('title','Pin Code List')
@section('heading','Pin Code Management')
@section('content')

<div class="card mb-4">
    <div class="card-header">
        <div class="row">
            <div class="col-2">
                <h6 class="card-title">
                <i class="fas fa-table me-1"></i> Pin Code List</h6>
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
                <a href="{{ route('admin.pinCodes.create') }}" class="float-right btn btn-primary btn-sm">
                    <i class="fa fa-plus"></i>
                    Add Pin Code
                </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>@sortablelink('pin_code', 'Code')</th>
                    <th>@sortablelink('city.name', 'Area')</th>
                    <th>State</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pinCodes as $pinCode)
                    <tr>
                        <td>{{ $pinCode->pin_code }}</td>
                        <td>{{ $pinCode->city->name ?? 'NA' }}</td>
                        <td>{{ $pinCode->city->state->name ?? 'NA' }}</td>
                        <td>
                            <a href="{{ route('admin.pinCodes.edit', $pinCode->id) }}" class="btn btn-sm btn-warning">
                                <i class="fa fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.pinCodes.destroy', $pinCode->id) }}" method="post" class="d-inline" onsubmit="confirmDelete(this, event)">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                    </tr>
                @empty
                    <tr>
                        <td colspan="100%" class="text-center">No pinCodes found</td>
                    </tr>
                @endforelse

            </tbody>
        </table>
    </div>
    <div class="card-footer">
        {{ $pinCodes->links() }}
    </div>
</div>

@endsection
