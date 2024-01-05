<section class="contenedor">
    <h1 class="main-heading">Administration Panel</h1>
    <div class="user-admin">
        <p class="user-name">Welcome <span><?php echo $_SESSION['name']; ?></span>!</p>
        <a class="btn btn-gray" href="/logout">Logout</a>
    </div>

    <?php 
        if($result){
            $message = mostrarNotificacion(intval($result)); 
             
            if($message){ ?>
                <p class="alerta exito"><?php echo s($message) ?></p>
            <?php }
        }
    ?>

    <div class="admin-buttons">
        <a class="btn btn-ok" href="/product/create">New Product</a>
        <a class="btn btn-ok" href="/post/create">New Post</a>
        <a class="btn btn-ok" href="/seller/create">New Seller</a>
    </div>

    <h1 class="table-title">Products</h1>

    <table class="admin-table">
        <thead>
            <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Image</th>
            <th>Price</th>
            <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($products as $product): ?>
                <tr>
                    <td><?php echo $product->id; ?></td>
                    <td><?php echo $product->name; ?></td>
                    <td><img src="<?php echo $product->image; ?>" alt="Product image"></td>
                    <td>$<?php echo $product->price; ?></td>
                    <td class="td-buttons">
                        <a href="/product/update?id=<?php echo $product->id; ?>" class="btn btn-blue update">Update</a>
                        <form action="/product/delete" method="POST">
                            <input type="hidden" name="id" value="<?php echo $product->id; ?>">
                            <input type="hidden" name="type" value="product">
                            <input type="submit" class="btn btn-red delete" value="Delete">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>

    </table>

    <h1 class="table-title">Posts</h1>

    <table class="admin-table">
        <thead>
            <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Image</th>
            <th>Date</th>
            <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($posts as $post): ?>
                <tr>
                    <td><?php echo $post->id; ?></td>
                    <td><?php echo $post->title; ?></td>
                    <td><img src="<?php echo $post->image; ?>" alt="Product image"></td>
                    <td><?php echo $post->date; ?></td>
                    <td class="td-buttons">
                        <a href="/post/update?id=<?php echo $post->id; ?>" class="btn btn-blue update">Update</a>
                        <form action="/post/delete" method="POST">
                            <input type="hidden" name="id" value="<?php echo $post->id; ?>">
                            <input type="hidden" name="type" value="post">
                            <input type="submit" class="btn btn-red delete" value="Delete">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>

    </table>

    <h1 class="table-title">Sellers</h1>

    <table class="admin-table">
        <thead>
            <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($sellers as $seller): ?>
                <tr>
                    <td><?php echo $seller->id; ?></td>
                    <td><?php echo $seller->name . " " . $seller->lastname; ?></td>
                    <td><?php echo $seller->phone; ?></td>
                    <td class="td-buttons">
                        <a href="/seller/update?id=<?php echo $seller->id; ?>" class="btn btn-blue update">Update</a>
                        <form action="/seller/delete" method="POST">
                            <input type="hidden" name="id" value="<?php echo $seller->id; ?>">
                            <input type="hidden" name="type" value="seller">
                            <input type="submit" class="btn btn-red delete" value="Delete">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>

    </table>


</section>