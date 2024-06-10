@extends('../master/kafa')
@section('content')

<div class="d-flex justify-content-end mb-3">
    <form action="{{ route('kafa.createActivity') }}" method="GET">
        @csrf
        <button type="submit" class="btn btn-primary text-white btn-sm mx-3">+ Activity</button>
    </form>
</div>

<table class="table table-success rounded-4 w-100">
    <thead class="table-secondary">
        <tr>
            <th scope="col" class="text-start px-5">Activity</th>
            <th scope="col" class="text-start">Status</th> <!-- New column for status -->
            <th scope="col" class="text-center" style="width: 200px;">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($activities as $activity)
            <tr>
                <td class="px-5">{{ $activity->activityName }}</td>
                <td>{{ $activity->status }}</td> <!-- Status column -->
                <td class="text-center">
                    <div class="btn-group" role="group">
                        <a href="{{ route('kafa.viewActivity', $activity->id) }}" class="btn btn-info btn-sm mx-3 rounded-pill"><i class="fas fa-eye" title="View"></i> View</a>
                        <a href="{{ route('kafa.editActivity', $activity->id) }}" class="btn btn-warning btn-sm mx-3 rounded-pill"><i class="fas fa-edit" title="Edit"></i> Edit</a>
                        <form action="{{ route('kafa.deleteActivity', $activity->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm mx-3 rounded-pill" onclick="return confirm('Are you sure you want to delete this activity?')">
                                <i class="fas fa-trash" title="Delete"></i> Delete
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
