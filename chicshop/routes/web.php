<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});
Route::prefix('/admin')->group(function(){
    Route::get('/products/create', function () {
        return view('admin.product.create');
    });
    Route::post('/products/create', function () {
        // $product=new Product();
        // $product->title=request('title');
        // $product->user_id=1;
        // $product->body=request('body');
        // $product->slug=request('title');           
        // $product->description=request('title');
        // $product->price=request('title');
        // $product->imageUrl=request('title');
        // $product->save();
        $validated_data=Validator::make(request()->all(),[
            'title'=>'required',
             'body'=>'required'
        ])->validated();
        //  if($validator->fails()){
        //      return redirect()->back()->withErrors($validator);
        //  }
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
    });
    Route::get('/products/list', function () {
        $products=DB::table('products')->get();
       
        return view('admin.product.list',['products'=>$products]);
    });
    Route::get('/products/edit', function () {
        $products=DB::table('products')->edit();
       
        return view('admin.product.list',['products'=>$products]);
    });
});


