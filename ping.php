<?php
$array = array( '1.1.1.1' => 0, '1.0.0.1' => 0, '8.8.8.8' => 0 );
foreach ($array as $ip => $y) {
  if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4) && filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE) && filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_RES_RANGE)) {
    exec("ping -c 1 -W 1 $ip", $output, $result);
    if ($result === 0) {
      $array[$ip] = 1;
    } else {
      $array[$ip] = 0;
    }
  } else {
    $array[$ip] = 0;
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>IP Status Checker</title>
  <link rel="icon" type="image/x-icon" href="ping.png">
  <style>
    * {
      box-sizing: border-box;
    }
    html {
      height: 100%;
    }
    body {
      font-family: Arial, Helvetica, sans-serif;
      margin: 0;
      min-height: 100%;
      background-color: #000000;
      color: #35d154;
      text-align: center;
    }
    .header {
      padding: 80px;
    }
    .ipbox {
      background-color: #111111;
      width: 250px;
      padding: 20px;
      border-radius: 10px;
      margin: auto;
      height: 60px;
    }
	.circle {
      display: inline-block;
      width: 20px;
      height: 20px;
      border-radius: 50%;
      margin-right: 5px;display: inline-block;
      width: 20px;
      height: 20px;
      border-radius: 50%;
      margin-right: 5px;
    }
    .green {
      background-color: #00a000;
      color: #00a000;
    }
    .green::before {
      font-weight: bold;
      content: "x";
    }
    .red {
      background-color: #ff0000;
      color: #ff0000;
    }
    .red::before {
      font-weight: bold;
      content: "x";
    }
  </style>
</head>
<body>
  <div class="header">
    <h1>IP Status Checker</h1>
    <p>> ping</p>
  </div>
    <div class="main">
      <div class="ipbox" id="ip1">Area A Status: <span class="circle" id="circle1"></span></div>
      <br>
      <div class="ipbox" id="ip2">Area B Status: <span class="circle" id="circle2"></span></div>
      <br>
      <div class="ipbox" id="ip3">Area C Status: <span class="circle" id="circle3"></span></div>
  </div>
  <script type="text/javascript">
    if (<?php echo $array["1.1.1.1"]; ?>) {
        document.getElementById('circle1').classList.add('green');
        document.getElementById('circle1').classList.remove('red');
    } else {
        document.getElementById('circle1').classList.add('red');
        document.getElementById('circle1').classList.remove('green');
    }
	if (<?php echo $array["1.0.0.1"]; ?>) {
        document.getElementById('circle2').classList.add('green');
        document.getElementById('circle2').classList.remove('red');
    } else {
        document.getElementById('circle2').classList.add('red');
        document.getElementById('circle2').classList.remove('green');
    }
    if (<?php echo $array["8.8.8.8"]; ?>) {
        document.getElementById('circle3').classList.add('green');
        document.getElementById('circle3').classList.remove('red');
    } else {
        document.getElementById('circle3').classList.add('red');
        document.getElementById('circle3').classList.remove('green');
    }
    setTimeout(function(){
      window.location.reload(1);
    }, 5000);
  </script>
</body>
</html>
