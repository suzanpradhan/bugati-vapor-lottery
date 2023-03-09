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

        .table img.img-holder {
            border-radius: 3px;
            width: 42px;
            height: 42px;
            padding: 3px;
            background-color: #b0d2e9f3;
            box-sizing: border-box;
        }
        
        .update-section {
            border-radius: 3px;
            background: #f3f3f3;
            padding: 10px;
        }

        .update-section > p {
            font-size: 12px;
            line-height: 18px;
            font-weight: 600;
            color: #555;
            padding: 10px;
            background: #fff;
            border-radius: 3px;
        }

        .update-section span {
            font-weight: 700;
            color: #333;
        }

        .top-infos {
            display: flex;
            justify-content: flex-start;
            align-content: center;
        }

        .info-data {
            flex: 3;
        }

        .qr-holder {
            flex: 1;
            overflow: hidden;
            padding: 5px;
            background: #fff;
            border-radius: 3px;
            margin-right: 10px;
        }

        .qr-holder > img {
            width: 100%;
            height: auto;
            object-fit: contain;
        }

        .informations > h4 {
            margin-top: 20px;
            text-indent: 20px;
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
                    <a href="{{ route('admin.code.generate') }}" class="btn btn-gradient-primary btn-icon-text btn-sm">
                        <i class="mdi mdi-plus btn-icon-prepend"></i> Generate New
                    </a>
                </div>
                <hr>
                <div class="table-responsive">
                    <table class="table" id="codeTable">
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
                            @foreach($codes as $code)
                            <tr>
                                <td> {{$code->id}} </td>
                                <td>
                                    <img src="{{asset('storage/'. $code->qr_path);}}" class="img-holder"
                                        alt="QR-Code">
                                </td>
                                <td> {{$code->security_no}} </td>
                                <td> {{$code->scanned}} </td>
                                <td> Kathmandu, Nepal </td>
                                <td> March 5, 2023 </td>
                                <td>
                                    <label class="badge badge-gradient-success">Correct Scanned</label>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-gradient-danger btn-icon btn-sm viewdetails" title="View Details" data-id='{{ $code->id }}'>
                                        <i class="mdi mdi-eye btn-icon-prepend"></i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                            @include('dashboard.includes._viewModal')
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@push('extra-scripts')
    <script type='text/javascript'>
        $(document).ready(function(){
    
        $('#codeTable').on('click','.viewdetails',function(){
            var codeId = $(this).attr('data-id');
    
            if(codeId > 0){
    
                // AJAX request
                var url = "{{ route('admin.code.show',[':codeId']) }}";
                url = url.replace(':codeId',codeId);
    
                // Empty modal data
                $('#viewData').empty();
    
                $.ajax({
                    url: url,
                    dataType: 'json',
                    success: function(response){
    
                        // Add employee details
                        $('#viewData').html(response.html);
    
                        // Display Modal
                        $('#viewModal').modal('show'); 
                    }
                });
            }
        });
    
        });
    </script>
@endpush
