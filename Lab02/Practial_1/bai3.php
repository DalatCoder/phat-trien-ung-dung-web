<?php 

$a = 10;
$b = 20;

$variable_style = "
	padding: 5px 10px;
	border: 1px solid #333;
	border-radius: 10px;
";

echo "<h1 style='$variable_style'>A = $a</h1>";
echo "<h1 style='$variable_style'>B = $b</h1>";

$a = $a + $b;
$b = $a - $b;
$a = $a - $b;

echo '<hr>';
echo '<p>Sau khi hoan vi</p>';

echo "<h1 style='$variable_style'>A = $a</h1>";
echo "<h1 style='$variable_style'>B = $b</h1>";
