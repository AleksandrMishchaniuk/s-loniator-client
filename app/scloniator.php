<?php 

//-----------------------------------------------------------------

$words_res = [];

if(isset($_POST['words'])){
  $words_str = $_POST['words'];

  $words_arr = preg_split('~[\s_\W]+~u', $words_str);
  
  if( $words_arr[count($words_arr)-1] === '' ){
    array_pop($words_arr);
  }
  if( $words_arr[0] === '' ){
    array_shift($words_arr);
  }

  foreach($words_arr as $word){
    $words_res[] = wordPrepare($word);
  }
}

$words_str = json_encode($words_res);

$result = getResultWords($words_str);

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


function getResultWords($words_str){
  $ch = curl_init('http://localhost:8010/cgi-bin/scloniator.py');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, 'word='.$words_str);
  $result = curl_exec($ch);
  curl_close($ch);
  return $result;
}