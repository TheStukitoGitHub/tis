<?php

	if(isset($_GET["check"])){
	
			if($_POST["paleti"] == ""){
				$greshka = "Я пак? Не си попълнил полето \"Палети\".";
			}else{
				$paleti = $_POST["paleti"];
					if($_POST["stekove"] == ""){
						$stekove = 0;
					}else{
						$stekove = $_POST["stekove"];
					}
				
				$butilki_palet = $paleti * 320;
				$butilki_stek = $stekove * 4;
				$obshto_stekove = $paleti * 80 + $stekove;
				$kraen_rezultat = $butilki_palet + $butilki_stek;
				$FINAL_kraen_rezultat = number_format($kraen_rezultat, 0, ',', ' ');
				$FINAL_obshto_stekove = number_format($obshto_stekove, 0, ',', ' ');
				$tonaj = $kraen_rezultat * 2.5 / 1000;
				$paleti_chas = $paleti / 10;
				$success = "1";
			}
		
	}
	if(isset($success)){
	?>
	<head>
        <meta charset="UTF-8" />
        <!--- <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;"> /-->
		<meta name="viewport" content="width=device-width, height=device-height"> 
        <title>Краен резултат</title>
        <link href="css/style_android.css" rel="stylesheet" type="text/css" />
		<link rel="icon" type="image/png" href="images/favicon.png">
	</head>
	<body><br/>
		<div class="main_div">
			<?php echo"<div class=\"success\"><h8>Бутилки</h8> <br/> <b>$FINAL_kraen_rezultat</b></div>"; ?><br/>
			<div class="main_page">
				<center>Статистика</center><br/>
				<div class="stats_holder">
					<div class="stats">Палети:</div>
					<div class="stats"><b><?php echo"$paleti";?></b></div>
				</div>
				<div class="stats_holder">
					<div class="stats2">Стекове:</div>
					<div class="stats2"><b><?php echo"$FINAL_obshto_stekove";?></b></div>
				</div>
				<div class="stats_holder">
					<div class="stats">Бутилки:</div>
					<div class="stats"><b><?php echo"$FINAL_kraen_rezultat";?></b></div>
				</div>
				<div class="stats_holder">
					<div class="stats2">Тонаж:</div>
					<div class="stats2"><b><?php echo"$tonaj";?> тона</b></div>
				</div>
				<div class="stats_holder">
					<div class="stats">Палети/час:</div>
					<div class="stats"><b><?php echo(substr($paleti_chas, 0, 5));?></b></div>
				</div><br/>
				
				<form action="index.php?type=nashensko" method="post">
					<input class="input_2"  type="submit" value="Смятане наново?" />
				</form>
			</div>
		</div>
		<?php include('inc/footer.php'); ?>
	</body>
	</html>
	<?php
	}else{
	
?>
<!DOCTYPE HTML>
<head>
        <meta charset="UTF-8" />
        <!--- <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;"> /-->
		<meta name="viewport" content="width=device-width, height=device-height"> 
        <title>Пресмятане на палети - 2.5 литра</title>
        <link href="css/style_android.css" rel="stylesheet" type="text/css" />
		<link rel="icon" type="image/png" href="images/favicon.png">
	</head>
<body>
<div class="main_div">
<form action="index.php?type=nashensko&check=1" method="post">
<center><h1>Нашенско 2.5 литра</h1></center>
<?php if(isset($greshka)){echo"<div class=\"fail\">$greshka</div>";}else{}?>
<?php// if(isset($success)){echo"<div class=\"success\">$kraen_rezultat</div>";}else{} ?>
	<hr/>
    Палети:<br />
    <input type="text" name="paleti" value="" />
    <br /><br />
    Стекове:<br />
    <input  type="text" name="stekove" value="" />
    <br /><br /><br />
    <input class="input_2"  type="submit" value="Давай, не се ебавай! :P" />
</form><br/>

<center><a href="index.php">Назад</a></center>
<?php include('inc/footer.php'); ?>
</div>
</body>
</html>
<?php
	}
?>