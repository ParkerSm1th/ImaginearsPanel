<?php
include("../../scripts/config.php");
?>
<div class="page-title">
    <div class="row">
      <div class="col-md-6">
        <h3 class="breadcrumb-header">Updates</h3>
      </div>
      <div class="col-md-6" style="margin-top: 20px; text-align: right;">
        <a href="Mgmt.NewUpdate" class="web-page"><button type="button" class="btn btn-info btn-xs">New Update</button></a>
      </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-darkblue">
            <div class="panel-heading clearfix">
                <h4 class="panel-title">Posted Updates</h4>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Date</th>
                                <th>Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                              $results = mysqli_query($conn, "SELECT * FROM `panel`.`panel_updates` WHERE published = '1'");
                              while($row = mysqli_fetch_array($results)) {
                                ?>
                                    <tr id="<?php echo $row['id']; ?>">
                                        <th scope="row"><?php echo $row['title']?></th>
                                        <td><span style="cursor: pointer;" data-toggle="modal" data-target=".profileModal" onclick="viewProfile('<?php echo $row['author_name'];?>')"><?php echo $row['author_name'];?></span></td>
                                        <td><?php echo $row['date'] ?></td>
                                        <td><a href="Updates.View?id=<?php echo $row['id'] ?>" class="web-page"><button type="button" class="btn btn-info btn-xs btn-xxs m-b-xxs">View</button></a>
                                          <a href="Mgmt.EditUpdate?id=<?php echo $row['id'] ?>" class="web-page"><button type="button" class="btn btn-warning btn-xs btn-xxs m-b-xxs">Edit</button></a>
                                          <button onclick="unpublish(<?php echo $row['id'] ?>)" type="button" class="btn btn-danger btn-xs btn-xxs m-b-xxs">Unpublish</button>
                                          <button onclick="archive(<?php echo $row['id'] ?>)" type="button" class="btn btn-danger btn-xs btn-xxs m-b-xxs">Delete</button></td>
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
                <h4 class="panel-title">Non Posted Updates</h4>
            </div>
            <div class="panel-body">
              <div class="table-responsive">
                  <table class="table">
                      <thead>
                          <tr>
                              <th>Title</th>
                              <th>Author</th>
                              <th>Date</th>
                              <th>Manage</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php
                            $results = mysqli_query($conn, "SELECT * FROM `panel`.`panel_updates` WHERE published = '0'");
                            while($row = mysqli_fetch_array($results)) {
                              ?>
                                  <tr id="<?php echo $row['id']; ?>">
                                      <th scope="row"><?php echo $row['title']?></th>
                                      <td><span style="cursor: pointer;" data-toggle="modal" data-target=".profileModal" onclick="viewProfile('<?php echo $row['author_name'];?>')"><?php echo $row['author_name'];?></span></td>
                                      <td><?php echo $row['date'] ?></td>
                                      <td><a href="Updates.View?id=<?php echo $row['id'] ?>" class="web-page"><button type="button" class="btn btn-info btn-xs btn-xxs m-b-xxs">View</button></a>
                                        <a href="Mgmt.EditUpdate?id=<?php echo $row['id'] ?>" class="web-page"><button type="button" class="btn btn-warning btn-xs btn-xxs m-b-xxs">Edit</button></a>
                                        <button onclick="publish(<?php echo $row['id'] ?>)" type="button" class="btn btn-success btn-xs btn-xxs m-b-xxs">Publish</button>
                                        <button onclick="archive(<?php echo $row['id'] ?>)" type="button" class="btn btn-danger btn-xs btn-xxs m-b-xxs">Delete</button></td>
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
function unpublish(id) {
  $.ajax({
      url: 'scripts/updateUpdate.php',
      type:'POST',
      data: {
        id: id,
        type: 1
      },

      success: function(msg)
      {
          console.log("Done");
          console.log(msg);
          if (msg == 0) {
            console.log("Error");
          } else if (msg == 1) {
            toastr["success"]("The Update has been unpublished", "Unpublished")
            urlRoute.loadPage("Mgmt.Updates");
          }
      }
  });
}

function publish(id) {
  $.ajax({
      url: 'scripts/updateUpdate.php',
      type:'POST',
      data: {
        id: id,
        type: 2
      },

      success: function(msg)
      {
          console.log("Done");
          console.log(msg);
          if (msg == 0) {
            console.log("Error");
          } else if (msg == 1) {
            toastr["success"]("The Update has been published", "Published")
            urlRoute.loadPage("Mgmt.Updates");
          }
      }
  });
}

function archive(id) {
  $.ajax({
      url: 'scripts/updateUpdate.php',
      type:'POST',
      data: {
        id: id,
        type: 3
      },

      success: function(msg)
      {
          console.log("Done");
          console.log(msg);
          if (msg == 0) {
            console.log("Error");
          } else if (msg == 1) {
            toastr["success"]("The Update has been deleted", "Deleted")
            urlRoute.loadPage("Mgmt.Updates");
          }
      }
  });
}


</script>
