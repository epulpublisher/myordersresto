<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="<?= base_url('assets/'); ?>img/breadcrumb.jpg">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<div class="breadcrumb__text">
					<h2>Pesan</h2>
					<div class="breadcrumb__option">
						<a href="<?= base_url(); ?>">Home</a>
						<span>Pesan</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Breadcrumb Section End -->

<!-- Product Section Begin -->
<section class="product spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-5">
				<div class="sidebar">
					<div class="sidebar__item">
						<h4>Kategori</h4>
						<ul>
							<li><a href="#">Makanan</a></li>
							<li><a href="#">Minuman</a></li>
						</ul>
					</div>
					<div class="sidebar__item">
						<div class="latest-product__text">
							<h4>Product Terbaru</h4>
							<div class="latest-product__slider owl-carousel">
								<div class="latest-prdouct__slider__item">
									<a href="#" class="latest-product__item">
										<div class="latest-product__item__pic">
											<img src="<?= base_url('assets/'); ?>img/latest-product/lp-1.jpg" alt="">
										</div>
										<div class="latest-product__item__text">
											<h6>Crab Pool Security</h6>
											<span>$30.00</span>
										</div>
									</a>
									<a href="#" class="latest-product__item">
										<div class="latest-product__item__pic">
											<img src="<?= base_url('assets/'); ?>img/latest-product/lp-2.jpg" alt="">
										</div>
										<div class="latest-product__item__text">
											<h6>Crab Pool Security</h6>
											<span>$30.00</span>
										</div>
									</a>
									<a href="#" class="latest-product__item">
										<div class="latest-product__item__pic">
											<img src="<?= base_url('assets/'); ?>img/latest-product/lp-3.jpg" alt="">
										</div>
										<div class="latest-product__item__text">
											<h6>Crab Pool Security</h6>
											<span>$30.00</span>
										</div>
									</a>
								</div>
								<div class="latest-prdouct__slider__item">
									<a href="#" class="latest-product__item">
										<div class="latest-product__item__pic">
											<img src="<?= base_url('assets/'); ?>img/latest-product/lp-1.jpg" alt="">
										</div>
										<div class="latest-product__item__text">
											<h6>Crab Pool Security</h6>
											<span>$30.00</span>
										</div>
									</a>
									<a href="#" class="latest-product__item">
										<div class="latest-product__item__pic">
											<img src="<?= base_url('assets/'); ?>img/latest-product/lp-2.jpg" alt="">
										</div>
										<div class="latest-product__item__text">
											<h6>Crab Pool Security</h6>
											<span>$30.00</span>
										</div>
									</a>
									<a href="#" class="latest-product__item">
										<div class="latest-product__item__pic">
											<img src="<?= base_url('assets/'); ?>img/latest-product/lp-3.jpg" alt="">
										</div>
										<div class="latest-product__item__text">
											<h6>Crab Pool Security</h6>
											<span>$30.00</span>
										</div>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>

			<div class="col-lg-9 col-md-7">
				<div class="product__discount">
					<div class="section-title product__discount__title">
						<h2>Promo</h2>
					</div>
					<div class="row">

						<div class="product__discount__slider owl-carousel">
							<?php
							foreach ($promo as $p) {
							?>
								<div class="col-lg-4">
									<div class="product__discount__item">
										<div class="product__discount__item__pic set-bg" data-setbg="http://localhost/myadminresto/assets/img/upload/<?= $p['image']; ?>">
											<ul class="product__item__pic__hover">
												<li><a href="#"><i class="fa fa-heart"></i></a></li>
												<li><a href="#"><i class="fa fa-retweet"></i></a></li>
												<li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
											</ul>
										</div>
										<div class="product__discount__item__text">
											<span><?= $p['kategori']; ?></span>
											<h5><a href="#"><?= $p['nama_menu']; ?></a></h5>
											<div class="product__item__price">Rp.<?= $p['harga']; ?><span>Rp.<?= $p['harga_promo']; ?></span></div>
										</div>
									</div>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-4 col-md-6 col-sm-6">
						<div class="product__item">
							<div class="product__item__pic set-bg" data-setbg="<?= base_url('assets/'); ?>img/product/product-1.jpg">
								<ul class="product__item__pic__hover">
									<li><a href="#"><i class="fa fa-heart"></i></a></li>
									<li><a href="#"><i class="fa fa-retweet"></i></a></li>
									<li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
								</ul>
							</div>
							<div class="product__item__text">
								<h6><a href="#">Crab Pool Security</a></h6>
								<h5>$30.00</h5>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-6 col-sm-6">
						<div class="product__item">
							<div class="product__item__pic set-bg" data-setbg="<?= base_url('assets/'); ?>img/product/product-2.jpg">
								<ul class="product__item__pic__hover">
									<li><a href="#"><i class="fa fa-heart"></i></a></li>
									<li><a href="#"><i class="fa fa-retweet"></i></a></li>
									<li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
								</ul>
							</div>
							<div class="product__item__text">
								<h6><a href="#">Crab Pool Security</a></h6>
								<h5>$30.00</h5>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-6 col-sm-6">
						<div class="product__item">
							<div class="product__item__pic set-bg" data-setbg="<?= base_url('assets/'); ?>img/product/product-3.jpg">
								<ul class="product__item__pic__hover">
									<li><a href="#"><i class="fa fa-heart"></i></a></li>
									<li><a href="#"><i class="fa fa-retweet"></i></a></li>
									<li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
								</ul>
							</div>
							<div class="product__item__text">
								<h6><a href="#">Crab Pool Security</a></h6>
								<h5>$30.00</h5>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-6 col-sm-6">
						<div class="product__item">
							<div class="product__item__pic set-bg" data-setbg="<?= base_url('assets/'); ?>img/product/product-4.jpg">
								<ul class="product__item__pic__hover">
									<li><a href="#"><i class="fa fa-heart"></i></a></li>
									<li><a href="#"><i class="fa fa-retweet"></i></a></li>
									<li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
								</ul>
							</div>
							<div class="product__item__text">
								<h6><a href="#">Crab Pool Security</a></h6>
								<h5>$30.00</h5>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-6 col-sm-6">
						<div class="product__item">
							<div class="product__item__pic set-bg" data-setbg="<?= base_url('assets/'); ?>img/product/product-5.jpg">
								<ul class="product__item__pic__hover">
									<li><a href="#"><i class="fa fa-heart"></i></a></li>
									<li><a href="#"><i class="fa fa-retweet"></i></a></li>
									<li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
								</ul>
							</div>
							<div class="product__item__text">
								<h6><a href="#">Crab Pool Security</a></h6>
								<h5>$30.00</h5>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-6 col-sm-6">
						<div class="product__item">
							<div class="product__item__pic set-bg" data-setbg="<?= base_url('assets/'); ?>img/product/product-6.jpg">
								<ul class="product__item__pic__hover">
									<li><a href="#"><i class="fa fa-heart"></i></a></li>
									<li><a href="#"><i class="fa fa-retweet"></i></a></li>
									<li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
								</ul>
							</div>
							<div class="product__item__text">
								<h6><a href="#">Crab Pool Security</a></h6>
								<h5>$30.00</h5>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-6 col-sm-6">
						<div class="product__item">
							<div class="product__item__pic set-bg" data-setbg="<?= base_url('assets/'); ?>img/product/product-7.jpg">
								<ul class="product__item__pic__hover">
									<li><a href="#"><i class="fa fa-heart"></i></a></li>
									<li><a href="#"><i class="fa fa-retweet"></i></a></li>
									<li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
								</ul>
							</div>
							<div class="product__item__text">
								<h6><a href="#">Crab Pool Security</a></h6>
								<h5>$30.00</h5>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-6 col-sm-6">
						<div class="product__item">
							<div class="product__item__pic set-bg" data-setbg="<?= base_url('assets/'); ?>img/product/product-8.jpg">
								<ul class="product__item__pic__hover">
									<li><a href="#"><i class="fa fa-heart"></i></a></li>
									<li><a href="#"><i class="fa fa-retweet"></i></a></li>
									<li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
								</ul>
							</div>
							<div class="product__item__text">
								<h6><a href="#">Crab Pool Security</a></h6>
								<h5>$30.00</h5>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-6 col-sm-6">
						<div class="product__item">
							<div class="product__item__pic set-bg" data-setbg="<?= base_url('assets/'); ?>img/product/product-9.jpg">
								<ul class="product__item__pic__hover">
									<li><a href="#"><i class="fa fa-heart"></i></a></li>
									<li><a href="#"><i class="fa fa-retweet"></i></a></li>
									<li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
								</ul>
							</div>
							<div class="product__item__text">
								<h6><a href="#">Crab Pool Security</a></h6>
								<h5>$30.00</h5>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-6 col-sm-6">
						<div class="product__item">
							<div class="product__item__pic set-bg" data-setbg="<?= base_url('assets/'); ?>img/product/product-10.jpg">
								<ul class="product__item__pic__hover">
									<li><a href="#"><i class="fa fa-heart"></i></a></li>
									<li><a href="#"><i class="fa fa-retweet"></i></a></li>
									<li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
								</ul>
							</div>
							<div class="product__item__text">
								<h6><a href="#">Crab Pool Security</a></h6>
								<h5>$30.00</h5>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-6 col-sm-6">
						<div class="product__item">
							<div class="product__item__pic set-bg" data-setbg="<?= base_url('assets/'); ?>img/product/product-11.jpg">
								<ul class="product__item__pic__hover">
									<li><a href="#"><i class="fa fa-heart"></i></a></li>
									<li><a href="#"><i class="fa fa-retweet"></i></a></li>
									<li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
								</ul>
							</div>
							<div class="product__item__text">
								<h6><a href="#">Crab Pool Security</a></h6>
								<h5>$30.00</h5>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-6 col-sm-6">
						<div class="product__item">
							<div class="product__item__pic set-bg" data-setbg="<?= base_url('assets/'); ?>img/product/product-12.jpg">
								<ul class="product__item__pic__hover">
									<li><a href="#"><i class="fa fa-heart"></i></a></li>
									<li><a href="#"><i class="fa fa-retweet"></i></a></li>
									<li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
								</ul>
							</div>
							<div class="product__item__text">
								<h6><a href="#">Crab Pool Security</a></h6>
								<h5>$30.00</h5>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</section>
<!-- Product Section End -->
