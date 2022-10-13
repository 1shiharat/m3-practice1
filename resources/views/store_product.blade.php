@include('header', ['title' => 'login'])

<div>
    <div class="d-flex justify-content-between">
        <h1>Login</h1>
        <a href="{{ route('admin') }}">ホームへ戻る</a>
    </div>

    @isset($message)
        <div>{{ $message }}</div>
    @endisset
    <form class="border p-4" action="{{ route('store_product') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>name</label>
            <input type="text" class="form-control" name="name">
            @error('name')
                <div>{{ $errors->first('name') }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label>price</label>
            <input type="number" class="form-control" name="price">
            @error('price')
                <div>{{ $errors->first('price') }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">登録</button>

    </form>
</div>

@include('footer')
