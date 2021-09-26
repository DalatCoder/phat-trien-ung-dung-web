<?php 

$number = 5;
$float = 13.5;
$string = "Nguyen Trong Hieu";
$boolean = true;
$array = [ 'red', 'green', 'blue' ];


$total = [
	$number,
	$float,
	$string,
	$boolean,
	$array
];

// class Hieu {
// 	$name  = '';

// 	public function __construct($name) {
// 		$this->name = $name;
// 	}

// 	public function get_name() {
// 		rerurn $this->name;
// 	}

// 	public functioin set_name($name) {
// 		$this->name = $name;
// 	}
// }

// for ($i = 0; $i < count($total) - 1; $i++) {
// 	echo $total[$i] . ' - ' . gettype($total[$i]) . '<br>';
// }

// $hieu = new Hieu('Hieu');
array_push($total, new stdclass);

foreach ($total as $item) {

	if (gettype($item) == 'array') {
		// var_dump($item);
		echo print_r($item, true);
	}
	else if (gettype($item) == 'object') {
		// var_dump($item);
		echo print_r($item, true);
	}
	else {
		echo $item . ' - ' . gettype($item) . '<br>';
	}
}

// var_dump($array);