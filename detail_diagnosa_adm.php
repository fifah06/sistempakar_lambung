<!-- proses menampilkan data hasil diagnosa -->
<?php 
// mengambil id dari parameter
$iddiagnosa=$_GET['id'];

$sql = "SELECT * FROM diagnosa WHERE iddiagnosa='$iddiagnosa'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>
<!-- tampilan halaman hasil diagnosa -->
<div class="row">
    <div class="col-sm-12">
        <form action="" method="POST">
            <div class="card border-dark">
                <div class="card">
                <div class="card-header text-white border-dark" style="background-color: #14b8b8"><strong>Hasil Diagnosa</strong></div>
                    <div class="card-body">

                        <div class="form-group">
                            <label for="">Nama Pasien</label>
                            <input type="text" class="form-control" value="<?php echo $row['nama'] ?>" name="nama" readonly>
                        </div>

                        <!-- tabel gejala-gejala -->
                         <label for="">Gejala-Gejala Penyakit Yang Dipilih :</label>
                        <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th width="40px">No.</th>
                            <th width="700px">Nama Gejala</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $no=1;
                            $sql = "SELECT detail_diagnosa.iddiagnosa,detail_diagnosa.idgejala,gejala.nmgejala
                                    FROM detail_diagnosa INNER JOIN gejala
                                    ON detail_diagnosa.idgejala=gejala.idgejala WHERE iddiagnosa='$iddiagnosa'";
                            $result = $conn->query($sql);
                            while($row = $result->fetch_assoc()) {
                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $row['nmgejala']; ?></td>  
                            </tr>                            
                        <?php
                            }
                        ?>                        
                        </tbody>
                        </table>

                        <!-- hasil diagnosa penyakitnya -->
                        <label for="">Hasil Diagnosa Penyakit :</label>
                        <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th width="40px">No.</th>
                            <th width="150px">Nama Gejala</th>
                            <th width="100px">Persentase</th>
                            <th width="700px">Solusi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $no=1;
                            $sql = "SELECT detail_penyakit.iddiagnosa,detail_penyakit.idpenyakit,penyakit.nmpenyakit,
                                            penyakit.solusi,detail_penyakit.persentase
                                    FROM detail_penyakit INNER JOIN penyakit
                                    ON detail_penyakit.idpenyakit=penyakit.idpenyakit WHERE iddiagnosa='$iddiagnosa'
                                    ORDER BY persentase DESC";
                            $result = $conn->query($sql);
                            while($row = $result->fetch_assoc()) {
                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $row['nmpenyakit']; ?></td>  
                                <td><?php echo $row['persentase']. "%"; ?></td> 
                                <td><?php echo $row['solusi']; ?></td> 
                            </tr>                            
                        <?php
                            }
                            $conn->close();
                        ?>                        
                        </tbody>
                        </table>
                        <a class="btn btn-danger" href="?page=diagnosa_adm">Kembali</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

