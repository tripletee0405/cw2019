<h1>Product</h1>

<h2>{{ $product->name_product }}</h2>
<p>{{ $product->trademark }}</p>
<p>{{ $product->price_product }}</p>
<div>{{ $product->description }}</div>
<div><img src="{{asset('img')}}/{{$product->img}}" alt="avatar" style="height: 250px; width: 200px"></div>
<p>{{ $product->created_at }}</p>
<p>{{ $product->updated_at }}</p>