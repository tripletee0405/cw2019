<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Thêm sản phẩm</title>
</head>
<body>
	<form action="/admin/add_product" method="post" enctype="multipart/form-data">
		@method('PATCH')
		@csrf
		<p>Tên sản phẩm</p>
		<input type="text" name="name_product" value="">
		<p>Hãng sản xuất</p>
		<input type="text" name="trademark" value="">
		<p>Giá bán</p>
		<input type="text" name="price_product" placeholder="VNĐ">
		<p>Mô tả ngắn</p>
		<textarea name="description" id="" cols="30" rows="10"></textarea>
		<br>
		<input type="file" name="uploadimg">
		<br>
		<br>
		<button type="submit">Thêm sản phẩm</button>
	</form>
</body>
</html>