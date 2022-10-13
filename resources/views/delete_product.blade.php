@include('header', ['title' => 'login'])

<div>
    <div class="d-flex justify-content-between">
        <h1>Login</h1>
        <a href="{{ route('admin') }}">ホームへ戻る</a>
    </div>

    @isset($message)
        <div>{{ $message }}</div>
    @endisset

    <form class="border p-4" action="{{ route('delete_product', $id) }}" method="POST">
        @csrf
        <div>
            <h3>削除してよろしいですか？</h3>
        </div>
        <div>
            <a href="{{ route('admin') }}" class="text-decoration-none btn btn-primary">キャンセル</a>
            <button type="submit" class="text-decoration-none btn btn-danger">OK</button>
        </div>
    </form>
</div>

@include('footer')
