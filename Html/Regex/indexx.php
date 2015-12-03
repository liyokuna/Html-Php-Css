<!DOCTYPE html>

<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">	
  <link href="style.css" type="text/css" rel="stylesheet" />
  
  <script>
  var NameIsValid=false;
  var socialSecurityValid=false;
  var frenchPattern= /^[A-Z][a-zàâäèéêëîïôœùûüÿçÀÂÄÈÉÊËÎÏÔŒÙÛÜŸÇ ZáéíñóúüÁÉÍÑÓÚÜ]*[^\s][A-Z][a-zàâäèéêëîïôœùûüÿçÀÂÄÈÉÊËÎÏÔŒÙÛÜŸÇ ZáéíñóúüÁÉÍÑÓÚÜ]*\/
  var securityPattern= /^[0-9]*\-/
  var SocialSecurity;
  
  function checkName()
  {//&& NameValid.search(frenchPattern)!=-1 )
	 var Name=document.forms["ID"]["Nameform"].value;
	 NameIsValid=(inputName != null && inputName !="" && inputName.length>2)
	 if(NameIsValid)
	 {
		 
		 mySubmit();
		 document.write("<p>Name :"+inputName+"</p>"); 
	 }
	 else{
		 alert("Please enter a complete Name");
	 }
	  
  }
 
   /*function checkSocialSecurity()
  {
	  SocialSecurity=document.forms["ID"]["socialSecurity"].value;
	  socialSecurityValid=(SocialSecurity !=NULL && SocialSecurity !="" && SocialSecurity !=" " && input.length>2);
	  if(socialSecurityValid && firtNameValid.search(securityPattern)!=-1)
	  {
		  document.write("<p>You should correct</p>");
	  }
	  else
	  {
		  document.write("<p>Social Security: "+SocialSecurity+"</p>")
		  mySubmit();
	  }
	  
  }*/
  
   function mySubmit()
 {
	 if(NameValid )
	 {
		 document.forms['ID'].submit();
	 }
	 else
	 {
		 document.write("Not ready to submit");
	 }
 }
  </script>
  <title>Fields Name</title> 
</head>
<body>
<div id="wrapper">
    <div id="header">
		<h1>Fields Name and Regex</h1>
	</div> <!-- #header -->
	<div id="main">
		<div>
		<form method="GET" name="ID" action ="<?php echo $_SERVER['PHP_SELF'];?>">
		Name<br>
		<input type="text" name="Nameform" onchange="checkName()"/><br>
		
		</form>
	</div>	
	</div> <!-- #main -->
	<div id="footer">
		<hr />
		<p><a href="http://validator.w3.org/check/referer" rel="nofollow" title="Validate as HTML5">Validate HTML5</a></p>
		<p><a href="http://jigsaw.w3.org/css-validator/validator?uri=webservices.missouriwestern.edu/users/noynaert/act211/skeleton.php" rel="nofollow" title="Validate as CSS3">Validate CSS3</a></p>
		<p>
		    Last updated: 2015-08-29T18:50:49-05:00		</p>
		<hr/>
	</div> <!-- #footer -->
</div> <!-- #wrapper -->


</body>
</html>

