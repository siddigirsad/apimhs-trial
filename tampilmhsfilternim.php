<?php
    require_once 'koneksi.php';
    if(!$conn){
		die("KONEKSI GAGAL: ".mysqli_connect_error());

	} else {
		//echo("KONEKSI SUKSES");
	}

    //FILTER DATA MHS PER NIM (id)
    $id = $_GET['id'];

    //string untuk query
    $sql = "SELECT * FROM tmahasiswa 
            WHERE NIM = $id
            ORDER BY nim ASC";

    //JALANKAN QUERY
    $r = mysqli_query($conn,$sql);

    //SIMPAN KE ARRAY
    $result = array();

    while($row = mysqli_fetch_array($r)){
        array_push($result, array(
            "nim"=>$row['NIM'],
            "nama"=>$row['NamaLengkap'],
            "kota"=>$row['KotaAsal'],
            "kelas"=>$row['KELAS']
        ));
    }
    echo json_encode($result);
    mysqli_close($conn);
?>