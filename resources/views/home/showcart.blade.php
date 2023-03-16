@include('home.css')
      <div class="hero_area">
   <!-- header section strats -->
   @include('home.header')
          <!-- end header section -->

            
          @if (session()->has('message'))
        
          <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
              {{session()->get('message')}}

          </div>

          @endif

 




      <div class="row ">
        <div class="col-12 grid-margin">
          <div class="card">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                        <th class="th_deg">Product Title</th>
                        <th class="th_deg">Product Quantity</th>
                        <th class="th_deg">Product Price</th>
                        <th class="th_deg">Image</th>
                        <th class="th_deg">Action</th>
                    </tr>
                    <tbody>
                        <?php  $totalprice = 0;  ?>
                        <?php  $carts = 0;  ?>
                        @foreach ($cart as $carts)
                            
                        
                        <tr>
                            <td>{{$carts->product_title}}</td>
                            <td>{{$carts->quantity}}</td>
                            <td>{{$carts->price}}</td>
                            <td><img width="100" src="/product/{{$carts->image}}" alt=""></td>
                            <td>
                                <a href="{{url('/remove_cart',$carts->id)}}" onclick="return confirm('Are you sure to remove this product ?')" class="btn btn-danger">Cancle cart</a></td>
                           
                        </tr>
                        
                        <?php  $totalprice = $totalprice + $carts->price;  ?>
                        @endforeach
            
                   
            
                    </tbody>
            
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="m-auto">
        <p>Total Price: {{$totalprice}}</p>
        <h2 class="font-weight-bold">Proceed to Order</h2>
       </div>


       @if($carts !=null)
       <div class="row mx-auto">
       
        <a href="{{url('/cash_order')}}" class="btn btn-danger mx-3">Cash on Deliva..</a>
        <form action="https://uat.esewa.com.np/epay/main" method="POST">
          <input value="{{$totalprice}}" name="tAmt" type="hidden">
          <input value="{{$totalprice}}" name="amt" type="hidden">
          <input value="0" name="txAmt" type="hidden">
          <input value="0" name="psc" type="hidden">
          <input value="0" name="pdc" type="hidden">
          <input value="epay_payment" name="scd" type="hidden">
        

     
          <input value="{{$carts->product_id}}" name="pid" type="hidden">
      
           <input value="http://127.0.0.1:8000/verify-payment?q=su" type="hidden" name="su">
          <input value="http://127.0.0.1:8000/verify-payment?q=fu" type="hidden" name="fu">
          <input value="Pay using Esewa"  type="submit">
          </form>
        </div>

       </div>
       @else 
       <div class="row mx-auto">
      
        <a href="#" class="btn btn-danger mx-3">Cash on Deliva..</a>
       <a href="#" class="btn btn-outline-danger">Pay using Esewa</a>
       </div>
      </div>
       @endif
   
      
       
        

      


       @include('home.footer')

      </div>

@include('home.script')