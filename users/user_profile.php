<!DOCTYPE html>
<html class="st-layout ls-top-navbar ls-bottom-footer show-sidebar sidebar-l2" lang="en">

<?php

    session_start();

if($_SESSION['status']!="Active")
{
    header("location:logout.php");
}


    require_once ('includes/db_connect.php');
    require ('includes/header.php');


if (isset($_SESSION['email'])){
$email= $_SESSION['email'];

$query = $conn->query("SELECT id, first_name, last_name, avatar, sex, day_id, email FROM users WHERE email='$email'");

if ($query->num_rows > 0) {
      
      while($row = $query->fetch_assoc()) {

    $frindex=$row['id'];


    ?>

    

<body>

  <!-- Wrapper required for sidebar transitions -->
  <div class="st-container">

<?php
    $p='profile';
    $u='user';

    require ('includes/fixed_navbar.php');
    require ('includes/sidebar.php');

?>


    


    <div class="chat-window-container"></div>

    <!-- sidebar effects OUTSIDE of st-pusher: -->
    <!-- st-effect-1, st-effect-2, st-effect-4, st-effect-5, st-effect-9, st-effect-10, st-effect-11, st-effect-12, st-effect-13 -->

    <!-- content push wrapper -->
    <div class="st-pusher" id="content">

      <!-- sidebar effects INSIDE of st-pusher: -->
      <!-- st-effect-3, st-effect-6, st-effect-7, st-effect-8, st-effect-14 -->

      <!-- this is the wrapper for the content -->
      <div class="st-content">

        <!-- extra div for emulating position:fixed of the menu -->
        <div class="st-content-inner">

        <?php require ('includes/subnav.php'); ?>

          <div class="container-fluid">

            <div class="tabbable">
           <!--   <ul class="nav nav-tabs">
                <li class="active"><a href="#home" data-toggle="tab"><i class="fa fa-fw fa-picture-o"></i> Photos</a></li>
                <li class=""><a href="#profile" data-toggle="tab"><i class="fa fa-fw fa-folder"></i> Albums</a></li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane fade active in" id="home">
                  <img src="images/place1.jpg" alt="image" />
                  <img src="images/place2.jpg" alt="image" />
                  <img src="images/food1.jpg" alt="image" />
                </div>
                <div class="tab-pane fade" id="profile">
                  <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth
                    letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit. Keytar helvetica VHS salvia yr, vero magna velit sapiente labore stumptown.
                    Vegan fanny pack odio cillum wes anderson 8-bit, sustainable jean shorts beard ut DIY ethical culpa terry richardson biodiesel. Art party scenester stumptown, tumblr butcher vero sint qui sapiente accusamus tattooed echo park.</p>
                </div>
                <div class="tab-pane fade" id="dropdown1">
                  <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy
                    salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh mi whatever gluten-free, carles pitchfork biodiesel fixie etsy retro mlkshk vice blog. Scenester cred you probably
                    haven't heard of them, vinyl craft beer blog stumptown. Pitchfork sustainable tofu synth chambray yr.</p>
                </div>
                <div class="tab-pane fade" id="dropdown2">
                  <p>Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo
                    park Austin. Cred vinyl keffiyeh DIY salvia PBR, banh mi before they sold out farm-to-table VHS viral locavore cosby sweater. Lomo wolf viral, mustache readymade thundercats keffiyeh craft beer marfa ethical. Wolf salvia freegan, sartorial
                    keffiyeh echo park vegan.</p>
                </div>
              </div>-->
            </div>


            <div class="row">
              <div class="col-md-6" id="about">
                  <div class="timeline-block">
                <div class="panel panel-default">

                  <div class="panel-heading aboutbtn">
                      <div class="media">
                          <div class="media-body">
                    <a href="#" class="btn btn-xs pull-right" style="margin-bottom: 5px;"><i class="fa fa-pencil"></i></a>
                              &emsp;<i class="fa fa-fw fa-info-circle"></i> About

                          </div>
                      </div>
                  </div>
                  <div class="panel-body">
                    <ul class="list-unstyled profile-about margin-none">

                      <li id="infotit1" class="padding-v-5">
                        <div class="row">
                          <div class="col-sm-4"><span class="text-muted">Education</span></div>
                          <?php include ('includes/get_u-studies.php'); ?>

                      </li>

                      <li id="infotit2" class="padding-v-5">
                        <div class="row">
                          <div class="col-sm-4"><span class="text-muted">Workplace</span></div>
                            <?php include ('includes/get_u-professions.php'); ?>

                      </li>
                      <li id="infotit3" class="padding-v-5">
                        <div class="row">
                          <div class="col-sm-4"><span class="text-muted">Sex</span></div>
                          <?php include ('includes/get_u-sex.php'); ?>

                      </li>
                      <li id="infotit4" class="padding-v-5">
                        <div class="row">
                          <div class="col-sm-4"><span class="text-muted">Homeplace</span></div>
                          <?php include ('includes/get_u-homeplace.php'); ?>

                      </li>
                        <li id="infotit5" class="padding-v-5">
                            <div class="row">
                                <div class="col-sm-4"><span class="text-muted">Birthplace</span></div>
                                <?php include ('includes/get_u-birthplace.php'); ?>

                        </li>
                        <li id="infotit6" class="padding-v-5">
                            <div class="row">
                                <div class="col-sm-4"><span class="text-muted">Birthdate</span></div>
                                <?php include ('includes/get_u-birthdate.php'); ?>

                        </li>
                      <li id="infotit7" class="padding-v-5">
                        <div class="row">
                          <div class="col-sm-4"><span class="text-muted">Mobile phone</span></div>
                            <?php include ('includes/get_u-phones.php'); ?>

                      </li>
                        <li id="infotit8" class="padding-v-5">
                            <div class="row">
                                <div class="col-sm-4"><span class="text-muted">Email address</span></div>
                                <?php include ('includes/get_u-emails.php'); ?>

                        </li>
                        <li id="infotit9" class="padding-v-5">
                            <div class="row">
                                <div class="col-sm-4"><span class="text-muted">Websites</span></div>
                                <?php include ('includes/get_u-websites.php'); ?>

                        </li>
                    </ul>
                  </div>
                </div>
              </div>
              </div>


                <div class="col-md-6 hidden" id="aboutform">
                    <div class="timeline-block">
                    <div class="panel panel-default">
                        <div class="panel-heading" id="close">
                            <div class="media">
                                <div class="media-body"  style="padding: 4px 0 10px 15px;">
                            <a href="#" class="btn btn-xs pull-right"><i class="fa fa-close"></i>&emsp;</a>
                            <i class="fa fa-fw fa-info-circle"></i> Edit Profile
                        </div>
                            </div>
                        </div>
                        <div class="panel-body">

                            <form role="form" name="about_form" action="parse/update_info.php" method="post" id="about_form">
                            <ul class="list-unstyled profile-about margin-none">
                                <li class="padding-v-5">
                                    <div class="row form-group">
                                        <div class="col-sm-4"><span class="text-muted">Education</span></div>
                                        <div id="st1" class="col-sm-7"><input type="text" name="studies" maxlength="255" class="form-control" ></div>
                                    <div id="btnst1" class="col-sm-1"><button type="button" class="btn btn-white"><i class="fa fa-plus"></i></button></div>

                                    </div>
                                </li>
                                <li id="st2" class="padding-v-5 hidden">
                                    <div class="row form-group">
                                        <div class="col-sm-4"><span class="text-muted"></span></div>
                                        <div class="col-sm-7"><input type="text" name="studies1" maxlength="255" class="form-control" ></div>
                                        <div id="btnst2" class="col-sm-1"><button type="button" class="btn btn-white"><i class="fa fa-plus"></i></button></div>

                                    </div>
                                </li>
                                <li id="st3" class="padding-v-5 hidden">
                                    <div class="row form-group">
                                        <div class="col-sm-4"><span class="text-muted"></span></div>
                                        <div class="col-sm-7"><input type="text" name="studies2" maxlength="255" class="form-control" ></div>
                                        <div id="btnst3" class="col-sm-1"><button type="button" class="btn btn-white"><i class="fa fa-close"></i></button></div>

                                    </div>
                                </li>
                                <li class="padding-v-5">
                                    <div class="row form-group">
                                        <div class="col-sm-4"><span class="text-muted">Workplace</span></div>
                                        <div id="wrk1" class="col-sm-7"><input type="text" name="work" maxlength="255" class="form-control"></div>
                                        <div id="btnwrk1" class="col-sm-1"><button type="button" class="btn btn-white"><i class="fa fa-plus"></i></button></div>
                                    </div>
                                </li>
                                <li id="wrk2" class="padding-v-5 hidden">
                                    <div class="row form-group">
                                        <div class="col-sm-4"><span class="text-muted"></span></div>
                                        <div class="col-sm-7"><input type="text" name="work1" maxlength="255" class="form-control"></div>
                                        <div id="btnwrk2" class="col-sm-1"><button type="button" class="btn btn-white"><i class="fa fa-plus"></i></button></div>
                                    </div>
                                </li>
                                <li id="wrk3" class="padding-v-5 hidden">
                                    <div class="row form-group">
                                        <div class="col-sm-4"><span class="text-muted"></span></div>
                                        <div class="col-sm-7"><input type="text" name="work2" maxlength="255" class="form-control"></div>
                                        <div id="btnwrk3" class="col-sm-1"><button type="button" class="btn btn-white"><i class="fa fa-close"></i></button></div>
                                    </div>
                                </li>
                                <li class="padding-v-5">
                                    <div class="row form-group">
                                        <div class="col-sm-4"><span class="text-muted">Sex</span></div>
                                        <div class="col-sm-8">
                                            <label class="radio-inline">
                                                <input type="radio" name="sex" value="1" <?php if ($row['sex']==1)  echo "checked" ?>>Άντρας
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="sex" value="2"<?php if ($row['sex']==2)  echo "checked" ?>>Γυναίκα
                                            </label>

                                            <!--<?php include ('includes/get_sex.php'); ?>--></div>
                                    </div>
                                </li>
                                <li class="padding-v-5">
                                    <div class="row form-group">
                                        <div class="col-sm-4"><span class="text-muted">Homeplace</span></div>
                                        <div class="col-sm-4"><input type="text" name="homecity" class="form-control" maxlength="100" placeholder="<?php include ('includes/get_city.php'); ?>"></div>
                                        <div class="col-sm-4">

                                            <?php
                                            $getcountry = "SELECT id, country FROM countries";
                                            $rescountry= mysqli_query($conn, $getcountry);
                                            if (mysqli_num_rows($rescountry) > 0) { ?>


                                                <select name="homecountry" id="homecountry" class="form-control">

                                                    <option disabled>Country</option>

                                                    <?php  while($rowcountry = mysqli_fetch_assoc($rescountry)) { ?>

                                                        <option value="<?php echo $rowcountry['id'] ?>"


                                                            <?php  $getcountry1 = "SELECT countries.id AS coid, countries.country AS coname FROM countries INNER JOIN users ON users.country_id=countries.id WHERE users.email='$email'";

                                                            $rescountry1= mysqli_query($conn, $getcountry1);
                                                            if (mysqli_num_rows($rescountry1) > 0) {
                                                                while ($rowcountry1 = mysqli_fetch_assoc($rescountry1)) {

                                                                    if ($rowcountry['id']==$rowcountry1['coid']) echo "selected";

                                                                }  } else { echo "0 results"; } ?>

                                                        >
                                                            <?php echo $rowcountry['country'] ?>

                                                        </option>


                                                    <?php } ?>

                                                </select>

                                                <?php
                                            } else {

                                                echo "<p>0 αποτελέσματα</p>";

                                            }

                                            ?>

                                        </div>
                                    </div>
                                </li>
                                <li class="padding-v-5">
                                    <div class="row form-group">
                                        <div class="col-sm-4"><span class="text-muted">Birthplace</span></div>
                                        <div class="col-sm-4"><input type="text" name="origin" class="form-control" maxlength="100" placeholder="
<?php $getcity1 = "SELECT cities.id AS cityid, cities.city AS cityname FROM cities INNER JOIN bcity ON cities.id=bcity.city_id INNER JOIN users ON users.id=bcity.user_id WHERE users.email='$email'";
$rescity1 = mysqli_query($conn, $getcity1);
if (mysqli_num_rows($rescity1) > 0) {
    while ($rowcity1 = mysqli_fetch_assoc($rescity1)) {
        echo $rowcity1['cityname'];

    } } else { echo "City"; } ?>"></div>
                                        <div class="col-sm-4">

                                            <?php
                            $getcountry = "SELECT id, country FROM countries";
                            $rescountry= mysqli_query($conn, $getcountry);
                            if (mysqli_num_rows($rescountry) > 0) { ?>


                                            <select name="origincountry" id="origincountry" class="form-control">
                                        <option disabled
                                <?php  $getcountry1 = "SELECT countries.id AS coid, countries.country AS coname FROM countries INNER JOIN bcountry ON countries.id=bcountry.country_id INNER JOIN users ON users.id=bcountry.user_id WHERE users.email='$email'";

                                $rescountry1= mysqli_query($conn, $getcountry1);
                                if (mysqli_num_rows($rescountry1) == 0) { echo "selected"; } ?>

                                        >Country</option>

                                             <?php  while($rowcountry = mysqli_fetch_assoc($rescountry)) { ?>

                                                    <option value="<?php echo $rowcountry['id'] ?>"


                                                 <?php  $getcountry1 = "SELECT countries.id AS coid, countries.country AS coname FROM countries INNER JOIN bcountry ON countries.id=bcountry.country_id INNER JOIN users ON users.id=bcountry.user_id WHERE users.email='$email'";

                                                 $rescountry1= mysqli_query($conn, $getcountry1);
                                                 if (mysqli_num_rows($rescountry1) > 0) {
                                                     while ($rowcountry1 = mysqli_fetch_assoc($rescountry1)) {

                if ($rowcountry['id']==$rowcountry1['coid']) echo "selected";

                                                      }  } else { echo "0 results"; } ?>

                                                    >
                                                        <?php echo $rowcountry['country'] ?>

                                                    </option>


                                                <?php } ?>

                                            </select>

                                <?php
                            } else {

                                echo "<p>0 αποτελέσματα</p>";

                            }

                                            ?>

                                        </div>
                                    </div>
                                </li>
                                <li class="padding-v-5">
                                    <div class="row form-group">
                                        <div class="col-sm-4"><span class="text-muted">Birthdate</span></div>

                                        <div class="col-sm-2">
                                            <?php
                                            $sql_d="SELECT id FROM days";
                                            $result_d= mysqli_query($conn, $sql_d);
                                            if (mysqli_num_rows($result_d) > 0) { ?>

                                            <select class="form-control" id="bday" name="bday" required>

                                                <option value="day" disabled>Day</option>
                                                <?php
                                                while($row_d = mysqli_fetch_assoc($result_d)) { ?>

                                                    <option value="<?php echo $row_d['id'] ?>"

                                                        <?php  $getday = "SELECT day_id  FROM users WHERE email='$email'";

                                                        $resday= mysqli_query($conn, $getday);
                                                        if (mysqli_num_rows($resday) > 0) {
                                                            while ($rowday = mysqli_fetch_assoc($resday)) {
                                                                if ($row_d['id']==$rowday['day_id']) echo "selected";

                                                            }  } else { echo "0 results"; } ?>

                                                    >
                                                        <?php echo $row_d['id'] ?>

                                                    </option>


                                                <?php } ?>

                                            </select>



                                        <?php
                                        } else {

                                            echo "<p>0 αποτελέσματα</p>";

                                        }

                                        ?>

                                        </div>
                                        <div class="col-sm-3">

                                            <?php
                                            $sql_m="SELECT * FROM months";
                                            $result_m= mysqli_query($conn, $sql_m);
                                            if (mysqli_num_rows($result_m) > 0) { ?>

                                            <select class="form-control" id="bmonth" name="bmonth" required>

                                                <option value="month" disabled>Month</option>

                                               <?php while($row_m = mysqli_fetch_assoc($result_m)) { ?>

                                                    <option value="<?php echo $row_m['id'] ?>"

                                                    <?php  $getmonth = "SELECT months.id AS moid, months.month AS moname FROM months INNER JOIN users ON users.month_id=months.id WHERE users.email='$email'";

                                                    $resmonth= mysqli_query($conn, $getmonth);
                                                    if (mysqli_num_rows($resmonth) > 0) {
                                                        while ($rowmonth = mysqli_fetch_assoc($resmonth)) {
if ($row_m['id']==$rowmonth['moid']) echo "selected";

                                                         }  } else { echo "0 results"; } ?>



                                                    >
                                                        <?php echo $row_m['month'] ?>

                                                    </option>


                                                <?php } ?>

                                            </select>

                                        <?php
                                        } else {

                                            echo "<p>0 αποτελέσματα</p>";

                                        }

                                        ?>


                                    </div>
                                        <div class="col-sm-3">

                                            <?php
                                            $sql_y="SELECT * FROM years";
                                            $result_y= mysqli_query($conn, $sql_y);
                                            if (mysqli_num_rows($result_y) > 0) { ?>

                                            <select class="form-control" id="byear" name="byear" required>
                                                <option value="year" disabled>Year</option>
                                                <?php
                                                while($row_y = mysqli_fetch_assoc($result_y)) { ?>

                                                    <option value="<?php echo $row_y['id'] ?>"

                                                        <?php  $getyear = "SELECT years.id AS yid, years.year AS yname FROM years INNER JOIN users ON users.year_id=years.id WHERE users.email='$email'";

                                                        $resyear= mysqli_query($conn, $getyear);
                                                        if (mysqli_num_rows($resyear) > 0) {
                                                            while ($rowyear = mysqli_fetch_assoc($resyear)) {
                                                                if ($row_y['id']==$rowyear['yid']) echo "selected";

                                                            }  } else { echo "0 results"; } ?>

                                                    >
                                                        <?php echo $row_y['year'] ?>

                                                    </option>


                                                <?php } ?>

                                            </select>



                                        <?php
                                        } else {

                                            echo "<p>0 αποτελέσματα</p>";

                                        }

                                        ?>

                                        </div>
                                    </div>
                                </li>
                                <li class="padding-v-5">
                                    <div class="row form-group">
                                        <div class="col-sm-4"><span class="text-muted">Mobile phone</span></div>
                                        <div class="col-sm-8"><input type="text" name="phone" class="form-control" maxlength="15" placeholder="<?php include ('includes/get_phone.php'); ?>"></div>
                                    </div>
                                </li>
                                <!--<li class="padding-v-5">
                                    <div class="row form-group">
                                        <div class="col-sm-4"><span class="text-muted">Email</span></div>
                                        <div class="col-sm-8"><input type="text" name="email" class="form-control" maxlength="50" placeholder="<?php include ('includes/get_email.php'); ?>"></div>
                                    </div>
                                </li>-->

                                 <li class="padding-v-5">
                                    <div class="row form-group">
                                        <div class="col-sm-4"><span class="text-muted">Websites</span></div>
                                        <div id="web1" class="col-sm-7"><input type="text" name="website1" maxlength="50" class="form-control" ></div>
                                        <div id="btnweb1" class="col-sm-1"><button type="button" class="btn btn-white"><i class="fa fa-plus"></i></button></div>

                                    </div>
                                </li>
                                <li id="web2" class="padding-v-5 hidden">
                                    <div class="row form-group">
                                        <div class="col-sm-4"><span class="text-muted"></span></div>
                                        <div class="col-sm-7"><input type="text" name="website2" maxlength="50" class="form-control" ></div>
                                        <div id="btnweb2" class="col-sm-1"><button type="button" class="btn btn-white"><i class="fa fa-plus"></i></button></div>

                                    </div>
                                </li>
                                <li id="web3" class="padding-v-5 hidden">
                                    <div class="row form-group">
                                        <div class="col-sm-4"><span class="text-muted"></span></div>
                                        <div class="col-sm-7"><input type="text" name="website3" maxlength="50" class="form-control" ></div>
                                        <div id="btnweb3" class="col-sm-1"><button type="button" class="btn btn-white"><i class="fa fa-close"></i></button></div>

                                    </div>
                                </li>



                                <!--<li class="padding-v-5">
                                    <div class="row form-group">
                                        <div class="col-sm-4"><span class="text-muted">Ονοματεπώνυμο</span></div>
                                        <div class="col-sm-4"><input type="text" name="fname" class="form-control" maxlength="70" placeholder="<?php echo $row['first_name'] ?>"></div>
                                        <div class="col-sm-4">
                                            <input type="text" name="lname" class="form-control" maxlength="70" placeholder="<?php echo $row['last_name'] ?>">


                                        </div>
                                    </div>
                                </li>-->
<hr>
                                <li class="padding-v-5" style="margin-top: 10px">
                                    <div class="row form-group">
                                        <div style="padding-right: 8px"><button type="submit" name="cancel" id="cancel" class="btn btn-danger pull-right"><i class="fa fa-close"></i></button></div>
                                        <div class="pull-right">&emsp;</div>
                                        <div><button type="reset" name="reset" id="reset" class="btn btn-inverse pull-right"><i class="fa fa-refresh"></i></button></div>
                                        <div class="pull-right">&emsp;</div>
                                        <div><button type="submit" name="update" id="update" class="btn btn-success pull-right"><i class="fa fa-check"></i></button></div>



                                    </div>
                                </li>

                            </ul>
                            </form>

                        </div>
                    </div>
                </div>
                </div>


    <div class="col-md-6">
        <div class="timeline-block">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="media">
                    <div class="media-body"  style="padding: 12px 0 12px 15px;">


                <i class="icon-user-1"></i> Friends
            </div>
            </div>
            </div>

            <div class="panel-body">
                <ul class="img-grid">


                 <?php include ('includes/get_friends.php'); ?>

                </ul>
            </div>
        </div>
        </div>
    </div>





            </div>



          </div>

        </div>
        <!-- /st-content-inner -->

      </div>
      <!-- /st-content -->

    </div>
    <!-- /st-pusher -->

   <?php 

} 

      }


   } else {

   echo "<meta http-equiv=\"refresh\" content=\"0; url=http://localhost/2016-17/2gether/index.php\">";
exit();

   ;}

   require ('includes/footer.php');
    require ('includes/scripts.php');

   mysqli_close($conn);

    ?>



</body>

</html>