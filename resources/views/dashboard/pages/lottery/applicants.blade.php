@extends('dashboard.layouts.main')

@section('title', ' - Applicants Lists')

@push('extra-styles')
    <style>
        .card-title-holder {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 30px;
        }

        .card-title-holder .card-title {
            margin-bottom: 0px;
        }

        .btn {
            display: inline-flex;
            justify-content: center;
            align-items: center;
        }
    </style>
@endpush

@section('content')
<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <div class="card-title-holder">
                    <h4 class="card-title">All Applicants</h4>
                </div>
                <hr>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th> ID </th>
                                <th> Full Name </th>
                                <th> Email </th>
                                <th> Lottery Title </th>
                                <th> Applied Date </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($lottery->applicants as $applicant)
                            <tr>
                                <td> {{$applicant->id}} </td>
                                <td> {{$applicant->fullname}} </td>
                                <td> {{$applicant->email}} </td>
                                <td> {{$lottery->title}} </td>
                                <td> {{$applicant->created_at->diffForHumans()}} </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
