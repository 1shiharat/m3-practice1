@include('header', ['title' => 'admin'])

<div>
    <h1>Admin</h1>
    @isset($message)
        <div>{{ $message }}</div>
    @endisset
    <a href="admin/store-product" class='text-decoration-none'>
        <button class="btn btn-outline-primary">商品新規登録</button>
    </a>
    <a href="admin/post-product">
        <button class="btn btn-outline-primary">セットメニュー新規登録</button>
    </a>
    <div class="mt-1">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">商品名</th>
                    <th scope="col">値段</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td class="d-flex justify-content-between">
                            {{ $product->price }}
                            <div>
                                <a href="{{ route('update_product', $product->id) }}" class="text-decoration-none">
                                    <button type="button" class="btn btn-outline-primary">編集</button>
                                </a>
                                <a href="{{ route('delete_product', $product->id) }}" class="text-decoration-none">
                                    <button type="button" class="btn btn-outline-danger">削除</button>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@include('footer')
