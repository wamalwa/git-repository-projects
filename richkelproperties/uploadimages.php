<?php
$message=-1;
if(count($_POST)) {
    
   $data = base64_decode($_POST['base64data']); 
   $mediaName=$_POST['mediaName'];
   $path="images/".$mediaName;
   file_put_contents($path, $data);
   $message=1;
}
if($message==1)
{
    $message="Image uploaded Successfully";
}
else
{
    $message="Error Uploding image";
}
echo $message;
?>