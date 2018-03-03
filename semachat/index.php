
    </head>
    <body>
        <div id="title">Welcome to Sema Chat App</div>
        
        <div id="content">
            <div id="login">
            <fieldset style="height: 20%; width:62%;">
                <legend>Login</legend>  
                 <form id="frmlogin"  method="POST"  action="actions/login.php">
                <table>
                   
                    <tr><td style="text-align: right">Username:</td><td><input type="text" name="username" id="username" style="width: 200px"></td></tr>
                   <tr><td style="text-align: right">Password:</td><td><input type="password" name="password" id="password" style="width: 200px"></td></tr>
                   <tr><td></td><td><input type="submit" name="btnlogin" id="btnlogin" value="Login" style="width: 100px;" onclick="return validateLoginFields();" ></td></tr>
             
                </table>
                     <div id="MessageBox"><?php if(isset($_GET['error'])) { $user=$_GET['error'];echo"<span style='color:red'>".$user."</span>"; } ?></div>
  </form>
            </fieldset> 
                <div><button name="btnNewAccount" id="btnNewAccount" onclick="SignUp();">New Account</button></div>
                
            </div>
            <div id="signup" style="display: none;">
             <fieldset style="height: 20%; width:62%; ">
                <legend>New Account</legend>
                <form id="frmSignUp"  method="POST">
                <table>
                    <tr><td style="text-align: right">Screen Name:</td><td><input type="text" name="screenName" id="screenName" style="width: 200px"></td></tr>
                    <tr><td style="text-align: right">Username:</td><td><input type="text" name="newUsername" id="newUsername" style="width: 200px"></td></tr>
                    <tr><td style="text-align: right">Choose Password:</td><td><input type="password" name="newPassword" id="newPassword" style="width: 200px"></td></tr>
                     <tr><td style="text-align: right">Confirm Password:</td><td><input type="password" name="newCPassword" id="newCPassword" style="width: 200px"></td></tr>
                     <tr><td></td><td><input type="submit" name="createAccount" id="createAccount" value="Create Account" style="width: 150px;" onclick="return validateAccountFields();"></td></tr>
                </table>
                       <div id="MessageBox2">I was created for you</div>
              </form>
            </fieldset>
                <div id="footer">Developed by Jacob Petro(JP)</div>
            </div>
        </div>      
        
    </body>
</html>
<!DOCTYPE html>
<html>
    <head>      
        <title>Welcome to Sema Chat</title>
        <link rel="stylesheet" href="css/sema_css.css"/>
          <link rel="icon"  href="images/logo.png"/> 
        <script type="text/javascript">
   function SignUp() {
    if (document.getElementById('signup').style.display == 'none') {
        document.getElementById('signup').style.display = 'block';
        
    }
    else if (document.getElementById('signup').style.display == 'block') {
        document.getElementById('signup').style.display = 'none';
    }

}

function validateLoginFields()
{
    var username = document.forms['frmlogin']['username'].value;
    var password = document.forms['frmlogin']['password'].value;

    if (username==''|| password=='') {
        document.getElementById('MessageBox').textContent = "You must enter both username and password and then try again!";
        document.getElementById('MessageBox').style.color = 'red';
        return false;
    }
    else {
        document.getElementById('MessageBox').textContent = 'Please wait...';
        document.getElementById('MessageBox').style.backgroundColor = 'green';
        document.getElementById('MessageBox').style.color = 'white';
        return true;
    }
}



function validateAccountFields()
{
    var screenName = document.forms['frmSignUp']['screenName'].value;
    var newUsername = document.forms['frmSignUp']['newUsername'].value;
    var newPassword = document.forms['frmSignUp']['newPassword'].value;
    var newCPassword = document.forms['frmSignUp']['newCPassword'].value;
    
    if (screenName==''|| newUsername==''|| newPassword==''||newCPassword=='') {
        document.getElementById('MessageBox2').textContent = "Please ensure you fill all fields and try again!";
        document.getElementById('MessageBox2').style.color = 'red';
        return false;
    }
    else {
        document.getElementById('MessageBox2').textContent = 'Please wait...';
        document.getElementById('MessageBox2').style.backgroundColor = 'green';
        document.getElementById('MessageBox2').style.color = 'white';
        CreateAccount();
        SignUp();
        return false;
    }
}
        </script>
        
        
 <script type="text/javascript">
     function CreateAccount()
        {
            var xmlhttp;
            var screenName=document.getElementById('screenName').value;
            var newUsername=document.getElementById('newUsername').value;
            var newPassword=document.getElementById('newPassword').value;

            if(window.XMLHttpRequest){ xmlhttp=new XMLHttpRequest();}
            else{ xmlhttp=new ActiveXObject("Microsoft.XMLHTTP"); }

            xmlhttp.onreadystatechange=function()
            {
            if(xmlhttp.readyState==4 && xmlhttp.status==200)
            { 
                document.getElementById("MessageBox").innerHTML=xmlhttp.responseText;
                document.getElementById('MessageBox').style.backgroundColor = 'green';
                document.getElementById('MessageBox').style.color = 'white';
        
    }
            }
            xmlhttp.open("POST","actions/create_account.php",true);
            xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xmlhttp.send("screenName="+screenName+"&newUsername="+newUsername+"&newPassword="+newPassword);	
        }
         

 </script>
          