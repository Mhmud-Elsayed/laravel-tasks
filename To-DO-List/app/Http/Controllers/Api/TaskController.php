<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\taskResource;
use App\Models\task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = task::get();

        return response()->json(["tasks" => $tasks], 200);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $newTask = task::create([
            "name" => $request->name,
            "descreption" => $request->descreption,
            "completed" => $request->completed,
            "user_id" => auth()->id(),
            "deadline" => $request->deadline


        ]);
        return response()->json(["task" => $newTask], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $task = task::find($id);
        return response()->json(["task" => $task], 200);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $editedtask = task::find($id)->update([
            "name" => $request->name,
            "descreption" => $request->descreption,
            "completed" => $request->completed,
            "user_id" => auth()->id(),
            "deadline" => $request->deadline
        ]);
        return response()->json(["updated task" => $editedtask], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deletedTask = task::find($id)->delete();
        return response()->json(["deleted task" => $deletedTask], 200);
    }
}
