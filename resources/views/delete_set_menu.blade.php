@include('header', ['title' => 'delete set menu'])

<div>
    <div class="d-flex justify-content-between">
        <h1>delete set menu</h1>
        <a href="{{ route('admin') }}">ホームへ戻る</a>
    </div>

    @isset($message)
        <div>{{ $message }}</div>
    @endisset

    <form class="border p-4" action="{{ route('delete_set_menu', $id) }}" method="POST">
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
