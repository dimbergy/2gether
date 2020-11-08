
<?php
$sugg = $conn->query("SELECT id, first_name, last_name, avatar FROM users WHERE email!='$email'");
if($sugg->num_rows > 0) {
while($rowsugg = $sugg->fetch_assoc()){ ?>

<li id="msg-group" class="list-group-item">
    <a href="#msg<?php echo $rowsugg['id'] ?>" data-toggle="collapse"> <!-- toggle-collapse A -->





                <div class="media">
                    <div class="media-left">
                        <img src="<?php echo $rowsugg['avatar'] ?>" width="50" alt=""
                             class="media-object"/>
                    </div>
                    <div class="media-body">
                        <span class="user"><?php echo $rowsugg['first_name']." ".$rowsugg['last_name']  ?></span>
                    </div>
                </div>



    </a>
</li>
<?php       }

}

?>

</ul>


</div> <!-- data scrollable -->
</div> <!-- class="panel panel-default" -->

</div> <!-- class="messages-list" id="myUL" -->

</div> <!-- media-left -->
<div class="media-body">

    <?php
    $sugg1 = $conn->query("SELECT id, first_name, last_name, avatar FROM users WHERE email!='$email'");
    if($sugg1->num_rows > 0) {
    while ($rowsugg1 = $sugg1->fetch_assoc()){ ?>


    <div id="msg<?php echo $rowsugg1['id'] ?>" class="collapse"> <!-- toggle-collapse B -->
        <!-- SEND MESSAGE FORM AND BUTTON | START -->
        <div class="panel panel-default share">

            <div class="input-group">
                <div class="input-group-btn">
                    <button class="btn btn-inverse">
                        <i class="fa fa-envelope" style="color:white"></i> Send
                    </button>
                </div>
                <form name="sendmessage" id="sendmessage" action="parse/###.php" method="post">
                    <select name="receiver" class="hidden">
                        <option value="<?php echo $rowsugg1[id] ?>"></option>
                    </select>
                    <input type="text" class="form-control share-text" placeholder="Send a friend request to <?php echo $rowsugg1['first_name'] ?>" disabled/>
                </form>
            </div>

        </div>
        <!-- SEND MESSAGE FORM AND BUTTON | END -->




    </div> <!-- toggle-collapse B END -->
        <?php
    }
    }
    ?>

</div> <!-- media-body -->



</div> <!-- media messages-container media-clearfix-xs-min media-grid -->