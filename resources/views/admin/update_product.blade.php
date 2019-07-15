<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sửa thông tin sản phẩm</title>
</head>
<body>
	<form action="/admin/update_product/{{ $product->id }}" method="post" enctype="multipart/form-data">
		@method('PATCH')
		@csrf
		<p>Tên sản phẩm</p>
		<input type="text" name="name_product" value="{{ $product->name_product }}">
		<p>Hãng sản xuất</p>
		<input type="text" name="trademark" value="{{ $product->trademark }}">
		<p>Giá bán</p>
		<input type="text" name="price_product" value="{{ $product->price_product }}">
		<p>Mô tả ngắn</p>
		<textarea name="description" id="" cols="30" rows="10">{{ $product->description }}</textarea>
		<br>
		<button type="submit">Sửa sản phẩm</button>
	</form>
</body>
</html>