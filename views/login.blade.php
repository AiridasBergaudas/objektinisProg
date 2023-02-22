@extends("layouts.main")
@section("content")
    <div class="card">
        <div class="card-header">Prisijungimai</div>
        <div class="card-body">
            <form method="post" action="login.php">
                <div class="mb-3">
                    <label class="form-label">El. paštas</label>
                    <input type="text" value="" class="form-control" name="email">
                </div>
                <div class="mb-3">
                    <label class="form-label">Slaptažodis</label>
                    <input type="password" value="" class="form-control" name="password">
                </div>
                <button class="btn btn-success" name="login" value="true">Prisijungti</button>

            </form>

        </div>
    </div>
@endsection
