<template>
  <div>
    <!-- 追加用インプットとボタン -->
    <!-- <input type="hidden" name="_token" :value="csrf" /> -->
    <input type="text" v-model="todo_form" />
    <!-- v-modelに名前をつけることで入力値をメソッドやテンプレートで使える -->
    <button type="button" @click="addTodo">追加</button>
    <!-- <button type="button" @click="onSubmit">test</button> -->
    <!-- データ表示・1つずつ削除、更新ボタンをつけて繰り返し -->
    <!-- 確認用 -->
    <div v-for="todo in todos">
      <!-- todos配列を繰り返し表示  -->
      <input type="text" v-model="todo.todo" />
      <!-- todo.todoでtodoカラムの内容を出力 -->
      <button type="button" @click="deleteTodo(todo.id)">削除</button>
      <button type="button" @click="updateTodo(todo.id)">更新</button>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      // active_todo: null, //必要性がわからない。。。
      todo_form: "",
      // 追加用インプットタグ。データの初期値の設定。v-modelと連携。
      todos: ""
      // ToDoリストを受取(配列かつオブジェクトで受け取ってる。)
    };
  },
  methods: {
    addTodo() {
      var data = {
          todo: this.todo_form
          // insertされる内容。カラムに合わせる。
      };
      axios.post('/api', data).then(() => {
      this.getTodoList();
      });
    },
    deleteTodo(id) {
      // 削除ボタンクリックで実行。コンファームでダイヤログをだす。
      if(!confirm('削除します。よろしいですか？')) {
        return;
      }
      var data = {}; // let、varどちらでもOK
      // APIで叩いたdataを取得。idを引数で取得。
      //   data._token = document.getElementsByName("csrf-token")[0].content; //tokenなしでも削除できた。
      axios.delete("/api/" + id, data).then(() => {
        this.getTodoList();
      });
    },
    updateTodo(id) {
      // 更新ボタンクリックで実行
      var data = {
        // todo:this.todos.filter((edit)=>{return edit.id === id})[0].todo
        todo:this.todos.filter(function(value){return value.id === id})[0].todo
        // 「filter」は配列オブジェクトから条件に一致した要素だけを抽出する。()内は値、数値インデックスなど指定可能。todos配列から.idで要素のidを取得。一致する項目を[0]で1つのみ取得。
        // コールバックとは「引数として渡される関数」
      };
     axios.put("/api/" + id, data).then(() => {
        this.getTodoList();
        alert('更新が完了しました。')
      });
    },
    getTodoList() {
      axios.get("/api")
        .then(response => {
          this.todos = response.data;
        });
    }
  },
  mounted() {
    this.getTodoList();
    console.log("Component mounted.");
  }
};
</script>
