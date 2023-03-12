@extends('dashboard.layouts.main')

@section('title', ' - Create Lottery')

@section('content')
<div class="row">
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Create New Lottery</h4>
                <p class="card-description"> From here you can create new lottery. </p>
                <form class="forms-sample" action="{{ route('admin.lottery.create') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group has-validation">
                        <label for="title">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="eg: Boxing Day Lottery">
                        @error('title')
                        <small id="title" class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group has-validation">
                        <label for="title"></label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="eg: Boxing Day Lottery">
                        @error('title')
                        <small id="title" class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-gradient-primary me-2">Create</button>
                    <a href="{{ route('admin.lottery.lists') }}" class="btn btn-gradient-danger">Show List</a>
                </form>
            </div>
        </div>
    </div>
</div>
@stop