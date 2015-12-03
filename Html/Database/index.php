<!DOCTYPE html>

<?php

$type["vide"]="- Select -";
$type["state"]="state";
$type["station"]="station";
$type["longitude"]="longitutde";
$type["elevation"]="elevation";
$type["country"]="country";

asort($type);// sort the array ascending to descending

$sanitized=array();// for the name place
$satinizedName=array();

function processForm()
{
	if(isset($_POST['NAME']) ) // determine if a variable is set and is not NULL
	{
	$NAME=htmlentities($_POST['NAME']);
	$selectedVal=htmlentities($_POST['sort']);
	clean($_POST);
	
	$connection=connectionDatabase();
	$rows=getRows($connection);
	displayTable($rows);
	}
	else
	{
		echo"<p>The post is not set </p>";
	}
}

function clean ($rawInput)
{	
	global $sanitized; 
	foreach($rawInput as $key => $value)
	{
	$sanitized[$key]= $value;
	}
}

function connectionDatabase()
{
	$host="noynaert.cs.missouriwestern.edu";
	$user="act211";
	$pwd='rem105';
	$databaseName='weatherstations';
	
	$connection=mysqli_connect($host,$user,$pwd,$databaseName);
	
	if(mysqli_connect_errno())
	{
		printf("<p> Style=color\"red\"> Connection with the database failed</p>",mysqli_connect_errno());
		exit(1);
	}
	else
	{
		echo"<p> The connection was etablished </p>";
	}
	return $connection;
}

function getRows($connection)
{
	global $sanitized;
	
	$Name=$sanitized['NAME'];
	
	$selectedVal=htmlentities($_POST['sort']);
	$queryString="select place, state,station,country,elevation from stationList where place LIKE '$Name' ORDER BY '$selectedVal' ASC ";
	
	
	$result=mysqli_query($connection,$queryString);
		
	return $result;
}

function displayTable($rows)
{
	$numberofrows=mysqli_num_rows($rows);
	
	if($numberofrows==0)
	{
		echo"<p> Your request doesn't match </p>";
	}
	else
	{
		echo"<table><tr><th> Place </th> <th> State </th> <th> Country </th> <th> Elevation </th>";
		while($row=mysqli_fetch_assoc($rows))
		{
			printf("<tr><td>%s</td> <td>%s</td> <td>%s</td> <td>%s</td>",$row['place'],$row['state'],$row['country'],$row['elevation']);
		}
		echo"</table>";
	}
}

?>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link  rel="icon" href="http://webservices.missouriwestern.edu/users/lmukunaciowela/act211/PicandIco/weather.ico  " 
  type="image/vnd.microsoft.ico" />  
  <link href="style.css" type="text/css" rel="stylesheet" />
  <title>Weather Station</title> 
</head>
<body>
<div id="wrapper">
    <div id="header">
		<h1>Weather Station</h1>
	</div> <!-- #header -->
	<div id="main">
		<div>
		
		<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
			
			The place name: <input type="text" name="NAME"/><br>
			
			Sort by :
			<select name="sort" >
				<?php
				foreach($type as $value=>$fulltype)
				{
					printf("<option value =\"%s\">%s</option>\n",$value,$fulltype);
				}
				?>
			</select><br>
			
			<p><input type="submit"/></p>
		
		</form>
		<?php
		if(!empty($_POST['NAME'])){ // Verify if the field is not empty then we can process 
		$selectedVal=$_POST['sort'];
		
		processForm();
		}
	else 
		echo"<p> Type a name of a place to be displayed<p>";
		
		?>
		
	</div> <!-- #main -->
	
</div>
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

