<?php
namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Orderditel;
use App\Models\Product;
use Illuminate\Http\Request;

class cartController extends Controller
{
    public function cart()
    {
        $user_id = auth()->user()->id;


        $cartproduct = Cart::with('product')->where('user_id', $user_id)->get();

        return view('products.cart', ['cartproduct' => $cartproduct]);
    }
    public function checkout()
    {
        return view('checkout');
        // $neworder=new Order();
        // $neworder=
        // $user_id = auth()->user()->id;

        //  $cartproduct = Cart::with('product')->where('user_id', $user_id)->get();

        // return view('checkout', ['cartproduct' => $cartproduct]);
    }
public function sendcart(Request $request)
{
    // return view('products.sendcart');
     $user_id = auth()->user()->id;

    $newoders=new Order();
    $newoders->name=$request->name;
    $newoders->email=$request->email;
    $newoders->address=$request->address;
    $newoders->phone=$request->phone;
    $newoders->note=$request->note;
    $newoders->user_id=$user_id;
    $newoders->save();
    $cartproduct = Cart::with('product')->where('user_id', $user_id)->get();
    foreach($cartproduct as $item){
        $neworderdetals=new Orderditel();
        $neworderdetals->product_id=$item->product_id;
        $neworderdetals->price=$item->product->price;
        $neworderdetals->quantity=$item->quantity;
        $neworderdetals->order_id=$newoders->id;
        $neworderdetals->save();
    }
   Cart::where('user_id',$user_id)->delete();
   return view('products.sendcart',['']);

}
public function proviousorder()//استعلام تلطلبات السابقه بعد حذفها من السله
{
    if(auth()->user()->email==='aal@gmail.com'){
         $user_id = auth()->user()->id;
         $result=order::with('Orderditel')->get();
    }else{
         $user_id = auth()->user()->id;
         $result=order::with('Orderditel')->where('user_id',$user_id)->get();    }
        return view('products.proviousorder',['orders'=>$result]);
}

    public function removecart($productid){
        $removcart=Cart::find($productid);
        // $removcart=Cart::destroy($productid);
        $removcart->delete();
     return redirect(to: '/cart')->with('success', '  تم حذف  المنتج من السله بنجاح');;
    }
    public function single($productid){
        $single=Product::find($productid);
        return view('products.single',['single'=>$single]);
    }
}

