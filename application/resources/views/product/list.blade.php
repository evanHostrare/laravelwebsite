@extends('layouts.backendLayout')
@section('adminmain')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="card mb-4 mt-2">
                {{\Session()->get('message')}}
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    All Product
                    <a href="{{URL::to('/')}}/product/create" style="float:right;" class="btn btn-primary">New Product</a>
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Picture</th>
                                <th>Categories</th>
                                <th>Details</th>
                                <th>summary</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td>{{$product->name}}</td>
                                <td>
                                    @if($product->picture)
                                    <img style="width:50px;" src="{{URL::to('/')}}/application/storage/app/products/{{$product->picture}}" alt="">
                                    @endif
                                </td>
                                <td>{{$product->catname}}</td>
                                <td>{!!$product->details!!}</td>
                                <td>{!!$product->summary!!}</td>
                                <td>{{$product->price}}</td>                               
                                @if($product->status==1)
                                <td>Publish</td>
                                @else
                                <td>Unpublish</td>                                
                                @endif
                                <td>
                                    <a href="{{URL::to('/')}}/product/{{$product->id}}/edit" class="btn btn-warning">Edit</a>
                                    <form action="{{URL::to('/')}}/product/{{$product->id}}" method="post" style="display:inline"> @csrf
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
            <div class="d-flex align-products-center justify-content-between small">
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