
<?php
  session_start();
if(isset($_SESSION['user_id']) && isset( $_SESSION['user_name']))
{
    include 'actions/config.php';
    $user_id = $_SESSION['user_id'];
    $user_name = $_SESSION['user_name'];
   
  
}
else
{
    session_destroy();
    header("location:http://localhost/semachat/index.php");
}
?>
<!DOCTYPE html>
<html>
    <head>      
        <title>Sema Chat</title>
        <link rel="stylesheet" href="css/sema_css.css"/>
        <link rel="icon"  href="images/logo.png"/> 
        

    </head>
    <body style="margin-left: 5%;margin-top: 10px;">
        
        <div id="title" style="width:100%">Sema Chat Dashboard</div>

        <div id="content">
            <div><a href="actions/logout.php?q=<?php echo $user_id; ?>">Logout</a> | <?php echo $user_name; ?></div>
              
             <input type="hidden" name="vfriend_id" id="vfriend_id" value="0">
             <input type="hidden" name="button_id" id="button_id" value="0">
             <script language="javascript">setInterval(function(){GetChats(document.getElementById("vfriend_id").value); GetFriends();}, 1500); </script>
 
                
            <div id="active-friends">
            
            </div>
             <div id="friend_name">Friend Name here </div>
            <div id="chat-log">
                </div>
            
           
            <form id="frmPost" action="" method="POST" >
                <span><button id="delete" name="delete" onclick="return Delete()">Delete friend</button></span>
                <div id="post"><textarea name="messageToSend" id="messageToSend" cols="66" rows="2"></textarea>
                    <input type="submit" name="btnPost" id="btnPost" value="Post" onclick="return validatePostMessage();">
                </div>
            </form>
            <div id="members"><div style="color:white;background-color: black">All Members</div>
                <table>
                    <?php
                    $execute2 = mysql_query("SELECT`con_id`,`con_name` FROM `contacts` WHERE con_id<>" . $user_id);

                    while ($row = mysql_fetch_assoc($execute2)) {
                        echo "<tr style='background-color:white;font-size:0.7em'><td><button id='addFriend' name='addFriend' onclick='AddFriend(" . $row['con_id'] . ");' style='width:230px;height:41px;font-size:1.0em'>"
                        . $row['con_name'] . "</button></td></tr>";
                    }
                    ?>
                </table>
            </div>


        </div>

    </body>
