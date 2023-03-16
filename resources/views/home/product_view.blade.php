<section class="product_section layout_padding">
    <div class="container">
       <div class="heading_container heading_center">
          

          <div>
            <form action="{{url('search_product')}}" method="get">
               @csrf
               <div class="row">
                  <div class="col-md-10 col-sm-12">
                   <input type="text" name="search" required class="form-control" 
                   placeholder="Search for something">
                  </div>
                  <div class="col-md-2 col-sm-12">
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
          <div class="col-sm-6 col-md-4 col-lg-4">
             <div class="box">
                <div class="option_container">
                   <div class="options mx-auto">
                      <a href="{{url('product_details', $products->id)}}" class="option1">
                        Product detail
                      </a>
                     <form action="{{url('add_cart',$products->id)}}" method="post">
                        @csrf
                        <div class="row">
                           <div class="col-3">
                              <input type="number" class="form-control" name="quantity" value="1" min="1">
                           </div>
                      <div  class="col-2">
                        <input type="submit" class="form-control" value="Add To Cart">
                      </div>
                  
                     </div>
                     </form>
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
                <div class="d-flex justify-content-between">
                 
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
    </div>
 </section>