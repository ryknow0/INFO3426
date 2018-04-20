<?php include '../view/header.php'; ?>
<main>
    <h1>Product List</h1>
    <aside>
        <!-- display a list of categories -->
        <h2>Categories</h2>
        <nav>
            <ul>
                <!-- display links for all categories -->
                <?php foreach($categories as $category) : ?>
                <li>
                    <a href="?category_id=<?php echo $category->getID(); ?>"> <?php echo $category->getName(); ?></a>
                </li>
                <?php endforeach; ?>
        </ul>
        </nav>        
    </aside>

    <section>
        <!-- display a table of products -->
        <h2><?php echo $category_name; ?></h2>
        <table>
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th class="right">Price</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($products as $product) : ?>
            <tr>
                <td><?php echo $product->getCode(); ?></td>
                <td><?php echo $product->getName(); ?></td>
                <td class="right"><?php echo $product->getPrice(); ?></td>
                <td><form action="." method="post">
                    <input type="hidden" name="action" value="show_edit_form">
                    <input type="hidden" name="product_id" value="<?php echo $product->getID(); ?>">
                    <input type="hidden" name="category_id" value="<?php echo $product->getCategoryID(); ?>">
                    <input type="submit" value="Edit">
                </form></td>
                <td><form action="." method="post">
                    <input type="hidden" name="action" value="delete_product">
                    <input type="hidden" name="product_id" value="<?php echo $product->getID(); ?>">
                    <input type="hidden" name="category_id" value="<?php echo $product->getCategoryID(); ?>">
                    <input type="submit" value="Delete">
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <p><a href="?action=show_add_form">Add Product</a></p>
        <p><a href="?action=list_categories">List Categories</a></p>
    </section>

</main>
<?php include '../view/footer.php'; ?>