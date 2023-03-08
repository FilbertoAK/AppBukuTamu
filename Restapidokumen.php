<?php
require '../controller/koneksi.php';
if(function_exists($_GET['function'])){
    $_GET['function']();
}

function get_dokumen(){
    global $koneksi;
    $query = $koneksi->query("SELECT * FROM dokumen");
    while($row=mysqli_fetch_object($query)){
        $data[] = $row;
    };
    $respons = array(
        'status'=>1,
        'message'=>'Success',
        'data'=>$data
    );
    header('Content-Type:application/json');
    echo json_encode($respons);
}

function add_dokumen(){
    global $koneksi;
    $check = array('id'=>'', 'idtamubuku'=>'','namafile'=>'','keteraganstatus'=>'','status'=>'');
    $match = count(array_intersect_key($_POST, $check));
    if($match == count($check)){
        $result = mysqli_query($koneksi, "INSERT INTO dokumen SET 
        iddokumen='$_POST[iddokumen]',
        idbukutamu='$_POST[idbukutamu]',
        namafile='$_POST[namafile]',
        keteragan='$_POST[keteragan]',
        status='$_POST[status]'");
        if($result){
            $respons=array(
                'status'=>1,
                'message'=>'Insert Success'
            );
        //header('location: view_kategoribuku.php');
        }else{
            $respons=array(
                'status'=>0,
                'message'=>'Insert Failed'
            );
        }
    }else{
        $respons=array(
            'status'=>0,
            'message'=>'Wrong Parameter'
        );
    }
    header('Content-Type:application/json');
    echo json_encode($respons);
}

function update_dokumen(){
    global $koneksi;
    if(!empty($_GET["iddokumen"])){
        $id= $_GET["iddokumen"];
    }
    $query = $koneksi->query("SELECT*FROM dokumen");
    $check = array('id'=>'', 'idtamubuku'=>'','namafile'=>'','keteragan'=>'','status'=>'');
    $match = count(array_intersect_key($_POST, $check));
    if($match == count($check)){
        $result = mysqli_query($koneksi, "UPDATE  dokumen SET 
         iddokumen='$_POST[iddokumen]',
        idtamubuku='$_POST[idtamubuku]',
        namafile='$_POST[namafile]',
        keteragan='$_POST[keteragan]',
        status='$_POST[status]'
        WHERE iddokumen=$id");
        if($result){
            $respons=array(
                'status'=>1,
                'message'=>'Update Success',
            );
        }else{
            $respons=array(
                'status'=>0,
                'message'=>'Update Failed'
            );
        }
    }else{
        $respons=array(
            'status'=>0,
            'message'=>'Wrong Parameter'
        );
    }
    header('Content-Type:application/json');
    echo json_encode($respons);
}

function delete_dokumen(){
    global $koneksi;
    $id = $_GET['id'];
    $query = "DELETE FROM dokumen WHERE iddokumen =".$id;
    if(mysqli_query($koneksi,$query)){
        $respons=array(
            'status'=>1,
            'message'=>'Delete Success'
        );
    }else{
        $respons=array(
            'status'=>0,
            'message'=>'Delete Failed'
        );
    }
    header('Content-Type:application/json');
    echo json_encode($respons);
}

?>