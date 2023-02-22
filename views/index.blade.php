@extends("layouts.main")
@section("content")
    <div class="card">
        <div class="card-header">Klientų valdymo sistema</div>
        <div class="card-body">
            <a href="new.php" class="btn btn-success float-end">Pridėti naują klientą</a>
            <table class="table">
                <thead>
                <tr>
                    <th>Nr</th>
                    <th>Vardas</th>
                    <th>Adresas</th>
                    <th>Kodas</th>
                    <th>Kompanijos pavadinimas</th>
                    <th>telefonas</th>
                    <th>E.paštas</th>
                </tr>
                </thead>
                <tbody>
                @foreach (\models\Companys::all() as $category)
                    <tr>
                        <td>{{$category->getId()}}</td>
                        <td>{{$category->getName()}}</td>
                        <td>{{$category->getAddress()}}</td>
                        <td>{{$category->getVatCode()}}</td>
                        <td>{{$category->getCompanyName()}}</td>
                        <td>{{$category->getPhone()}}</td>
                        <td>{{$category->getEmail()}}</td>
                        <td>
                            <a  href="customers.php?id={{$category->getId()}}" class="btn btn-info">Įmonė</a>
                        </td>

                        <td>
                            <a  href="update.php?id={{$category->getId()}}" class="btn btn-info">Redaguoti</a>
                            <a class="btn btn-danger" href="index.php?delete={{$category->getId()}}">Trinti</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
@endsection