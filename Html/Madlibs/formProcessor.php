<!DOCTYPE html>

<?php
function Cap($word)
{
	$word=strtoupper($word);
	return $word;
}

function FullCap($word)
{
	$fullcap='';
	$wordlist=explode(" ",$word);
	foreach($wordlist as $sentence)
	{
		$sentence=Cap($sentence);
		if(strlen($fullcap)==0)
		{
			 $fullcap=$sentence;
		}
		else
		{
			 $fullcap=$fullcap.' '.$sentence;
		}
		return $fullcap;
	}
}

function TitleSong($number)
{
	switch($number)
	{
		case 1:
		$sentence="From The first Noel";
		return FullCap($sentence);
		break;
		case 2:
		$sentence="From Joy to the World";
		return FullCap($sentence);
		break;
		default:
		$sentence="From Yes we can William";
		return FullCap($sentence);
		break;
		
	}
}
?>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">	
  <link href="style.css" type="text/css" rel="stylesheet" />
  <link  rel="icon" href="http://webservices.missouriwestern.edu/users/lmukunaciowela/act211/PicandIco/book135.png  " 
  type="image/vnd.microsoft.ico" />
  <title>Welcome to my Madlibs</title> 
</head>
<body>
<div id="wrapper">
    <div id="header">
		<h1>Let's start</h1>
	</div> <!-- #header -->
	<div id="main">
		<img src="http://webservices.missouriwestern.edu/users/lmukunaciowela/act211/PicandIco/alphabet.jpg" 
		height= "300" alt=" Alphabet" title="Alphabet" id= "Congo" />
		<?php
		$count=0;
		
		foreach($_GET as $fieldName=> $text)
		{
			if(!empty($_GET[$fieldName]))
				$count++;
		}
		if($count==5)
		{
			
			$Noun=htmlentities($_GET['Noun']);
			$Verb=htmlentities($_GET['Verb']);
			$Adjective=htmlentities($_GET['Adjective']);
			$Place=htmlentities($_GET['Place']);
			$Body=htmlentities($_GET['Body']);
			//Using functions
			$Noun=Cap($Noun);
			$Verb=Cap($Verb);
			$Adjective=Cap($Adjective);
			$Place=Cap($Place);
			$Body=Cap($Body);
			switch(rand(1,3))
			{
				case 1:
			echo "<p> The first <em>$Noun</em> the angels did say</p><br> ";
			echo "<p>Was to certain poor shephreds in fields as they lay</p><br>";
			echo "<p>In <em>$Place</em> where the <em>$Verb</em>, keeping their sheep</p><br>";
			echo "<p>On a cold winter's night that was so <em>$Adjective</em></p><br>";
			$sentence="From The first Noel";
			//$sentence=FullCap($sentence);
			echo "<p>$sentence</p><br>";
			break;
			case 2:
			echo "<p> He rules the <em>$Noun</em> with truth and grace</p><br> ";
			echo "<p>And <em>$Verb</em> the nations prove</p><br>";
			echo "<p>The glories of his <em>$Adjective</em></p><br>";
			echo "<p>And wonders of his love</p><br>";
			echo "<p>And wonders of his love</p><br>";
			echo "<p>And wonders, wonders, of his love</p><br>";
			echo "<p>From Joy to the World</p><br>";
			break;
			
			case 3:
			echo "<p> We will <em>$Verb</em> that there is something happening</p><br> ";
			echo "<p>in <em>$Place</em> </p><br>";
			echo "<p>That we are not as divided as our <em>$Noun</em> suggets</p><br>";
			echo "<p>That we are one people, we are one <em>$Noun</em></p><br>";
			echo "<p>And together, we will begin the <em>$Adjective</em> next great chapter</p><br>";
			echo "<p>In the American story with three words that will ring</p><br>";
			echo "<p>From coast to coast, from sea to shining sea, yes we can</p><br>";
			echo "<p>From Yes we can William</p><br>";
			break;
			}
		}
		else
		{
			echo "<p> Please complete the fields</p>";
			echo"<form method='GET' action='index.php'/>
			<input type='submit' value='Back'/>
			</form>";
			echo "<p> Please hit the button 'Back' to complete the previous form</p>";
		}
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

