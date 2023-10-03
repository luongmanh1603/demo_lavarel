@extends("layouts.app")
@section("main")
    <div class="container">
        <h1 class="text-center">Thank you</h1>
        <h3 class="text-center mb-3">Your order #{{$order->id}} has been placed</h3>
        <h3>Danh sách sản phẩm của đơn hàng:</h3>
        <table class="table mt-3">
            <thead>
            <th>ID</th>
            <th>Image</th>
            <th>Name</th>
            <th>Price</th>
            <th>Qty</th>
            <th>Total</th>
            </thead>
            <tbody>
            @foreach($order->Products as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td><img src="{{$item->thumbnail}}" width="120"/></td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->pivot->price}}</td>
                    <td>{{$item->pivot->qty}}</td>
                    <td>{{$item->pivot->qty*$item->pivot->price}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @if($order->payment_method == "Paypal" && !$order->is_paid)
            <a href="#" class="btn btn-warning">Thanh toan lai</a>
        @endif
    </div>
@endsection
