<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function Addproduct(){// داله الااضافه
        // if(auth::check()){
             $allcategry= category::all();

        // }else{
            // return view('auth.login');

        // }
        return view('Products.addproduct',['allcategry'=>$allcategry]);
    }
    public function AddproductInCategry(Request $request){
        $request->validate([
            'name'=>'required|max:200|',
            'quantity'=>'required',
            'price'=>'required',
            'photo'=>'image|mimes:jpeg,png,jpg.gif|max:2048',
            'description'=>'required'
        ]);

        if($request->id){ //شرط حفظ التعديل

            $curinproduct=Product::find($request->id);
            $curinproduct->name=$request->name;
            $curinproduct->quantity=$request->quantity;
            $curinproduct->price=$request->price;
            $curinproduct->description=$request->description;
            $curinproduct->category_id=$request->category_id;

                if($request->has('photo')){
                $path=$request->photo->move('uploads',
                str::uuid()->toString().$request->photo->getClientOriginalName());
                $curinproduct->imagepath=$path;
            }
            $curinproduct->save();
            return redirect('/product')->with('success', 'تم تعديل المنتج بنجاح');
        }else{ //شرط حفظ الااضافه المنتج

            $product=new product();
            $product->name=$request -> name;
            $product->quantity=$request -> quantity;
            $product->price=$request -> price;
            $product->description=$request ->description;
            $product->category_id=$request->category_id;

            $path='';//قيمه افتراضيه في حاله لم توجد صوره

            if($request->has('photo')){
                $path=$request->photo->move('uploads',
                str::uuid()->toString().$request->photo->getClientOriginalName());
            }
            $product->imagepath=$path;
            $product->save();
            return redirect('/product')->with('success', ' تم إضافة المنتج بنجاح');
        }
}
public function Editeproduct($productid=null){//داله التعديل

if($productid !=null){
    $curentproduct=Product::findOrFail($productid);
    $allcategry=category::all();
    return view('products.editeproduct',['product'=>$curentproduct,'allcategry'=>$allcategry]);
    }else{
        return redirect('/addproduct');
    }


}
public function Removeproduct($productid=null){
    // dd($productid);
    if($productid !=null){
        $currentproduct=Product::find($productid);
        $currentproduct->delete();
        return redirect('/Categry')->with('success', '  تم حذف  المنتج بنجاح');;
    }else{
        abort(403,'لم يتم اختيار المنتج الذي تريد حذفه');
    }

}
public function productsTable(){
    $product=Product::all();
    return view('Products.productsTables',['products'=>$product]);
}

}
