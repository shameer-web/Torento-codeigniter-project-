<!DOCTYPE html>
<html lang="en" >
<!-- begin::Head -->
<head>
    <meta charset="utf-8" />
    <title> Toronto | Admin</title>
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--begin::Web font -->
    <?php include "includes/inc_start.php";?>
    <!--    Include Page-->
    <?php $this->view( $user_directory.$directory."/".$page_name);?>


    <?php $this->view("includes/inc_page_end");?>
