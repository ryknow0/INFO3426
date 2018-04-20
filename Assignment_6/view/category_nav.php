        <nav>
            <ul>
                <!-- display links for all categories -->
                <?php foreach($categories as $category) : ?>
                <li>
                    <a href="?category_id=<?php echo $category->getID(); ?>">
                        <?php echo $category->getName(); ?>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
        </nav>
