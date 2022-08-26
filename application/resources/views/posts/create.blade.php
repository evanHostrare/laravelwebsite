@extends('layouts.backendLayout')
@section('adminmain')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
<h2>New Post</h2>
{{\Session()->get('message')}}
<form action="{{URL::to('/')}}/posts" method="post" enctype="multipart/form-data"> @csrf
    <input type="text" value="{{ old('title') }}" name="title" placeholder="Title" class="form-control">
    @if ($errors->has('title')) <span class="text-danger"> {{ $errors->first('title') }} </span> @endif <br>
    <select name="section" id="" class="form-control">
        <option value="">Select Section</option>
        <option value="services" @if(old('section')=='services') selected @endif>Services</option>
        <option value="portfolio" @if(old('section')=='portfolio') selected @endif>Portfolio</option>
        <option value="about" @if(old('section')=='about') selected @endif>About</option>
        <option value="team" @if(old('section')=='team') selected @endif>Our Amazing Team</option>
        <option value="brand" @if(old('section')=='brand') selected @endif>Brand Logo</option>
    </select>
    @if ($errors->has('section'))<span class="text-danger">{{ $errors->first('section') }}  </span> @endif <br>
    <input type="file" name="picture" class="form-control">
    @if ($errors->has('picture'))<span class="text-danger">{{ $errors->first('picture') }}  </span> @endif <br>
    <input type="text" name="faicon" placeholder="Fontawesome Icon" class="form-control"><br>
    <textarea class="form-control" name="content" id="content" placeholder="Content" cols="30" rows="10"></textarea>
    @if ($errors->has('content'))<span class="text-danger">{{ $errors->first('content') }}  </span> @endif <br>
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
