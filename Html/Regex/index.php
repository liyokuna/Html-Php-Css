<!DOCTYPE html>

<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">	
  <link href="style.css" type="text/css" rel="stylesheet" />
  
   <script>
 var NameIsValid=false;
 var SScocialIsValid=false;
 var phoneIsValid=false;
 
 var frenchPattern= /^[A-Z a-zàâäèéêëîïôœùûüÿçÀÂÄÈÉÊËÎÏÔŒÙÛÜŸÇ ZáéíñóúüÁÉÍÑÓÚÜ]*[\s][A-Z][a-zàâäèéêëîïôœùûüÿçÀÂÄÈÉÊËÎÏÔŒÙÛÜŸÇ ZáéíñóúüÁÉÍÑÓÚÜ]*$/
var socialPattern= /^[1-9]\d{2}-\d{2}-\d{4}$/
 var phonePattern= /^[1-9]\d{2}([\-.])|([(])[1-9]\d{2}([\-.)])|([\.])\d{3}-.\d{4}$/
 
 function checkName()
 {
	 var inputName=document.forms["person"]["Name"].value;
	 console.log("The name is "+ inputName);
	 //NameIsValid=!((inputName.search(frenchPattern)==-1))
	 NameIsValid=(inputName != null && inputName !="" && inputName.length>3 && !(inputName.search(frenchPattern)==-1))
	 if(NameIsValid)
	 {
		 
		 mySubmit();
		 //document.write("<p>Name :"+inputName+"</p>"); 
	 }
	 else{
		 alert("Please enter a valid Name First name and Last name");
	 }
 }
 
  function checkSocialSecurity()
 {
	 var SoSecurity=document.forms["person"]["SoSecurity"].value;
	 console.log("The social security is "+ SoSecurity);
	 SoSecurityIsValid=(SoSecurity != null && SoSecurity !="" && SoSecurity.length>3 && !(SoSecurity.search(socialPattern)==-1))
	 if(SoSecurityIsValid)
	 {
		 mySubmit();
	 }
	 else{
		 alert("Please enter a valid la Name");
	 }
 }
 
 function checkPhone()
 {
	 var inputPhone=document.forms['person']['phone'].value;
	 console.log("The phone entered was "+ inputPhone)
	 
	 if(!(inputPhone.search(phonePattern)==-1))
	 {
		console.log("The phone number is valid");
		mySubmit();
	 }
	 else
	 {
		 alert(inputPhone+" must correspond to xxx-xx-xxxx.");
		 
	 }
 }
 
 function mySubmit()
 {
	 if(phoneIsValid && NameIsValid && SScocialIsValid)
	 {
		 document.forms['person'].submit();
	 }
	 else
	 {
		 console.log("not ready to submit");
	 }
 }
 </script>
  <title>Button</title> 
</head>
<body>
<div id="wrapper">
    <div id="header">
		<h1>Button</h1>
	</div> <!-- #header -->
	<div id="main">
	</div>
		<form method="GET" name="person" action ="<?php echo $_SERVER['PHP_SELF'];?>">
		
		Name <br>
		<input type="text" name="Name" onchange="checkName()"><br>
		Social Security <br>
		<input type="text" name="SoSecurity" onchange="checkSocialSecurity()"><br>
		Phone number <br>
		<input type="text" name="phone" onchange="checkPhone()"><br>
		<noscript>
		<input type="submit">
		</noscript>
		</form>
	<div id="footer">
		<hr />
		<p><a href="http://validator.w3.org/check/referer" rel="nofollow" title="Validate as HTML5">Validate HTML5</a> | <a href="http://jigsaw.w3.org/css-validator/validator?uri=webservices.missouriwestern.edu/users/noynaert/act211/skeleton.php" rel="nofollow" title="Validate as CSS3">Validate CSS3</a></p>
		<p>
		    Last updated: 2015-08-29T18:50:49-05:00		</p>
		<hr/>
	</div> <!-- #footer -->
</div> <!-- #wrapper -->
</form>


</body>
</html>

