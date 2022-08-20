@extends('layouts.backendLayout')
@section('adminmain')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
<h2>Update Post Information</h2>
{{\Session()->get('message')}}
<form action="{{URL::to('/')}}/posts/{{$singlepost->id}}" method="post" enctype="multipart/form-data"> @csrf
    {{ method_field('PUT') }}
    <input type="text" class="form-control" name="title" placeholder="Title" value="{{$singlepost->title}}"><br>
    <select name="section" id="" class="form-control">
        <option value="">Select Section</option>
        <option value="services" @if($singlepost->section=='services') selected @endif>Services</option>
        <option value="portfolio" @if($singlepost->section=='portfolio') selected @endif>Portfolio</option>
        <option value="about" @if($singlepost->section=='about') selected @endif>About</option>
        <option value="team" @if($singlepost->section=='team') selected @endif>Our Amazing Team</option>
        <option value="brand" @if($singlepost->section=='brand') selected @endif>Brand Logo</option>
    </select><br>   
    @if($singlepost->picture)     
    Old Picture:<br>
    <img style="width:50px;" src="{{URL::to('/')}}/application/storage/app/posts/{{$singlepost->picture}}" alt=""><br>
    @endif
    
    
    <input type="file" name="picture" class="form-control"><br>
    <input type="text" name="faicon" placeholder="Fontawesome Icon" class="form-control" value="{{$singlepost->faicon}}"><br>
    <textarea class="form-control" name="content" placeholder="Content" cols="30" rows="10">{{$singlepost->content}}</textarea><br>
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
