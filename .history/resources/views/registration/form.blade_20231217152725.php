<!-- In resources/views/registration/form.blade.php -->
<form method="POST" action="{{ url('/invitation/accept/' . $invitation->token) }}">
    @csrf

    <label for="password">Password:</label>
    <input type="password" name="password" required>

    <!-- Name field -->
    <label for="name">Name:</label>
    <input type="text" name="name" value="{{ old('name') }}" required>

    <!-- Address field -->
    <label for="adress">Address:</label>
    <input type="text" name="adress" value="{{ old('adress') }}" required>

    <!-- Telephone field -->
    <label for="phone">Telephone:</label>
    <input type="text" name="phone" value="{{ old('phone') }}" required>

    <!-- Date of Birth field -->
    <label for="date_of_birth">Date of Birth:</label>
    <input type="date" name="date_of_birth" value="{{ old('date_of_birth') }}" required>

    <button type="submit">Complete Registration</button>
</form>