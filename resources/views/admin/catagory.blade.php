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
                        <h2 class="card-title">Add Catagory</h2>
                        <form action="{{url('/add_catagory')}}" method="post">
                          @csrf
                          <div class="row">
                            <div class="col">
                              <input type="text" class="input_color form-control text-white" name="catagory" placeholder="Write catagory name" required style="color: black">
                            </div>
                          
                            <div class="col">
                              
                              <input type="submit" class="btn btn-primary" name="submit" value="Add Catagory">
                            </div>
                          </div>
                         
                          
                          
                      </form>
                        <div class="table-responsive">
                          <table class="table">
                            <thead>
                              <tr>
                                <th class="text-white">Catagory Name</th>
                                 <th class="text-white">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                            
                              
                   @foreach ($data as $data)
                
                   <tr>
                     <td class="text-white">{{$data->catagory_name}}</td>
                     <td> 
                       <a onclick="return confirm('Are you sure to Delete ?')" href="
                       {{url('delete_catagory',$data->id)}}" class="btn btn-danger">Delete</a>
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
    <!-- container-scroller -->
    <!-- plugins:js -->
   @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>