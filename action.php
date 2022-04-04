<!--
  * @author Abobakr Aldubai
  * @author My Email <eng.bakraldubai@gmail.com>
  * Date of Edite : 4/4/2022
-->
<!--calling the header-->
<?php 
    include_once 'header.html';
?>

<?php
// if ther is a post of the form
if(isset($_POST['get']))
{
    
    $url=$_POST['url'];
    //    Handle https checkable field value assignment
    if(isset($_POST['https'])){
     $use_https = 1;   
    }
    else{
       $use_https = 0; 
    }
    // access key field value assignment
    $access_key=$_POST['access-key'];
    // secret key field value assignment
    $secret_key=$_POST['secret-key'];
    // Doctype field value assignment
    $doctype=$_POST['doctype'];
    // a new object of curl
    $curl_handle = curl_init();
    //    Handle http and https 
    if($use_https == 1 ){
        $API = "https://$url/api/resource/$doctype";  
    }
    else{
        $API = "http://$url/api/resource/$doctype";  
        
    }
    // Set the curl URL HTTP HEADER
    curl_setopt($curl_handle, CURLOPT_HTTPHEADER, array(
      "Authorization:token $access_key:$secret_key"
    ));
    // Set the curl URL option
    curl_setopt($curl_handle, CURLOPT_URL, $API);

    // This option will return data as a string instead of direct output
    curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);

    // Execute curl & store data in $curl_data variable
    $curl_data = curl_exec($curl_handle);

    curl_close($curl_handle);

    // Decode JSON into PHP $response_data array
    $response_data = json_decode($curl_data);

    if(!empty($response_data)){
        // if there is a response
        
    // get item data by 'data' object
    $resulte = $response_data -> data;
        
        
echo "<div class='container col-md-8'>
  <div class='alert alert-success'>
    <strong>API is called Successly!</strong> 
  </div>
  <h2>$doctype </h2>
              
  <table class='table table-striped'>
    <thead>
      <tr>
        <th>Name</th>
      </tr>
    </thead>
    <tbody>
      "
      ;
        
        foreach($resulte as $row) {
            // get name of each raw by 'name' object
            echo "
            <tr>
        <td>$row->name</td>
       
      </tr>
            ";
            
        }
        
        echo "
            </tbody>
            </table>
            </div>
        ";

      }  
   else {
    // if there is no response
     echo "
     <div class='container col-md-8'>
       <div class='alert alert-danger'>
    <strong>API call Field!</strong> Please Enter Right data Again
  </div>
  </div>
  ";

   }     
   
}
else{  // if there is no post of the form
    echo "
    <div class='container col-md-8'>
       <div class='alert alert-danger'>
    <strong>4o4 Not Found!</strong> 
  </div>
   </div>
  ";
    
}

?>
<?php 
    include_once 'footer.html';
?>
