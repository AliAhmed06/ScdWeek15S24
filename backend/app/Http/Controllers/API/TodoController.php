<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index(){
        $todos = Todo::all();
        return response()->json(["todos" => $todos], 200);
    }

    public function create(Request $request){
        $request->validate([
            "title" => "required"
        ]);

        $todo = new Todo();
        $todo->title = $request->title;

        $todo->save();

        return response()->json(["Todo Create successfully"], 200);
    }

    public function update(Request $request, $id){
        $request->validate([
            "title" => "required"
        ]);

        $todo = Todo::find($id);
        $todo->title = $request->title;
        $todo->save();

        return response()->json(["Todo Updated successfully"], 200);
    }

    public function delete(Request $request, $id){

        $todo = Todo::find($id);

        $todo->delete();

        return response()->json(["Todo Deleted successfully"], 200);
    }
}
