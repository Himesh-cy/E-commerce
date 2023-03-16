<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
                  <h4 class="card-title">Order Status</h4>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th> Product Title </th>
                          <th> Quantity </th>
                          <th>  Price </th>
                          <th> Project </th>
                          <th> Payment Status </th>
                          <th> Delivery Status </th>
                          <th> Image </th>
                        </tr>
                      </thead>
                      <tbody>
                      
                        <tr>
                          <td> 02312 </td>
                          <td> $14,500 </td>
                          <td> Website </td>
                          <td> Cash on delivered </td>
                          <td> 04 Dec 2019 </td>
                          <td>
                            <div class="badge badge-outline-warning">Pending</div>
                          </td>
                          <td>
                            <img src="assets/images/faces/face2.jpg" alt="image" />
                            <span class="pl-2">Estella Bryan</span>
                          </td>
                        </tr>
                        
                    
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </div>
    </div>
    

    @include('admin.script')
    <!-- End custom js for this page -->
    
</body>
</html>