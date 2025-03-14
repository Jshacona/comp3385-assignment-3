<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Client</title>
</head>
<body>
    <h1>Add New Client</h1>

    <!-- Display validation errors if any -->
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Client Form -->
    <form action="{{ url('/clients') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label for="name">Client Name:</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}" required><br>

        <label for="email">Client Email:</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required><br>

        <label for="telephone">Client Telephone:</label>
        <input type="text" id="telephone" name="telephone" value="{{ old('telephone') }}" required><br>

        <label for="address">Client Address:</label>
        <input type="text" id="address" name="address" value="{{ old('address') }}" required><br>

        <label for="company_logo">Company Logo:</label>
        <input type="file" id="company_logo" name="company_logo" required><br>

        <button type="submit">Add Client</button>
    </form>

    <!-- Success Message if the client is added -->
    @if(session('success'))
        <div>
            <p>{{ session('success') }}</p>
        </div>
    @endif

</body>
</html>
