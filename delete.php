<?php 
include('database/database.php');
include('database/functions.php');

$id = $_GET['id'];
if(emp_delete($con,$id)):
    redirect('index.php?message=deleted');
endif;