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
                    Invoice
                    {{-- <a href="{{URL::to('/')}}/posts/create" style="float:right;" class="btn btn-primary">New Post</a> --}}
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <td colspan="3">
                                <h2>INVOICE</h2>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h5>Laravel Ecommerce</h5>
                                <p>Dhaka, Bangladesh<br>
                                    admin@ninzas.com<br>
                                    +8801710507015</p>
                            </td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>
                                <h5>Bill to:</h5>
                                <p>
                                    Order By: {{$userdata->name}}<br>
                                    Email: {{$userdata->email}}
                                </p>
                            </td>
                            <td>
                                <h5>Ship to:</h5>
                                <p>{{$shipping->address}}</p>
                            </td>
                            <td>
                                <h6>Invoice No: {{$orderdetils->id}}</h6>
                                <h6>Invoice Date: {{date_format(date_create($orderdetils->created_at),'d-M-Y')}}</h6>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <table class="table">
                                    <tr>
                                        <th>Picture</th>
                                        <th>Name</th>
                                        <th>Qty</th>
                                        <th>Unit Price</th>
                                        <th style="text-align: right;">Total</th>
                                    </tr>
                                    <?php $subtotal=0;?>
                                    @foreach($orderitems as $orderitem)
                                    <?php $productinfo=\DB::table('products')->where('id',$orderitem->pid)->first();?>
                                    <tr>
                                        <td><img src="{{URL::to('/')}}/application/storage/app/products/{{$productinfo->picture}}" height="50" alt="{{$productinfo->name}}"></td>
                                        <td>{{$productinfo->name}}</td>
                                        <td>{{$orderitem->qty}}</td>
                                        <td>{{number_format($productinfo->price,2)}}</td>
                                        <td style="text-align: right;">{{number_format($orderitem->qty*$productinfo->price,2)}}</td>
                                        <?php $subtotal+=$orderitem->qty*$productinfo->price;  ?>
                                    </tr>
                                    @endforeach
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <th colspan="2" style="text-align: right;">Subtotal:</th>
                            <th style="text-align: right;">{{number_format($subtotal,2)}}</th>
                        </tr>
                        <tr>
                            <th colspan="2" style="text-align: right;">Discount:</th>
                            <th style="text-align: right;">{{number_format(0,2)}}</th>
                        </tr>
                        <tr>
                            <th colspan="2" style="text-align: right;">Grand Total:</th>
                            <th style="text-align: right;">{{number_format($subtotal,2)}}</th>
                        </tr>
                        
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
