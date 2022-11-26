<!-- Product Section Begin -->
<section class="product spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-7">
				<div class="card">
					<div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
					<div class="card-footer w-100 primary-btn">
						Ubah Password
					</div>
					<div class="row no-gutters">
						<div class="col">
							<div class="card-block px-3 col-md-7">
								<br>
								<div>
									<form action="<?= base_url(); ?>home/ubahPassword" method="post">
										<div class="mb-3">
											<h6><label class="text-dark"><b>Kata Sandi Sekarang</b></label></h6>
											<input type="text" name="password_sekarang" id="password_sekarang" class="form-control form-control-user  border-success" required>
											<?= form_error('password_sekarang', '<p class="text-danger pl-3">', '</p>'); ?>
										</div>
										<div class="mb-3">
											<h6><label class="text-dark"><b>Kata Sandi Baru</b></label></h6>
											<input type="text" name="password_baru1" id="password_baru1" class="form-control form-control-user  border-success" required>
											<?= form_error('password_baru1', '<p class="text-danger pl-3">', '</p>'); ?>
										</div>
										<div class="mb-3">
											<h6><label class="text-dark"><b>Konfimasi Kata Sandi Baru</b></label></h6>
											<input type="text" name="password_baru2" id="password_baru2" class="form-control form-control-user border-success" required>
											<?= form_error('password_baru2', '<p class="text-danger pl-3">', '</p>'); ?>
										</div>
										</br>
										<button type="submit" value="submit" class="btn btn-outline-success">Ubah</button>
									</form>
									</br>
								</div>
							</div>
						</div>
					</div>
					<div class="card-footer w-100 primary-btn">
						&nbsp;
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Product Section End -->
