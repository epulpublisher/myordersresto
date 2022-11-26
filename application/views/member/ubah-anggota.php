<!-- Product Section Begin -->
<section class="product spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-7">
				<div class="card">
					<div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
					<div class="card-footer w-100 primary-btn">
						Ubah Profil
					</div>
					<div class="row no-gutters">
						<div class="col">
							<div class="card-block px-3 col-md-7">
								<br>
								<div>
									<form action="<?= base_url(); ?>home/updateProfil" method="post">
										<div class="mb-3">
											<h6><label class="text-dark"><b>Nama Lengkap</b></label></h6>
											<input type="text" name="nama" id="nama" value="<?= $user['nama']; ?>" class="form-control form-control-user  border-success" required>
										</div>
										<div class="mb-3">
											<h6><label class="text-dark"><b>Nomor Telepon</b></label></h6>
											<input type="text" name="tlp" id="tlp" value="<?= $user['tlp']; ?>" class="form-control form-control-user  border-success" required>
											<?= form_error('tlp', '<p class="text-danger pl-3">', '</p>'); ?>
										</div>
										<div class="mb-3">
											<h6><label class="text-dark"><b>Email</b></label></h6>
											<input type="text" name="email" id="email" value="<?= $user['email']; ?>" class="form-control form-control-user border-success" required>
											<?= form_error('email', '<p class="text-danger pl-3">', '</p>'); ?>
										</div>
										<div class="mb-3">
											<h6><label class="text-dark"><b>Alamat</b></label></h6>
											<textarea id="alamat" name="alamat" class="form-control form-control-user  border-success" required><?= $user['alamat']; ?></textarea>
										</div>
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
