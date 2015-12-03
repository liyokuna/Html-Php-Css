<!DOCTYPE html>

<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">	
  <link href="style.css" type="text/css" rel="stylesheet" />
  <link  rel="icon" href="http://webservices.missouriwestern.edu/users/lmukunaciowela/act211/PicandIco/address_book.png  " 
  type="image/vnd.microsoft.ico" />
  <title>The E-mail Directory </title> 
</head>
<body>
<div id="wrapper">
    <div id="header">
		<h1>Names and Address mail</h1>
	</div> <!-- #header -->
	<div id="main">
	<?php
	
	$fileName="http://noynaert.cs.missouriwestern.edu/emails.txt";
	$handle=fopen($fileName,"r") or die("<p> Error ---- Come back later </p>");
	
	while(!feof($handle))
	{
		$line=fgets($handle);
		$words=explode("\t",$line);
		if(count($words)==3)
		{
			$lastname=$words[1];
			$firstname=$words[0];
			$mail=$words[2];
			$concat= "$lastname $firstname";
			//echo"$concat";
			$Name["$concat"]="$mail";
			$Email[]=$mail;
			$name[]=$concat;
		}
				
	}

	// sort by name
	fclose($handle);
		sort($Name);
		//$key=$Name;
		$key='Caldarera Kiley';
		echo"<table>";
		echo"<caption> Electronic directory sort by name</caption>";
		echo"<tr>";
		echo"<th> Name</th>";
		echo"<th> E-mail address</th>";
		echo"</tr>";
		foreach( $Name as $key => $value )
		{
			echo"<tr>";
			echo "<td> $key </td> <td><a href='$Name[$key]'>$Name[$key]</a></td>";
			echo"</tr>";
		}
		echo"</table>";
		echo"<p> </p>";
		//sort by name whithout using associative array
		sort($name);
		sort($Email);
		$key=$Name;
		$key='Caldarera Kiley';
		echo"<table>";
		echo"<caption> Electronic directory sort by name</caption>";
		echo"<tr>";
		echo"<th> Name</th>";
		echo"<th> E-mail address</th>";
		echo"</tr>";
		foreach( $Name as $key => $value )
		{
			echo"<tr>";
		echo "<td> $name[$key] </td> <td><a href='$Email[$key]'>$Email[$key]</a></td>";
			echo"</tr>";
		}
		echo"</table>";
		echo"<p> </p>";
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

