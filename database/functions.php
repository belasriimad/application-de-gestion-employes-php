<?php
include_once('database.php');

function emp_insert($con,$values = array()){
    $params = "'".implode("','",$values)."'";
    $query = "INSERT INTO employes VALUES (' ',".$params.")";
    if(mysqli_query($con,$query)){
        return true;
    }else{
        return false;
    }
}
function emp_get($con){
    $query = "SELECT * FROM employes";
    $result = mysqli_query($con,$query);
    if($result != null){
        return $result;
    }else{
        return false;
    }
}
function redirect($page){
    header('location:'.$page);
}
function get_emp_by_id($con,$id)
{
    $query = "SELECT * FROM employes WHERE id = '$id'";
    $result = mysqli_query($con,$query);
    if($result != null){
        return $result;
    }else{
        return false;
    }
}
function emp_update($con,$id,$values = array()){
    $values = implode(", ",$values);
    $values = explode(", ",$values);
    $query = "UPDATE employes SET nom = '$values[0]',prenom = '$values[1]',age = '$values[2]',service = '$values[3]',
                matricule = '$values[4]' WHERE id = '$id'";
    if(mysqli_query($con,$query)){
        return true;
    }else{
        return false;
    }
}
function emp_delete($con,$id){
    $query = "DELETE FROM employes WHERE id = '$id'";
    if(mysqli_query($con,$query)){
        return true;
    }else{
        return false;
    }
}