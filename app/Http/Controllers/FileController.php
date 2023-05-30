<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allowedMimeTypes = ['image/jpeg','image/gif','image/png','image/bmp','image/svg+xml'];

        // get files from storage folder 'uploads'
        $files = Storage::files('public/');

        $files = array_filter($files,function($file) use($allowedMimeTypes) {           
            return in_array(Storage::mimeType($file), $allowedMimeTypes) ? true : false;
        });
       
        return view('file.index',['files' => $files]);
    }
      
    public function create()
    {
        return view('file.create');
    }

    /**
     * Store resource uploaded.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'file' => 'required|file|image|mimes:jpeg,jpg,png,jpeg,gif,bmp|max:9048',
        ]);
      
        $fileName = $data['name'] . '.' . $data['file']->extension();  

        // move uploaded file to public storage path
        //$request->file->move(public_path('uploads'), $fileName);

        $path = $data['file']->storeAs('public', $fileName);
       
        return redirect()->route('file.index')
                         ->with('success','You have successfully upload file to ' . $path);
    }

     /**
     * Permanently Delete specified resource from storage.
     *
     * @param  string  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
       
        $res = Storage::delete($request->file);
           
        return redirect()->route('file.index')
                         ->with('info', 'File Destroyed Successfully');
    }
}