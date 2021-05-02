<?php


$http_client_ip       = $_SERVER['HTTP_CLIENT_IP'];
$http_x_forwarded_for = $_SERVER['HTTP_X_FORWARDED_FOR'];
$remote_addr          = $_SERVER['REMOTE_ADDR'];
 

if(!empty($http_client_ip)){
    $ip = $http_client_ip;
  
} elseif(!empty($http_x_forwarded_for)){
    $ip = $http_x_forwarded_for;
} else {
   
    $ip = $remote_addr;
}

$conn = mysql_connect("reformac.mysql.dbaas.com.br", "reformac", "igreja43GH1tpn"); 


$key = $_SERVER['HTTP_REFERER'];


mysql_select_db("reformac", $conn) or print(mysql_error());

if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }
   
  $sql  ="SELECT * FROM `banidos` WHERE ( `ip` = '". $ip ."' )";

  $retval = mysql_query( $sql, $conn );
  
  if (mysql_num_rows($retval) > 0) {
	      
	 
		$sql  ="SELECT * FROM `banidos` WHERE ( `ip` = '". $ip ."' ) AND ( `fim` > now() )"; 
		$retval = mysql_query( $sql, $conn );
		 
	if (mysql_num_rows($retval) > 0) {
		
				
		
	  header("Location: http://www.google.com.br/url?sa=t&rct=j&q=adventista+da+reforma+completa&source=web&cd=1&cad=rja&ved=0CC8QFjAA&url=https%3A%2F%2Fwww.facebook.com%2Fadventistadareformacompleta.org&usg=AFQjCNGFq9i6VvIqvMs-AqZYFMBCiS8q8w");
			
		exit;
	
		
	}
	
	else {
	
	$sql  ="SELECT * FROM `banidos` WHERE ( `ip` = '". $ip ."' ) AND ( `fim` < now() )"; 
		$retval = mysql_query( $sql, $conn );
		
		if (mysql_num_rows($retval) > 0) {
			
				  $sql = "UPDATE `banidos` SET `fim` = (now()+  INTERVAL 32 MINUTE) WHERE  ( `ip` = '". $ip ."' ) AND ( `fim` < now() ) ";
				$retval = mysql_query( $sql, $conn );
		
		 
			}
			else
			{
			
			 header("Location: http://www.google.com.br/url?sa=t&rct=j&q=adventista+da+reforma+completa&source=web&cd=1&cad=rja&ved=0CC8QFjAA&url=https%3A%2F%2Fwww.facebook.com%2Fadventistadareformacompleta.org&usg=AFQjCNGFq9i6VvIqvMs-AqZYFMBCiS8q8w");
			
		exit;
			
			}

}
	



		
	}
else {


  $sql = "INSERT INTO `banidos` VALUES (NULL, '". $ip ."', now()+  INTERVAL 32 MINUTE, '".$key."')";   
  $retval = mysql_query( $sql, $conn );
  
}
  
  
  
  

   
  
   
   mysql_close($conn);
   
   




?>
