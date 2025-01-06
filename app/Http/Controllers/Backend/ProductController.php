<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Multi_img;
use App\Models\Brand;
use App\Models\Product;
use Intervention\Image\Facades\Image;
use App\Models\User;
use Carbon\Carbon;

class ProductController extends Controller
{
    public function AllProduct(){
        $products = Product::latest()->get();
        return view('backend.product.product_all',compact('products'));
    } // End Method 

    public function AddProduct(){
    
        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        return view('backend.product.product_add',compact('brands','categories'));

    }

    public function StoreProduct(Request $request){


        $image = $request->file('product_thambnail');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(800,800)->save('upload/products/thambnail/'.$name_gen);
        $save_url = 'upload/products/thambnail/'.$name_gen;

        $product_id = Product::insertGetId([

            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'product_name' => $request->product_name,
            'product_slug' => strtolower(str_replace(' ','-',$request->product_name)),

            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags' => $request->product_tags,
            'product_size' => $request->product_size,
            'product_color' => $request->product_color,

            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_descp' => $request->short_descp,
            'long_descp' => $request->long_descp, 

            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
           
            'product_thambnail' => $save_url,
            'status' => 1,
            'created_at' => Carbon::now(), 

        ]);

        /// Multiple Image Upload From her //////

        $images = $request->file('multi_img');
        foreach($images as $img){
            $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
        Image::make($img)->resize(800,800)->save('upload/products/multi-image/'.$make_name);
        $uploadPath = 'upload/products/multi-image/'.$make_name;

        Multi_img::insert([

            'product_id' => $product_id,
            'photo_name' => $uploadPath,
            'created_at' => Carbon::now(), 

        ]); 
        } // end foreach

        /// End Multiple Image Upload From her //////

        $notification = array(
            'message' => 'Product Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.product')->with($notification); 
    } // End Method 

    public function EditProduct($id){
         $multiImgs = Multi_img::where('product_id',$id)->get();
         $products = Product::findOrFail($id);
         return view('backend.product.product_edit',compact('products','multiImgs'));
     }

     public function UpdateProduct(Request $request){

        $product_id = $request->id;

        Product::findOrFail($product_id)->update([

       'product_name' => $request->product_name,
       'product_slug' => strtolower(str_replace(' ','-',$request->product_name)),

       'product_code' => $request->product_code,
       'product_qty' => $request->product_qty,
       'product_tags' => $request->product_tags,
       'product_size' => $request->product_size,
       'product_color' => $request->product_color,

       'selling_price' => $request->selling_price,
       'discount_price' => $request->discount_price,
       'short_descp' => $request->short_descp,
       'long_descp' => $request->long_descp,

       'hot_deals' => $request->hot_deals,
       'featured' => $request->featured,
       'status' => 1,
       'created_at' => Carbon::now(),

   ]);


    $notification = array(
       'message' => 'Product Updated Without Image Successfully',
       'alert-type' => 'success'
   );

   return redirect()->route('all.product')->with($notification);

}

public function UpdateProductThambnail(Request $request){

    $pro_id = $request->id;
    $oldImage = $request->old_img;

    $image = $request->file('product_thambnail');
    $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    Image::make($image)->resize(800,800)->save('upload/products/thambnail/'.$name_gen);
    $save_url = 'upload/products/thambnail/'.$name_gen;

     if (file_exists($oldImage)) {
       unlink($oldImage);
    }

    Product::findOrFail($pro_id)->update([

        'product_thambnail' => $save_url,
        'updated_at' => Carbon::now(),
    ]);

   $notification = array(
        'message' => 'Product Image Thambnail Updated Successfully',
        'alert-type' => 'success'
    );

    return redirect()->back()->with($notification);

    }

// Multi Image Update
public function UpdateProductMultiimage(Request $request){

    $imgs = $request->multi_img;

    if(is_array($imgs) && count($imgs) > 0) {
        foreach($imgs as $id => $img ){
            $imgDel = MultiImg::findOrFail($id);
            unlink($imgDel->photo_name);

$make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
                Image::make($img)->resize(800,800)->save('upload/products/multi-image/'.$make_name);
                $uploadPath = 'upload/products/multi-image/'.$make_name;

                Multi_img::where('id',$id)->update([
                    'photo_name' => $uploadPath,
                    'updated_at' => Carbon::now(),
                ]);
            } // end foreach
        } else {
            $notification = array(
                'message' => 'No images were provided or the provided data is invalid',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);
        }

        $notification = array(
            'message' => 'Product Multi Image Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }


    public function MulitImageDelelte($id){
    $oldImg = Multi_img::findOrFail($id);
    unlink($oldImg->photo_name);

    Multi_img::findOrFail($id)->delete();

    $notification = array(
        'message' => 'Product Multi Image Deleted Successfully',
        'alert-type' => 'success'
    );

    return redirect()->back()->with($notification);

}// End Method

public function ProductInactive($id){

    Product::findOrFail($id)->update(['status' => 0]);
    $notification = array(
        'message' => 'Product Inactive',
        'alert-type' => 'success'
    );

    return redirect()->back()->with($notification);

    }


   public function ProductActive($id){

    Product::findOrFail($id)->update(['status' => 1]);
    $notification = array(
        'message' => 'Product Active',
        'alert-type' => 'success'
    );

    return redirect()->back()->with($notification);

   }

   public function ProductDelete($id){

    $product = Product::findOrFail($id);
    unlink($product->product_thambnail);
    Product::findOrFail($id)->delete();

    $imges = Multi_img::where('product_id',$id)->get();
    foreach($imges as $img){
        unlink($img->photo_name);
        Multi_img::where('product_id',$id)->delete();
    }

    $notification = array(
        'message' => 'Product Deleted Successfully',
        'alert-type' => 'success'
    );

    return redirect()->back()->with($notification);

   }

   public function ProductStock(){

    $products = Product::latest()->get();
    return view('backend.product.product_stock',compact('products'));

}// End Method 

}
