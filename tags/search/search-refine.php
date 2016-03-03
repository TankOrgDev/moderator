<div class="panel-group sr-accordion">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title" toggle-btn="refine-<?php echo $x ?>" data-toggle="collapse" data-parent="#accordion" >
                <?php echo $_fiter_title ?>
            </h4>
        </div>
        <div pannel="refine-<?php echo $x ?>" class="panel-collapse">
            <div class="panel-body">
                <ul>
                    <?php
                    foreach ($_filters as &$filter) {
                        $link = $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" . "&$_key=" . $filter["id"];
                        echo "<a href=\"$link\"><li>" . $filter["screen_name"] . "</li></a>";
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>