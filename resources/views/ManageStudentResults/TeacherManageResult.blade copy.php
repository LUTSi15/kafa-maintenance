@extends('../master/teacher')
@section('content')

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Student's Results</h1>
        <h5>Name: {{$student->studentName}}</h5>
        <h5>Standard / Class: {{$classroom->classroomName}}</h5>
        <form action="{{ route('teacher.storeResult') }}" method="POST">
            @csrf
            <input type="hidden" name="studentId" value="{{$student->id}}">
            <table class="table table-success rounded-4 w-100">
                <thead class="table-secondary">
                    <tr>
                        <th scope="col">Subject</th>
                        <th scope="col">Marks</th>
                        <th scope="col">Grade</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($subjects as $subject)
                        <tr>
                            <td>{{ $subject->subjectName }}</td>
                            <td>
                                <input type="number" name="marks[{{ $subject->id }}]" class="form-control" required>
                            </td>
                            <td>
                                <input type="text" name="grades[{{ $subject->id }}]" class="form-control" readonly>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="form-group">
                <label for="comments">Teacher's Comments:</label>
                <textarea name="comments" class="form-control" rows="3" required></textarea>
            </div>
            <div class="action-buttons mt-3">
                <button type="submit" class="btn btn-success">Submit</button>
                <a href="#" class="btn btn-danger">Cancel</a>
            </div>
        </form>
    </div>

    <!-- Add Bootstrap and jQuery JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</body>
</html>

@endsection