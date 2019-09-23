
<?php 

  include_once('../config.php');//database
  $db = new Database();

?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
</head>
<body style="background-color: #f5f6fa">





<div class="container">
      <div class="row">
      <div class="col-md-5  toppad  pull-right col-md-offset-3 ">
           
<br><br>
        <p style="float:right;"><?php include "../Includes/logout.php";?></p>
       <br><br><br>

      </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">My Profile</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="https://bothraindustries.com/wp-content/themes/bothraindustries/img/default-user-icon.png" class="img-circle img-responsive"> </div>
                
               
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <!--prikaz korisniškog računa-->
    <?php 
      $userId = $_SESSION['logged'];
      $sql = "SELECT * FROM user 
      WHERE user_type_id = 2 ";
      $res = $db->getRows($sql, [$userId]);

      // echo print_r($res);

      foreach ($res as  $r) {

        $user_id = $r['user_id'];
        $email = $r['email'];
        $firstName = $r['first_name'];
        $lastName = $r['last_name'];
        $contact = $r['contact'];
        $address = $r['adress'];
        $username = $r['username'];
        
    ?>
                      <tr>
                        <td>First Name:</td>
                        <td><?php echo $firstName; ?></td>
                      </tr>
                      <tr>
                        <td>Last Name:</td>
                        <td><?php echo $lastName; ?></td>
                      </tr>
                      <tr>
                        <td>Username:</td>
                        <td><?php echo $username; ?></td>
                      </tr>
                      
                   
                         <tr>
                             
                        <tr>
                        <td>Home Address</td>
                        <td><?php echo $address;?></td>
                      </tr>
                      <tr>
                        <td>Email</td>
                        <td><?php echo $email; ?></td>
                      </tr>
                        <td>Phone Number</td>
                        <td><?php echo $contact;?>
                        </td>
                           
                      </tr>
                     <?php
      }//kraj foreach za prikaz korisnika


    ?>
                    </tbody>
                  </table>
                  
                  
                </div>
              </div>
            </div>
                 <div class="panel-footer">
                        <a href="index.php" class="btn btn-primary btn-sm">
          Back
          <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
        </a>
                        <span class="pull-right">
                            <a href="editProfile.php" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
             <a class = "btn btn-danger  btn-xs" href="#">
                Delete
                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
              </i></a>
                        </span>
                    </div>
            
          </div>
        </div>
      </div>

    </div>
    <br><br><br><br><br>
<footer >
      <center style="font-size:20px;">
        &copy; 2019
      </center>
    </footer>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</body>
</html>

<?php 
$db->Disconnect();
?>


