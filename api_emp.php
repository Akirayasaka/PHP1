<?php
    include_once "base.php";

    if(!empty($_GET['do'])){
        $do=$_GET['do'];
    }else{
        $do="";
    }
    switch($do){
        case "newemp":
            $sql="insert into employee (
                `姓名`,
                `現任職稱`,
                `部門代號`,
                `縣市`,
                `地址`,
                `電話`,
                `郵遞區號`,
                `目前月薪資`,
                `年假天數`
                )
         values(
                '".$_POST['name']."',
                '".$_POST['title']."',
                '".$_POST['deptcode']."',
                '".$_POST['country']."',
                '".$_POST['addr']."',
                '".$_POST['phone']."',
                '".$_POST['postcode']."',
                '".$_POST['salary']."',
                '".$_POST['holiday']."'
                )";
        echo $sql;                                
        $pdo->exec($sql);
        jsm("index.php?do=admin&ad=emp");
        break;
        case "editemp":
        $sql="update employee set
        `姓名`='".$_POST['name']."',
        `現任職稱`='".$_POST['title']."',
        `部門代號`='".$_POST['deptcode']."',
        `縣市`='".$_POST['country']."',
        `地址`='".$_POST['addr']."',
        `電話`='".$_POST['phone']."',
        `郵遞區號`='".$_POST['postcode']."',
        `目前月薪資`='".$_POST['salary']."',
        `年假天數`='".$_POST['holiday']."'
     where
       id='".$_POST['id']."'";
        echo $sql;                           
        $pdo->exec($sql);
        jsm("index.php?do=admin&ad=emp");
        break;
        default:
        jsm("index.php");
        exit();
    }
?>