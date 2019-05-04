<br>
<!-- Table 1 -->
<div id="content">
	<div class="page-title" style="background-color: #166040;">
		<h5><i class="fa fa-desktop"></i> Alternativ</h5>
	</div>
	<div class="datatable">
		<table class="table table-hover">
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
			<tbody>
				<?php
                  $nomor = 0;
                  $r = mysql_query("SELECT * FROM alternatif");
                  while ($a = mysql_fetch_array($r)) {
                    # code...
                ?>
				<tr>
					<td><?php echo $nomor=$nomor+1;?></td>
					<td><?php echo $a['nama_alt']; ?></td>
					<?php
					$get = $a['get'];
					$getA = json_decode($get); 
					for ($i=0; $i <count($getA) ; $i++) { 
						# code...
						$b = $getA[$i];
						$ad = mysql_query("SELECT nilai_sub_krt FROM sub_kriteria WHERE kode_sub_krt='$b'");
                        while ($getView = mysql_fetch_array($ad)) {
                            # code...
                        	echo "<td style='text-align: center;'>".$getView['nilai_sub_krt']."</td>";
                        }
					}
					?>
				</tr>
				
				<?php } ?>

			</tbody>
		</table>
		<h4>Keterangan :</h4>
		<p>Nilai Dari Masing Masing Data.</p>
	</div>
</div>