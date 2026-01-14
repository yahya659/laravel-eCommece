<?php
namespace App\Http\Controllers;
use App\Models\category;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\auth;



class FirstController extends Controller
{
    public function mainpage(){
        if(auth::check()){
                $result=category::all();
        }else{
            $result=category::take(3)->get();
        }
        return view('welcome',['categories'=>$result]);
    }
    public function Getproduct($catid=null){
    if($catid==null){
        $result=Product::paginate(6);
        return view('product',['products'=>$result]);
    }else{
    $result=Product::where('category_id',$catid)->paginate(3);
    return view('product',['products'=>$result]);
    }
    }
    public function GetCategry(){
    $product=Product::all();
    $categry=category::all();
    return view('Categry',['product'=>$product,'categry'=>$categry]);
    }
    public function Review(){
        $review=Review::all();
        // return view('review',);
        return view('review',['reviews'=>$review]);

    }
    public function storeReview(Request $request){
        $request->validate([
            'name'=>'required|max:200',
            'subject'=>'required',
            'massage'=>'required',
        ]);
        $addreview=new Review();
        $addreview->name=$request->name;
        $addreview->phone='77194';
        $addreview->subject=$request->subject;
        $addreview->massage=$request->massage;
        $addreview->save();
        return redirect('/Review');
    }
public function search(Request $request)
{
    $products = Product::where('name', 'LIKE', '%' . $request->name . '%')->paginate(3)->withQueryString();

    return view('product', ['products' => $products]);
}
public function about(){
    return view('about');
}


    }
