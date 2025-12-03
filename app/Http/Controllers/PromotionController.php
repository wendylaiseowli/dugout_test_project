<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promotion;
use App\Http\Requests\PromotionRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PromotionController extends Controller
{
    #Public
    function getPromotionDetails(){
        $promotions = Promotion::latest()->where('status', true)->get();
        return view('promotion', compact('promotions'));
    }

    #Admin
    public function index(){
        $promotions = Promotion::orderBy('updated_at', 'desc')->get();
        return view('promotion.promo', compact('promotions'));    
    }

    public function create(){
        return view('promotion.promo-add'); 
    }

    public function store(PromotionRequest $request){
        $validated = $request->validated();
        $validated['userID'] = Auth::id();

        $file = $request->file('photo_path');
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

        $validated['photo_path'] = $folder . '/' . $filename;

        // Convert to Y-m-d for database
        $validated['promotion_startDate'] = Carbon::createFromFormat('d/m/Y', $validated['promotion_startDate'])->format('Y-m-d');
        $validated['promotion_endDate'] = Carbon::createFromFormat('d/m/Y', $validated['promotion_endDate'])->format('Y-m-d');

        Promotion::create($validated);

        return redirect('/promotions')->with('success', 'The promotion has been successfully created');
    }

    public function edit(Promotion $promotion){
        return view('promotion.promo-edit', compact('promotion'));
    }

    public function update(PromotionRequest $request, Promotion $promotion){
        $validated = $request->validated();

        if ($request->hasFile('photo_path')) {

            $file = $request->file('photo_path');
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
            if($promotion->photo_path && file_exists(public_path($promotion->photo_path))){
                unlink(public_path($promotion->photo_path));
            }

            $validated['photo_path'] = $folder . '/' . $filename;

        } 

        // Convert to Y-m-d for database
        $validated['promotion_startDate'] = Carbon::createFromFormat('d/m/Y', $validated['promotion_startDate'])->format('Y-m-d');
        $validated['promotion_endDate'] = Carbon::createFromFormat('d/m/Y', $validated['promotion_endDate'])->format('Y-m-d');

        $promotion->update($validated);

        return redirect('/promotions')->with('success', 'The promotion has been successfully updated');
    }

    public function destroy(Promotion $promotion){
        $promotion->delete();

        $filepath = public_path($promotion->photo_path);
        
        if(file_exists($filepath)){
            unlink($filepath);
        }

        return redirect('/promotions')->with('success', 'The promotion has been successfully deleted');
    }

    public function active(Promotion $promotion){
        $promotion->update(['status'=> true]);
        return redirect('/promotions')->with('success', 'The promotion has been successfully active');
    }

    public function deactive(Promotion $promotion){
        $promotion->update(['status'=> false]);
        return redirect('/promotions')->with('success', 'The promotion has been successfully deactive');
    }

    public function replicate(PromotionRequest $request){
        $validated = $request->validated();
        $validated['userID'] = Auth::id();

        $file = $request->file('photo_path');
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

        $validated['photo_path'] = $folder . '/' . $filename;

        // Convert to Y-m-d for database
        $validated['promotion_startDate'] = Carbon::createFromFormat('d/m/Y', $validated['promotion_startDate'])->format('Y-m-d');
        $validated['promotion_endDate'] = Carbon::createFromFormat('d/m/Y', $validated['promotion_endDate'])->format('Y-m-d');

        Promotion::create($validated);

        return redirect('/promotions')->with('success', 'The promotion has been successfully created');        
    }

    public function replicateForm(){
        $promotions= Promotion::all();
        return view('promotion.promo-existing', compact('promotions'));
    }
}
