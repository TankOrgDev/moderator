<?php
/*
  Array
  (
  [first_name] => raju
  [last_name] => Mani
  [mobile_number] => 9538088668
  [gender] => Male
  [user_id] => 1
  [Id] => 13
  [Message] =>
  [Address] => 1
  [Location] =>
  [Createddate] => 2015-11-28 22:04:33
  [Requesteddate] => 2015-11-29 12:00:00
  [latitude] => 12.9591722
  [longitude] => 77.69741899999997
  [duration] => 1
  )
 */
session_start();
$vId=$_SESSION['vid'];
?>
<script>
    function OnClick()
    {
        $vid='<?php echo $vId; ?>';
        if($vid =='')
        {
            alert("Pleaase Login to accept request.");
            return false;
        }
    };
</script>
<div class="bs-callout bs-callout-info">
    <h4  style="padding-right: 70px;">
        <?php
        echo $request["first_name"] . " " . $request["last_name"]
        ?>
        <a onclick="return OnClick()" href="accept.php?id=<?php echo $request["reqID"] ?>&status=<?php echo 'A' ?>"class="btn btn-success pull-right" style="margin-right: -70px;margin-top: -14px;">Accept</a>
    </h4>
    <p>
        <b><?php echo $request["Description"] ?></b>  service
        <?php echo (isset($request["duration"]) ? " for " . $request["duration"] . "Hrs" : "") ?> on 
        <code><?php echo $request["Requesteddate"] ?></code>
        <?php if (isset($request["Location"])) { ?>
            at <a target="_blank" href="https://www.google.com/maps/place/<?php echo $request["latitude"] ?>,<?php echo $request["longitude"] ?>"><?php echo $request["Location"] ?></a>
            <?php
        }?> <br> 
        <?php echo $request["Message"]
        ?>
        <?php echo $request["reqID"] ?>
    </p>
</div>
    