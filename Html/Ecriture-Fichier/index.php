<!DOCTYPE html>


<?php

function write($firstname,$lastname,$date,$place) //write on the file
{
$f = "entries.txt";	//open the file
$line="$firstname\t$lastname\t$date\t$place\n";
file_put_contents($f,$line,FILE_APPEND |LOCK_EX); //write on the file

}
function read() // read the file
{
	echo"<p>Previously saved</p>";
	$f = fopen("entries.txt", "r");	//open the file
	while(!feof($f)) //read the file
	{
		$value=explode("\t",fgets($f));
		if(count($value)==4)
		{
		$firstname=$value[0];
		$lastname=$value[1];
		$date=$value[2];
		$place=$value[3];
		}
		
		echo "<li> $firstname, $lastname <strong>Born</strong> : $date <strong>at</strong> : $place </li>";
	}
	fclose($f);//close the fill
}
function sanitize($list,$value) // sanitize the information entered
{
	$result='';
	if(!empty($list[$value]))
	{
		$result=$list[$value];
		$result=htmlentities($result);
	}
	return $result;
}
function process() // process the information
{
	$firstname=sanitize($_GET,'firstname');
	$lastname=sanitize($_GET,'lastname');
	$date=sanitize($_GET,'date');
	$place=sanitize($_GET,'place');
	if(strlen($firstname)>0 && strlen($lastname)>0 && strlen($date)>0 && strlen($place)>0)
	{
		write($firstname,$lastname,$date,$place);
	}
	else
	{
		echo"<p> You must enter your first and last name, the date and place of birth <p>";
	}
}
?>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">	
  <link href="style.css" type="text/css" rel="stylesheet" />
   <link  rel="stylesheet" href="http://webservices.missouriwestern.edu/users/lmukunaciowela/css/style.css" />
   <link  rel="icon" href="http://webservices.missouriwestern.edu/users/lmukunaciowela/act211/PicandIco/register.ico" 
  type="image/vnd.microsoft.ico" />
  <title>Self Identity</title> 
</head>
<body>
<div id="wrapper">
    <div id="header">
		<h1>Register</h1>
	</div> <!-- #header -->
	<div id="main">
		<form method="GET" action="index.php"> <!--<p> It call it self</p> -->
			<div >
			Firstname : <input type="text" name="firstname">
			</div>
			<div class="babyBlue">
			Lastname : <input type="text" name="lastname">
			</div>
			<div> 
			Date of birth : <input type="text" name="date">
			</div>
			<div class="babyBlue">
			Place of birth : <input type="text" name="place">
			</div>
			<div>
			<input type="submit" value="Submit">
			</div>
		</form>
		<?php
		
	if(!empty($_GET))  // check if the user submits something
	{
		echo"<p>The form was submitted</p>"; // send this message if he doesn't submit something
		process();
	}
	else
	{
		echo"<p>No data was submitted</p>";// this message when something was submitted
	}
	read();
	?>
	</div> <!-- #main -->
	<div id="footer">
		<hr />
		<p><a href="http://validator.w3.org/check/referer" rel="nofollow" title="Validate as HTML5">Validate HTML5</a> | <a href="http://jigsaw.w3.org/css-validator/validator?uri=webservices.missouriwestern.edu/users/noynaert/act211/skeleton.php" rel="nofollow" title="Validate as CSS3">Validate CSS3</a></p>
		<p>
		    Last updated: 2015-08-29T18:50:49-05:00		</p>
		<hr/>
	</div> <!-- #footer -->
</div> <!-- #wrapper -->
</body>
</html>

