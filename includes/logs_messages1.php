<div class="media-body message">
    <div class="panel panel-default session-body">
        <div class="panel-heading panel-heading-white session-head">
            <div class="pull-right">
                <small class="text-muted"><?php echo $time_ago_msg1 ?></small>
<?php if ($rowchat1['opened']==1) { ?>
                <small class="text-muted">&nbsp;<i class="fa fa-check"></i> </small>
<?php } ?>
            </div>
            <a href="user_profile.php?u=<?php echo $sessionid ?>">Me</a>
        </div>
        <div class="panel-body">
<form name="deleteform" id="deleteform" action="parse/delete_messages.php" method="post">

<span class="pull-right">&emsp;
<?php if ($rowchat1['sender_del']==0) { ?>
<button type="submit" name="delete" class="btn btn-sm btn-white" style="background-color: #d4dfed;"><i class="fa fa-trash fa-lg"></i></button>
<?php } ?>
<input type="text" class="hidden" name="messageid" value="<?php echo $rowchat1['messageid'] ?>"/>
</span>
            </form>
            <span><?php echo $rowchat1['message'] ?></span>
        </div>
    </div>
</div>
<div class="media-right">
    <a href="user_profile.php?u=<?php echo $sessionid ?>">
    <img src="<?php echo $rowchat1['avatar'] ?>" width="60" alt="" class="media-object" />
    </a>
</div>
