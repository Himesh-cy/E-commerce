 {{-- comment and replay system start here --}}

 <div class="text-center py-4">
    <h2>Comments</h2>
 
    <form action="{{url('add_comment')}}" method="post">
       @csrf
       <textarea placeholder="Comment something here" class="w-50" name="comment" required></textarea>
       <br>
       <input type="submit" value="Comment" class="hero-btn">
    </form>
  
  </div>
 
 
 
  <div class="mb-2 text-center">
    <h2>All Comments</h2>
 
    @foreach ($comment as $comment)
        
    <div>
    
       <b>{{$comment->name}}</b>
       <p>{{$comment->comment}}</p>
       <a href="javascript::void(0);" class="btn btn-danger mb-3" onclick="reply(this)" data-Commentid="{{$comment->id}}">Reply</a>
 
 
      @foreach ($reply as $rep)
      @if($rep->comment_id == $comment->id)
      <div style="padding-left:3%; padding-botton:10px;">
          <b>{{$rep->name}}</b>
          <p>{{$rep->replay}}</p>
 
          <a href="javascript::void(0);" class="hero-btn mb-3" onclick="reply(this)" data-Commentid="{{$comment->id}}">Reply</a> 
 
      </div>
          @endif
 
      @endforeach
      
    </div> 
 
 
    
    @endforeach
 
       <div  style="display:none;" class="replyDiv">
          <form action="{{url('add_reply')}}" method="post">
             @csrf
          <input type="text" id="commentId" name="commentId" hidden >
          <textarea rows="10" cols="6" placeholder="write something here" name="reply" required></textarea>
          <br>
          <button type="submit" class="hero-btn my-3">Replay</button>
          <a href="javascript::void(0);" class="hero-btn  my-3" onclick="reply_close(this)">Close</a>
         
       </form>
       </div>
    
    </div>
</div>


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