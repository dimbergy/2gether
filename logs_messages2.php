<div class="media-left">
    <a href="friend_profile.php?u=<?php echo $rowlist['id'] ?>">
        <img src="<?php echo $rowchat1['avatar'] ?>" width="60" alt="woman" class="media-object" />
    </a>
</div>
<div class="media-body message">
    <div class="panel panel-default">
        <div class="panel-heading panel-heading-white">
            <div class="pull-right">
                <small class="text-muted"><?php echo $time_ago_msg1 ?></small>
                <?php if ($rowchat1['opened']==1) { ?>
                    <small class="text-muted">&nbsp;<i class="fa fa-check"></i> </small>
                <?php } ?>
            </div>
            <a href="friend_profile.php?u=<?php echo $rowlist['id'] ?>"><?php echo $rowchat1['first_name'] ?></a>
        </div>
        <div class="panel-body">

<form name="deleteform" id="deleteform" action="parse/delete_messages.php" method="post">
 <span class="pull-right">&emsp;

 <button type="submit" name="delete" class="btn btn-sm btn-white"><i class="fa fa-trash fa-lg"></i></button>

 <input type="text" class="hidden" name="messageid" value="<?php echo $rowchat1['messageid'] ?>"/>
 </span>
            </form>
            <span><?php echo $rowchat1['message'] ?></span>
        </div>
    </div>
</div>
