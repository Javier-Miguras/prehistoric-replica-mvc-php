<fieldset>
    <legend>General Information</legend>

    <label for="name">Name:</label>
    <input type="text" id="name" name="product[name]" placeholder="Product Name" value="<?php echo s($product->name); ?>">

    <label for="price">price:</label>
    <input type="number" id="price" name="product[price]" placeholder="Product Price"  value="<?php echo s($product->price); ?>">

    <label for="image">Image:</label>
    <input type="file" id="image" accept="image/jpeg, image/png" name="product[image]">

    <?php if($product->image): ?>

        <img src="/images/<?php echo $product->image; ?>" alt="product" class="imagen-small">

    <?php endif; ?>

    <label for="description">Description:</label>
    <textarea id="description" name="product[description]"><?php echo htmlspecialchars($product->description); ?></textarea>

</fieldset>
            
<fieldset>
    <legend>Product Information</legend>

    <label for="weight">Weight(Kg):</label>
    <input type="text" pattern="\d+(\.\d{1})?" id="weight" name="product[weight]" placeholder="Ej: 50" min="0" value="<?php echo s($product->weight); ?>">

    <label for="length">Length(M):</label>
    <input type="text" pattern="\d+(\.\d{1})?" id="length" name="product[length]" placeholder="Ej: 9" min="0" value="<?php echo s($product->length); ?>">

</fieldset>

<fieldset>
    <legend>Seller</legend>

    <label for="seller">Seller</label>
    <select name="product[salespeople_id]" id="seller">

        <option selected value="" disabled>-- Select --</option> 
        
        

        <?php foreach($sellers as $seller): ?>
            <option <?php echo $product->salespeople_id === $seller->id ? 'selected' : ''; ?> value="<?php echo $seller->id; ?>"><?php echo s($seller->name) . " " . s($seller->lastname); ?></option>

        <?php endforeach; ?>

    </select>
</fieldset>            