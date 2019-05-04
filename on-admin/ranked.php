<?php require_once 'body/header.php';
$dataSource = new DataArray;
$func = new MyFunction; ?>
<div class="margin_box">
	<div class="smooth-box box-body">
		<div class="box-margin">
			<div>
				<nav class="smooth-box" style="background-color: #f6f6f6;">
					<ul class="ul_" >
					  <li class="li_i"><a href="?rank=biodata">Alternatif</a></li>
					  <li class="li_i"><a href="?rank=normalisasi">Normalisasi</a></li>
					  <li class="li_i"><a href="?rank=theChampion">Hasil Akhir</a></li>
					</ul> 
				</nav>
			</div>
			<?php
			switch ($_GET['rank']) {
				case 'biodata':
					# code...
					require_once "rank/alternatif.php";
					break;

				case 'normalisasi':
					# code...
					require_once "rank/normalisasi.php";
					break;

				case 'theChampion':
					# code...
					require_once "rank/hasil.php";
					break;
				
				default:
					# code...
					require_once "rank/alternatif.php";
					break;
			}
			
			?>
		</div>
	</div>
</div>
<?php require_once 'body/footer.php'; ?>