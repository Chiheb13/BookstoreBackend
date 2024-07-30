<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
class AdminController extends Controller
{
    public function createbook(Request $request)
    {
 
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', 
            'type' => 'required',
            'price' => 'required',
            'language' => 'required',
            'status' => 'required',
            'publisher' => 'required',
            'pages' => 'required',
            
        ]);
//dd($validatedData);
$image = $request->file('image');
$uploadedFileUrl = Cloudinary::upload($image->getRealPath())->getSecurePath();
    
        //$cloudinary = new Cloudinary();
        $category = new Book();
        $category->name = $validatedData['name'];
        $category->description = $validatedData['description'];
        $category->status = $validatedData['status'];
        $category->pages = $validatedData['pages'];
        $category->type = $validatedData['type'];
        $category->publisher = $validatedData['publisher'];
        $category->language = $validatedData['language'];
        $category->price = $validatedData['price'];
        $category->image =   $uploadedFileUrl; 
        $category->save();

        return response()->json(['message' => 'Book created successfully'], 201);
    }
}
