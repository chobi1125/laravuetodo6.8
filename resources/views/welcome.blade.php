<script src="{{ asset('js/app.js') }}" defer></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<div id="app">
  <h2>TODOアプリ</h2>
  <p>-Laravel×Vue.jsで作ってみた。-</p>
  <example-component />
</div>