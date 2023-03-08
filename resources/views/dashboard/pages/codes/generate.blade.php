@extends('dashboard.layouts.main')

@section('title', ' - Generate Codes')

@section('content')
<div class="row">
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Generate New QR Codes</h4>
                <p class="card-description"> From here you can generate new QR codes as needed. </p>
                <form class="forms-sample">
                    <div class="form-group">
                        <label for="codes_count">Number of QR Codes</label>
                        <input type="number" class="form-control" id="codes_count" min="1" placeholder="eg: 500">
                    </div>
                    <button type="submit" class="btn btn-gradient-primary me-2">Generate</button>
                    <button class="btn btn-gradient-danger">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>
@stop