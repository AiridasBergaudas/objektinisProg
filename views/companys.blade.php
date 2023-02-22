
@extends("layouts.main")
@section("content")
    <div class="card">
        <div class="card-header">Įmonė: {{$companys->getName()}}</div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th>Pavardė</th>
                    <th>Telefonas</th>
                    <th>E. paštas</th>
                    <th>Adresas</th>
                    <th>Pareigos</th>
                    <th>Įmonės pavadinimas</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($category as $product)
                    <tr>
                        <td>{{$product->getSurname()}}</td>
                        <td>{{$product->getPhone() }}</td>
                        <td>{{$product->getEmail()}}</td>
                        <td>{{$product->getAddress()}}</td>
                        <td>{{$product->getPosition()}}</td>
                        <td>{{$product->getCompanyId()}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
