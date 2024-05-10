<?php 
$nilai = 80;
if ($nilai >= 80  and $nilai < 100) {
    echo 'nilai anda' . $nilai  . ' dan anda lulus';
} else if($nilai >= 90) {
    echo 'nilai anda' . $nilai . 'dan anda lulus!';
} else {
    echo 'nilai anda' . $nilai . 'dan anda tidak lulus';
}
 ?>