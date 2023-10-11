@extends("admin.layouts.admin_app")
@section("main")
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Chi tiết đơn hàng #{{ $order->id }}</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                            <tr>
                                <th scope="row">Sản phẩm</th>
{{--                                @foreach($order_product as $item)--}}
{{--                                    --}}
{{--                                @endforeach--}}

                            </tr>
                            <tr>
                                <th scope="row">Ngày tạo</th>
                                <td>{{ $order->created_at }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Tên người đặt hàng</th>
                                <td>{{ $order->full_name }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Tổng số tiền</th>
                                <td>{{ $order->getGrandTotal() }}</td>
                            </tr>
                            <!-- Thêm các thông tin chi tiết đơn hàng khác -->
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center mt-4">
                        <a href="#" class="btn btn-primary">Sửa đơn hàng</a>
                        <a href="#" class="btn btn-secondary">Quay lại danh sách đơn hàng</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
