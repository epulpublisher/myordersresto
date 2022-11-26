<!-- Product Section Begin -->
<section class="product spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-7">
				<div class="card">
					<div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
					<div class="card-footer w-100 primary-btn">
						Masuk
					</div>
					<div class="row no-gutters">
						<div class="col">
							<div class="card-block px-3 col-md-7">
								<br>
								<div>
									<form action="<?= base_url('member/login'); ?>" method="post">
										<div class="mb-3">
											<h6><label class="text-dark"><b>Alamat Email</b></label></h6>
											<input type="text" name="email" id="email" class="form-control form-control-user  border-success value=" required>
										</div>
										<div class="mb-3">
											<h6><label class="text-dark"><b>Kata Sandi</b></label></h6>
											<input type="password" name="password" id="password" class="form-control form-control-user  border-success" required>
										</div>
										<button type="submit" class="btn btn-outline-success">Masuk</button>
									</form>
								</div>
								<br>
								<div class="text-left">
									Tidak Punya Akun?<a class="" href="<?= base_url('member/register'); ?>"> Daftar</a>
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
