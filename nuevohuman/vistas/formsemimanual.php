<form  action="home.php?ctr=incapacidad&acc=updatesemimanual" method="post" enctype="multipart/form-data">
  

  <?php 
  for($i=0;$i<count($dato);$i++){
	  $tipo="";
	  if($dato[$i]=="id_registro")
	  {
		$tipo="readonly='readonly'";
	  }
				//echo "<th>".$dato[$i]."</th>"; 
				//array_push($dato,$listatemporalesa[$i]['Field']);
				?>
				<div class="form-group row">
					<label for="text" class="col-4 col-form-label"><?php echo $dato[$i];?></label> 
					<div class="col-8">
					<input id="<?php echo $dato[$i];?>" name="<?php echo $dato[$i];?>" type="text" <?php echo $tipo; ?> value="<?php echo $listatemporalesadata[0][$dato[$i]]; ?>" class="form-control">
					</div>
				</div> 
				<?php
			}
			?>
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">Editar</button>
    </div>
  </div>

</form>