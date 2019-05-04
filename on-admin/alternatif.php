<?php require_once 'body/header.php'; ?>
<?php 
$dataSource = new DataArray;
$func = new MyFunction;
?>

<div class="margin_box">
	<div class="smooth-box box-body" style="width: 90%;">
		<div class="box-margin">

			<div id="content">
			<!-- Page title -->
				<div class="page-title" style="background-color: #166040;">
					<h5><i class="fa fa-desktop"></i> Biodata</h5>
				</div>
				<!-- /page title -->

				<!-- Hover rows datatable inside panel -->
				<div class="panel panel-default">
					<div class="panel-heading" align="right">
						<a href="alt_add.php">
							<input type="submit" value="isi formulir" class="btn btn-info">
						</a>
					</div>
					<div class="datatable">
						<table class="table table-hover">
							<thead>
								<tr>
									<th scope="col">#</th>
						            <th scope="col">Nama Pendaftar</th>
						            <?php
			                        $result = mysql_query("SELECT nama_kriteria FROM kriteria");
			                        while ($ambil = mysql_fetch_array($result)) {
			                            # code...
			                        	echo "<th scope='col' style='text-align: center;'>".$ambil['nama_kriteria']."</th>";
			                        }
			                        ?>
						            <th scope="col">Action</th>
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
										$ad = mysql_query("SELECT nama_sub_krt FROM sub_kriteria WHERE kode_sub_krt='$b'");
				                        while ($getView = mysql_fetch_array($ad)) {
				                            # code...
				                        	echo "<td style='text-align: center;'>".$getView['nama_sub_krt']."</td>";
				                        }
									}
									?>
									<td>
				                     <!--  <a href="#"><i class='fa fa-edit'></i></a>  -->
				                      <a href="alt_deleted.php?hps_alt=<?php echo base64_encode($a['kode_alt']); ?>">
				                      	<i class='fa fa-eraser'></i>
				                      </a>
				                    </td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
				<h4>Keterangan :</h4>
				<p>Data bersifat ranked (), yang artinya data tidak boleh berubah sawaktu waktu ada keinginan untuk merubah data tersebut..</p>
			</div>
			
		</div>
	</div>
</div>


<?php require_once 'body/footer.php'; ?>