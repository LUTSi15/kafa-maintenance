@php
    $layout = auth()->user()->role === 'teacher' ? '../master/teacher' : '../master/kafa';
@endphp

@extends($layout)
@section('content')
    <table class="table table-success rounded-4 w-100">
        <thead class="table-secondary">
            <tr>
                <th scope="col" class="text-start px-5">Student Name</th>
                <th scope="col" class="text-start">Age</th>
                <th scope="col" class="text-start">Gender</th>
                <th scope="col" class="text-start">Guardian Name</th>
                <th scope="col" class="text-center" style="width: 200px;">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td class="px-5">{{ $student->studentName }}</td> <!-- Display student name -->
                    <td>{{ $student->age }}</td> <!-- Calculate and display age -->
                    <td>{{ $student->gender }}</td> <!-- Display gender -->
                    <td>{{ $student->guardian->guardian_name ?? 'No Guardian' }}</td> <!-- Display guardian name -->
                    <td class="text-center d-flex justify-content-between gap-3">
                        <a href="{{ route('viewStudent', $student->id) }}"
                            class="btn primaryButton btn-sm">View</a>
                        <form method="POST" action="{{ route('deleteStudent', $student->id) }}"
                            style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn darkButton btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
