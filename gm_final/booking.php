<?php
$class=$_POST['class'];
echo "$class";
$seq_no=$_POST['seq_no'];
$from=$_COOKIE['from'];
$to=$_COOKIE['to'];
$d_date=$_COOKIE['d_date'];
$nop=$_COOKIE['nop'];

echo $from."  ".$to."  ".$d_date."  ".$nop." ".$seq_no;
?>