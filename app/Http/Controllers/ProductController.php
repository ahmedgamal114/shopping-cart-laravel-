<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\product;
use App\order;
use App\Cart;
use Session ;
use Auth;
use Stripe\Charge;
use Stripe\Stripe;


class ProductController extends Controller
{
    //

     public function getproducts(){
   $products = DB::table('products')->paginate(6);

return view('shop.index',[ 'products'=>$products ]);

     }

          public function getAddToCart(Request $request,$id){

      $product =Product::find($id);
      $oldcart= Session ::has('Cart')? Session ::get('Cart'):null;
      $cart=new Cart($oldcart);
      $cart->add($product,$product->id);
      $request->Session()->put('Cart',$cart);
//dd($request->Session()->get('cart'));
      return redirect()->route('product.index');

          }



public function getReduceByOne($id){


 $oldcart= Session ::has('Cart')? Session ::get('Cart'):null;
    $cart=new Cart($oldcart);
    $cart->reduceByOne($id);
  //  dd($cart->items);
if(count($cart->items) > 0 ){
  Session ::put('Cart',$cart);
}else
  {Session::forget('Cart');}

  return redirect()->route('product.shoppingcart');

}




public function getRemoveItem($id){
  $oldcart= Session ::has('Cart')? Session ::get('Cart'):null;
     $cart=new Cart($oldcart);
     $cart->removeItem($id);
     if(count ($cart->items) >0 ){
       Session ::put('Cart',$cart);
     }else
       {Session::forget('Cart');}

       return redirect()->route('product.shoppingcart');



}

































public function getCart(){
if (!Session :: has('Cart')){
  return view('shop.shopping-cart',['products'=>null]);
}
$oldcart=Session ::get('Cart');
$cart =new Cart($oldcart);
  return view('shop.shopping-cart',
  ['products'=>$cart->items, 'totalprice'=>$cart->totalprice ]);

}
public function getcheckout(){
  if (!Session :: has('Cart')){
    return view('shop.shopping-cart',['products'=>null]);
  }
  $oldcart=Session ::get('Cart');
  $cart =new Cart($oldcart);
  $total=$cart->totalprice;;
  return view('shop.checkout',['total'=> $total ]);


}

public function postcheckout(Request $request){


  if (!Session :: has('Cart')){
    return view('shop.shoppingcart');
  }
  $oldcart=Session ::get('Cart');
  $cart =new Cart($oldcart);
  Stripe::setApiKey('sk_test_51Gv0DYKFTXBa7dDltZqaCO9MmRIS5PLZYOIIN5WIk23SO1HwIPDg5gDxx0VGItMY0uCkZO8XndfSR6KsYaX68uuJ00ey9hm2fG');

try{
 $charge= Charge ::create(array(
    'amount' => $cart->totalprice * 100,
    'currency' => 'usd',
    'source' => $request->input('stripeToken'),
    'description' => 'My First Test Charge (created for API docs)',
  ));
$order=new Order();
$order->cart =serialize($cart);
$order->address=$request->input('address');
$order->name=$request->input('name');
$order->payment_id =$charge->id;
Auth::user()->orders()->save($order);



}
catch(\Exception $e)
{
  return redirect()->route('checkout')->with('error',$e->getMessage());
}
Session ::forget('Cart');
return redirect()->route('product.index')->with('success',' successfully Purchase Products ..');

}
}
