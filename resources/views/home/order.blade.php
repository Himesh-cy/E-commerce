@include('home.css')
      <div class="hero_area">
   <!-- header section strats -->
   @include('home.header')
          <!-- end header section -->

          <div class="row ">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h2 class="card-title">Order Status</h2>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th> Product Title </th>
                          <th> Quantity </th>
                          <th>  Price </th>
                       
                          <th> Payment Status </th>
                          <th> Delivery Status </th>
                          <th> Image </th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>

                        @foreach ($order as $order)
                            
               
                      
                        <tr>
                          <td> {{$order->product_title}}</td>
                          <td>{{$order->quantity}} </td>
                          <td>{{$order->price}} </td>
                          <td>{{$order->payment_status}} </td>
                          <td>{{$order->delivery_status}} </td>
                          <td>
                            <img height="100" width="180" src="/product/{{$order->image}}" alt="image" />
                           
                          </td>

                          <td>


                            @if($order->delivery_status =='processing')

                            <a href="{{url('cancle_order',$order->id)}}" onclick="return confirm('Aru you sure to cancle the order !!!')" class="btn btn-danger">Cancle Order</a>

                            @else
                            <p style="color: blue">Not Allowed</p>
                            @endif



                          </td>
                        </tr>
                        @endforeach
                        
                    
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </div>




      </div>
      

@include('home.script')