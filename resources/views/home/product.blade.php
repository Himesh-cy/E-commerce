<section class="product_section layout_padding">
   <div class="container">
      <div class="heading_container heading_center">
         <h2>Featured Products</h2>

         <div>
           <form action="{{url('search_product')}}" method="get">
              @csrf
              <div class="row">
              <div class="col-md-10 col-sm-12 col-xl-10">
               <input type="text" name="search" required class="form-control" 
               placeholder="Search for something">
              </div>
              <div class="col-md-2 col-sm-12 col-xl-2">
              <input type="submit" class="form-control" value="search"> 
              </div>
            </div>
              
           </form>
          
        </div>

         </div>
      </div>
      @if (session()->has('message'))
       
      <div class="alert alert-success">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
          {{session()->get('message')}}

      </div>

      @endif
      <div class="row">
        @foreach ($product as $products)
         <div class="col-sm-6 col-md-4 col-lg-3">
            {{-- <div class="box" style="height: 35rem;"> --}}
               <div class="box">
               <div class="option_container">
                  <div class="options">
                     <a href="{{url('product_details', $products->id)}}" class="option1">
                       Product detail
                     </a>
                  </div>

               </div>
               <div class="img-box">
                  <img src="product/{{$products->image}}" alt="">
               </div>
               <div class="row">
              <div>
                     <h5>{{$products->title}}</h5>
         
            
                           </div>
                           <div>
                          <p class="text-muted mb-4">{{$products->description}}</p>
      
                             </div>

            
                  @if($products->discount_price!=null)
               <div class="d-flex justify-content-around">
                
                     <div class="col">
                  <del style=" color:blue">
                     Price
                     <br> 
                     Rs{{$products->price}}
                   </del>
                  </div>
                  <div class="col">
                  <h6 style="color: red">
                    Discount Price
                    <br>
                    Rs{{$products->discount_price}}
                  </h6> 
                 </div>   
               </div>
               
                  @else

                 
         <div class="col">
            <h6 style="color: blue">
               Price
               <br> 
               Rs{{$products->price}}
            </h6>
         </div>
                        

                           @endif

               </div>
            </div>
         </div>



         
        
         
         @endforeach



           {{-- {{!!$product->appends(Request::all())->links()!!}} --}}
           <span style="padding-top: 20px">
           {!!$product->withQueryString()->links('pagination::bootstrap-5')!!}
        </span>
   </div>


   {{-- <section style="background-color: #eee;">
      <div class="container py-5">
        <div class="row justify-content-center">
          <div class="col-md-8 col-lg-6 col-xl-4">
            <div class="card text-black">
              <i class="fab fa-apple fa-lg pt-3 pb-1 px-3"></i>
              <img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Products/3.webp"
                class="card-img-top" alt="Apple Computer" />
              <div class="card-body">
                <div class="text-center">
                  <h5 class="card-title">Believing is seeing</h5>
                  <p class="text-muted mb-4">Apple pro display XDR</p>
                </div>
                <div>
                  <div class="d-flex justify-content-between">
                    <span>Pro Display XDR</span><span>$5,999</span>
                  </div>
                  <div class="d-flex justify-content-between">
                    <span>Pro stand</span><span>$999</span>
                  </div>
                  <div class="d-flex justify-content-between">
                    <span>Vesa Mount Adapter</span><span>$199</span>
                  </div>
                </div>
                <div class="d-flex justify-content-between total font-weight-bold mt-4">
                  <span>Total</span><span>$7,197.00</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> --}}




   </div>
</section>