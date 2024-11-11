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
        'category_id' => 'required|exists:categories,id'  // Assurez-vous que vous validez le category_id
    ]);

    if ($request->has('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads'), $imageName);  // Enregistrez l'image dans le dossier public/uploads
        $imagePath = 'uploads/' . $imageName;  // Utilisez le chemin relatif
    }

    $book = new Book();
    $book->name = $validatedData['name'];
    $book->description = $validatedData['description'];
    $book->status = $validatedData['status'];
    $book->pages = $validatedData['pages'];
    $book->type = $validatedData['type'];
    $book->publisher = $validatedData['publisher'];
    $book->language = $validatedData['language'];
    $book->price = $validatedData['price'];
    $book->category_id = $validatedData['category_id'];  // Enregistrez l'ID de la catégorie
    $book->image = $imagePath;  // Enregistrez le chemin de l'image
    $book->save();

    return response()->json(['message' => 'Book created successfully'], 201);
}

    
    
}
