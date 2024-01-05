<div class="contenedor products">

    

    <?php foreach($products as $product){?>
        
        <div class="product">
        <img src="<?php echo $product->image; ?>" alt="Producto" loading="lazy">
        <div class="product-content">
            <h3><?php echo $product->name; ?></h3>
            <p><?php echo shortText($product->description) . "..."; ?></p>
            <p class="product-price">$<?php echo $product->price; ?></p>
            <a class="btn btn-green dsp-block" href="/product?id=<?php echo $product->id ?>">More Info</a>
        </div>
    </div>

    <?php }; ?>

    

    
</div>