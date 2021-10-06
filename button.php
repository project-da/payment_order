
<!-- Edit -->
    <div class="modal fade" id="edit<?php echo $row['CODE']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Edit</h4></center>
                </div>
                <div class="modal-body">
				<?php
					$edit=mysqli_query($link,"select * from po where CODE='".$row['CODE']."'");
					$erow=mysqli_fetch_array($edit);
				?>
				<div class="container-fluid">
				<form method="POST" action="edit.php?CODE=<?php echo $erow['CODE']; ?>">
					<div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">QUANTITY:</label>
						</div>
						<div class="col-lg-10">
							<input type="text" name="QTY" class="form-control" value="<?php echo $erow['QTY']; ?>">
						</div>
					</div>
					
                </div> 
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                    <button type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-check"></span> Save</button>
                </div>
				</form>
            </div>
        </div>
    </div>
<!-- /.modal -->