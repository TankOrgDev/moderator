<?php
include_once './libs/const.php';
include_once './libs/search.php';
$_pageid = 5;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
        $_TITLE = "Blinx Home page";
        include_once './tags/common/head.php';
        ?>
        <?php include './tags/search/search-scripts.php'; ?>
    </head>
    <body>
        <?php include_once './tags/global_header/header.php'; ?>
        <!-- begin:slider -->
        <div class="sr-topbar"></div>
        <!-- begin:tagline -->
        <div class="container">
            <?php include './tags/search/search-header.php'; ?>
            <?php if (is_array($value)) { ?>
                <div class="sr-topbar2"></div>
                <?php if (count($value['requests']) > 0) { ?>
                    <?php include './tags/search/search-tool.php'; ?>
                    <div class="row">
                        <div class="col-sm-4 hidden-xs">
                            <div  class="sr-refine">
                                <?php
                                $x = 1;
                                $_key = "service_type";
                                $_filters = $value[$_key];
                                $_fiter_title = "Service Type";
                                include './tags/search/search-refine.php';
                                //
                                $x = 2;
                                $_key = "date_range";
                                $_filters = $value[$_key];
                                $_fiter_title = "Date range";
                                include './tags/search/search-refine.php';
                                //
                                $x = 3;
                                $_key = "distance_range";
                                $_filters = $value[$_key];
                                $_fiter_title = "Distance range";
                                include './tags/search/search-refine.php';
                                //
                                $x = 4;
                                $_key = "duration_range";
                                $_filters = $value[$_key];
                                $_fiter_title = "duration range";
                                include './tags/search/search-refine.php';
                                ?>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-8">
                            <div>
                                <?php
                                $records_per_page = 10;
                                require './libs/Zebra_Pagination.php';
                                $pagination = new Zebra_Pagination();
                                $pagination->records(count($value['requests']));
                                $pagination->records_per_page($records_per_page);
                                $value['requests'] = array_slice(
                                            $value['requests'],
                                            (($pagination->get_page() - 1) * $records_per_page),
                                            $records_per_page
                                        );
                                foreach ($value['requests'] as $request) {
                                    include './tags/search/search-listing.php';
                                }
                                $pagination->render();
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php
                } else {
                    include './tags/search/search-start.php';
                }
            } else {
                if ($_empty_call) {
                    include './tags/search/search-start.php';
                } else {
                    include './tags/search/search-messages.php';
                }
            }
            ?>
        </div>
        <div class="sr-topbar2"></div>
        <!-- end:tagline -->
        <?php include_once './tags/global_header/footer.php'; ?>
        <!-- end:copyright -->
        <?php include_once './tags/common/scripts.php'; ?>
        <script type="text/javascript">
            $(document).ready(function () {
                $("[toggle-btn]").click(function () {
                    $('[pannel=' + $(this).attr('toggle-btn') + ']').collapse('toggle');
                });
            });
        </script>
    </body>
</html>