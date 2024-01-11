<!-- MAIN CONTENT-->
<style>
	.row .col-lg-6 {
		padding-top: 100px;
	}
</style>

<div class="section__content section__content--p30">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-6">
				<?php if ($this->session->flashdata('message')) { ?>
					<div class="alert alert-info" style="background-color: #4bb543; color: #ffff;">
						<?php echo $this->session->flashdata('message'); ?>
					</div>
				<?php } ?>

				<div class="card">
					<div class="card-header">
						<strong>Create New Product</strong>
					</div>

					<div class="card-body card-block">
						<form action="<?php echo site_url('Product/create_new'); ?>" method="post" class="form-horizontal" id="productForm">
							<div class="row form-group pb-3">
								<div class="col col-sm-5">
									<label class="pb-1">Choose Category:</label>
								</div>
								<div class="col col-sm-6">
									<select name="Category" id="category">
										<?php $i = 1;
										foreach ($categories as $cat) : ?>
											<option value="<?= $i++; ?>"><?= $cat['category']; ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>

							<div class="row form-group">
								<div class="col col-sm-5">
									<label for="input-normal" class=" form-control-label">Menu Name</label>
								</div>
								<div class="col col-sm-6">
									<input type="text" id="input-normal" name="Name" placeholder="Type here..." class="form-control" required>
								</div>
							</div>
							<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalCenter">
								<i class=""></i> Submit
							</button>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal Pop-up -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Confirm</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				Are you sure to submit?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
				<button type="submit" class="btn btn-primary">Yes</button>
			</div>
		</div>
	</div>
</div>
</form>