  <!-- Search -->
                    <form class="navbar-form margin-none navbar-left">
                        <div class="search-1">
                            <div class="input-group">

                                <span class="input-group-addon">
                                    <button data-toggle="tk-modal-demo" data-modal-options="slide-left" data-dialog-options="sidebar sidebar-size-3 sidebar-size-xs-1 sidebar-offset-0 left" class="btn btn-primary" style="background-color: transparent; border-color: transparent">
                                    <i class="icon-search fa-lg"></i></button></span>
                                <!--<input type="text" class="form-control form-control-w-150" placeholder="Search...">-->
                            </div>
                        </div>
                    </form>

                    <!-- SEARCH MODAL START-->

                    <script id="tk-modal-demo" type="text/x-handlebars-template">
                        <div class="modal fade{{#if modalOptions}} {{ modalOptions }}{{/if}}" id="{{ id }}">
                            <div class="modal-dialog{{#if dialogOptions}} {{ dialogOptions }}{{/if}}" style="background-color: #8f9fb5">
                                <div class="v-cell">
                                    <div class="modal-content{{#if contentOptions}} {{ contentOptions }}{{/if}}">
                                        <div class="modal-header" style="background-color: #8f9fb5">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title text-center" style="color: ghostwhite">Meet people</h4>
                                        </div>
                                        <div class="modal-body" style="background-color: #8f9fb5">

                                            <div class="media-left">
                                                <div class="messages-list">
                                                    <div class="panel panel-default" style="background-color: #ecf4fc">

                                                        <div class="chat-search form-group">
                                                            <input type="text" id="myMessages1" onkeyup="myFunction1()" class="form-control" placeholder="Search" style="background-color: ghostwhite;"/>
                                                        </div>


                                                        <ul class="list-group" id="myUL1" style="background-color: #ecf4fc">

                <?php
                $search = $conn->query("SELECT id, first_name, last_name, avatar FROM users WHERE email!='$email'");
                if($search->num_rows > 0){
                    while ($rowsearch=$search->fetch_assoc()){ ?>



                                                            <li class="list-group-item" style="padding-top:5px; padding-bottom:5px">
                                                                <a href="friend_profile.php?u=<?php echo $rowsearch['id'] ?>">

                                                                        <div class="media-left">
            <img src="<?php echo $rowsearch['avatar'] ?>" width="40" alt="" class="media-object" />
                                                                        </div>
                                                                    <div class="media-body">
                                                                        <span><?php echo $rowsearch['first_name']." ".$rowsearch['last_name']  ?></span>
                                                                    </div>
                                                                </a>
                                                            </li>

                        <?php
                    }
                }
                ?>

                                                        </ul>

                                                    </div>
                                                </div>
                                            </div>




                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </script>

                    <!-- SEARCH MODAL END-->
