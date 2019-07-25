<?php
    include_once "base.php";

    if(!empty($_GET['do'])){
        $do=$_GET['do'];
    }else{
        $do="";
    }

    switch($do){
        case "newclient":
        $sql="insert into customer (
            `客戶寶號`,
            `客戶代號`,
            `縣市`,
            `地址`,
            `郵遞區號`,
            `聯絡人`,
            `職稱`,
            `電話`,
            `行業別`,
            `統一編號`
            )
        values(
            '".$_POST['name']."',
            '".$_POST['code']."',
            '".$_POST['country']."',
            '".$_POST['addr']."',
            '".$_POST['postcode']."',
            '".$_POST['contact']."',
            '".$_POST['title']."',
            '".$_POST['phone']."',
            '".$_POST['ind']."',
            '".$_POST['gui']."'
            )";
        echo $sql;                                
        $pdo->exec($sql);
        jsm("index.php?do=admin&ad=client");
        break;

        case "editclient":
        $sql="update customer set
         `客戶寶號`='".$_POST['name']."',
          `客戶代號`='".$_POST['code']."',
          `縣市`='".$_POST['country']."',
          `地址`='".$_POST['addr']."',
           `郵遞區號`='".$_POST['postcode']."',
          `聯絡人`='".$_POST['contact']."',
          `職稱`='".$_POST['title']."',
           `電話`='".$_POST['phone']."',
          `行業別`='".$_POST['ind']."',
          `統一編號`='".$_POST['gui']."'
            where
           id='".$_POST['id']."'";
            echo $sql;                           
            $pdo->exec($sql);
            jsm("index.php?do=admin&ad=client");
            break;
            default:
            jsm("index.php");
            exit();
        
    }
?>