<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TodoController extends Controller
{
    public function index(Request $request)
    {
        $tasks = DB::table('todo')->get();
        return view('todo.index', ['tasks' => $tasks]);
    }
    public function post(Request $request)
    {
        $validate_rule = [
            'content' => 'required|max:20'
        ];
        $this->validate($request, $validate_rule);
        return view('todo.index');
    }
    public function create(Request $request)
    {
        $param = [
            'content' => $request->content,
            'created_at' => now(),
            'updated_at' => now()
        ];
        DB::table('todo')->insert($param);
        return redirect('/');
    }
    public function update(Request $request)
    {
        $param = [
            'content' => $request->content,
            'created_at' => now()
        ];
        DB::table('todo')->where('id', $request->id)->update($param);
        return redirect('/');
    }
    public function delete(Request $request)
    {
        DB::table('todo')->where('id', $request->id)->delete();
        return redirect('/');
    }
}