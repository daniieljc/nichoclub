<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create(Request $request)
    {
        $validate = $this->validate($request, [
            'category_title'  => 'required',
            'category_description' => 'required'
        ]);

        $title = $request->input('category_title');
        $description = $request->input('category_description');

        $category = new Category();
        $category->title = $title;
        $category->description = $description;

        $category->save();

        return redirect()->route('admin.category')->with(
            'message',
            '¡La categoría se ha creado con éxito!'
        );
    }
}
