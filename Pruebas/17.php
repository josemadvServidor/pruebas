<html>
<head>
<meta charset="ISO-8859-1">
</head>
<body>
<?php
$tiempofin = time() + 1;
$multi = 0;
do {
    $tiempo2 = time();
    $escribe = 5 * $multi;
    $multi++;
	print $escribe . "<br>";

} while($tiempofin > $tiempo2);
?>

</body>
</html>