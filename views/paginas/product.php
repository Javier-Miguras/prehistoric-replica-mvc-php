<section class="explore contenedor">
    <div class="explore-img">
        <img src="<?php echo $product->image; ?>" alt="Product">
    </div>
    <div class="explore-info">
        <h2><?php echo $product->name; ?></h2>
        <p>Weight: <span><?php echo $product->weight . "Kg"; ?></span></p>
        <p>length: <span><?php echo $product->length . "M"; ?></span></p>
        <h2 class="price">$<?php echo $product->price; ?></h2>
    </div>
    <div class="explore-content">
        <h4>Description</h4>
        <hr>
        <p><?php echo nl2br(s($product->description)); ?></p>
    </div>
    <div class="explore-seller">
        <h4>Contact the seller</h4>
        <hr>
        <p>Name: <span><?php echo $seller->name . " " . $seller->lastname; ?></span></p>
        <p>Phone: <span><?php echo $seller->phone; ?></span></p>
    </div>
</section>