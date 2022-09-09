@extends('layouts.backendLayout')
@section('adminmain')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
<h2>Update product Information</h2>
{{\Session()->get('message')}}
@foreach($products as $product)
<form action="{{URL::to('/')}}/product/{{$product->id}}" method="post" enctype="multipart/form-data"> @csrf
    {{ method_field('PUT') }}
    <input type="text" class="form-control" name="name" placeholder="Name" value="{{$product->name}}" @if(old('name')=='name') selected @endif >
    @if ($errors->has('name')) <span class="text-danger"> {{ $errors->first('name') }} </span> @endif
    <br>
    <select name="category" id="" class="form-control">
        <option value="">Select Category</option>
        @foreach ($categories as $category)
        <option value="{{$category->name}}" @if(old('category')=='{{$category->name}}') selected @endif >{{$category->name}}</option>
        @endforeach
    </select>
    @if ($errors->has('category')) <span class="text-danger"> {{ $errors->first('category') }} </span> @endif
    <br>
    @if($product->picture)     
    Old Picture:<br>
    <img style="width:50px;" src="{{URL::to('/')}}/application/storage/app/products/{{$product->picture}}" alt="">
    @if ($errors->has('picture')) <span class="text-danger"> {{ $errors->first('picture') }} </span> @endif
    <br>
    @endif
    <input type="file" name="picture" class="form-control" value="{{ old('picture') }}"><br>
    <select name="status" id="" class="form-control">
        <option value="1" @if($product->section=='1') selected @endif>Publish</option>
        <option value="0" @if($product->section=='0') selected @endif>Unpublish</option>
    </select>
    @if ($errors->has('status')) <span class="text-danger"> {{ $errors->first('status') }} </span> @endif
    <br>
    <input type="text" name="price" placeholder="price" class="form-control" value="{{$product->price}}" @if(old('price')=='price') selected @endif >
    @if ($errors->has('price')) <span class="text-danger"> {{ $errors->first('price') }} </span> @endif
    <br>
    <textarea class="form-control textarea" name="details" placeholder="Details" cols="30" rows="10">
    @if(old('details')=='details') selected @endif     
    {{$product->details}}</textarea>
    @if ($errors->has('details')) <span class="text-danger"> {{ $errors->first('details') }} </span> @endif
    <br>
    <textarea class="form-control textarea" name="summary" placeholder="Summary" cols="30" rows="10">
    @if(old('summary')=='summary') selected @endif     
    {{$product->summary}}</textarea>
    @if ($errors->has('summary')) <span class="text-danger"> {{ $errors->first('summary') }} </span> @endif
    <br>
    <button type="submit" class="btn btn-primary">Save</button>
</form>
@endforeach
</div>
</main>
<footer class="py-4 bg-light mt-auto">
    <div class="container-fluid px-4">
        <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; Your Website 2022</div>
            <div>
                <a href="#">Privacy Policy</a>
                &middot;
                <a href="#">Terms &amp; Conditions</a>
            </div>
        </div>
    </div>
</footer>
</div>
@endsection
