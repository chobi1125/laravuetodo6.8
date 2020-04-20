<?php
use App\Todo;
use Illuminate\Http\Request;
// ★★取得
// Route::get('/','TodoController@get');
// Route::get('/',function(){
//     return response()->json(Todo::all());
// });
Route::get('/',function(){
    $todo = Todo::all();
    return $todo;
});
// ★★データ削除
// Route::delete('/{id}','TodoController@delete');
Route::delete('/{id}',function($id){
    Todo::find($id)->delete();
    return response("OK", 200);
});
// ★★データ追加
// Route::post('/','TodoController@post');
Route::post('/',function(Request $request){
    $todo = new Todo();
    $todo->todo = $request->todo;
    $todo->save();
    return response("OK", 200);
});
// ★★更新
Route::put('/{id}','TodoController@update');
// Route::put('/{id}',function(Request $request,$id){
//     $todo = Todo::find($id);
//     $todo->todo = $request->todo;
//     $todo->save();
//     return response("OK", 200);
// });