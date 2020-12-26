<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ArticleController extends Controller
{
    public function create(Request $request)
    {
        $validate = $this->validate($request, [
            'input-nombre-article'  => 'required',
            'input-body-article' => 'required',
            'cover_image' => 'image'
        ]);

        $title = $request->input('input-nombre-article');
        $body = $request->input('input-body-article');
        $cover_image = $request->file('cover_image');

        $title_meta = $request->input('input-meta-title');
        $keywords_meta = $request->input('input-meta-keywords');
        $description_meta = $request->input('input-meta-description');

        $article = new Article();
        $article->title = $title;
        $article->body = $body;

        if ($cover_image) {
            $coverimage_name = $request->file('cover_image')->getClientOriginalName();
            Storage::disk('images')->put($coverimage_name, File::get($cover_image));
            $article->cover_image = $cover_image;
        }

        $article->title_meta = $title_meta;
        $article->keywords_meta = $keywords_meta;
        $article->description_meta = $description_meta;

        $article->save();

        return redirect()->route('admin.articles')->with(
            'message',
            '¡El artículo se ha creado con éxito!'
        );
    }
}
