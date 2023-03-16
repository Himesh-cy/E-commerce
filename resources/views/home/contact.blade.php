<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      {{-- <base href="/public"> --}}
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" type="">
      <title>E-commerce</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="{{asset('home/css/bootstrap.css')}}" />
      <!-- font awesome style -->
      <link href="{{asset('home/css/font-awesome.min.css')}}" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="{{asset('home/css/style.css')}}" rel="stylesheet" />
      <!-- responsive style -->
      <link href="{{asset('home/css/responsive.css')}}" rel="stylesheet" />
     
   </head>
   <body>
      <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')
                <!-- end header section -->


           <!-- slider section -->
       @include('home.slider')
       <!-- end slider section -->
   
  
      <!-- -----------Contact area---------- -->
      <section class="contact-area my-4">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 col-md-12">
              <div class="contact-title">
                <h3 class="text-uppercase title-h1">Contact Me</h3>
              </div>
              <div class="contact-form p-4">
                <form class="row g-3">
                  <div class="col-md-6">
                    <label for="username" class="form-label"></label>
                    <input type="text" class="form-control" placeholder="Username" id="username">
                  </div>
                  <div class="col-md-6">
                    <label for="email" class="form-label"></label>
                    <input type="email" class="form-control" id="email" placeholder="demo@mail.com">
                  </div>
                  <div class="col-12">
                    <label for="subject" class="form-label"></label>
                    <input type="text" class="form-control" id="subject" placeholder="Subject">
                  </div>
                
                  <div class="col-12">
                    <label for="textarea" class="form-label"></label>
                   <textarea name="textarea" class="form-control" id="textarea" placeholder="Message" ></textarea>
                  </div>
                 
               
                  <div class="col-6">
                    <button type="submit" class="email-btn  text-uppercase my-3 " id="contact-btn">Submit</button>
                  </div>
                </form>
              </div>
              </div>
             
         

            <div class="col-lg-6 col-md-12">
              <div class="address">
                <h3 class="text-uppercase title-h1">Address</h3>
                <div class="row d-flex flex-row">
                <p class="para"> <i class="bi bi-geo-alt ml-3"></i>Ghorani 8, Dang </p>
                <p class="para"><i class="bi bi-telephone ml-3"></i> +9779866969764</P>
                </div>
              </div>
              <div class="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3521.8085022257014!2d82.4188221145457!3d28.0303282178318!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3997924541181f79%3A0x325e4da803554419!2sSauri%2C%20Tripur%2022400!5e0!3m2!1sen!2snp!4v1665668077487!5m2!1sen!2snp" style="width:100%;" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
              </div>
             
            </div>
          </div>
        </div>
      </section>
      <!-- -----------End contact area----------- -->
     
     </div>
     

      <!-- footer start -->
    @include('home.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By 
         
           
         
         </p>
      </div>

      <!-- jQery -->
      <script src="{{asset('home/js/jquery-3.4.1.min.js')}}"></script>
      <!-- popper js -->
      <script src="{{asset('home/js/popper.min.js')}}"></script>
      <!-- bootstrap js -->
      <script src="{{asset('home/js/bootstrap.js')}}"></script>
      <!-- custom js -->
      <script src="{{asset('home/js/custom.js')}}"></script>
   </body>
</html>