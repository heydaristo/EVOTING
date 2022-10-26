<?php
if(!isset($_SESSION['id_admin'])) {
   header('location: ../');
}

if(isset($_POST['add_user'])) {

   $nis  = $_POST['nis'];
   $nama = $_POST['nama'];
   $jk   = $_POST['jk'];
   $kls  = $_POST['kelas'];
   //cek nis
   $get_id = $con->prepare("SELECT * FROM t_user WHERE id_user = ?");
   $get_id->bind_param('s', $nis);
   $get_id->execute();
   $get_id->store_result();
   $numb = $get_id->num_rows();
   //validasi
   if($nis == '' || $nama == '' || $jk == '' || $kls == '') {

      echo '<script type="text/javascript">alert("Semua form harus terisi");</script>';

   } else if(!preg_match("/^[a-zA-z \'.]*$/",$nama)) {

      echo '<script type="text/javascript">alert("Nama hanya boleh mengandung huruf, titik(.), petik tunggal");</script>';

   } else if($numb > 0){

      echo '<script type="text/javascript">alert("Nis tidak dapat digunakan");window.history.go(-1);</script>';

   } else {

      $sql = $con->prepare("INSERT INTO t_user(id_user, fullname, id_kelas, jk) VALUES(?, ?, ?, ?)");
      $sql->bind_param('ssss', $nis, $nama, $kls, $jk);
      $sql->execute();

      header('location: ?page=user');

   }

}
?>
<h3>Tambah Data Siswa</h3>
<hr />
<div class="row">
   <div class="medium-6">
      <form action="" method="post">
         <div>
            <label>NIS</label>
            <input class="wide text input" type="number" name="nis" placeholder="NIS" type="number"/>
         </div>
         <div>
            <label>Nama Siswa</label>
            <input class="wide password input" name="nama" type="text" placeholder="Nama Siswa"/>
         </div>
         <div>
            <label class="inline" for="text2">Jenis Kelamin</label>

            <input type="radio" name="jk" value="L" id="L"><label for="L">Laki - laki</label>

            <input type="radio" name="jk" value="P" id="P"><label for="P">Perempuan</label>
         </div>
         <div>
            <label>Kelas</label>
            <select name="kelas" required="kelas">
               <option value="#">-- Pilih Kelas --</option>
               <?php
                  $kelas = mysqli_query($con, "SELECT * FROM t_kelas");
                  while ($key = mysqli_fetch_array($kelas)) {
                  ?>
                     <option value="<?php echo $key['id_kelas']; ?>">
                        <?php echo $key['nama_kelas']; ?>
                     </option>
                     <?php
                  }
               ?>
            </select>
         </div>
         <input type="submit" name="add_user" value="Tambah User" class="button"/>
         <button onclick="window.history.go(-1)" class="button alert">Kembali</button>
      </form>
   </div>
</div>
