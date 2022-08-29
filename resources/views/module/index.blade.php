@extends('module.layout')
 
@section('content')

    <div class="my-5 d-flex justify-content-center">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header"><h4>Laravel 9 Eloquent Service System CRUD</h4> <a class="btn btn-success" href="{{ route('module.create') }}"> <i class="fas fa-plus"></i> Create New Item</a></div> 
                <div class="card-body">
                    <div class="row">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @elseif ($message = Session::get('unsuccessful')) 
                        <div class="alert alert-danger">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    </div>
                    <table class="table table-bordered">
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Details</th>
                            <th width="300px">Action</th>
                        </tr>
                        @foreach ($module as $item)
                        <tr>
                            <td>{{ $item->id }}</td> 
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->detail }}</td>
                            <td>
                                <form action="{{ route('module.destroy',$item->id) }}" method="POST">
                
                                    <a class="btn btn-info" href="{{ route('module.show',$item->id) }}"><i class="fas fa-eye"></i> Show</a>
                    
                                    <a class="btn btn-primary" href="{{ route('module.edit',$item->id) }}"><i class="fas fa-edit"></i> Edit</a>
                
                                    @csrf
                                    @method('DELETE')
                    
                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
      
@endsection