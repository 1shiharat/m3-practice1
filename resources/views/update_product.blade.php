@include('header', ['title' => 'login'])

<div>
    <div class="d-flex justify-content-between">
        <h1>Login</h1>
        <a href="{{ route('admin') }}">ホームへ戻る</a>
    </div>

    @isset($message)
        <div>{{ $message }}</div>
    @endisset

    <form class="border p-4" action="{{ route('update_product', $product->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>name</label>
            <input type="text" class="form-control" name="name" value="{{ $product->name }}">
            @error('name')
                <div>{{ $errors->first('name') }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label>price</label>
            <input type="number" class="form-control" name="price" value="{{ $product->price }}">
            @error('price')
                <div>{{ $errors->first('price') }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">保存</button>

    </form>
</div>

@include('footer')
