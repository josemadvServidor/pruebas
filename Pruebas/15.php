
<html>
<head>
<meta charset="ISO-8859-1">
</head>
<body>
<?php


for ($mult = 1; $mult < 1001; $mult++)
{
	if ($mult % 3 == 0 && $mult % 5 == 0 && $mult%7 == 0)
	{
		echo $mult . "<br>";
	}
}

?>

</body>
</html>