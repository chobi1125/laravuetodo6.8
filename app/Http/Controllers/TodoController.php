<?php
namespace App\Http\Controllers;

use App\Todo; // モデルは最低限接続用に使う。
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index() {
        return view('welcome');
    }
    // メインビューの表示
    public function get(){
        return response()->json(Todo::all());
    }
    // 全件表示
    public function post(Request $request){
        $todo = new Todo();
        $todo->todo = $request->todo;
        $todo->save();
        return response("OK", 200);
    }
    // 1件追加
    public function delete($id){
        Todo::find($id)->delete();
        return response("OK", 200);;
    }
    // 1件削除
    public function update(Request $request,$id){
        $todo = Todo::find($id);
        $todo->todo = $request->todo;
        $todo->save();
        return response("OK", 200);
    }
    // 1件更新
}