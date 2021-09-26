<?php 

echo 'Chuoi 1 la Hieu <br>';
echo 'Chuoi 2 la hieu <br>';

if (strcmp('Hieu', 'Hieu') == 0) {
	echo 'Hieu va Hieu la 2 chuoi giong nhau <br>';
}

if (strcmp('Hieu', 'hieu') < 0) {
	echo 'Hieu nho hon hieu <br>';
}

if (strcmp('Hieu', 'hieu') > 0) {
	echo 'Hieu lon hon hieu <br>';
}
