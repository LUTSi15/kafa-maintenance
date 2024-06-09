@extends('../master/teacher')
@section('content')

<!DOCTYPE html>
<html>
<head>
    <title>Student Results</title>
    <!-- Add Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Add Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Student Results</h1>
        <table class="table table-success rounded-4 w-100">
            <thead class="table-secondary">
                <tr>
                    <th scope="col" class="text-start" style="width: 50px;">No</th>
                    <th scope="col" class="text-start">Name</th>
                    <th scope="col" class="text-center" style="width: 375px;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $index => $student)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $student->studentName }}</td>
                        <td class="text-center">
                            <button class="btn btn-link"><i class="fas fa-plus"></i> Add results</button>
                            <button class="btn btn-link"><i class="fas fa-edit"></i> Edit</button>
                            <button class="btn btn-link"><i class="fas fa-eye"></i> View</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Add Bootstrap and jQuery JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>

@endsection