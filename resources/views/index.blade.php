<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/style.css">
    <title>Document</title>
</head>
<body>

    <!-- Messaggi -->
    @if (session()->has('success'))
        <div>
            <p style="color: green"><strong>{{session('success')}}</strong></p>
        </div>
    @endif

    <table>
        <tr>
            <th>Amazon order code</th>
            <th>Order Date</th>
        </tr>
        @foreach ($orders as $order)
            <tr>
                <td>{{$order->amazon_id}}</td>
                <td>{{$order->order_date}}</td>
            </tr>
        @endforeach
    </table>
    
    <form action="/upload-amazon" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file">
        <input type="submit" value="invia">
    </form>


</body>
</html>