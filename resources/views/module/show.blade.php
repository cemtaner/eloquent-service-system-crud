@extends('module.layout')
  
@section('content')
    <div class="my-5 d-flex justify-content-center">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header"><a class="btn btn-primary" href="{{ route('module.index') }}"> <i class="fas fa-arrow-left"></i> Back</a></div> 
                <div class="card-body">
                    <table class="table table-bordered">
                    <tr>
                        <td style="width:25px"><b>Name</b></td>
                        <td style="width:5px">:</td>
                        <td>{{ $module->name }}</td>
                    </tr>
                    <tr>
                        <td style="width:25px"><b>Details</b></td> 
                        <td style="width:5px">:</td>
                        <td>{{ $module->detail }}</td>
                    </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection