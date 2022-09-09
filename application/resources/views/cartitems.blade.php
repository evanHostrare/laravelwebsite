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
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Cart Items</h2>
            <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
        </div>
        <div class="row">
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
            {{-- <div class="col-lg-4 col-sm-6 mb-4">
                <!-- Portfolio item 2-->
                <div class="portfolio-item">
                    <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal2">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                        </div>
                        <img class="img-fluid" src="{{URL::to('/')}}/application/public/temp1/assets/img/portfolio/2.jpg" alt="..." />
                    </a>
                    <div class="portfolio-caption">
                        <div class="portfolio-caption-heading">Explore</div>
                        <div class="portfolio-caption-subheading text-muted">Graphic Design</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 mb-4">
                <!-- Portfolio item 3-->
                <div class="portfolio-item">
                    <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal3">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                        </div>
                        <img class="img-fluid" src="{{URL::to('/')}}/application/public/temp1/assets/img/portfolio/3.jpg" alt="..." />
                    </a>
                    <div class="portfolio-caption">
                        <div class="portfolio-caption-heading">Finish</div>
                        <div class="portfolio-caption-subheading text-muted">Identity</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
                <!-- Portfolio item 4-->
                <div class="portfolio-item">
                    <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal4">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                        </div>
                        <img class="img-fluid" src="{{URL::to('/')}}/application/public/temp1/assets/img/portfolio/4.jpg" alt="..." />
                    </a>
                    <div class="portfolio-caption">
                        <div class="portfolio-caption-heading">Lines</div>
                        <div class="portfolio-caption-subheading text-muted">Branding</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 mb-4 mb-sm-0">
                <!-- Portfolio item 5-->
                <div class="portfolio-item">
                    <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal5">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                        </div>
                        <img class="img-fluid" src="{{URL::to('/')}}/application/public/temp1/assets/img/portfolio/5.jpg" alt="..." />
                    </a>
                    <div class="portfolio-caption">
                        <div class="portfolio-caption-heading">Southwest</div>
                        <div class="portfolio-caption-subheading text-muted">Website Design</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <!-- Portfolio item 6-->
                <div class="portfolio-item">
                    <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal6">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                        </div>
                        <img class="img-fluid" src="{{URL::to('/')}}/application/public/temp1/assets/img/portfolio/6.jpg" alt="..." />
                    </a>
                    <div class="portfolio-caption">
                        <div class="portfolio-caption-heading">Window</div>
                        <div class="portfolio-caption-subheading text-muted">Photography</div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</section>
@endsection