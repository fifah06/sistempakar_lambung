<?php
date_default_timezone_set("Asia/Jakarta");

// proses untuk konsultasi
if(isset($_POST['proses'])){

//mengambil data dari form
$nmpengguna=$_POST['nmpengguna'];
$tgl=date("Y/m/d");

//proses simpan diagnosa
$sql = "INSERT INTO diagnosa  VALUES (Null,'$tgl','$nmpengguna')";
mysqli_query($conn,$sql);

// mengambil idgejala
$idgejala=$_POST['idgejala'];
	
// proses mengambil data diagnosa
$sql = "SELECT * FROM diagnosa ORDER BY iddiagnosa DESC";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$iddiagnosa=$row['iddiagnosa'];

//proses simpan detail basis diagnosa
$jumlah = count($idgejala);
$i=0;
while($i < $jumlah){
    $idgejalane=$idgejala[$i];
    $sql = "INSERT INTO detail_diagnosa  VALUES ($iddiagnosa,'$idgejalane')";
    mysqli_query($conn,$sql);
    $i++;
}

// mengambil data dari tabel penyakit untuk di check di basis aturan
$sql = "SELECT*FROM penyakit";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
     
    $idpenyakit = $row['idpenyakit'];
    $jyes=0;

//mencari jumlah gejala di basis aturan berdasarkan penyakit
$sql2 = "SELECT COUNT(idpenyakit) AS jml_gejala
        FROM basis_aturan INNER JOIN detail_basis_aturan
        ON basis_aturan.idaturan=detail_basis_aturan.idaturan
        WHERE idpenyakit='$idpenyakit'";
$result2 = $conn->query($sql2);
$row2 = $result2->fetch_assoc();
$jml_gejala=$row2['jml_gejala'];

//mencari gejala pada basis aturan
$sql3 = "SELECT idpenyakit, idgejala
        FROM basis_aturan INNER JOIN detail_basis_aturan
        ON basis_aturan.idaturan=detail_basis_aturan.idaturan
        WHERE idpenyakit='$idpenyakit'";
$result3 = $conn->query($sql3);
while($row3 = $result3->fetch_assoc()) {

    $idgejalae=$row3['idgejala'];

//membandingkan apakah yang dipilih pada diagnosa sesuai
$sql4 = "SELECT idgejala FROM detail_diagnosa 
        WHERE iddiagnosa='$iddiagnosa' AND idgejala='$idgejalae'";
$result4 = $conn->query($sql4);
    if ($result4->num_rows > 0) {
        $jyes+=1;
    }
}
//mencari persentase
if($jml_gejala>0){
    $peluang = round(($jyes/$jml_gejala)*100,2);
}else{
    $peluang = 0;
    }

//simpan data detail penyakit
if($peluang>0){
    $sql = "INSERT INTO detail_penyakit  VALUES ($iddiagnosa,'$idpenyakit','$peluang')";
    mysqli_query($conn,$sql);
}
header("Location:?page=diagnosa&action=hasil&iddiagnosa=$iddiagnosa");
}
}
?>


<!-- letakkan proses tambah data disini -->
<div class="row">
    <div class="col-sm-12">
        <form action="" method="POST"  name="Form" onsubmit="return validasiForm()">
            <div class="card border-dark">
                <div class="card">
                    <div class="card-header text-white border-dark" style="background-color: #14b8b8"><strong>Diagnosa Gejala Penyakit</strong></div>
	                <div class="card-body">
	                    <div class="form-group">
                            <label for="">Nama Pengguna</label>
                            <input type="text" class="form-control" name="nmpengguna" maxlength="50" required>
                        </div>

                            <!-- tabel data gejala -->
                            <div class="form-group">
                                <label for="">Pilih gejala-gejala Berikut :</label>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr align="center">
                                            <th width="100px"></th>
                                            <th width="100px" >No.</th>
                                            <th width="200px" >Kode Gejala</th>
                                            <th width="700px" >Nama Gejala</th>
                                        </tr>
                                    </thead>
                            <tbody>
                                <?php
                                    $no=1;
                                    $sql = "SELECT*FROM gejala";
                                    $result = $conn->query($sql);
                                    while($row = $result->fetch_assoc()) {
                                ?>
                                    <tr align="center">
                                        <td><input type="checkbox" class="check-item" name="<?php echo 'idgejala[]'; ?>" value="<?php echo $row['idgejala']; ?>"></td>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $row['kdgejala']; ?></td>
                                        <td><?php echo $row['nmgejala']; ?></td>
                                    </tr>
                                <?php
                                    }
                                    $conn->close();
                                ?>
                            </tbody>
                                </table>
                            </div>
                                <input class="btn btn-primary" type="submit" name="proses" value="Proses">
                    </div>
                </div>
           </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    function validasiForm()
    {
        // validasi gejala yang belum dipilih
        var checkbox=document.getElementsByName('<?php echo 'idgejala[]'; ?>');

        var isChecked=false;

        for(var i=0;i<checkbox.length;i++){
            if(checkbox[i].checked){
                isChecked = true;
                break;
            }
        }

        // jika belum ada yand di check
        if(!isChecked){
            alert('Pilih Setidaknya Satu Gejala !!');
            return false;
        }

        return true;
    }

</script>