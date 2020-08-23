<?php

namespace App\Http\Controllers;
use App\Article;
use Illuminate\Http\Request;

class CreatesController extends Controller
{
    public function index(){
    	$articles = Article::paginate(6);

    	return view('home')->with('articles',$articles);
    	
    }


    public function insert(Request $request){ 
    	  $this->validate($request, [
    	  	      'title'=> 'required', 
    	  	      'description'=>'required',
    	  	      'cover_image'=>'image|nullable|max:1999'
    	  	  ]);
    	    //handle file upload
    	    if($request->hasFile('cover_image')){
    	    	//get file with extension
    	    	$filenamewithExt = $request->file('cover_image')->getClientOriginalName();
    	    	//get just filename
    	    	$filename = pathinfo($filenamewithExt, PATHINFO_FILENAME);
    	    	//get just ext
    	    	$extension = $request->file('cover_image')->getClientOriginalExtension();
    	    	//filename to store
    	    	// $filenametostore = $filename.'_'.time().'.'.$extension;

    	    	$filenametostore = $filename.'_'.date('YmdHis').rand(1, 9999999).'.'.$extension;
    	    	//upload image
    	    	$path = $request->file('cover_image')->storeAs('public/cover_images', $filenametostore);

    	    }else{
    	    	$filenametostore = 'noimage.jpg';
    	    }
            //insert article
	    	$article = new article;
	    	$article->title = $request->title;
	    	$article->description = $request->description;
	    	$article->cover_image = $filenametostore;
	    	$article->author = $request->author;
	        $article->save();
            return redirect('/')->with('success', 'Article saved succesfully');
    }

    public function update($id){
    	$articles = Article::find($id);

    	return view('update')->with('articles',$articles);

    	// return view('update', ['article'=>'$articles']);
    }

    public function edit(Request $request, $id){ 
    	$this->validate($request, ['title'=> 'required', 'description'=>'required']);
 
         $update = Article::where('id', $id)
                       ->update([ 'title'=>$request->title,
                                  'description'=>$request->description
                       ]);
	    	
            return redirect('/')->with('success', 'Article updated succesfully');
    }

    public function read($id){
       $articles = Article::find($id);

       return view('read')->with('articles', $articles);
    }

    public function delete($id){
         Article::where('id', $id)
                  ->delete();

         return redirect('/')->with('success', 'Article deleted succesfully');
    }
}
