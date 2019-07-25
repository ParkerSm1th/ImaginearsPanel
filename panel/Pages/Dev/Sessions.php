<?php
include("../../scripts/config.php");
error_reporting(E_ALL);
ini_set("display_errors", 1);
 ?>
<div class="page-title">
    <h3 class="breadcrumb-header">Logged in users</h3>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-darkblue">
            <div class="panel-heading clearfix">
                <h4 class="panel-title">Active Sessions</h4>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th>UUID</th>
                                <th>Role</th>
                                <th>Log Out</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                              $results = mysqli_query($conn, "SELECT * FROM `panel`.`sessions`");
                              while($row = mysqli_fetch_array($results)) {
                                $prettyrank = prettyRank($row['role']);
                                ?>
                                    <tr id="<?php echo $row['id']; ?>">
                                        <th scope="row"><?php echo $row['id'];?></th>
                                        <td><span style="cursor: pointer;" data-toggle="modal" data-target=".profileModal" onclick="viewProfile('<?php echo $row['ign'];?>')"><?php echo $row['ign'];?></span></td>
                                        <td><?php echo $row['uuid'];?></td>
                                        <td><?php echo $prettyrank ?></td>
                                        <td><button onclick="logOut(<?php echo $row['id'] ?>, '<?php echo $row['session_id'] ?>')" type="button" class="btn btn-danger btn-xs btn-xxs m-b-xxs">Log out</button></td>
                                    </tr>

                                <?php
                                }
                                ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
function logOut($id, $session) {
  $.ajax({
      url: 'scripts/logUserOut.php',
      type:'POST',
      data:"id=" + $id + "&session=" + $session,
      success: function(msg)
      {
        console.log(msg);
          $("#" + $id).fadeOut();
      }
  });
}
</script>
