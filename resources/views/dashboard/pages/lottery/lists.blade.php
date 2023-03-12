@extends('dashboard.layouts.main')

@section('title', ' - Lottery Lists')

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
            border-radius: unset;
            width: 8mm;
            height: 8mm;
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
                    <h4 class="card-title">All Lotteries</h4>
                    <a href="{{ route('admin.lottery.create') }}" class="btn btn-gradient-primary btn-icon-text btn-sm">
                        <i class="mdi mdi-plus btn-icon-prepend"></i> Create New
                    </a>
                </div>
                <hr>
                <div class="table-responsive">
                    <table class="table" id="codeTable">
                        <thead>
                            <tr>
                                <th> ID </th>
                                <th> Title </th>
                                <th> Starts On </th>
                                <th> Ends On </th>
                                <th> Applicant </th>
                                <th> Status </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($lotteries as $lottery)
                            <tr>
                                <td> {{$lottery->id}} </td>
                                <td> {{$lottery->title}} </td>
                                <td> {{$lottery->from_date}} </td>
                                <td> {{$lottery->to_date}} </td>
                                <td> no of applicant </td>
                                <td>
                                    <label class="badge badge-gradient-success">Open</label>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-gradient-danger btn-icon btn-sm viewdetails" title="View Details">
                                        <i class="mdi mdi-eye btn-icon-prepend"></i>
                                    </button>
                                    <a href="" class="btn btn-gradient-danger btn-icon btn-sm"
                                        title="Open/Close Lottery" data-id='{{ $lottery->id }}'
                                    ><i class="mdi mdi-eye btn-icon-prepend"></i></a>
                                    <a href="" class="btn btn-gradient-danger btn-icon btn-sm"
                                        title="Edit Lottery" data-id='{{ $lottery->id }}'
                                    ><i class="mdi mdi-eye btn-icon-prepend"></i></a>
                                    <a href="" class="btn btn-gradient-danger btn-icon btn-sm"
                                        title="Delete Lottery" data-id='{{ $lottery->id }}'
                                    ><i class="mdi mdi-eye btn-icon-prepend"></i></a>
                                </td>
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
