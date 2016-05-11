<?php 

// $word = 'в';

// $word = str_repeat($word, 2);
// echo mb_strlen($word, 'UTF-8');

// // $word = wordPrepare($word);

// // echo $word;
// die();

//-----------------------------------------------------------------

$word = '';

if(isset($_POST['word'])){
  $word = $_POST['word'];
  $word = wordPrepare($word);
}

$result = getResultWords($word);

$array = json_decode($result);

$array = array_unique($array);
$array = array_values($array);

echo json_encode($array);

//-----------------------------------------------------------------

function wordPrepare($word){
  $result = '';
  $vowels = ['а', 'о', 'э', 'и', 'у', 'ы', 'е', 'ё', 'ю', 'я'];
  $last_char = mb_substr($word, -1, NULL, 'UTF-8');

  if( mb_strlen($word, 'UTF-8')===1 && !in_array($word, $vowels) ) {
    $result = str_repeat($word, 2);
  }else if( !in_array($last_char, $vowels) ) {
    $result = $word . 'а';
  }else{
    $result = $word;
  }
  return $result;
}

function getResultWords($word){
  $ch = curl_init('http://localhost:8010/cgi-bin/scloniator.py');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, 'word='.$word);
  $result = curl_exec($ch);
  curl_close($ch);
  return $result;
}