@extends('admin.layout.master')
@section('title','Update State')
@section('heading','State Management')
@section('content')

<div class="card mb-4">
    <form action="{{ route('admin.states.update', $state->id) }}" method="post">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{ $state->id }}">
        <div class="card-header">
            <div class="row">
                <div class="col-12">
                    <h6 class="card-title">
                    <i class="fas fa-table me-1"></i> Update State</h6>
                </div>
            </div>
        </div>
        <div class="card-body">
        <div class="form-group mb-3">
                <label for="name">Name*</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') ?? $state->name }}" placeholder="Enter State Name">
                @error('name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="code">Code*</label>
                <input type="text" class="form-control" id="code" name="code" value="{{ old('code') ?? $state->code }}" placeholder="Enter State Code">
                @error('code')
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
