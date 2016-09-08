<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"><i class="fa fa-medkit fa-fw"></i>Medicine</h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url(); ?>index">Home</a></li>
				<li class="active">Medicine</li>
			</ol>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					List of all Medicines
					<a class="btn btn-success btn-xs pull-right" href="<?php echo base_url(); ?>med/create" role="button" title="Add New Medicine"><i class="fa fa-plus fa-fw"></i> Add New Medicine</a>
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<?php
						if(!$num_rows){
							echo "<p>The data is empty</p>";
						} else {
							echo '<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-1">';
							echo "<thead><tr><th>Manage</th><th>ID</th><th>Name</th><th>Price</th></tr></thead>";
							echo "<tbody>";
							foreach ($meds as $result) {
								echo "<tr id='rowof".$result['MEDICINE_ID']."'><td style='text-align:center;'>";
								echo "<a href='".base_url()."med/details/".$result['MEDICINE_ID']."' class='btn btn-success btn-xs' role='button' title='Edit'><i class='fa fa-pencil fa-fw' ></i></a>&nbsp;";
								echo "<a href='javascript:void(0)' class='btn btn-danger btn-xs del-btn' role='button' title='Delete' data-id='".$result['MEDICINE_ID']."' data-url='med/ajax/delmed/'><i class='fa fa-trash fa-fw' ></i></a>";
								echo "</td>";
								echo "<td>".$result['MEDICINE_ID']."</td>";
								echo "<td>".$result['NAME']."</td>";
								echo "<td>".$result['PRICE']."</td>";
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