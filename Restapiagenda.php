<?php
require '../controller/koneksi.php';
if(function_exists($_GET['function'])){
    $_GET['function']();
}

function get_agenda(){
    global $koneksi;
    $query = $koneksi->query("SELECT * FROM agenda");
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

function add_agenda(){
    global $koneksi;
    $check = array('id'=>'', 'idbukutamu'=>'','notulen'=>'','notulensi'=>'','file'=>'');
    $match = count(array_intersect_key($_POST, $check));
    if($match == count($check)){
        $result = mysqli_query($koneksi, "INSERT INTO agenda SET 
        id='$_POST[id]',
        idbukutamu='$_POST[idbukutamu]',
        notulen='$_POST[notulen]',
        notulensi='$_POST[notulensi]',
        file='$_POST[file]'");
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

function update_agenda(){
    global $koneksi;
    if(!empty($_GET["id"])){
        $id = $_GET["id"];
    }
    $query = $koneksi->query("SELECT*FROM agenda");
    $check = array('id'=>'', 'idbukutamu'=>'','notulen'=>'','notulensi'=>'','file'=>'');
    $match = count(array_intersect_key($_POST, $check));
    if($match == count($check)){
        $result = mysqli_query($koneksi, "UPDATE  agenda SET 
         id='$_POST[id]',
        idbukutamu='$_POST[idbukutamu]',
        notulen='$_POST[notulen]',
        notulensi='$_POST[notulensi]',
        file='$_POST[file]'');
        WHERE idagenda=$id");
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

function delete_agenda(){
    global $koneksi;
    $id = $_GET['id'];
    $query = "DELETE FROM agenda  WHERE idagenda =".$id;
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