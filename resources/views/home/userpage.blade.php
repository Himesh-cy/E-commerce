               @include('home.css')
                     <div class="hero_area">
                  <!-- header section strats -->
            @include('home.header')
                  <!-- end header section -->
               
                  <!-- slider section -->
               @include('home.slider')
                  <!-- end slider section -->
               </div>
               <!-- why section -->
            @include('home.why')
               <!-- end why section -->
               
               <!-- arrival section -->
               @include('home.new_arrival')
               <!-- end arrival section -->
               
               <!-- product section -->
               @include('home.product')
               <!-- end product section -->



               <!-- subscribe section -->
            @include('home.suscribe')
               <!-- end subscribe section -->

               <!-- client section -->
            @include('home.client')
               <!-- end client section -->

               {{-- cta seciton --}}

               @include('home.cta')


                      <!-- comment section -->
                      @include('home.comment')
                      <!-- end comment section -->

               <!-- footer start -->
            @include('home.footer')
               <!-- footer end -->
            



               <script>
                  function reply(caller){
                     document.getElementById('commentId').value=$(caller).attr('data-commentid')
                  $('.replyDiv').insertAfter($(caller));
                  $('.replyDiv').show();
                  }


                  function reply_close(caller){
               
                  $('.replyDiv').hide();
                  }
               </script>
         
                  @include('home.script')