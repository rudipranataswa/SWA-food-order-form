<!-- MAIN CONTENT-->
<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-6">
					<!-- Horizontal Form -->
					<div class="card">
						<div class="card-header">
							<strong>Edit product</strong>
						</div>
						<div class="card-body card-block">
							<form action="<?php echo site_url('Product/update_menu'); ?>" method="post" class="form-horizontal">
								<div class="row form-group">
									<div class="col col-md-3">
										<label for="hf-id" class=" form-control-label">ID</label>
									</div>
									<div class="col-12 col-md-9">
										<input value="<?= $this->uri->segment(3); ?>" type="int" id="hf-id" name="hf-id" placeholder="<?= $this->uri->segment(3); ?>" class="form-control" readonly>
									</div>
								</div>
								<div class="row form-group">
									<div class="col col-md-3">
										<label for="hf-menu" class=" form-control-label">Category</label>
									</div>
									<div class="col-12 col-md-9">
										<select name="Category" id="category" style="width: 373px;">
											<?php
											$selected_category = urldecode($_GET['category']);
											$i = 1;
											foreach ($categories as $cat) : ?>
												<option value="<?= $cat['id']; ?>" <?= $cat['category'] == $selected_category ? 'selected' : ''; ?>><?= $cat['category']; ?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>
								<div class="row form-group">
									<div class="col col-md-3">
										<label for="hf-menu" class=" form-control-label">Menu name</label>
									</div>
									<div class="col-12 col-md-9">
										<input type="text" id="input-normal" name="Name" placeholder="Type here..." class="form-control" required>
									</div>
								</div>
								<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalCenter">
									<i class=""></i> Submit
								</button>
                            </form>
						</div>
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
				Are you sure to change it?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
				<button type="submit" class="btn btn-primary">Yes</button>
			</div>
		</div>
	</div>
</div>
</form>