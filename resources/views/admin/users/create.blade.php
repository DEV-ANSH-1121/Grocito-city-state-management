@extends('admin.layout.master')
@section('title','Create User')
@section('heading','User Management')
@section('content')

<div class="card mb-4">
    <form action="{{ route('admin.users.store') }}" method="post">
        @csrf
        <div class="card-header">
            <div class="row">
                <div class="col-12">
                    <h6 class="card-title">
                    <i class="fas fa-table me-1"></i> Create User</h6>
                </div>
            </div>
        </div>
        <div class="card-body">

            <div class="form-group mb-3">
                <label for="name">Name*</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Enter Name">
                @error('name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="email">Email address*</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Enter email">
                @error('email')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="phone_no">Phone*</label>
                <input type="text" class="form-control" id="phone_no" name="phone_no" value="{{ old('phone_no') }}" placeholder="Enter Phone">
                @error('phone_no')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="pin_code_id">Select Pin Code*</label>
                <select class="pincode-select form-control" name="pin_code_id" data-route="{{ route('admin.pinCodes.index') }}">
                    <option value="">Select Pin Code</option>
                </select>
                @error('pin_code_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="City">City*</label>
                <input type="text" class="form-control" id="City" placeholder="City" readonly>
                @error('City')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="State">State*</label>
                <input type="text" class="form-control" id="State" placeholder="State" readonly>
                @error('State')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="password">Password*</label>
                <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}" placeholder="Enter Password">
                @error('password')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="password_confirmation">Confirm Password*</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Re Enter Password">
                @error('password_confirmation')
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
