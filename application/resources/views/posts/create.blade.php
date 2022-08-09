@extends('layouts.backendLayout')
@section('adminmain')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
<h2>New Post</h2>
{{\Session()->get('message')}}
<form action="{{URL::to('/')}}/posts" method="post" enctype="multipart/form-data"> @csrf
    <input type="text" name="title" placeholder="Title" class="form-control"><br>
    <select name="section" id="" class="form-control">
        <option value="">Select Section</option>
        <option value="services">Services</option>
        <option value="portfolio">Portfolio</option>
        <option value="about">About</option>
        <option value="team">Our Amazing Team</option>
    </select><br>
    <input type="file" name="picture" class="form-control"><br>
    <textarea class="form-control" name="content" placeholder="Content" cols="30" rows="10"></textarea><br>
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
