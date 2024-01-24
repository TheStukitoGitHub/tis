<?php

	if(isset($_GET["check"])){
	
			if($_POST["paleti"] == ""){
				$greshka = "Я пак? Не си попълнил полето \"Палети\".";
			}elseif($_POST["redove"] == ""){
				$greshka = "Я пак? Не си попълнил полето \"Редове\".";
			}elseif(!isset($_POST["kenove_v_stek"])){
				$greshka = "Я пак? Не си избрал колко кена има в стек.";
			}else{
				$paleti = $_POST["paleti"];
				$redove = $_POST["redove"];
				$kenove_v_stek = $_POST["kenove_v_stek"];
					if($_POST["stekove"] == ""){
						$stekove = 0;
					}else{
						$stekove = $_POST["stekove"];
					}
					
					if($kenove_v_stek == "6"){
						$stekove_na_red = "36";
					}elseif($kenove_v_stek == "8"){
						$stekove_na_red = "27";
					}
				
				$butilki_palet = $paleti * $redove * $stekove_na_red * $kenove_v_stek;
				$stekove_v_palet = $redove * $stekove_na_red;
				$butilki_stek = $stekove * $kenove_v_stek;
				$obshto_stekove = $paleti * $stekove_v_palet + $stekove;
				$kraen_rezultat = $butilki_palet + $butilki_stek;
				$FINAL_kraen_rezultat = number_format($kraen_rezultat, 0, ',', ' ');
				$FINAL_obshto_stekove = number_format($obshto_stekove, 0, ',', ' ');
				$tonaj = $kraen_rezultat * 0.5 / 1000;
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
			<?php echo"<div class=\"success\"><h8>Кенове</h8> <br/> <b>$FINAL_kraen_rezultat</b></div>"; ?><br/>
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
					<div class="stats">Кенове:</div>
					<div class="stats"><b><?php echo"$FINAL_kraen_rezultat";?></b></div>
				</div>
				<div class="stats_holder">
					<div class="stats2">Тонаж:</div>
					<div class="stats2"><b><?php echo"$tonaj";?> тона</b></div>
				</div>
				<div class="stats_holder">
					<div class="stats">Палети/час:</div>
					<div class="stats"><b><?php echo(substr($paleti_chas, 0, 5));?></b></div>
				</div>
				<br/>
				
				<form action="index.php?type=ken" method="post">
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
        <title>Пресмятане на палети - 2 литра</title>
        <link href="css/style_android.css" rel="stylesheet" type="text/css" />
		<link rel="icon" type="image/png" href="images/favicon.png">
	</head>
<body>
<div class="main_div">
<form action="index.php?type=ken&check=1" method="post">
<center><h1>Кенове</h1></center>
<?php if(isset($greshka)){echo"<div class=\"fail\">$greshka</div>";}else{}?>
<?php// if(isset($success)){echo"<div class=\"success\">$kraen_rezultat</div>";}else{} ?>
	<hr/>
    Палети:<br />
    <input type="text" name="paleti" value="" />
    <br /><br />
    На колко реда се редят?:<br />
    <input type="text" name="redove" value="6" />
    <br /><br />
    Стекове:<br />
    <input type="text" name="stekove" value="" />
    <br /><br />
	Кенове в стек:<br />
	<div style="float: left; width: 50px;">
		<input type="radio" name="kenove_v_stek" value="6">6
	</div> 
	<div style="float: left; width: 50px;">
		<input type="radio" name="kenove_v_stek" value="8">8
	</div> <br /><br /><br />
    <input class="input_2"  type="submit" value="Аре уе, ей!" />
</form><br/>

<center><a href="index.php">Назад</a></center>
<?php include('inc/footer.php'); ?>
</div>
</body>
</html>
<?php
	}
?>