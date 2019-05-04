<link rel="stylesheet" type="text/css" href="themes/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="themes/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="themes/font.css">

<script type="text/javascript" src="script/script.js"></script>
<script type="text/javascript" src="script/jquery.min.js"></script>
<script type="text/javascript" src="script/jquery-ui.min.js"></script>
<script type="text/javascript" src="script/bootstrap.min.js"></script>
<?php 
session_start();
require_once "data/function.php";
require_once "data/gzCryp.php";
$func = new MyFunction;
?>
<div class="margin_box">
	<div class="smooth-box box-body">
		<div class="box-margin">
			<h1><?php echo "Kandidat"; ?></h1>

			<br>
			<!-- Table 3 -->
			<div id="content">
				<div class="datatable">
					<table class="table table-hover" name="mytable" id="mytable">
						<thead>
							<tr>
								<th scope="col" style="text-align: center;">#</th>
			                    <th scope="col" style="text-align: center;">POIN</th>
			                    <th scope="col" style="text-align: center;">Nama Pendaftar</th>
							</tr>
						</thead>
						<!-- Body Table -->
						<tbody id="table1">
							<?php
				            $r = mysql_query("SELECT * FROM alternatif");
				            while ($a = mysql_fetch_array($r)) {
				                # Convert Value By Array And Spliter...
				                
				            ?>
								<?php
								$get = json_decode($a['get']);
								$jumlahRawGet = count($get);
								//echo "<br>"; 
								for ($i=0; $i <count($get) ; $i++) { 
									# code...
									$id_sk = $get[$i];
									# Convert To Nilai Sub Kriteria ...
									$ad = mysql_query("SELECT nilai_sub_krt,kode_krt FROM sub_kriteria WHERE kode_sub_krt='$id_sk'");
			                        while ($getView = mysql_fetch_array($ad)) {
			                            # code...
			                            $nilai_sub_krt = $getView['nilai_sub_krt'];

			                            # Get Atribut By ID Kriteria
			                            $kode_krt = $getView['kode_krt'];
			                        	$ac = mysql_query("SELECT atribut,bobot FROM kriteria WHERE kode_krt='$kode_krt'");
			                        	while ($ambilAtribut = mysql_fetch_array($ac)) {
			                        		# code...
			                        		$at[] = $ambilAtribut['atribut'];
			                        		$bt[] = $ambilAtribut['bobot'];
			                        	}
			                        	$n[] = $nilai_sub_krt;
			                        }
								}
							}
							$bbt = $func->jumpArray($bt,$jumlahRawGet)
							?>
						<!-- <tbody id="table1"> -->
							<?php
							$nomor=0;
							$read = mysql_query("SELECT * FROM alternatif");
			                while ($append = mysql_fetch_array($read)) {
			                    # Append Array And Search Max Value By Raw...
			                    $ss[] = $a['kode_alt'];
								$jumlahRaw = count($ss);
								$jumlahRaw = $jumlahRaw-1;
								$namanya[] = $append['nama_alt'];

								for ($posisi=0; $posisi <$jumlahRawGet ; $posisi++) { 
									# code...
									$data = $func->jumpArray($n,$jumlahRawGet)[$jumlahRaw][$posisi];
									$cekAtr = $func->jumpArray($at,$jumlahRawGet)[$jumlahRaw][$posisi];
									$valBC = $func->jumpArray($n,$jumlahRawGet);

									$bobotBetul = $bbt[$jumlahRaw][$posisi];
									$normalis[] = $func->BC($data,$cekAtr,$valBC,$posisi);
								}
							}
							// Mengkalikan Nilai Kriteria Dengan Hasil Normalisasi
							for ($kali1=0; $kali1<$jumlahRaw+1;$kali1++){
								for($kali2=0;$kali2<$jumlahRawGet;$kali2++){

									//kali = bobot * normalisasi
									$kali[] = $func->jumpArray($bt,$jumlahRawGet)[$kali1][$kali2]*$func->jumpArray($normalis,$jumlahRawGet)[$kali1][$kali2];
								}
								$ranked[] = round(array_sum($func->jumpArray($kali,$jumlahRawGet)[$kali1]));
							}

							function sortChampion($a,$b,$c){
								for ($d=0; $d <$c+1 ; $d++) { 
									# code...
									$out[] = array('poin' => $a[$d], 'nama' => $b[$d]);

								}
								return $out;
							}

							/*
							set the Champion rows
							array namanya = ( [0] => Andre [1] => Jerio [2] => Korneles ) 
							array ranked = ( [0] => 71.3925 [1] => 100 [2] => 61.9025 ) 
							jumlah raw = 2
							*/
							$sortChmp = sortChampion($ranked, $namanya, $jumlahRaw);
							// End Of Set

							foreach ($getOutNya as $key => $row) {
								$poin[$key]  = $row['poin'];
							    $nick[$key] = $row['nama'];
							}
							$poin  = array_column($sortChmp, 'poin');
							$nick = array_column($sortChmp, 'nama');
							array_multisort($poin, SORT_DESC, $nick, SORT_ASC, $sortChmp);

							/*print_r($poin);
							print_r($nick);

							echo "<br>";
							print_r(sortChampion($rank, $namanya, $jumlahRaw));*/
							
							$ch=0;
							for ($rra=0; $rra <($jumlahRaw+1) ; $rra++) { 
								# code...
								$dataSort[] = $rank[$rra]+","+$namanya[$rra];
							?>
							<tr>
								<td style="text-align: center;"><?php echo $ch+=1; ?></td>
								<td style="color: #dd2929;" class="col-sm-1">
									<h4 style="text-align: center;">
										<?php 
										//echo $rank[$rra];
										echo $poin[$rra]; ?>
									</h4>
								</td>
								<td class="col-sm-10" style="text-align: center;">
									<?php 
									//echo $namanya[$rra];
									echo $nick[$rra]; ?>
								</td>
							</tr>
							<?php
							}
							
							?>
						</tbody>
					</table>
				</div>
			</div>

			<?php 
			if ($_SESSION['user_login'] == 1) {
				# code...
				echo "Session Running";
			}else {
				echo "Login <a href=?is=".URL_(10).">Hare</a>!!";
			}
			echo "<br><br>";
			echo "<br>";
			?>

		</div>
	</div>
</div>