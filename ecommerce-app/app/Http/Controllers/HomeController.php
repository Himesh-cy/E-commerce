<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Queue\Jobs\RedisJob;
use App\Models\Comment;
use App\Models\Replay;

class HomeController extends Controller
{
    //

    public function index(){
        $product = Product::paginate(10);
        $comment = Comment::orderby('id','desc')->get();
        $reply= Replay::all();

        return view('home.userpage',compact('product','comment','reply'));
    }

    public function redirect(){
        $usertype = Auth::user()->usertype;

        if($usertype == '1'){

            $total_product = product::all()->count();
            $total_order = order::all()->count();
            $total_user = user::all()->count();

            $order = order::all();
            $total_revenue = 0;
            foreach($order as $order){

                $total_revenue = $total_revenue + $order->price;

            }

            $total_delivered = order::where('delivery_status','=','delivered')->get()->count();

            $total_processing = order::where('delivery_status','=','processing')->get()->count();

     

            return view('admin.home',compact('total_product','total_order','total_user','total_revenue','total_delivered','total_processing'));
        }else{
           
            $product = Product::paginate(10);

            $comment = Comment::orderby('id','desc')->get();

            $reply= Replay::all();
            return view('home.userpage',compact('product','comment','reply'));
        }
    }




    public function product_details($id){


    $product =product::find($id);
    return view('home.product_details',compact('product'));

    }



    public function add_cart(Request $request, $id){
        if(Auth::id()){
          $user = Auth::user();
          $product  = product::find($id);

          $userid = $user->id;
          $product_exist_id = cart::where('Product_id','=', $id)->where('user_id', '=', $userid)->get('id')->first();
        //   dd($product);


        if($product_exist_id){
            $cart = cart::find($product_exist_id)->first();
            $quantity = $cart->quantity;
            $cart->quantity =$quantity + $request->quantity;

            if($product->discount_price!=null){
                $cart->price = $product->discount_price * $cart->quantity;
            }else{
                $cart->price = $product->price * $cart->quantity;
            }
            $cart->save();
            return redirect()->back()->with('message','Product added successfully');


        }else{

            $cart = new Cart;
            $cart->name = $user->name;
            $cart->email = $user->email;
            $cart->phone = $user->phone;
            $cart->address = $user->address;
            $cart->user_id = $user->id;
            $cart->product_title = $product->title;


            if($product->discount_price!=null){
                $cart->price = $product->discount_price * $request->quantity;
            }else{
                $cart->price = $product->price * $request->quantity;
            }
          
            $cart->image = $product->image;
            $cart->product_id = $product->id;
    
    
            $cart->quantity = $request->quantity;
    
    
            $cart->save();
            return redirect()->back()->with('message','Product added successfully');


        }

      


        }
        else{
            return redirect('login');
        }
    }




    // show cart method
    public function show_cart(){

        if(Auth::id()){
            $id = Auth::user()->id; 

            $cart = Cart::where('user_id','=',$id)->get();
            return view('home.showcart',compact('cart'));
        }else{
            return redirect('login');
        }
        
    }


    public function remove_cart($id){
        $cart = cart::find($id);
        $cart->delete();
        return redirect()->back();
    }


    //cash order
    public function cash_order(){
        $user = Auth::user();
        $userid = $user->id;
        // dd($userid);

        $data = cart::where('user_id','=',$userid)->get();

        foreach($data as $data){
            $order = new order;

            $order->name = $data->name;
            $order->email = $data->email;
            $order->phone = $data->phone;
            $order->address = $data->address;
            $order->user_id = $data->user_id;
            $order->product_title = $data->product_title;
            $order->name = $data->name;

            $order->price = $data->price;
            $order->quantity = $data->quantity;
            $order->image = $data->image;

            $order->product_id = $data->product_id;

            $order->payment_status = 'cash on delevery';
            $order->delivery_status = 'processing';

            $order->save();
            $cart_id = $data->id;
            $cart = cart::find($cart_id);
            $cart->delete();
            
        }

        return redirect()->back()->with('message','We have Received your Order. We will connect with you soon');

    

    }



    public function show_order(){
        if(Auth::id()){

            $user =Auth::user();

            $userid = $user->id;

            $order = order::where('user_id','=',$userid)->get();
            return view('home.order',compact('order'));

        }else{
            return redirect('login'); 
        }
    }


    public function cancle_order($id){
        $order = order::find($id);
        $order->delivery_status = 'You cancle the order';
        $order->save();
        return redirect()->back();
    }


    public function add_comment(Request $req){

        // dd($req);

        if(Auth::id()){

            $comment = new Comment;

           $comment->name = Auth::user()->name; 
           
           $comment->user_id = Auth::user()->id;

           $comment->comment = $req->comment;

           $comment->save();

           return redirect()->back();

        }else{
            return redirect('login'); 
        }

    }
       


     function add_reply(Request $request){

        if(Auth::id()){

            $replay = new Replay;

            $replay ->name = Auth::user()->name; 
           
            $replay ->user_id = Auth::user()->id;

            $replay ->comment_id = $request->commentId;
            $replay ->replay = $request->reply;
            $replay ->save();

           return redirect()->back();

        }else{
            return redirect('login'); 
        }

     }




     public function product_search(Request $req){
        $search_text = $req->search;

        $product = Product::where('title','LIKE',"%$search_text%")->orWhere('catagory','LIKE',"$search_text")->paginate(10);


        $comment = Comment::orderby('id','desc')->get();
        $reply= Replay::all();
        return view('home.userpage',compact('product','comment','reply'));
     }






     public function products(){
        $product = Product::paginate(10);
        $comment = Comment::orderby('id','desc')->get();
        $reply= Replay::all();

        return view('home.all_product',compact('product','comment','reply'));
     }



     
     public function search_product(Request $req){
        $search_text = $req->search;

        $product = Product::where('title','LIKE',"%$search_text%")->orWhere('catagory','LIKE',"$search_text")->paginate(10);


        $comment = Comment::orderby('id','desc')->get();
        $reply= Replay::all();
        return view('home.all_product',compact('product','comment','reply'));
     }




}
