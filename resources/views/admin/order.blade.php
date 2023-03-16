<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')

  
  </head>

  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
     @include('admin.sidebar')
      <!-- partial -->

         <!-- partial:partials/_navbar.html -->
         @include('admin.header')
        <!-- partial -->



        <div class="main-panel">
            <div class="content-wrapper">
              
                <div class="row ">
                    <div class="col-12 grid-margin">
                      <div class="card">
                        <div class="card-body">
                          <h1 class="card-title">All Orders</h1>
                          <form action="{{url('search')}}" method="GET">
                            <input type="text" name="search" style="color: black;" placeholder="Search for something">
                            <input type="submit" value="search" class="btn btn-outline-primary">
                        </form>
                          <div class="table-responsive">
                            <table class="table">
                              <thead>
                                <tr>
                                    <th>Customer Name</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Product title</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Payment status</th>
                                    <th>Delivary status</th>
                                    <th>Image</th>
                                    <th>Delivered </th>
                                      <th>  Print PDF</th>
                                   
                                </tr>
                              </thead>
                              <tbody>
                                @forelse($order as $order)
                                <tr>
                                  
                                    <td>{{$order->name}}</td>
                                    <td>{{$order->email}}</td>
                                    <td>{{$order->address}}</td>
                                    <td>{{$order->phone}}</td>
                                    <td>{{$order->product_title}}</td>
                                    <td>{{$order->quantity}}</td>
                                    <td>{{$order->price}}</td>
                                    <td>{{$order->payment_status}}</td>
                                    <td>{{$order->delivery_status}}</td>
                                    <td>
                                      <img src="/product/{{$order->image}}" alt="Product 3" class="mr-3">
                                       
                                    </td>
                                    <td>
                                        @if($order->delivery_status == 'processing')
                                        <a href="{{url('delivered',$order->id)}}" onclick="return confirm('Are you sure this product is delivered !!!')" class="btn btn-primary  btn-sm">Delivered</a>   
                                        @else
                                        <p style="color:red">Delivered</p>
                                        @endif

                                     
                                    </td>
                                    <td>
                                       
                                      <a href="{{url('/print_pdf',$order->id)}}" class="btn btn-secondary">Print</a>
                                    </td>
        
                                  
                    
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="16">
                                        <p>No Data Found</p>
                                    </td>
                              
                                </tr>
                                    
                                @endforelse
                            </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
   @include('admin.script')
    <!-- End custom js for this page -->


    
  </body>
</html>