<?php

namespace App\Http\Controllers;
use  App\Models\Book;

use Illuminate\Http\Request;
class BookController extends Controller
{
    public function getallbooks()
    {
        $data = Book::with('category')->get();
        $formattedData = $data->map(function($book) {
            return [
                'name' => $book->name,
                'image' => $book->image,
                'description' => $book->desc,
                'price' => $book->price,
                'id' => $book->id,
                'category' => $book->category->name,
            
       
                // Add any other fields you want to include from the Service model
            ];
        });
        return response()->json(['data' => $formattedData]);
    }
}
