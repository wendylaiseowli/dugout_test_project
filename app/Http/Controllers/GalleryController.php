<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\Category;
use App\Http\Requests\GalleryRequest;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\fileExists;

class GalleryController extends Controller
{
    #Public
    function getGalleryImages(){
        $foodCategory = Category::where('name', 'Food')->first();
        $foodImages = Gallery::latest()->where('categoryID', $foodCategory->id)->where('status', true)->get();
        $drinkCategory = Category::where('name', 'Drinks')->first();
        $drinkImages = Gallery::latest()->where('categoryID', $drinkCategory->id)->where('status', true)->get();
        $eventCategory = Category::where('name', 'Events')->first();
        $eventImages = Gallery::latest()->where('categoryID', $eventCategory->id)->where('status', true)->get();

        return view('gallery', compact('foodImages', 'drinkImages', 'eventImages'));
    }

    #Admin
    public function index(){
        $galleries = Gallery::join('category', 'galleries.categoryID', '=', 'category.id')->select('name', 'original_photo_path', 'new_photo_path', 'status', 'galleries.updated_at', 'galleries.id')->orderBy('galleries.updated_at', 'desc')->get();
        return view('gallery.gallery', compact('galleries'));
    }

    public function create(){
        $categories= Category::all();
        return view('gallery.gallery-add', compact('categories'));  
    }

    public function store(GalleryRequest $request)
    {
        $validated = $request->validated();
        $validated['userID'] = Auth::id();
        if ($request->hasFile('new_photo_path')) {

            $file = $request->file('new_photo_path');
            $folder = 'img/admin/gallery'; 

            // Full path to the folder
            $fullPath = public_path($folder);

            // Create folder if it doesn't exist
            if (!file_exists($fullPath)) {
                mkdir($fullPath, 0755, true); // 0755 gives read/write/execute for owner
            }

            // Create filename
            $filename = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());

            // Move the file to the folder
            $file->move($fullPath, $filename);

            $validated['original_photo_path'] = $folder . '/' . $filename;
            $validated['new_photo_path'] = $folder . '/' . $filename;

        } else {
            return redirect()->back()
                ->withErrors(['original_photo_path' => 'The original photo path failed to upload'])
                ->withInput();
        }

        Gallery::create($validated);

        return redirect('/gallerys')->with('success', 'The gallery has been added successfully');
    }


    public function show(){

    }

    public function edit(Gallery $gallery){
        $categories= Category::all();
        
        return view('gallery.gallery-edit', compact('gallery', 'categories'));
    }

    public function update(GalleryRequest $request, Gallery $gallery){
        $validated = $request->validated();
        $validated['userID'] = Auth::id();

        if ($request->hasFile('new_photo_path')) {

            $file = $request->file('new_photo_path');
            $folder = 'img/admin/gallery';    

            // Full path to the folder
            $fullPath = public_path($folder);

            // Create folder if it doesn't exist
            if (!file_exists($fullPath)) {
                mkdir($fullPath, 0755, true); // 0755 gives read/write/execute for owner
            }

            // Create filename
            $filename = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());

            // Move the file to the folder
            $file->move($fullPath, $filename);

            //Delete the old one
            if($gallery->new_photo_path && file_exists(public_path($gallery->new_photo_path))){
                unlink(public_path($gallery->new_photo_path));
            }

            $validated['original_photo_path'] = $folder . '/' . $filename;
            $validated['new_photo_path'] = $folder . '/' . $filename;

        } else {
            // No new image uploaded (keep old one) 
            $validated['new_photo_path'] = $gallery->new_photo_path;
            $validated['original_photo_path'] = $gallery->original_photo_path;
        }

        $gallery->update($validated);

        return redirect('/gallerys')->with('success', 'The gallery has been added successfully');        
    }

    public function destroy(Gallery $gallery){
        $gallery->delete();

        $filepath = public_path($gallery->new_photo_path);
        
        if(file_exists($filepath)){
            unlink($filepath);
        }

        return redirect('/gallerys')->with('success', 'The gallery status has been updated successfully');
    }

    public function active(Gallery $gallery){
        $gallery->update(['status'=>true]);
        return redirect('/gallerys')->with('success', 'The gallery status has been updated successfully');
    }

    public function deactive(Gallery $gallery){
        $gallery->update(['status'=>false]);
        return redirect('/gallerys')->with('success', 'The gallery status has been updated successfully');
    }
}
