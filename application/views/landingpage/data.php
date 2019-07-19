<!-- Product Single -->
<?php foreach($produk as $p) { ?>
<div class="post-id" id="<?= $p->id_produk; ?>">
    <div class="col-md-4 col-sm-6 col-xs-6">
        <div class="product product-single">
            <div class="product-thumb">
                <div class="product-label">
                    <span><?= $p->nama_kategori ?></span>
                </div>
                <img src="<?= base_url('produk_img/') ?><?= $p->gambar ?>" style="height:300px;" alt="">
            </div>
            <div class="product-body">
                <h3 class="product-price">Rp <?= nominal($p->harga) ?></h3>
                <h2 class="product-name"><a href="#"><?= $p->nama_produk ?></a></h2>
                <div class="product-btns">
                    <a class="primary-btn add-to-cart" href="<?= base_url('detail/'.$p->id_produk) ?>"> Lihat Detail</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<!-- /Product Single -->