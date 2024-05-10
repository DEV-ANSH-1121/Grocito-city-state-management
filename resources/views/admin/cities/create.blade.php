@extends('admin.layout.master')
@section('title','Create City')
@section('heading','City Management')
@section('content')

<div class="card mb-4">
    <form action="{{ route('admin.cities.store') }}" method="post">
        @csrf
        <div class="card-header">
            <div class="row">
                <div class="col-12">
                    <h6 class="card-title">
                    <i class="fas fa-table me-1"></i> Create City</h6>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group mb-3">
                <label for="name">Name*</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Enter City Name">
                @error('name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="state_id">Select State*</label>
                <select class="state-select form-control" name="state_id" data-route="{{ route('admin.states.index') }}">
                    <option value="">Select State</option>
                </select>
                @error('state_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </form>
</div>
@endsection
