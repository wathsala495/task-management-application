<?php

namespace App\Http\Controllers;
// use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    //
    public function index()
    {
        $categories =Auth::user()->Category::all(); 
        return response()->json($categories);
    }

   
    public function store(Request $request)
    {
       
        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $category =Auth::user()->Category::create($validated);

        
        return response()->json($category, 201);
    }

   
    public function update(Request $request, $id)
    {
        
        $category = Auth::user()->Category::find($id);

        // Validate incoming request data
        $validated = $request->validate([
            'name' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

       
        $category->update($validated);

        
        return response()->json($category);
    }

    
    public function destroy($id)
    {
      
        $category = Auth::user()->Category::find($id);
        $category->delete();

        
        return response()->json(['message' => 'Category deleted successfully']);
    }
}
