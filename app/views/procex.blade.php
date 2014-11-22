<!DOCTYPE html>
<html ng-app="app">
<head>
  <meta charset="UTF-8">
  <title>Hello world</title>
  <link rel="stylesheet" type="text/css" href="<% asset('style.css') %>">
</head>
<body layout="column" layout-fill>
<!--
<div class="scroll">
  <div class="-pane">
    <div class="-content">
    -->

    <aside flex-sm="33" flex-md="20">
      Menu<br>
      [flex-sm="33"][flex-md="20"]
    </aside>

    <main flex>
      Map
    </main>

    <aside flex-sm="33" flex-md="20">
      Menu<br>
      [flex-sm="33"][flex-md="20"]
    </aside>


<!--
    </div>
  </div>
</div>
-->

<script src="<% asset('script.min.js') %>"></script>
</body>
</html>