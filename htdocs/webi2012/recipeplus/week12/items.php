			<?php require_once('header.php'); ?>
				<section>
					<?php
                        $usersearch = isset($_GET['usersearch']) ? $_GET['usersearch'] : null;
                        $sort = isset($_GET['sort']) ? $_GET['sort'] : '';
                        $page = isset($_GET['page']) ? $_GET['page'] : '';
                        /* end paging vars*/

						$category_id = $_GET['category_id'];

						$category = $db->prepare('SELECT * FROM categories WHERE categoryID = :category_id');
						$category->execute( array( 'category_id' => $category_id ) );

						$category_row = $category->fetch();
						$category_name = $category_row['categoryName'];

						$products = $db->prepare('SELECT * FROM products WHERE categoryID = :category_id');
						$products->execute( array( 'category_id' => $category_id ) );

						foreach ( $products as $product ) : ?>
					<h1><?php echo $category_name; ?></h1>
					<div class="mats">
						<img src="sm_images/<?php echo $product['productID']; ?>.<?php echo $product['file_ext']; ?>" width="125" height="125" class="margin-left-10">
						<strong>Product:</strong><?php echo $product['productName']; ?><br>
						<strong>Product No:</strong> <?php echo $product['productCode']; ?><br>
						<strong>Price:</strong> <?php echo $product['productPrice']; ?> sq/ft<br>
						<strong>Description:</strong>
						<?php echo $product['description']; ?>
						<br>
						<a href="item.php?product_id=<?php echo $product['productID']; ?>">more info</a>
					</div>
					<hr>
					<?php endforeach; ?>
				</section><!-- section -->
			</div> <!-- end div main  -->
		</div> <!-- end div row  -->
		<?php require_once('footer.php'); ?>