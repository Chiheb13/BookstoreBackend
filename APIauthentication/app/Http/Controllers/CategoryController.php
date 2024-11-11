<?php

namespace App\Http\Controllers;
use  App\Models\Category;

use Illuminate\Http\Request;
class CategoryController extends Controller
{
    public function getallcategory()
    {
        $data = Category::all();
        $formattedData = $data->map(function($book) {
            return [
                'name' => $book->name,
                'image' => $book->image,
            
       
                // Add any other fields you want to include from the Service model
            ];
        });
        return response()->json(['data' => $formattedData]);
    }
}
