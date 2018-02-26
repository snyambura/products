@extends('/layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="float-right">
                    <a class="btn btn-primary" href="{{ route('products.create') }}"> Add New</a>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($products as $product)
                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top" src="../../public/images{{$product->image}}" alt=" image ">
                        <div class="card-body">
                            <h5 class="card-title">{{$product->name}}</h5>
                            <p class="card-text"> {{$product->description}}
                                <br/>
                                {{$product->price}}
                            </p>
                            <div class="row">
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('products.destroy', $product) }}" method="post" class="float-right">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                    <input type="submit" class="btn btn-danger float-right" value="Delete">
                                </form>
                            </div>
                            {{--<a href="{{ route('products.destroy', $product) }}" class="btn btn-danger float-right">Delete</a>--}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>

@endsection