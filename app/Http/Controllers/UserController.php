<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\order;
use Session;
class UserController extends Controller
{
    //

    public function getsignup(){
           return view('user.signup');}

    public function postsignup(Request $request){

$this->validate($request,[

'email'=>'email|required|unique:users',
'password'=>'required|min:4',

]);
$user =new User([

  'email'=>$request->input('email'),
    'password'=>bcrypt($request->input('password')),
]);
$user->save();
Auth::login($user);
if(Session::has('oldUrl')){
  $oldUrl=Session::get('oldUrl');
  Session::forget('oldUrl');
  return redirect()->to($oldUrl);}
return redirect()->route('user.profile');

        }

      public function getsignin(){
   return view('user.signin');}

   public function postsignin(Request $request){
 $this->validate($request,[
 'email'=>'email|required',
 'password'=>'required|min:4',
 ]);


 if(Auth ::attempt (['email'=> $request->input('email'),'password'=>$request->input('password')]))
{
  if(Session::has('oldUrl')){
    $oldUrl=Session::get('oldUrl');
    Session::forget('oldUrl');
    return redirect()->to($oldUrl);

  }
   return redirect()->route('user.profile');
 }
 return redirect()->back();


       }

       public function getprofile(){
$orders =Auth::User()->orders;
$orders->transform(function($order,$key){

$order->cart = unserialize($order->cart);
return $order;
});

     return view('user.profile',['orders'=>$orders]);

   }



     public function logout(){

       Auth::logout();
       return redirect()->route('user.signin');
}



}
