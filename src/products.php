<?php
session_start();
include('config.php');
?>

<!DOCTYPE html>
<html>

<head>
	<title>
		Products
	</title>
	<link href="style.css" type="text/css" rel="stylesheet">
</head>

<body>
	<? include 'header.php' ?>
	<div id="main">
		<div id="products">

			<?
			foreach ($products as $id => $product) { ?>
				<div id="product-101" class="product">
					<img src="images/<? echo $product['image'] ?>">
					<h3 class="title"><a href="#"><? echo $product['id'] ?></a></h3>
					<span>Price: $<? echo $product['price'] ?>.00</span>
					<form action="performopr.php" method="get">
						<button type="submit" class="add-to-cart" name='id' value="<? echo $id ?>">Add To Cart</button>
					</form>

				</div>
			<?
			}
			?>
		</div>
		<div>
			<table id='myTable'>
				<thead>
					<tr>
						<th>Name</th>
						<th>Price</th>
						<th>quantity</th>
						<th>

						</th>
					</tr>
				</thead>

				<tbody>
					<? if (gettype($_SESSION['cart']) == 'array') {

						foreach ($_SESSION['cart'] as $id => $val) {
					?>
							<tr class="table">
								<td><? echo $val['name'] ?><br></td>
								<td><? echo $val['price'] ?><br></td>
								<td>

									<? echo $val['quantity'] ?>
									<a href="/performopr.php?op=sub&id=<? echo $id ?>"><button>-</button></a>
									<a href="/performopr.php?op=add&id=<? echo $id ?>"><button>+
								<td><a href="/performopr.php?op=del&id=<? echo $id ?>">remove</a></td>
							</tr>
					<? }
					}
					?>

				</tbody>

			</table>
			<a href="/performopr.php?op=empty">
				<br><button>EMPTY</button>
			</a>
		</div>
		<? include 'footer.php' ?>
</body>


</html>