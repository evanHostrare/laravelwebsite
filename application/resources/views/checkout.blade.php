@extends('layouts.frontendLayout')
@section('title')
Home Page
@endsection
@section('main')
<style>
    #mainNav .navbar-nav .nav-item .nav-link{
        color:#4c5fdf;
    }
</style>

<!-- Portfolio Grid-->
<section class="page-section bg-light" id="portfolio">
    
    <form action="{{URL::to('/')}}/checkout" method="post">@csrf
    <div class="container">
        <div class="row">            
            <div class="col-6">
                <h3>Delivery Address</h3>
                    <input class="form-control" type="text" name="address" placeholder="Delivery Address">
            </div>
            <div class="col-6">
                <h3>Payment Method</h3>
                    <label><input type="radio" name="payment" value="1"> Bkash (Send {{\Cart::session(\Session::getId())->getSubTotal()}}  Tk. to bkash 070000000000) </label><br>
                    <label><input type="radio" name="payment" value="2"> Rocket (Send {{\Cart::session(\Session::getId())->getSubTotal()}}  Tk. to rocket 080000000000)</label><br>
                    <label><input type="radio" name="payment" value="3"> Visa/Mastercard </label><br>
                    <label for="transactionid">Transaction ID</label>
                    <input class="form-control" type="text" name="transactionid" placeholder="Transaction ID">
                
        <button type="submit" class="btn btn-primary btn-block mt-2"> Place Order</button> 
            </div>
        </div>
    </div>   
</form>
    <div class="container">
        <div class="row">
            <h4 class="section-heading text-uppercase">Cart Items</h4>
            <a href="{{URL::to('/')}}/removecart/" style="float: right;">Remove All</a>
            <table class="table table-bordered">
                <tr>
                    <th>Picture</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Total</th>
                    <th>Remove</th>
                </tr>
                
            
           @foreach($cartitems as $item)
           <tr>
                <td><img style="width:50px;" src="{{URL::to('/')}}/application/storage/app/products/{{$item->attributes[0]['picture']}}" alt=""></td>
                <td>{{$item->id}}{{$item->name}}</td>
                <td>{{$item->price}} Tk.</td>
                <td>
                    <form action="{{URL::to('/')}}/updatecart/{{$item->id}}" method="post">@csrf                        
                        <input type="number" name="qty" value="{{$item->quantity}}" min="1" required="">
                        <button type="submit">Update</button>
                    </form></td>
                <td>{{$item->price*$item->quantity}}  Tk.</td>
                <td style="text-align: center; color:red!important;"><a href="{{URL::to('/')}}/deleteitem/{{$item->id}}"><i class="fa fa-times"></i></a></td>
            </tr>         
            
           @endforeach
           <tr>
            <td colspan="4" style="text-align: right;">
                Total:
            </td>
            <td colspan="2">
                {{\Cart::session(\Session::getId())->getSubTotal()}}  Tk.
            </td>
           </tr>
        </table>
        </div>
    </div>
</section>
@endsection