@extends('layouts.backendLayout')
@section('adminmain')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
<h2>Update Category Information</h2>
{{\Session()->get('message')}}
<form action="{{URL::to('/')}}/cats/{{$singlecat->id}}" method="post" enctype="multipart/form-data"> @csrf
    {{ method_field('PUT') }}
    <input type="text" class="form-control" name="name" placeholder="Category Name" value="{{$singlecat->name}}"><br>
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
