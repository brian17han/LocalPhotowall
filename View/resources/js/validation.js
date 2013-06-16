function validationRegister()
{
	var login_name=$("#login_name").val();
	var password=$("#password").val();
	var email=$("#email").val();
	
	var atpos=email.indexOf("@");
	var dotpos=email.lastIndexOf(".");
	
	if(login_name.length==0)
	{
		alert("login_name");
	}
	if(password.length==0)
	{
		alert("password");
	}
	if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
  	{
  		alert("Not a valid e-mail address");
  		return false;
	}
}