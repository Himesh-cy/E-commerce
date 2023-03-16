<!DOCTYPE html>
<html lang="en">
  <head>

    <base href="/public">
    <!-- Required meta tags -->
    @include('admin.css')
 
     <style>
         .div_center{
             text-align: center;
             padding-top: 40px;

         }
         .font_size{
             font-size: 40px;
             padding-bottom: 40px;
         }
         .text_color{
             color: black;
             padding-bottom: 20px;
         }
         label{
             display: inline-block;
             width: 200px;
         }
         .div_design{
                padding-bottom: 15px;
         }
     </style>

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

       <div class="div_center ">
       <h1 class="font_size">update product</h1>

       <form action="{{url('/update_product_confirm',$product->id)}}" method="POST" enctype="multipart/form-data">
         @csrf

       <div class="div_design">
        <label for="">Product Title :</label>
        <input class="text_color" type="text" name="title" placeholder="Write a title" value="{{$product->title}}" required>
        </div>

     <div class="div_design">
        <label for="">Product Description :</label>
        <input class="text_color" type="text" name="description" placeholder="Write Description Here" value="{{$product->description}}" required>
     </div>

     <div class="div_design">
        <label for="">Product Price :</label>
        <input class="text_color" type="number" name="price" placeholder="Write Price" value="{{$product->price}}" required>
     </div>

     <div class="div_design">
        <label for="">Discount Price :</label>
        <input class="text_color" type="text" name="dis_price" value="{{$product->discount_price}}" placeholder="Write a discount is applied">
     </div>

     <div class="div_design">
        <label for="">Product Quantity :</label>
        <input class="text_color" type="number" name="quantity" min="0" placeholder="Write quantity" value="{{$product->quantity}}" required>
     </div>

     <div class="div_design">
        <label for="">Product Catagory :</label>
       <select class="text_color" name="catagory" id="" required>
           <option value="value="{{$product->catagory}} selected >{{$product->catagory}}</option>
           @foreach($catagory as $catagory)
           <option value="{{$catagory->catagory_name}}">{{$catagory->catagory_name}}</option>
           @endforeach
     
       </select> 
     </div>


     <div class="div_design">
        <label for="">Current Product Image Here:</label>
        <img style="margin:auto;" height="100" width="100" src="/product/{{$product->image}}" alt="">
     </div>






     <div class="div_design">
        <label for="">Change Product Image Here:</label>
        <input type="file" name="image">
     </div>

     <div class="div_design">
         <input type="submit" value="Update Product" name="submit" class="btn btn-primary">
     </div>

    </form>
       </div>



            </div>
      </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
   @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>