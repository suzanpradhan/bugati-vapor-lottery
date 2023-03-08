@extends('dashboard.layouts.main')

@section('title', ' - Code Lists')

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
    </style>
@endpush

@section('content')
<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <div class="card-title-holder">
                    <h4 class="card-title">All QR Codes</h4>
                    <button type="button" class="btn btn-gradient-primary btn-icon-text btn-sm">
                        <i class="mdi mdi-plus btn-icon-prepend"></i> Generate New
                    </button>
                </div>
                <hr>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th> ID </th>
                                <th> QR </th>
                                <th> Security No. </th>
                                <th> Scanned No. </th>
                                <th> Location </th>
                                <th> Date </th>
                                <th> Status </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td> 1080 </td>
                                <td>
                                    <img src="{{asset('dashboard/assets/images/faces/face1.jpg')}}" class="me-2"
                                        alt="image"> David Grey
                                </td>
                                <td> 0000000025 </td>
                                <td> 1 </td>
                                <td> Kathmandu, Nepal </td>
                                <td> March 5, 2023 </td>
                                <td>
                                    <label class="badge badge-gradient-success">Correct Scanned</label>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-gradient-danger btn-icon btn-sm" title="View Details">
                                        <i class="mdi mdi-eye btn-icon-prepend"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td> 1506 </td>
                                <td>
                                    <img src="{{asset('dashboard/assets/images/faces/face1.jpg')}}" class="me-2"
                                        alt="image"> David Grey
                                </td>
                                <td> 0000013025 </td>
                                <td> 4 </td>
                                <td> Kathmandu, Nepal </td>
                                <td> March 5, 2023 </td>
                                <td>
                                    <label class="badge badge-gradient-danger">Repeat Scanned</label>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-gradient-danger btn-icon btn-sm" title="View Details">
                                        <i class="mdi mdi-eye btn-icon-prepend"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td> 256 </td>
                                <td>
                                    <img src="{{asset('dashboard/assets/images/faces/face1.jpg')}}" class="me-2"
                                        alt="image"> David Grey
                                </td>
                                <td> 0000330025 </td>
                                <td> 1 </td>
                                <td> Kathmandu, Nepal </td>
                                <td> March 5, 2023 </td>
                                <td>
                                    <label class="badge badge-gradient-success">Correct Scanned</label>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-gradient-danger btn-icon btn-sm" title="View Details">
                                        <i class="mdi mdi-eye btn-icon-prepend"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td> 69854 </td>
                                <td>
                                    <img src="{{asset('dashboard/assets/images/faces/face1.jpg')}}" class="me-2"
                                        alt="image"> David Grey
                                </td>
                                <td> 0000006354 </td>
                                <td> 2 </td>
                                <td> Kathmandu, Nepal </td>
                                <td> March 5, 2023 </td>
                                <td>
                                    <label class="badge badge-gradient-danger">Repeat Scanned</label>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-gradient-danger btn-icon btn-sm" title="View Details">
                                        <i class="mdi mdi-eye btn-icon-prepend"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td> 1125 </td>
                                <td>
                                    <img src="{{asset('dashboard/assets/images/faces/face1.jpg')}}" class="me-2"
                                        alt="image"> David Grey
                                </td>
                                <td> 0000015698 </td>
                                <td> 105 </td>
                                <td> Kathmandu, Nepal </td>
                                <td> March 5, 2023 </td>
                                <td>
                                    <label class="badge badge-gradient-danger">Repeat Scanned</label>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-gradient-danger btn-icon btn-sm" title="View Details">
                                        <i class="mdi mdi-eye btn-icon-prepend"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
