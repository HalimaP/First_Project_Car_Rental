

<?php 

  include_once('../config.php');//database
  $db = new Database();

?>
<!DOCTYPE html>

<html>
<head>
  <title></title>
  <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
</head>
<body>





<div class="well">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#home" data-toggle="tab">Profile</a></li>
       <a href="index.php" class="btn btn-primary btn-sm">
          Back
          <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
        </a>
    </ul>
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="home">
        <form action="" method="post" id="tab" enctype="multipart/form-data">

  <?php 

     
    $userId = $_SESSION['userID'];
      $sql = "SELECT * FROM user 
      WHERE user_id = ? ";
      $res = $db->getRows($sql, [$userId]);

      // echo print_r($res);

      foreach ($res as  $r) {

        $userId = $r['user_id'];
        $Email = $r['email'];
        $firstName = $r['first_name'];
        $lastName = $r['last_name'];
        $contact = $r['contact'];
        $address = $r['adress'];
        $username = $r['username'];
    

                 //update user

                 if(isset($_POST['updateuser']))
                  {
                    
                    $Email = $_POST['email'];

                    $firstName = $_POST['first_name'];
                    $lastName = $_POST['last_name'];
                    $contact = $_POST['contact'];
                    $address= $_POST['adress'];
                    $username=$_POST['username'];

                   $sql = "UPDATE user SET email=?,first_name = ?,last_name = ?, contact = ?,adress = ?, username = ?     WHERE user_id = ?";
                      $res = $db->updateRow($sql, [$Email,$firstName, $lastName,$contact,$address, $username, $userId]);
                      if(isset($_POST['updateuser'])){
                      echo '
                      <div class="alert alert-success">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Success!</strong> Edit Profile Successfully.
                      </div>
                    ';
                  }//end if isset updateuser
            }
        
    ?>
        
    


 
          <label for="inputdefault">Email</label>
            <input type="text" name="email" value="<?php  echo $Email; ?>" class="input-xlarge">

            <label for="inputdefault">First Name</label>
            <input type="text" name="first_name" value="<?php echo $firstName;?>" class="input-xlarge">
              

            <label for="inputdefault">Last Name</label>
            <input type="text" name="last_name" value="<?php echo $lastName;?>" class="input-xlarge">

             <label for="inputdefault">Phone Number</label>
            <input type="text" name="contact" value="<?php echo $contact;?>" class="input-xlarge">

              <label for="inputdefault">Address</label>
             <input type="text" name="adress" value="<?php echo $address;?>" class="input-xlarge">
           
           
            <label for="inputdefault">Username</label>
            <input type="text" name="username" value="<?php echo $username;?>" class="input-xlarge">
            
            
           
      </div>
   
        	    <button class="btn btn-primary" name="updateuser">Update</button>
        	</div>
        
    	</form>
    </div>
  </div>
</div>

          <?php
      }//end foreach loop of display USER


    ?>
    </div>
  </div>
</div>



     


<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  </body>
</html>