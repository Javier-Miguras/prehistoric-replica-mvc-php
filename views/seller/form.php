<fieldset>
    <legend>Seller Information</legend>

    <label for="name">Name:</label>
    <input type="text" id="name" name="seller[name]" placeholder="Seller Name" value="<?php echo s($seller->name); ?>">

    <label for="lastname">Lastname:</label>
    <input type="text" id="lastname" name="seller[lastname]" placeholder="Seller Lastname" value="<?php echo s($seller->lastname); ?>">

    <label for="phone">Phone:</label>
    <input type="tel" id="phone" name="seller[phone]" placeholder="Seller Phone" value="<?php echo s($seller->phone); ?>">

</fieldset>
