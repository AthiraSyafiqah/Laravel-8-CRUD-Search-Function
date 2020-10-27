@extends('layouts.app')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 8 CRUD Example from scratch</h2>
            </div>
            <br><br>
            <div class="pull-left">
                <a class="btn btn-success" href="{{ route('products.create') }}"> Add Product</a>
            </div>
        <div>
        <div class="pull-right">
            <div class="">
                <form action="{{ route('products.index') }}" method="GET" role="search">

                    <div class="input-group">
                        <span>
                            <button class="btn btn-info" type="submit" title="Search projects">Search
                            </button>
                        </span>
                        <input type="text" class="" name="term" placeholder="Search products" id="term">
                        <a href="{{ route('products.index') }}" class=" mt-1">
                            <span >
                                <button class="btn btn-danger" type="button" title="Refresh page">Refresh
                                </button>
                            </span>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
        </div>

        <div>
    </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   <br>
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->detail }}</td>
            <td>
                <form action="{{ route('products.destroy',$product->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $products->links() !!}
      
@endsection