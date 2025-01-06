@extends('../master/kafa')
@section('content')
    <table class="table table-success rounded-4 w-100">
        <thead class="table-secondary">
            <tr>
                <th scope="col" class="text-start px-5">Username</th>
                <th scope="col" class="text-start">Name</th>
                <th scope="col" class="text-start">Phone Number</th>
                <th scope="col" class="text-start">IC Number</th>
                <th scope="col" class="text-center" style="width: 200px;">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($guardians as $guardian)
                <tr>
                    <td class="px-5">{{ $guardian->user->username }}</td> <!-- Display username -->
                    <td>{{ $guardian->user->name }}</td> <!-- Display name -->
                    <td>{{ $guardian->phoneNum }}</td> <!-- Display phone number -->
                    <td>{{ $guardian->icNum }}</td> <!-- Display IC number -->
                    <td class="text-center d-flex justify-content-between gap-3">
                        <a href="{{ route('kafa.viewParent', $guardian->id) }}" class="btn primaryButton btn-sm">View</a>
                        <form method="POST" action="{{ route('kafa.deleteParent', $guardian->id) }}" style="display: inline-block;">
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
