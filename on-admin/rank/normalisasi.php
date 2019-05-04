<br>
<!-- Table 2 -->
<div id="content">
	<div class="page-title" style="background-color: #2F555D;">
		<h5><i class="fa fa-desktop"></i> Normalisasi</h5>
	</div>
	<div class="datatable">
		<table class="table table-hover">
			<!-- Header Table -->
			<thead>
				<tr>
					<th scope="col">#</th>
		            <th scope="col">Nama Pendaftar</th>
		            <?php
		            $no = 0;
                    $result = mysql_query("SELECT bobot,atribut FROM kriteria");
                    while ($ambil = mysql_fetch_array($result)) {
                        # code...
                    	echo "<th scope='col' style='text-align: center;'>C".
                    	($no=$no+1)."</th>";
                    }
                    ?>
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
                        	$ac = mysql_query("SELECT atribut FROM kriteria WHERE kode_krt='$kode_krt'");
                        	while ($ambilAtribut = mysql_fetch_array($ac)) {
                        		# code...
                        		$at[] = $ambilAtribut['atribut'];
                        		//echo $ambilAtribut['atribut'].',';
                        	}
                        	$n[] = $nilai_sub_krt;
                        	//echo $nilai_sub_krt."[".$kode_krt."],";
                        }
					}
					//End Convert And Split Value By Array;
				}
				?>
				<?php  
				/*echo "<br><br>";
				for ($mmm=0; $mmm <3 ; $mmm++) { 
					# code...
					print_r($func->jumpArray($at,$jumlahRawGet)[$mmm]);
					echo "<br>";
				}
				
				echo "<br>";
				for ($mmm=0; $mmm <3 ; $mmm++) { 
					# code...
					print_r($func->jumpArray($n,$jumlahRawGet)[$mmm]);
					echo "<br>";
				}

				echo "<br>";
				for ($mmm=0; $mmm <3 ; $mmm++) { 
					# code...
					print_r(max($func->jumpArray($n,$jumlahRawGet)));
					echo "<br>";
				}
				echo '<br>Jumlah Raw Data Get : '.$jumlahRawGet;
				echo "<br>";*/
				 ?>
			<tbody>
				<?php
				$nomor=0;
				$read = mysql_query("SELECT * FROM alternatif");
                while ($append = mysql_fetch_array($read)) {
                    # Append Array And Search Max Value By Raw...
                    $ss[] = $a['kode_alt'];
					$jumlahRaw = count($ss);
					$jumlahRaw = $jumlahRaw-1;
					//echo $jumlahRaw;
				?>
				<tr>
					<td><?php echo $nomor=$nomor+1;?></td>
					<td><?php echo $append['nama_alt']; ?></td>
					<?php 
					for ($i=0; $i <$jumlahRawGet ; $i++) { 
						# Loop 0,1,2,3,4 = $i...
						$data = $func->jumpArray($n,$jumlahRawGet)[$jumlahRaw][$i];
						$cekAtr = $func->jumpArray($at,$jumlahRawGet)[$jumlahRaw][$i];
						$valBC = $func->jumpArray($n,$jumlahRawGet);
						$normalis = $func->BC($data,$cekAtr,$valBC,$i);
						//echo "<td style='text-align: center;'>".$data."[".$cekAtr."][".max($valBC)[$i]."]</td>";
						echo "<td style='text-align: center;'>".$normalis."</td>";
					}
					?>
				</tr>
				<?php }

				 ?>
			</tbody>
		</table>
		<h4>Keterangan :</h4>
		<p>perhitungan nilai, di tentukan dari dua metode perhitungan (benefit atau cost).</p>
	</div>
</div>