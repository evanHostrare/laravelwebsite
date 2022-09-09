@extends('layouts.backendLayout')
@section('adminmain')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
<h2>New product</h2>
<form action="{{URL::to('/')}}/product" method="post" enctype="multipart/form-data"> @csrf
    <input type="text" name="name" placeholder="Title" class="form-control" value="{{ old('name') }}">
    @if ($errors->has('name')) <span class="text-danger"> {{ $errors->first('name') }} </span> @endif
    <br>
    <select name="category" id="" class="form-control">
        <option value="">Select Category</option>
        @foreach ($categories as $category)
        <option value="{{$category->name}}" @if(old('category')==$category->name) selected @endif>{{$category->name}}</option>
        @endforeach
    </select>
    @if ($errors->has('category')) <span class="text-danger"> {{ $errors->first('category') }} </span> @endif
    <br>
    <select name="status" id="" class="form-control">
        <option value="">Select Status</option>
        <option value="1" @if(old('status')=='1') selected @endif >Publish</option>
        <option value="0" @if(old('status')=='0') selected @endif >Unpublish</option>
    </select>
    @if ($errors->has('status')) <span class="text-danger"> {{ $errors->first('status') }} </span> @endif
    <br>
    <input type="file" name="picture" class="form-control" value="{{ old('picture') }}">
    @if ($errors->has('picture')) <span class="text-danger"> {{ $errors->first('picture') }} </span> @endif
    <br>
    <input type="text" name="price" placeholder="Price..." class="form-control" value="{{ old('price') }}">
    @if ($errors->has('price')) <span class="text-danger"> {{ $errors->first('price') }} </span> @endif
    <br>
    <textarea class="form-control textarea" name="details" placeholder="Details" cols="30" rows="10">{{ old('details') }}</textarea>
    @if ($errors->has('details')) <span class="text-danger"> {{ $errors->first('details') }} </span> @endif
    <br>
    <textarea class="form-control textarea" name="summary" placeholder="Summary" cols="30" rows="10">{{ old('summary') }}</textarea>
    @if ($errors->has('summary')) <span class="text-danger"> {{ $errors->first('summary') }} </span> @endif
    <br>
    <button type="submit" class="btn btn-primary">Save</button>
</form>

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
