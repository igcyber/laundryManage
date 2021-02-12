<?php
include_once('conn.php');

if(!empty($_GET['id'])){
    $id = $_GET['id'];
    $query = "SELECT * FROM tb_outlet WHERE id = '$id'";


}else{
    $query = "SELECT * FROM tb_outlet";
}

$get = mysqli_query($conn, $query);

$data = array();

if(mysqli_num_rows($get) > 0){

    while($row = mysqli_fetch_assoc($get)){
        $data[] = $row;

    }

    set_response(true,"Data ditemukan", $data);


}else{
    set_response(false,"Data tidak ditemukan", $data);

}

function set_response($isSucces, $message, $data){
    $result = array(
        'isSuccess' => $isSucces,
        'message' => $message,
        'data' => $data
    );
    echo json_encode($result);
}

?>