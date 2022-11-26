<!-- Hero Section Begin -->
<section class="hero hero-normal">
	<div class="container">
		<div class="card-footer w-100 primary-btn">
			Mau makan apa ? silahkan login terlebih dahulu untuk mulai memesan makanan.
		</div>
	</div>
</section>
<!-- Hero Section End -->
<!-- Categories Section Begin -->
<section class="categories">
	<div class="container">
		<div class="row">
			<div class="categories__slider owl-drag owl-carousel owl-loaded">
				<?php
				foreach ($promo as $p) {
				?>
					<div class="col-lg-3">
						<div class="categories__item set-bg" data-setbg="<?php echo myadminresto(); ?>assets/img/upload/<?= $p['image']; ?>">
							<h5><a href="member"><?= $p['nama_menu']; ?></a></h5>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</section>
<!-- Categories Section End -->

<!-- Featured Section Begin -->
<section class="featured spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="section-title">
					<h2>Kategori</h2>
				</div>
				<div class="featured__controls">
					<ul>
						<li class="active" data-filter=".all">Semua</li>
						<li data-filter=".makanan">Makanan</li>
						<li data-filter=".minuman">Minuman</li>
						<li data-filter=".buah">Buah-buahan</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="row featured__filter">
			<?php
			foreach ($makanan as $m) {
			?>
				<div class="col-lg-3 col-md-4 col-sm-6 mix makanan all">
					<div class="featured__item">
						<div class="featured__item__pic set-bg" data-setbg="<?php echo myadminresto(); ?>assets/img/upload/<?= $m['image']; ?>">
						</div>
						<div class="featured__item__text">
							<h6><?= $m['nama_menu']; ?></h6>
						</div>
					</div>
				</div>
			<?php } ?>


			<?php
			foreach ($minuman as $a) {
			?>
				<div class="col-lg-3 col-md-4 col-sm-6 mix minuman all">
					<div class="featured__item">
						<div class="featured__item__pic set-bg" data-setbg="<?php echo myadminresto(); ?>assets/img/upload/<?= $a['image']; ?>">
						</div>
						<div class="featured__item__text">
							<h6><?= $a['nama_menu']; ?></h6>
						</div>
					</div>
				</div>
			<?php } ?>


			<?php
			foreach ($buah as $b) {
			?>
				<div class="col-lg-3 col-md-4 col-sm-6 mix buah all">
					<div class="featured__item">
						<div class="featured__item__pic set-bg" data-setbg="<?php echo myadminresto(); ?>assets/img/upload/<?= $b['image']; ?>">
						</div>
						<div class="featured__item__text">
							<h6><?= $b['nama_menu']; ?></h6>
						</div>
					</div>
				</div>
			<?php } ?>

		</div>
	</div>
</section>
<!-- Featured Section End -->





<!-- Banner Begin -->
<div class="banner">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6">
				<div class="banner__pic">
					<img src="<?= base_url('assets/'); ?>img/banner/banner-1.jpg" alt="">
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6">
				<div class="banner__pic">
					<img src="<?= base_url('assets/'); ?>img/banner/banner-2.jpg" alt=""><br><br><br>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Banner End -->
