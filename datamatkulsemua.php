<?php
    require_once 'koneksi.php';

    //string untuk isi query
    $sql = 'SELECT * FROM tmatakuliah ORDER BY KdMataKuliah ASC';

    //RUN QUERY
    $r = mysqli_query($conn, $sql);

    //array untuk simpan $row / baris hasil run query
    $result = array();

    //simpan ke array
    while($row = mysqli_fetch_array($r)){
        array_push($result, array(
            "kode"=>$row['KdMataKuliah'],
            "matkul"=>$row['MataKuliah']
        ));
    }
    //ubah ke JSON
    echo json_encode($result);
    //tutup koneksi
    mysqli_close($conn);

?>