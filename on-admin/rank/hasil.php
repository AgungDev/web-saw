<br>
<!-- Table 3 -->
<div id="content">
	<div class="page-title" style="background-color: #872C2C;">
		<h5><i class="fa fa-desktop"></i> Hasil Akhir</h5>
	</div>
	<div class="datatable">
		<table class="table table-hover" name="mytable" id="mytable">
			<thead>
				<tr>
		            <?php
                    ?>
                    <th scope="col" style="text-align: center;">POIN</th>
                    <th scope="col" style="text-align: center;">Nama Pendaftar</th>
				</tr>
			</thead>
			<!-- Body Table -->
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
				$bbt = $func->jumpArray($bt,$jumlahRawGet);
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

					//loop ke dua
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
				}
							?>
			<tbody id="table1">
				<?php 
				/*print_r($rank);
				echo "<br>";
				print_r($namanya);
				echo "<br>";*/
				for ($rra=0; $rra <($jumlahRaw+1) ; $rra++) { 
					# code...
					$ranked = array_sum($func->jumpArray($kali,$jumlahRawGet)[$rra]);
				?>
				<tr>
					<td style="color: #dd2929;" class="col-sm-1">
						<h4 style="text-align: center;">
							<?php echo $ranked; ?>
						</h4>
					</td>
					<td class="col-sm-10" style="text-align: center;">
						<?php echo $namanya[$rra]; ?>
					</td>
				</tr>
				<?php
				}
				?>

				<?php
				//Lihat Contoh
				/*echo "<br>Nilai Bobot<br>";
				for ($mmm=0; $mmm <3 ; $mmm++) { 
					# code...
					print_r($func->jumpArray($bt,$jumlahRawGet)[$mmm]);
					echo "<br>";
				}
				echo "<br>";

				echo "<br>Nilai Normalis<br>";
				for ($mmm=0; $mmm <3 ; $mmm++) { 
					# code...
					print_r($func->jumpArray($normalis,$jumlahRawGet)[$mmm]);
					echo "<br>";
				}
				echo "<br>";

				echo "<br>Operasi Perkalian<br>";
				for ($mmm=0; $mmm <3 ; $mmm++) { 
					# code...
					print_r($func->jumpArray($kali,$jumlahRawGet)[$mmm]);
					echo "<br>";
				}

				echo '<br>Jumlah Raw Data Get : '.$jumlahRawGet;
				echo '<br>Jumlah Raw Data :'.$jumlahRaw;
				echo "<br>";

				echo "Perkalian : ".(10*0.9333);
				echo "<br>";

				
				echo "Hasil Akhir ";
				echo (10*0.9333)+(25*0.2353)+(25*1)+(30*0.7059)+(10*1);*/
				 ?>
			</tbody>
		</table>
		<h4>Keterangan :</h4>
		<p>Hasil perhitungan dari setiap poin data inputan!!.</p>
		Check urutan data peringkatnya <a href="../">di sini</a>
	</div>
</div>
<script>

</script>