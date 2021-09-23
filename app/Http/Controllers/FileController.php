<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user()->id;
        $files = File::where("userId" , "=" , $user)->get();
        return view('files.index')->with('files' , $files);
    }
    public function index2()
    {
        $user = auth()->user()->id;
        $files = File::where("userId" , "=" , $user)->get();
        return view('files.Allmovies')->with('files' , $files);
    
    }

  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('files.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
'title' => "required",
'desc' => "required",
'mainFile' => "required"
]);
        $file = new File();
        $file->title = $request->title;
        $file->desc = $request->desc;
    $file->userId=$request->userID;
        //Upload file 
     $file_data = $request->file('mainFile');
     $file_name = $file_data->getClientOriginalName();
     $file_data->move(public_path() . '/uploads/' , $file_name );
     $file->mainFile =  $file_name;
     $file->save();
    return redirect('file/ListFiles');
     
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $file= File::find($id);
        return view('files.show')->with('file' , $file);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $file= File::find($id);
        return view('files.edit')->with('file' , $file);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => "required",
            'desc' => "required",
            'mainFile' => "required"
        ]);
        $file = File::find($id);
        $file->title = $request->title;
        $file->desc = $request->desc;
    
        //Upload file 
     $file_data = $request->file('mainFile');
     $file_name = $file_data->getClientOriginalName();
     $file_data->move(public_path() . '/uploads/' , $file_name );
     $file->mainFile =  $file_name;
     $file->save();
    return redirect('file/ListFiles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file = File::find($id);
        $file->delete();
        return redirect('file/ListFiles');
    }
    public function download($id)
    {
        $item = File::where('id' , $id)->firstOrFail();
        $pathitem = public_path('uploads/' . $item->mainFile);
        return response()->download($pathitem);
    }
     
    
    
      
    
}
