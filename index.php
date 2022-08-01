<?php 
date_default_timezone_set('America/Vancouver');

function getNow() {
  $now = date("H:i:s") . "." . substr(microtime(),2,3);
  return($now);
}

if (isset($_GET["ajax"])) {
  echo "<p>Ajax says 'hi' too!</p>";
  exit();
}
?><!DOCTYPE html>
<html>
  <head>
    <title>Well Hello There!</title>
    <!-- https://raw.githubusercontent.com/ildar-shaimordanov/jsxt/master/js/ -->
    <script src="String.js"></script>
    <script>
async function JSHello() {
  var ele1 = document.getElementById("JSHello");
  ele1.innerHTML = getNow() + " " + "<p>JS says 'hi' too!</p>";

  var ele2 = document.getElementById("Ajax");
  var uri = window.location.href.split('?')[0];
  var res = await fetch(uri + '?ajax=1');
  var txt = await res.text();
  ele2.innerHTML = getNow() + " " + txt;
}

function getNow() {
  var now = new Date();
  var res = "%02d:%02d:%02d.%03d".sprintf(
    now.getHours(),  
    now.getMinutes(), 
    now.getSeconds(),
    now.getMilliseconds()
  );
  return(res);
}
    </script>
  </head>
  <body onload="JSHello();">
    <h1>Hello world!</h1>
    <p>How are you today world?</p>
    <?php echo getNow() . "<p>PHP says 'hi' too!</p>" ?>
    <div id="JSHello"></div>
    <div id="Ajax"></div>
  </body>
</html>