<?php
// Check for empty fields
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['phone']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }
	
$name = $_POST['name'];
$email_address = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];
	
$post_data = array('name' => $name, 'email' => $email_address, 'phone' => $phone, 'message' => $message);
$postdata = http_build_query($post_data);
$options = array(  
    'http' => array(  
      'method' => 'POST',  
      'header' => 'Content-type:application/x-www-form-urlencoded',  
      'content' => $postdata,  
      'timeout' => 15 * 60 // 超时时间（单位:s）  
    )  
  );
$context = stream_context_create($options);
$result = file_get_contents("http://115.159.115.221/github_blog/contact.php", FALSE, $context); 
echo $result;
return true;			
?>