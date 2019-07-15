<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>List Product</title>
</head>
<body>
    <h1>{{ $pageName }}</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name Product</th>
                <th>Trademark</th>
                <th>Price</th>
                <th>Description</th>
                <th>Image</th>
                <th>Created at</th>
                <th>Updated at</th>
                <th colspan="2">Tools</th>
            </tr>
        </thead>
        <tbody>
            @foreach($product as $row)
            <tr>
                <td>{{$row->id}}</td>
                <td><a href="/admin/detail_product/{{$row->id}}">{{$row->name_product}}</a></td>
                <td>{{$row->trademark}}</td>
                <td>{{$row->price_product}}</td>
                <td>{{$row->description}}</td>
                <td><img src="{{asset('img')}}/{{$row->img}}" alt="avatar" style="height: 250px; width: 200px"></td>
                <td>{{$row->created_at}}</td>
                <td>{{$row->updated_at}}</td>
                <td><a href="/admin/update_product/{{$row->id}}"><button type="submit">Edit</button></a>
                </td>
                <td>
                <form method="POST" action="/admin/delete_product/{{$row->id}}" onsubmit="return ConfirmDelete( this )">
                    @method('DELETE')
                    @csrf
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</body>
</html>