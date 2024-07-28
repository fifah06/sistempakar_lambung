<!-- proses menampilkan data basis aturan -->
<?php
// mengambil id dari parameter
$iddiagnosa=$_GET['iddiagnosa'];

$sql = "SELECT * FROM diagnosa WHERE iddiagnosa='$iddiagnosa'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!-- tampilan detail basis aturan -->
<div class="row">
    <div class="col-sm-12">
        <form action="" method="POST">
            <div class="card border-dark">
                <div class="card">
                    <div class="card-header text-white border-dark" style="background-color: #14b8b8"><strong>HASIL DIAGNOSA PENYAKIT LAMBUNG</strong></div>
	                <div class="card-body">
                        <div class="form-group">
                            <label for="">Nama Pengguna</label>
                            <input type="text" class="form-control" value="<?php echo $row['nama'] ?>" name="nama" readonly>
   	                    </div>

                        <!-- tabel gejala-gejala -->
                        <label for="">Gejala-Gejala Penyakit Lambung Yang Sudah Dipilih :</label>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th width="40px">No.</th>
                                    <th width="200px">Kode Penyakit</th>
                                    <th width="500px">Nama Penyakit</th>
                                </tr>
                            </thead>
                                <tbody>
                                    <?php
                                        $no=1;
                                        $sql = "SELECT detail_diagnosa.iddiagnosa,detail_diagnosa.idgejala,gejala.kdgejala,gejala.nmgejala
                                                FROM detail_diagnosa INNER JOIN gejala
                                                ON detail_diagnosa.idgejala=gejala.idgejala WHERE iddiagnosa='$iddiagnosa'";
                                        $result = $conn->query($sql);
                                        while($row = $result->fetch_assoc()){
                                    ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $row['kdgejala']; ?></td>
                                            <td><?php echo $row['nmgejala']; ?></td>
                                        </tr>
                                    <?php
                                        }    
                                    ?>
                                </tbody>
                        </table>

                        <!-- hasil diagnosa penyakit -->
                        <label for="">Hasil Diagnosa Penyakit Lambung :</label>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th width="40px">No.</th>
                                    <th width="100px">Kode Penyakit</th>
                                    <th width="200px">Nama Penyakit</th>
                                    <th width="100px">Persentase</th>
                                    <th width="400px">Solusi</th>
                                </tr>
                            </thead>
                                <tbody>
                                    <?php
                                        $no=1;
                                        $sql = "SELECT detail_penyakit.iddiagnosa,detail_penyakit.idpenyakit,penyakit.kdpenyakit,penyakit.nmpenyakit,
                                                        penyakit.solusi,detail_penyakit.persentase
                                                FROM detail_penyakit INNER JOIN penyakit
                                                ON detail_penyakit.idpenyakit=penyakit.idpenyakit WHERE iddiagnosa='$iddiagnosa'
                                                ORDER BY persentase DESC";
                                        $result = $conn->query($sql);
                                        while($row = $result->fetch_assoc()){
                                    ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $row['kdpenyakit']; ?></td>
                                            <td><?php echo $row['nmpenyakit']; ?></td>
                                            <td><?php echo $row['persentase'] . "%"; ?></td>
                                            <td><?php echo $row['solusi']; ?></td>
                                        </tr>
                                    <?php
                                        }
                                        $conn->close(); 
                                    ?>
                                </tbody>
                        </table>
                    </div>
                </div>    
            </div>
        </form>
    </div>
</div>
