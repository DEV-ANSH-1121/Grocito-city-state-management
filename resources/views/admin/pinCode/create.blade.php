@extends('admin.layout.master')
@section('title','Create Pin Code')
@section('heading','Pin Code Management')
@section('content')

<div class="card mb-4">
    <form action="{{ route('admin.pinCodes.store') }}" method="post">
        @csrf
        <div class="card-header">
            <div class="row">
                <div class="col-12">
                    <h6 class="card-title">
                    <i class="fas fa-table me-1"></i> Create Pin Code</h6>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group mb-3">
                <label for="name">Name*</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Enter State Name">
                @error('name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="pin_code">Pin Code*</label>
                <input type="text" class="form-control" id="pin_code" name="pin_code" value="{{ old('pin_code') }}" placeholder="Enter Pin Code">
                @error('pin_code')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="city_id">Select City*</label>
                <select class="city-select form-control" name="city_id" data-route="{{ route('admin.states.index') }}">
                    <option value="">Select City</option>
                </select>
                @error('city_id')
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
