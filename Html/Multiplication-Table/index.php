<!DOCTYPE html>

<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">	
  <link  rel="icon" href="http://webservices.missouriwestern.edu/users/lmukunaciowela/act211/hmwk02/PicqndIcon/mathIcon.png  " 
  type="image/vnd.microsoft.ico" />
  <link href="style.css" type="text/css" rel="stylesheet" />
  <link rel="Stylesheet" href="style.css" />
  <title>The multiplication table</title> 
</head>
<body>
<div id="wrapper">
    <div id="header">
		<h1>The multiplication table</h1>
	</div> <!-- #header -->
	<div id="main">
	<?php
	echo"<table>";
		for( $i=1; $i<=12;$i++)
		{
			echo"<tr>";
			for($j=1; $j<=12;$j++)
			{
				//echo"<td>";
				$res= $i*$j;
				echo "<td > $j * $i= $res </td>";	
			}	
			echo"</tr>";
		}
		echo"</table>";
		?>
	</div> <!-- #main -->
	<div id="footer">
		<hr />
		<p><a href="http://validator.w3.org/check/referer" rel="nofollow" title="Validate as HTML5">Validate HTML5</a> |
		<a href="http://jigsaw.w3.org/css-validator/validator?uri=webservices.missouriwestern.edu/users/noynaert/act211/skeleton.php" rel="nofollow" title="Validate as CSS3">Validate CSS3</a></p>
		<p>
		    Last updated: 2015-08-29T18:50:49-05:00		</p>
		<hr/>
	</div> <!-- #footer -->
</div> <!-- #wrapper -->
</body>
</html>

