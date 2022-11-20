<!-- Product Section Begin -->
<section class="product spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-7">

				<div class="card">
					<div class="card-footer w-100 primary-btn">
						Detail Profil
					</div>
					<div class="row no-gutters">
						<div class="col-auto">
							<img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" alt="" width="200" height="200" />
						</div>
						<div class="col">
							<div class="card-block px-2">
								<br>
								<h4 class="card-title"><?= $user['nama']; ?></h4>
								<p class="card-text"><?= $user['email']; ?></p>
								<p class="card-text"><?= $user['tlp']; ?></p>
								<p class="card-text"><?= $user['alamat']; ?></p>
								<div class="btn ml-1 my-1">
									<a href="<?= base_url('home/ubahprofil'); ?>" class="primary-btn"><i class="fas fa-user-edit"></i> Ubah Profil</a>
								</div>
							</div>
						</div>
					</div>
					<div class="card-footer w-100 text-muted">
						Member Sejak <?php $dateend = date_create($user['tanggal_daftar']);
										echo date_format($dateend, "d F Y"); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Product Section End -->
