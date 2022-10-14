@include('header', ['title' => 'store-set-menu'])

<div>
    <div class="d-flex justify-content-between">
        <h1>store set menu</h1>
        <a href="{{ route('admin') }}">ホームへ戻る</a>
    </div>

    @isset($message)
        <div>{{ $message }}</div>
    @endisset
    <form class="border p-4" action="{{ route('store_set_menu') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>name</label>
            <input type="text" class="form-control" name="name">
            @error('name')
                <div>{{ $errors->first('name') }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label>products</label>
            <div class="d-flex ">
                <select class="form-select" name="product1" id="">
                    <option value="{{ null }}">指定なし</option>
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>
                <select class="form-select" name="product2" id="">
                    <option value="{{ null }}">指定なし</option>
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>
                <select class="form-select" name="product3" id="">
                    <option value="{{ null }}">指定なし</option>
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">登録</button>

    </form>
</div>

@include('footer')
