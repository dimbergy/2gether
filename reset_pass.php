<!DOCTYPE html>
<html class="hide-sidebar ls-bottom-footer" lang="en">
<?php 
  require_once ('includes/db_connect.php');
  require ('includes/header.php'); 
    ?>
    

<body class="login">

 <div class="panel panel-default" style="background-color: transparent; border-color: transparent;">
        
          <div class="panel-body">

            <div class="navbar navbar-default" style="background-color: transparent; border-color: transparent;">
              <div class="container-fluid">
                
                <div class="navbar-header" style="background-color: white; border: 1px solid #e5e2e2">
                  <a class="navbar-brand" data-toggle="modal" data-target="#login-modal" href="#"><i class="fa fa-fw fa-sign-in"></i> Sign up</a> 
                </div>
               
              </div>
            </div>

          </div>
        </div>
  <div id="content">


    <div class="container-fluid">
    

        
   
   
      <div class="lock-container"  style="margin-top: 140px">
          
       
        <div class="panel panel-default text-center">
          <img src="images/2gether-black.png" width="200px">
          <div class="panel-body" style="margin-top:-20px">
             <?php if (isset($_GET['mssg'])) { ?>
                  <br /><h4 style="color:green"><?php echo $_GET['mssg'] ?></h4>
                  <?php } else { ?>
                  <h4 class="text-muted" style="margin-top:5px"><span style="font-family:'Aka-Acid-OdinLight'">Δεν είσαι μόνος σου. Είμαστε χιλιάδες<span></h4><br />
                  <?php } ?>
                  
              <form role="form" data-toggle="validator" name="login_form" id="login_form" action="parse/reset.php" method="POST">
              
                  <div class="form-group">
            
                        <input id="email" class="form-control" type="email" name="email" title="Enter email" maxlength="50" placeholder="Email" data-error="Απαιτείται email"/>
                      </div>
                  
                      <div class="form-group">
                       
                        <input id="password" class="form-control" type="password" name="token" title="Enter temporary password"  minlength="6" maxlength="20"  placeholder="Προσωρινό password" data-error="Απαιτείται password"/>
                      </div>
                   
                    <div class="form-group">
                       <p>Συμπλήρωσε το password της επιλογής σου</p>
                        <input id="password" class="form-control" type="password" name="password" title="Enter password"  minlength="6" maxlength="20"  placeholder="Νέο password" data-error="Απαιτείται password"/>
                      </div>

            <button class="btn btn-primary text-right" type="submit" name="reset" id="reset" style="width: 100px">Send <i class="fa fa-fw fa-send-o"></i></button>
                  
              </form>
              </div> 
          </div>

           
      </div>

    </div>
  </div>



<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog lock-container">
      <div class="modal-content">                      
        <div class="modal-body">
        
 <div class="panel panel-default text-center">
            
              <div class="panel-body" style="background-color: #d5e5e2">

              
              <form role="form" data-toggle="validator" name="registration_form" id="registration_form" action="parse/registration.php" method="POST">
                 
                 
            <div class="row">
                      <div class="form-group col-sm-6 col-xs-12">
                        <input id="firstname" class="form-control input-group-lg" type="text" name="fname" title="Enter first name" maxlength="70" placeholder="Όνομα" data-error="Απαιτείται όνομα" required/>
                      </div>
                      <div class="form-group col-sm-6 col-xs-12">
                        <input id="lastname" class="form-control input-group-lg" type="text" name="lname" title="Enter last name" maxlength="70" placeholder="Επώνυμο" data-error="Απαιτείται επώνυμο" required/>
                      </div>
                </div>    
                      <div class="form-group">
                        <label for="email" class="sr-only">Email</label>
                        <input id="email" class="form-control input-group-lg" type="text" name="email" title="Enter Email" maxlength="50" placeholder="Email" data-error="To email που έβαλες δεν είναι έγκυρο"  required/>
                      </div>
    
                    <div class="row">
                      <div class="form-group col-sm-6 col-xs-12">
                        <label for="password" class="sr-only">Password</label>
                        <input id="password" class="form-control input-group-lg" type="password" name="password" title="Enter password" minlength="6" maxlength="20" placeholder="Password" data-error="Απαιτείται password"  required/>
                      </div>
                    
                      <div class="form-group col-sm-6 col-xs-12">
                        <label for="password" class="sr-only">Confirm password</label>
                        <input id="confirm" class="form-control input-group-lg" type="password" name="confirm" title="Confirm password" minlength="6" maxlength="20" placeholder="Επιβεβαίωση password" data-error="Απαιτείται επανάληψη του password"  required/>
                      </div>
                    </div>
                    
                    <button class="btn btn-white col-sm-12 col-xs-12 text-left disabled" style="margin: -10px auto 10px auto;border-color: transparent;">Ημερομηνία γέννησης</button>
                     
                      
                  <div class="row">
                      <div class="form-group col-sm-4 col-xs-6">
                        

