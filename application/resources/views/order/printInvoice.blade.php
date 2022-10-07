<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Sales Order</title>

  <script type="text/javascript">
    var is_chrome = function () { return Boolean(window.chrome); }
    if(is_chrome) 
    {
       window.print();
       setTimeout(function(){window.close();}, 10000); 
       //give them 10 seconds to print, then close
    }
    else
    {
       window.print();
       window.close();
    }
</script>

</head>
<style>
 body{ font-family:Helvetica, sans-serif; color:#121212; line-height:22px;}
 table, tr, td{
    padding: 6px 0px;
    width:100%;
}
tr{ height:40px;}
h1, h2, h3, h4, h5, h6{
   margin: 0;
   padding: 0;
}
</style>

<body onLoad="loadHandler();">
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
          <td style="text-align: right;">
              <h3>Invoice No: {{$orderdetils->id}}</h3>
              <h3>Invoice Date: {{date_format(date_create($orderdetils->created_at),'d-M-Y')}}</h3>
          </td>
      </tr>
      <tr>
          <td colspan="3">
              <table>
                  <tr>
                      <th style="text-align: left; border:1px solid #ccc;">Picture</th>
                      <th style="text-align: left;border:1px solid #ccc;">Name</th>
                      <th style="text-align: left;border:1px solid #ccc;">Qty</th>
                      <th style="text-align: left;border:1px solid #ccc;">Unit Price</th>
                      <th style="text-align: right; border:1px solid #ccc;">Total</th>
                  </tr>
                  <?php $subtotal=0;?>
                  @foreach($orderitems as $orderitem)
                  <?php $productinfo=\DB::table('products')->where('id',$orderitem->pid)->first();?>
                  <tr>
                      <td style="text-align: left; border:1px solid #ccc;"><img src="{{URL::to('/')}}/application/storage/app/products/{{$productinfo->picture}}" height="50" alt="{{$productinfo->name}}"></td>
                      <td style="text-align: left; border:1px solid #ccc;">{{$productinfo->name}}</td>
                      <td style="text-align: left; border:1px solid #ccc;">{{$orderitem->qty}}</td>
                      <td style="text-align: left; border:1px solid #ccc;">{{number_format($productinfo->price,2)}}</td>
                      <td style="text-align: right; border:1px solid #ccc;">{{number_format($orderitem->qty*$productinfo->price,2)}}</td>
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
</body>
</html>