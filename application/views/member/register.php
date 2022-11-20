<!-- Product Section Begin -->
<section class="product spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-7">
				<div class="card">
					<div class="card-footer w-100 primary-btn">
						Daftar
					</div>
					<div class="row no-gutters">
						<div class="col">
							<div class="card-block px-3 col-md-7">
								<br>
								<div>
									<?= $this->session->flashdata('pesan'); ?>
									<form action="<?= base_url('member/create'); ?>" method="post">
										<div class="mb-3">
											<h6><label class="text-dark"><b>Nama Lengkap</b></label></h6>
											<input type="text" name="nama" id="nama" class="form-control form-control-user bg-transparent border border-dark" required>
										</div>
										<div class="mb-3">
											<h6><label class="text-dark"><b>Nomor Telepon</b></label></h6>
											<input type="text" name="tlp" id="tlp" class="form-control form-control-user bg-transparent border border-dark" required>
										</div>
										<div class="mb-3">
											<h6><label class="text-dark"><b>Email</b></label></h6>
											<input type="text" name="email" id="email" class="form-control form-control-user bg-transparent border border-dark" required>
											<?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
										</div>
										<div class="mb-3">
											<h6><label class="text-dark"><b>Alamat</b></label></h6>
											<textarea id="alamat" name="alamat" class="form-control "></textarea>
										</div>
										<div class="mb-3">
											<h6><label class="text-dark"><b>Kata Sandi</b></label></h6>
											<input type="password" name="password1" id="password1" class="form-control form-control-user bg-transparent border border-dark" required>
											<?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
										</div>
										<div class="mb-3">
											<h6><label class="text-dark"><b>Konfirmasi Kata Sandi</b></label></h6>
											<input type="password" name="password2" id="password2" class="form-control form-control-user bg-transparent border border-dark" required>
											<?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
										</div>
										<button type="submit" value="submit" class="btn btn-outline-dark">Daftar</button>
									</form>
								</div>
								<br>
								<div class="text-left">
									Sudah Punya Akun?<a class="" href="<?= base_url('member'); ?>"> Masuk</a>
								</div>
								<br>
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
