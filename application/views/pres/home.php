<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"><i class="fa fa-file-text fa-fw"></i>Prescription</h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url(); ?>index">Home</a></li>
				<li class="active">Prescription</li>
			</ol>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					List of all Prescriptions
					<a class="btn btn-success btn-xs pull-right" href="<?php echo base_url(); ?>pres/create" role="button" title="Add New Prescription"><i class="fa fa-plus fa-fw"></i> Add New Prescription</a>
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<?php
						if(!$num_rows){
							echo "<p>The data is empty</p>";
						} else {
							echo '<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-1">';
							echo "<thead><tr><th>Manage</th><th>Prescription ID</th><th>DR ID</th><th>Medicine</th><th>Price</th></tr></thead>";
							echo "<tbody>";
							foreach ($pres as $result) {
								echo "<tr id='rowof".$result['PRE_ID']."'><td style='text-align:center;'>";
								echo "<a href='".base_url()."pres/details/".$result['PRE_ID']."' class='btn btn-success btn-xs' role='button' title='Edit'><i class='fa fa-pencil fa-fw' ></i></a>&nbsp;";
								echo "<a href='javascript:void(0)' class='btn btn-danger btn-xs del-btn' role='button' title='Delete' data-id='".$result['PRE_ID']."' data-url='dr/ajax/deldr/'><i class='fa fa-trash fa-fw' ></i></a>";
								echo "</td>";
								echo "<td>".$result['PRE_ID']."</td>";
								echo "<td>".$result['DR_ID']."</td>";
								$med = $this->med_model->get_med($result['MEDICINE_ID']);
								echo "<td>".$med['NAME']."</td>";
								echo "<td>".$result['TOTAL_PRICE']."</td>";
								echo "</tr>";
							}
							echo "</tbody>";
							echo "</table>";
						}
					?>
					<!-- /.table-responsive -->
				</div>
				<!-- /.panel-body -->
			</div>
			<!-- /.panel -->
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
</div>
<!-- /#page-wrapper -->
