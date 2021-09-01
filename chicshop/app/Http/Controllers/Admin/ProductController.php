<?php

namespace App\Http\Controllers\Admin;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class ProductController extends Controller
{
    public function index(){
        $products=Product::all();
        return view('admin.product.list',['products'=>$products]);
    }


    public function create(){
        return view('admin.product.create');
    }

    public function store(Request $request){
        // $validated_data=Validator::make(request()->all(),[
        //     'title'=>'required',
        //      'body'=>'required'
        // ])->validated();
        $validated_data=$request->validate([
            'title'=>'required',
          'body'=>'required'
        ]);
        Product::create([
            'title'=>$validated_data['title'],
            'user_id'=>1,
            'body'=>$validated_data['body'],
            'slug'=>$validated_data['title'],
            'description'=>$validated_data['title'],
            'price'=>$validated_data['title'],
            'imageUrl'=>$validated_data['title']
        ]);
          return redirect('admin/products/create');
    }


    public function edit($id){
        $product=Product::findOrFail($id);
        return view('admin.product.edit',['product'=>$product]);
    }

    public function update($id){
        $validated_data=Validator::make(request()->all(),[
            'title'=>'required',
             'body'=>'required'
        ])->validated();
       $product=Product::findOrFail($id);
       $product->update([
        'title'=>$validated_data['title'],
        'user_id'=>1,
        'body'=>$validated_data['body'],
        'slug'=>$validated_data['title'],
        'description'=>$validated_data['title'],
        'price'=>$validated_data['title'],
        'imageUrl'=>$validated_data['title']
       ]);
       
    }

    public function delete($id){
        $product=Product::findOrFail($id);
        $product->delete();
           return back();
    }
}
