<!-- resources/views/employee/index.blade.php -->

<form action="{{ route('employee.index') }}" method="GET">
    <input type="text" name="search" placeholder="Rechercher...">
    <button type="submit">Rechercher</button>
</form>

<table>
    <thead>
        <tr>
            <th><a href="{{ route('employee.index', ['sort' => 'name']) }}">Nom</a></th>
            <!-- Ajoutez d'autres colonnes au besoin -->
        </tr>
    </thead>
    <tbody>
        @foreach ($employees as $employee)
            <tr>
                <td>{{ $employee->name }}</td>
                <!-- Ajoutez d'autres colonnes au besoin -->
            </tr>
        @endforeach
    </tbody>
</table>