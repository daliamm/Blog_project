<?php

namespace App\Http\Controllers;
use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Validator;
class ArticleController extends Controller
{

    protected function validator( array $data ){
       return validator::make($data,[
        'title'=>'required',
        'body'=>'required'
       ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles=Article::paginate(20);
        return view('welcome')->with('articles',$articles);
        // return view('layouts.defult');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validator( $request->all())->validate();
       $file=$request->file('thumbmail');
        $time=Carbon::now();
        $directory=data_format($time,'Y').'/'.data_format($time,'m');
        $fileName=data_format($time,'h').date_format($time,'s').rand(1,9).'.'.$file->extension();
        Storage::disk('public')->putFileAs($directory,$file,$fileName);
    //    $article=Article::create($request->all());
       $article=Article::create([
        'body'=>$request->body,
        'title'=>$request->title,
        'thumbnail'=>$directory.'/'.$fileName,
       ]);
       $request->session()->flash('message','Blog added successfully');
        return redirect()->route('admin_index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $article=Article::where('id',$id)->firstOrFail();
       return view('article')->with('article',$article);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article=Article::where('id',$id)->firstOrFail();
        return view('admin.edit')->with('article',$article);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $article=Article::where('id',$id)->firstOrFail(); 
          $article->update([
            'body'=>$request->body,
            'title'=>$request->title,
           ]);
        // return view('admin.edit')->with('article',$article);
        if($request->file('thumbmail')){
        $file=$request->file('thumbmail');
        $time=Carbon::now();
        $directory=data_format($time,'Y').'/'.data_format($time,'m');
        $fileName=data_format($time,'h').rand(1,9).'.'.$file->extension();
        Storage::disk('public')->putFileAs($directory,$file,$fileName);  
        $article->thumbnail = $directory.'/'.$fileName;
        $article->save();
        }
     


     
           $request->session()->flash('message','Blog UpDated successfully');
            return redirect()->route('admin_index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}