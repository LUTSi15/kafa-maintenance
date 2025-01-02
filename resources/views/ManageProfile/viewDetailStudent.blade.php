@php
    $layout = auth()->user()->role === 'teacher' ? '../master/teacher' : '../master/kafa';
@endphp

@extends($layout)
@section('content')
    <div class="container px-4 pb-5">
        <!-- Heading with Back Button -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold">Student Profile Details</h4>
            <a href="{{ route('listStudents') }}" class="btn darkButton btn-sm">Back</a>
        </div>

        <!-- Student Information -->
        <div class="card text-bg-light shadow border-0 my-3 mb-5">
            <div class="card-body">
                <p class="h6 fw-bold">STUDENT INFORMATION</p>
                <div class="row pt-3">
                    <div class="mb-3 col-4">
                        <label for="studentName" class="form-label fw-semibold">Student Name</label>
                        <p class="form-control-plaintext">{{ $student->studentName }}</p>
                    </div>

                    <div class="mb-3 col-4">
                        <label for="icNum" class="form-label fw-semibold">IC Number</label>
                        <p class="form-control-plaintext">{{ $student->icNum }}</p>
                    </div>
                </div>

                <div class="row pt-3">
                    <div class="mb-3 col-4">
                        <label for="gender" class="form-label fw-semibold">Gender</label>
                        <p class="form-control-plaintext">{{ $student->gender }}</p>
                    </div>

                    <div class="mb-3 col-4">
                        <label for="race" class="form-label fw-semibold">Race</label>
                        <p class="form-control-plaintext">{{ $student->race }}</p>
                    </div>
                </div>

                <div class="row pt-3">
                    <div class="mb-3 col-4">
                        <label for="age" class="form-label fw-semibold">Age</label>
                        <p class="form-control-plaintext">{{ $student->age }}</p>
                    </div>

                    <div class="mb-3 col-4">
                        <label for="birthDate" class="form-label fw-semibold">Birth Date</label>
                        <p class="form-control-plaintext">{{ \Carbon\Carbon::parse($student->birthDate)->format('d M Y') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