</html>
<script type="text/javascript">
            var strname='No Friend Selected';
            function validatePostMessage()
            {
                var messageToSend = document.forms['frmPost']['messageToSend'].value;
    
                if (messageToSend=='') {
                    alert("No Message to Send!");
                    return false;
                }
                else {
   
                    PostMessages(document.getElementById("vfriend_id").value);
                    document.getElementById("messageToSend").value="";
                    return false;
                }
            }
            
   function GetChats(friend_id)
            {   
                var xmlhttp;
                var user_id=<?php echo $user_id; ?>; 
              
                if(friend_id<1){
                    friend_id=document.getElementById("vfriend_id").value;
                }
                else
                {
                    document.getElementById("vfriend_id").value=friend_id;  
                }
                
                if(window.XMLHttpRequest){ xmlhttp=new XMLHttpRequest();}
                else{ xmlhttp=new ActiveXObject("Microsoft.XMLHTTP"); }

                xmlhttp.onreadystatechange=function()
                {
                    if(xmlhttp.readyState==4 && xmlhttp.status==200)
                    { document.getElementById('chat-log').innerHTML=xmlhttp.responseText;GetName(friend_id);                    
                      document.getElementById('friend_name').innerHTML=strname;    
            }
            esle
            {
                 document.getElementById('friend_name').innerHTML='No Friend Selected';; 
            }
                }
                xmlhttp.open("POST","actions/getChats.php",true);
                xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xmlhttp.send("user_id="+user_id+"&friend_id="+friend_id);
                
            }
 function PostMessages(friend_id)
            {  
                 var xmlhttp;
                var user_id=<?php echo $user_id; ?>;   
                document.getElementById("vfriend_id").value=friend_id;
       
                var message=document.getElementById("messageToSend").value;
        
                if(window.XMLHttpRequest){ xmlhttp=new XMLHttpRequest();}
                else{ xmlhttp=new ActiveXObject("Microsoft.XMLHTTP"); }

                xmlhttp.onreadystatechange=function()
                {
                    if(xmlhttp.readyState==4 && xmlhttp.status==200)
                    {  }
                }
                xmlhttp.open("POST","actions/postMessage.php",true);
                xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xmlhttp.send("con_id="+user_id+"&receiver="+friend_id+"&message="+message);	 
            }

 function AddFriend(friend_id){ 
         var xmlhttp;    
        var con_id=<?php echo $user_id; ?>; 
        
   if(confirm("Are you sure you want to Add this Friend?")==true)
        {
          
        if(window.XMLHttpRequest){ xmlhttp=new XMLHttpRequest();}
        else{ xmlhttp=new ActiveXObject("Microsoft.XMLHTTP"); }

        xmlhttp.onreadystatechange=function()
        {
            if(xmlhttp.readyState==4 && xmlhttp.status==200)
            { alert(xmlhttp.responseText);
                 GetFriends();
               }
        }
        xmlhttp.open("POST","actions/AddFriend.php",true);
        xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xmlhttp.send("con_id="+con_id+"&friend_id="+friend_id);      
           
        }
        
       
}
 function DeleteFriend(friend_id){ 
           var xmlhttp;  
        var con_id=<?php echo $user_id; ?>; 
        if(window.XMLHttpRequest){ xmlhttp=new XMLHttpRequest();}
        else{ xmlhttp=new ActiveXObject("Microsoft.XMLHTTP"); }

        xmlhttp.onreadystatechange=function()
        {
            if(xmlhttp.readyState==4 && xmlhttp.status==200)
            { alert(xmlhttp.responseText);
                  GetFriends();
              }
        }
        xmlhttp.open("POST","actions/DeleteFriend.php",true);
        xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xmlhttp.send("con_id="+con_id+"&friend_id="+friend_id);      
        
}
function DeleteMessage(chat_id){           
       var xmlhttp;
       if(confirm("Are you sure you want to delete message with ID:"+chat_id+"?")==true)
        {
          if(window.XMLHttpRequest){ xmlhttp=new XMLHttpRequest();}
        else{ xmlhttp=new ActiveXObject("Microsoft.XMLHTTP"); }

        xmlhttp.onreadystatechange=function()
        {
            if(xmlhttp.readyState==4 && xmlhttp.status==200)
             { alert(xmlhttp.responseText);}
        }
        xmlhttp.open("POST","actions/DeleteMessage.php",true);
        xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xmlhttp.send("chat_id="+chat_id);
        }
          
            
}


function GetName(friend_id)
            {   
              var xmlhttp;
                if(window.XMLHttpRequest){ xmlhttp=new XMLHttpRequest();}
                else{ xmlhttp=new ActiveXObject("Microsoft.XMLHTTP"); }

                xmlhttp.onreadystatechange=function()
                {
                    if(xmlhttp.readyState==4 && xmlhttp.status==200)
                    {                 
                        strname=xmlhttp.responseText;
                        return strname;
                }
                }
                xmlhttp.open("POST","actions/getName.php",true);
                xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xmlhttp.send("friend_id="+friend_id);
                
            }
function GetFriends(){ 
             var xmlhttp;
        var con_id=<?php echo $user_id; ?>; 
        if(window.XMLHttpRequest){ xmlhttp=new XMLHttpRequest();}
        else{ xmlhttp=new ActiveXObject("Microsoft.XMLHTTP"); }

        xmlhttp.onreadystatechange=function()
        {
            if(xmlhttp.readyState==4 && xmlhttp.status==200)
             { document.getElementById("active-friends").innerHTML=xmlhttp.responseText;}
        }
        xmlhttp.open("POST","actions/LoadFriends.php",true);
        xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xmlhttp.send("con_id="+con_id);      
            
}
function Delete()
{
    GetName(document.getElementById('vfriend_id').value);
    
    if(confirm("Are you sure you want to delete "+strname+"?")==true)
        {
           DeleteFriend(document.getElementById('vfriend_id').value);
        }
      
   
    return false;
  
}

</script>

