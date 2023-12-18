<!-- resources/views/employee/index.blade.php -->

<form action="{{ route('employee.index') }}" method="GET">
    <input type="text" name="search" placeholder="Rechercher...">
    <button type="submit">Rechercher</button>
</form>

<table>
    <thead>
        <tr>
            <th><a href="{{ route('employee.index', ['sort' => 'name']) }}">Trier par Nom</a></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($employees as $employee)
            <tr>
                <td>{{ $employee->name }}</td>
            </tr>
        @endforeach
    </tbody>
</table>