<?php
  $pdo=new PDO("mysql:host=localhost;charset=utf8;dbname=pra02","root","");
  
  session_start();

  function jsm($url){
      exit('<script Language="JavaScript"><!--
      location.replace("'.$url.'");
      // --></script>');
  }
    
  $errMsg=[
      1=>"Do not blank the field.",
      2=>"The length of field should be between 4-12.",
      3=>"The fields are all numbers,contain at least one English letter.",
      4=>"The fields are all English letters,contain at least one number.",
      5=>"Do not use symbols in the field."
    ];
function chkform($array,$str){
  global $errMsg;
  $err="";
  foreach($array as $a){
    switch($a){
      case "space":
        if(chkSpace($str)){
          $err.=$errMsg[1];
        }
      break;
      case "length":
      if(!chkLength($str)){
        $err.=$errMsg[2];
      }
      break;
      case "num":
      if(chkNum($str)){
        $err.=$errMsg[3];
      }
      break;
      case "eng":
      if(chkEng($str)){
        $err.=$errMsg[4];
      }
      break;
      case "sym":
      if(chkSym($str)){
        $err.=$errMsg[5];
      }
      break;
    }
  }
  return $err;
}


function find($table,$id){
  global $pdo;
  $sql="select * from $table where id='$id'";
  $rows=$pdo->query($sql)->fetch();
  return $rows;
}

function all($table){
  global $pdo;
  $sql="select * from $table";
  $rows=$pdo->query($sql)->fetchAll();
  return $rows;
}

function update($array){
  global $pdo;
  foreach($array['set'] as $key => $value){

    $s[]=sprintf("%s='%s'",$key,$value);

  }
  
  foreach($array['where'] as $key => $value){

    $w[]=sprintf("%s='%s'",$key,$value);

  }
    
  $sql="update ".$array['table']." set ".implode(',',$s)." where ".implode(" && ",$w)."";
  $result=$pdo->exec($sql); 
  return $result;
}

function chkSpace($str){
  if($str==""){
    return true;
  }
}

function chkLength($str){
  $min=4;
  $max=12;
  if(strlen($str) >= $min && strlen($str) <= $max){
    return true;
  }
}

  function chkNum($str){
    $chkNum=0;
    for($i=0;$i<strlen($str);$i++){
  
      $part=substr($str,$i,1);  
      if(ord($part) >= 48 && ord($part) <= 57){
        $chkNum++;
      }
    }
    if($chkNum==strlen($str)){
      return true;
    }

  }

  function chkEng($str){
    $chkEng=0;
    for($i=0;$i<strlen($str);$i++){
  
      $part=substr($str,$i,1); 
      if((ord( $part) >= 65 && ord( $part) <= 90) || (ord( $part) >= 97 && ord($part) <= 122) ){
        $chkEng++;
      }
    }
    if($chkEng==strlen($str)){
      return true;
    }
  }

  function chkSym($str){
    $chkSym=0;
    for($i=0;$i<strlen($str);$i++){
  
      $part=substr($str,$i,1);
      if(!(ord($part) >= 65 && ord($part) <= 90) && !(ord($part) >= 97 && ord($part) <= 122) && !(ord($part) >= 48 && ord($part) <= 57) ){
        $chkSym++;
      }
    }
    if($chkSym>0){
      return true;
    }
  }
  
?>