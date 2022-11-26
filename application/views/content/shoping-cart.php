<!-- Shoping Cart Section Begin -->
<section class="shoping-cart spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="shoping__cart__table">
					<div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
					<table>
						<thead>
							<tr>
								<th class="shoping__product">Menu</th>
								<th>Harga</th>
								<th>Jumlah</th>
								<th>Total</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
							foreach ($bymember_keranjang as $b) {
							?>
								<tr>
									<form action="<?php echo base_url(); ?>home/update_cart/<?= $b['id']; ?>" method="post">
										<td class="shoping__cart__item">
											<img src="<?php echo myadminresto(); ?>assets/img/upload/<?= $b['image']; ?>" class="img-fluid" alt="Responsive image">
											<h5><?= $b['nama_menu']; ?></h5>
										</td>
										<td class="shoping__cart__price">
											<?php echo rupiah($b['harga']); ?>
										</td>
										<td class="shoping__cart__quantity">
											<div class="quantity">
												<div class="pro-qty">
													<input type="text" name="qty" value="<?= $b['qty']; ?>" required>
												</div>
											</div>
										</td>
										<td class="shoping__cart__total">
											<?php echo rupiah($b['total_harga']); ?>
										</td>
										<td>
											<div class="shoping__cart__btns">
												<a href="<?php echo base_url(); ?>home/delete_cart/<?= $b['id']; ?>" class="primary-btn cart-btn tombol-hapus">Hapus</a>
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
					<form id="CartForm" action="<?php echo base_url(); ?>home/post_cart/<?= $user['id']; ?>" method="post">
						<h5>Booking Pesanan</h5>
						<ul>
							<li>Total <span><?php echo rupiah($rp_keranjang['total_harga']); ?></span></li>
							<li>Pilih ID Nomor Meja</li>
							<select class="form-select" name="no_meja" aria-label="Default select example">
								<option value="">Pilih ID Nomor Meja Disini</option>
								<option value="A10B">A10B</option>
								<option value="A11B">A11B</option>
								<option value="A12B">A12B</option>
								<option value="B13C">B13C</option>
								<option value="B14C">B14C</option>
							</select>
							</br>
							</br>
							</br>
							</br>
							<input type="hidden" name="total_harga" value="<?php echo $rp_keranjang['total_harga']; ?>">
							<button type="submit" id="btn-submit" class="primary-btn" style="border:none">Checkout pesanan</button>
						</ul>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Shoping Cart Section End -->
