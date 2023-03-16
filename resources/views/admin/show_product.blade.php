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
                          <h1 class="card-title">Products Management</h1>
                          <div class="table-responsive">
                            <table class="table">
                              <thead>
                                <tr>
                                  <th class="th_design">Product image</th>
                                    <th class="th_design">Product title</th>
                                    {{-- <th class="th_design">Description</th> --}}
                                    <th class="th_design">Quantity</th>
                                    <th class="th_design">Catagory</th>
                                    <th class="th_design">Price</th>
                                    <th class="th_design">Discount price</th>
                                   
                                    <th class="th_design">Delete</th>
                                    <th class="th_design">Edit</th>
                                </tr>
                              </thead>
                              <tbody>
                              
                    @foreach($product as $product)

                    <tr>
                      <td>
                        <img  src="/product/{{$product->image}}"  alt="">
                    </td>
                        <td>{{$product->title}}</td>
                        {{-- <td>{{$product->description}}</td> --}}
                        <td>{{$product->quantity}}</td>
                        <td>{{$product->catagory}}</td>
                        <td>{{$product->price}}</td>

                        @if($product->discount_price)
                        <td>{{$product->discount_price}}</td>    
                        @else
                        <td>No Discount</td>  
                        @endif
                        
                        <td> <a class="btn btn-danger" onclick="return confirm('Are you sure to delete this ?')" href="{{url('delete_product',$product->id)}}">Delete</a></td>
                        <td> <a class="btn btn-success" href="{{url('update_product',$product->id)}}">Edit</a></td>

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
    <!-- container-scroller -->
    <!-- plugins:js -->
   @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>