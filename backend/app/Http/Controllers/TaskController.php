<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models;
use App\Models\Task;



class TaskController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }
     // GET /api/tasks - Retrieve all tasks for the authenticated user
     public function index()
     {
     // Fetch tasks for the authenticated user
        $tasks = Auth::user()->tasks::all(); ;
        return response()->json($tasks);
     }
       // POST /api/tasks - Create a new task
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'completed' => 'nullable|boolean',
        ]);

        $task = Auth::user()->tasks->create($validated);
      
        return response()->json($task, 201);
    }

    //  PUT /api/tasks/{id} - Update an existing task
     public function update(Request $request, $id)
     {
         $task = Auth::user()->tasks->find($id); 
 
         $validated = $request->validate([
             'title' => 'nullable|string|max:255',
             'description' => 'nullable|string',
             'completed' => 'nullable|boolean',
         ]);
 
         $task->update($validated); 
         return response()->json($task); 
     }
    
    public function destroy($id)
    {
        $task = Auth::user()->tasks->findOr($id); 
        $task->delete(); 
        return response()->json(['message' => 'Task deleted successfully']);
    }
}
