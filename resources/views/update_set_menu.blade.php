@include('header', ['title' => 'update set menu'])

<div>
    <div class="d-flex justify-content-between">
        <h1>update set menu</h1>
        <a href="{{ route('admin') }}">ホームへ戻る</a>
    </div>

    @isset($message)
        <div>{{ $message }}</div>
    @endisset

    <form class="border p-4" action="{{ route('update_set_menu', $set_menu->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>name</label>
            <input type="text" class="form-control" name="name" value="{{ $set_menu->name }}">
            @error('name')
                <div>{{ $errors->first('name') }}</div>
            @enderror
        </div>
        <div class="mb-3 d-flex">
            @foreach ($have_products[$set_menu->id] as $i => $have_product)
                <select class="form-select" name="{{ 'product' . $i + 1 }}">
                    <option value="">指定なし</option>
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}" @selected($product->id == $have_product->id)>{{ $product->name }}</option>
                    @endforeach
                </select>
            @endforeach
            @if (!isset($have_products[$set_menu->id][2]))
                <select class="form-select" name="product3">
                    <option value="">指定なし</option>
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">保存</button>

    </form>
</div>

@include('footer')
