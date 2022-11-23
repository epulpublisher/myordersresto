<!-- Shoping Cart Section Begin -->
<section class="shoping-cart spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="shoping__cart__table">
					<table>
						<thead>
							<tr>
								<th class="shoping__product">Menu</th>
								<th>Harga</th>
								<th>Jumlah</th>
								<th>Total</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php
							foreach ($bymember_keranjang as $b) {
							?>
								<tr>
									<form action="<?php echo base_url(); ?>home/update_cart/<?= $b['id']; ?>" method="post">
										<td class="shoping__cart__item">
											<img src="http://localhost/myadminresto/assets/img/upload/<?= $b['image']; ?>" width="200" height="200" alt="">
											<h5><?= $b['nama_menu']; ?></h5>
										</td>
										<td class="shoping__cart__price">
											Rp.<?= $b['harga']; ?>
										</td>
										<td class="shoping__cart__quantity">
											<div class="quantity">
												<div class="pro-qty">
													<input type="text" name="qty" value="<?= $b['qty']; ?>">
												</div>
											</div>
										</td>
										<td class="shoping__cart__total">
											Rp.<?= $b['total_harga']; ?>
										</td>
										<td>
											<div class="shoping__cart__btns">
												<a href="<?php echo base_url(); ?>home/delete_cart/<?= $b['id']; ?>" class="primary-btn cart-btn">Hapus</a>
											</div>
										</td>
										<td>
											<input type="hidden" name="harga" value="<?= $b['harga']; ?>">
											<div class="shoping__cart__btns">
												<button type="submit" class="primary-btn cart-btn" style="border:none">Update</button>
											</div>
										</td>
									</form>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class=" row">
			<div class="col-lg-6">
				<div class="shoping__cart__btns">
					<a href="<?php echo base_url(); ?>home" class="primary-btn cart-btn">Lanjut pilih menu</a>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="shoping__checkout">
					<form action="<?php echo base_url(); ?>home/post_cart/<?= $user['id']; ?>" method="post">
						<h5>Booking Pesanan</h5>
						<ul>
							<li>Total <span>Rp. <?= $rp_keranjang['total_harga']; ?></span></li>
							<li>Masukan ID Nomor Meja
								<span>
									<input name="no_meja" list="no_meja">
									<datalist id="no_meja">
										<option value="A10B">
										<option value="B11A">
										<option value="C12D">
										<option value="D13C">
										<option value="E14F">
									</datalist>
								</span>
							</li>
						</ul>
						<input type="hidden" name="total_harga" value="<?= $rp_keranjang['total_harga']; ?>">
						<button type="submit" class="primary-btn" style="border:none">Checkout pesanan</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Shoping Cart Section End -->
