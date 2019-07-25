<?php
include("../../scripts/config.php");
?>
<div class="page-title">
    <h3 class="breadcrumb-header">Archived Application Hub</h3>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-darkblue">
            <div class="panel-heading clearfix">
                <h4 class="panel-title">Archived Pending Applications</h4>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Role Applying For</th>
                                <th>Date</th>
                                <th>Username</th>
                                <th>View</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                              $results = mysqli_query($conn, "SELECT * FROM `panel`.`deleted_applications` WHERE status = '0'");
                              while($row = mysqli_fetch_array($results)) {
                                ?>
                                    <tr id="<?php echo $row['id']; ?>">
                                        <th scope="row"><?php echo $row['a_role']?></th>
                                        <td><?php echo $row['date']?></td>
                                        <td><span style="cursor: pointer;" data-toggle="modal" data-target=".profileModal" onclick="viewProfile('<?php echo $row['username'];?>')"><?php echo $row['username'];?></span></td>
                                        <td><button onclick="viewApplication(<?php echo $row['id'] ?>)" type="button" class="btn btn-info btn-xs btn-xxs m-b-xxs">View</button></td>
                                    </tr>

                                <?php
                                }

                                ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <div class="panel panel-darkblue">
            <div class="panel-heading clearfix">
                <h4 class="panel-title">Archived Accepted Applications</h4>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Role Applying For</th>
                                <th>Date</th>
                                <th>Username</th>
                                <th>View</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                              $results = mysqli_query($conn, "SELECT * FROM `panel`.`deleted_applications` WHERE status = '1'");
                              while($row = mysqli_fetch_array($results)) {
                                ?>
                                    <tr id="<?php echo $row['id']; ?>">
                                        <th scope="row"><?php echo $row['a_role']?></th>
                                        <td><?php echo $row['date']?></td>
                                        <td><span style="cursor: pointer;" data-toggle="modal" data-target=".profileModal" onclick="viewProfile('<?php echo $row['username'];?>')"><?php echo $row['username'];?></span></td>
                                        <td><button onclick="viewApplication(<?php echo $row['id'] ?>)" type="button" class="btn btn-info btn-xs btn-xxs m-b-xxs">View</button></td>
                                    </tr>

                                <?php
                                }

                                ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <div class="panel panel-darkblue">
            <div class="panel-heading clearfix">
                <h4 class="panel-title">Archived Denied Applications</h4>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Role Applying For</th>
                                <th>Date</th>
                                <th>Username</th>
                                <th>View</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                              $results = mysqli_query($conn, "SELECT * FROM `panel`.`deleted_applications` WHERE status = '2'");
                              while($row = mysqli_fetch_array($results)) {
                                ?>
                                    <tr id="<?php echo $row['id']; ?>">
                                        <th scope="row"><?php echo $row['a_role']?></th>
                                        <td><?php echo $row['date']?></td>
                                        <td><span style="cursor: pointer;" data-toggle="modal" data-target=".profileModal" onclick="viewProfile('<?php echo $row['username'];?>')"><?php echo $row['username'];?></span></td>
                                        <td><button onclick="viewApplication(<?php echo $row['id'] ?>)" type="button" class="btn btn-info btn-xs btn-xxs m-b-xxs">View</button></td>
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
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
function viewApplication(id) {
  urlRoute.loadPage("Mgmt.ViewArchivedApp?id=" + id);
}

</script>
