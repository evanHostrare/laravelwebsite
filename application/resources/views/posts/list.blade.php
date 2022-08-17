@extends('layouts.backendLayout')
@section('adminmain')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            {{-- <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol> --}}
            <div class="card mb-4 mt-2">
                {{\Session()->get('message')}}
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    All Post
                    <a href="{{URL::to('/')}}/posts/create" style="float:right;" class="btn btn-primary">New Post</a>
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Picture</th>
                                <th>Section</th>
                                <th>Content</th>
                                <th>Posted</th>
                                <th>Action</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($list as $item)
                            <tr>
                                <td>{{$item->title}}</td>
                                <td>
                                    @if($item->picture)
                                    <img style="width:50px;" src="{{URL::to('/')}}/application/storage/app/posts/{{$item->picture}}" alt="">
                                    @endif
                                </td>
                                <td>{{$item->section}}</td>
                                <td>{{$item->content}}</td>
                                <td>{{$item->posteremail}}<br>
                                {{$item->postername}}</td>
                                <td><a href="{{URL::to('/')}}/posts/{{$item->id}}/edit" class="btn btn-warning">Edit</a></td>
                                <td>
                                    <form action="{{URL::to('/')}}/posts/{{$item->id}}" method="post"> @csrf
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger" onclick="javascript:return confirm('Are you sure you want to delete this?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
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
