@include('home.css')
      <div class="hero_area">
   <!-- header section strats -->
   @include('home.header')
          <!-- end header section -->
   
      <div class="col-sm-6 col-md-4 col-lg-4 m-auto p-3 ">
        
           <div class="img-box pb-4">
              <img width="300px" height="300px" src="/product/{{$product->image}}" alt="">
           </div>
           <div class="detail-box">
              <h5>
             {{-- {{$product->title}} --}}
             {{$product->description}}
              </h5>

              @if($product->discount_price!=null)
              <h6 style="text-decoration: line-through; color:blue">
                Price:
                <br> 
                Rs{{$product->price}}
              </h6>
              
              <h6 style="color: red">
                Discount Price:
                <br>
                Rs{{$product->discount_price}}
              </h6>    
       
              @else

             

              <h6 style="color: blue">
                Price:
                <br> 
                RS{{$product->price}}
              </h6>

              @endif
              <h6>Product Catagory: {{$product->catagory}}</h6>
              <h6>Avilable Quantity:{{$product->quantity}}</h6>
              <form action="{{url('add_cart',$product->id)}}" method="post">
                @csrf
                <div class="row">
                   <div class="col-md-4">
                      <input type="number" name="quantity" value="1" min="1">
                   </div>
              <div  class="col-md-4">
                <input type="submit" value="Add To Cart">
              </div>
          
             </div>
             </form>

           </div>
        </div>
     </div>
     

      <!-- footer start -->
    @include('home.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By 
         
           
         
         </p>
      </div>

     @include('home.script')