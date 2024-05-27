@extends('../master/teacher')
@section('content')

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
                    <button class="btn btn-link">+ Add results</button>
                    <button class="btn btn-link">Edit</button>
                    <button class="btn btn-link">View</button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection