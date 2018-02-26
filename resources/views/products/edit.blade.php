@extends('/layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach()
                </div>
            @endif
        </div>
        <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <div class="form-group">
                <label for="name">Product Name</label>
                <input type="text" class="form-control" id="productname" name="name"
                       value="{{ old('name', $product->name) }}">
            </div>
            <div class="form-group">
                <label for="image">Upload product image</label>
                <input type="file" class="form-control-file" name="image" id="image">
            </div>
            <div class="form-group">
                <label for="description">Product Description</label>
                <textarea class="form-control" id="description" name="description" rows="3">
                    {{ old('description', $product->description) }}
                </textarea>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" class="form-control" id="price" name="price"
                       value="{{ old('price', $product->price) }}" placeholder="Enter Product Price">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection