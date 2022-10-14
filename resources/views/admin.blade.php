@include('header', ['title' => 'admin'])

<div>
    <h1>Admin</h1>
    @isset($message)
        <div>{{ $message }}</div>
    @endisset
    <a href="admin/store-product" class='text-decoration-none'>
        <button class="btn btn-outline-primary">商品新規登録</button>
    </a>
    <a href="{{ route('store_set_menu') }}">
        <button class="btn btn-outline-primary">セットメニュー新規登録</button>
    </a>
    <div class="mt-1">
        <h2>商品</h2>
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
    <div class="mt-1">
        <h2>セットメニュー</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">セット名</th>
                    <th scope="col">商品</th>
                    <th scope="col">商品</th>
                    <th scope="col">商品</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($set_menus as $set_menu)
                    <tr>
                        <td>{{ $set_menu->name }}</td>
                        @foreach ($have_products[$set_menu->id] as $i => $have_product)
                            @if ($i == 2)
                                <td class="d-flex justify-content-between">
                                    {{ $have_product->name }}
                                    <div>
                                        <a href="{{ route('update_set_menu', $set_menu->id) }}"
                                            class="text-decoration-none">
                                            <button type="button" class="btn btn-outline-primary">編集</button>
                                        </a>
                                        <a href="{{ route('delete_set_menu', $set_menu->id) }}"
                                            class="text-decoration-none">
                                            <button type="button" class="btn btn-outline-danger">削除</button>
                                        </a>
                                    </div>
                                </td>
                            @else
                                <td>
                                    {{ $have_product->name }}
                                </td>
                            @endif
                        @endforeach
                        @if (!isset($have_products[$set_menu->id][2]))
                            <td class="d-flex justify-content-between">指定なし

                                <div>
                                    <a href="{{ route('update_set_menu', $set_menu->id) }}"
                                        class="text-decoration-none">
                                        <button type="button" class="btn btn-outline-primary">編集</button>
                                    </a>
                                    <a href="{{ route('delete_set_menu', $set_menu->id) }}"
                                        class="text-decoration-none">
                                        <button type="button" class="btn btn-outline-danger">削除</button>
                                    </a>
                                </div>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@include('footer')