<?php 
                      $sql_d="SELECT id FROM days";
                      $result_d= mysqli_query($conn, $sql_d);
                      if (mysqli_num_rows($result_d) > 0) { ?>

                         <select class="form-control id="day" name="day" required>

                          <option value="Day" disabled selected>Ημέρα</option>
                        <?php 
                     while($row_d = mysqli_fetch_assoc($result_d)) { ?>
                         
                         <option value="<?php echo $row_d['id'] ?> ">
                         <?php echo $row_d['id'] ?>

                         </option>
                      
                         
                     <?php } ?>
                          
                          </select>
                          </div>
          
                          
                  <?php        
                      } else {

                  echo "<p>0 αποτελέσματα</p>";

                      }

                      ?>


                      <div class="form-group col-sm-4 col-xs-6">
                        <label for="month" class="sr-only"></label>
                      <?php 
                      $sql_m="SELECT * FROM months";
                      $result_m= mysqli_query($conn, $sql_m);
                      if (mysqli_num_rows($result_m) > 0) { ?>

                         <select class="form-control" id="month" name="month" required>
                          <option value="Month" disabled selected>Μήνας</option>
                        <?php 
                     while($row_m = mysqli_fetch_assoc($result_m)) { ?>
                         
                         <option value="<?php echo $row_m['id'] ?> ">
                         <?php echo $row_m['month_abr'] ?>

                         </option>
                      
                         
                     <?php } ?>
                          
                          </select>
                          </div>
                          
                  <?php        
                      } else {

                  echo "<p>0 αποτελέσματα</p>";

                      }

                      ?> 


                      <div class="form-group col-sm-4 col-xs-12">
                        <label for="year" class="sr-only"></label>

                        <?php 
                      $sql_y="SELECT * FROM years";
                      $result_y= mysqli_query($conn, $sql_y);
                      if (mysqli_num_rows($result_y) > 0) { ?>

                         <select class="form-control" id="year" name="year" required>
                          <option value="Year" disabled selected>Έτος</option>
                        <?php 
                     while($row_y = mysqli_fetch_assoc($result_y)) { ?>
                         
                         <option value="<?php echo $row_y['id'] ?> ">
                         <?php echo $row_y['year'] ?>

                         </option>
                      
                         
                     <?php } ?>
                          
                          </select>
                          </div>
                
                          
                  <?php        
                      } else {

                  echo "<p>0 αποτελέσματα</p>";

                      }

                      ?>

                      </div>
                    <div class="form-group gender text-left" style="text-indent: 5px">
                    
                      <label class="radio-inline">
                        <input type="radio" name="sex" value="1" checked>Άντρας
                      </label>
                      <label class="radio-inline">
                        <input type="radio" name="sex" value="2">Γυναίκα
                      </label>
                    </div>

                    <div class="row">
                      <div class="form-group col-xs-6">
                        <label for="city" class="sr-only"></label>
                        <input id="city" class="form-control input-group-lg reg_name" type="text" name="city" title="Enter city" maxlength="100" placeholder="Πόλη" data-error="Απαιτείται πόλη" required/>
                      </div>

                      <div class="form-group col-xs-6">
                        <label for="country" class="sr-only"></label>

 <?php 
                      $sql="SELECT * FROM countries";
                      $result= mysqli_query($conn, $sql);
                      if (mysqli_num_rows($result) > 0) { ?>

                         <select class="form-control" id="country" name="country" data-error="Απαιτείται χώρα" required>
                          <option value="country" disabled selected>Χώρα</option>
                        <?php 
                     while($row = mysqli_fetch_assoc($result)) { ?>
                         
                         <option value="<?php echo $row['id'] ?> ">
                         <?php echo $row['country'] ?>

                         </option>
                      
                         
                     <?php } ?>
                          
                          </select>
                          </div>
                    </div>
                          
                  <?php        
                      } else {

                  echo "<p>0 αποτελέσματα</p>";

                      }

                      ?>

           
                  <button class="btn btn-primary" id="registration" type="submit" name="registration">Sign Up <i class="fa fa-fw fa-sign-in"></i></button>
          
                               
                  </form>  
                 
  
          </div>
        </div>

        </div>                        
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>
  
 <?php 
    
    require ('includes/footer.php');
    require ('includes/scripts.php');
    
    mysqli_close($conn);
    ?>

</body>

</html>