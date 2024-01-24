<?php
include 'inc/Mobile_Detect.php';
$detect = new Mobile_Detect();

if ($detect->isMobile()) {
    // Any mobile device.
	}
?>
<center><a href="index.php"><img src="images/bolqrka.png" border="0"/></a></center>
<?php
	if(isset($_GET["type"])){
		if($_GET["type"] == "2_l"){
			include('beer/2_l.php');
		}elseif($_GET["type"] == "2-5_l"){
			include('beer/2-5_l.php');
		}elseif($_GET["type"] == "nashensko"){
			include('beer/nashensko.php');
		}elseif($_GET["type"] == "ken"){
			include('beer/ken.php');
		}
	}else{
?>
<!DOCTYPE HTML>
<head>
        <meta charset="UTF-8" />
        <!--- <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;"> /-->
		<meta name="viewport" content="width=device-width, height=device-height"> 
        <title>Болярка - Палет калкулатор</title>
        <link href="css/style_android.css" rel="stylesheet" type="text/css" />
		<link rel="icon" type="image/png" href="images/favicon.png">
	</head>
	<body>
		<div class="main_div"><center><h1>Палет Калкулатор<h1></center><hr/><br/>
			<form action="index.php?type=2_l" method="post">
				<input class="input_2l"  type="submit" value="2L" />
			</form>
			<br/>
			<form action="index.php?type=2-5_l" method="post">
				<input class="input_25l"  type="submit" value="2.5L" />
			</form>
			<br/>
			<form action="index.php?type=ken" method="post">
				<input class="input_ken"  type="submit" value="Кенове" />
			</form>
			<br/>
			<form action="index.php?type=nashensko" method="post">
				<input class="input_nashensko"  type="submit" value="Нашенско" />
			</form>
			
			<?php include('inc/footer.php'); ?>
		</div>
	</body>
</html>
<?php
}
?>