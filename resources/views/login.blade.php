@include('header', ['title' => 'login'])

<div>
    <h1>Login</h1>
    <form class="border p-4" action="{{ route('login') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>account</label>
            <input type="text" class="form-control" name="account">
        </div>

        <div class="mb-3">
            <label>password</label>
            <input type="password" class="form-control" name="password">
        </div>
        <button type="submit" class="btn btn-primary">ログイン</button>
    </form>
</div>

@include('footer')
