@extends('admin.layout.master')
@section('title','Update City')
@section('heading','City Management')
@section('content')

<div class="card mb-4">
    <form action="{{ route('admin.cities.update', $city->id) }}" method="post">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{ $city->id }}">
        <div class="card-header">
            <div class="row">
                <div class="col-12">
                    <h6 class="card-title">
                    <i class="fas fa-table me-1"></i> Update City</h6>
                </div>
            </div>
        </div>
        <div class="card-body">
        <div class="form-group mb-3">
                <label for="name">Name*</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') ?? $city->name }}" placeholder="Enter State Name">
                @error('name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="state_id">Select State*</label>
                <select class="state-select form-control" name="state_id">
                    <option value="">Select State</option>
                    <option value="{{ $city->state_id }}" selected>{{ $city->state->name }}</option>
                </select>
                @error('state_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>

@endsection
