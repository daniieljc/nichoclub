<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function create(Request $request)
    {
        $validate = $this->validate($request, [
            'product_title'  => 'required',
            'product_description' => 'required',
            'product_url' => 'required|url',
            'product_price' => 'required|integer',
            'product_price_desc' => 'integer',
            'product_category' => 'required|integer'
        ]);

        $product_category = $request->input('product_category');
        $title = $request->input('product_title');
        $description = $request->input('product_description');
        $url = $request->input('product_url');
        $price = $request->input('product_price');
        $price_desc = $request->input('product_price_desc');

        $user = Auth::user();

        $product = new Post();
        $product->user_id = $user->id;
        $product->category_id = $product_category;
        $product->title = $title;
        $product->description = $description;
        $product->url_product = $url;
        $product->price = $price;
        $product->price_desc = $price_desc;

        $product->save();

        return redirect()->route('admin.products')->with(
            'message',
            '¡El producto se ha creado correctamente!'
        );
    }
}
