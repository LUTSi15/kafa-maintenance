@extends('../master/kafa')
@section('content')
    <div class="d-flex justify-content-end mb-3">
        <form action="{{ route('kafa.addActivity') }}" method="GET">
            @csrf
            <button type="submit" class="btn btn-primary text-white btn-sm mx-3">+ Activity</button>
        </form>
    </div>

    <!-- Activities Table -->
    <table class="table table-success rounded-4 w-100">
        <thead class="table-secondary">
            <tr>
                <th scope="col" class="text-start px-5 col-3">Activity</th> <!-- Column for activity -->
                <th scope="col" class="text-start col-3">Approved/Rejected Date</th> <!-- Column for date -->
                <th scope="col" class="text-start col-1">Status</th> <!-- Column for status -->
                <th scope="col" class="text-center col-5" style="width: 200px;">Action</th> <!-- Column for action -->
            </tr>
        </thead>
        <tbody>
            <!-- Loop through each activity -->
            @foreach ($activities as $activity)
                <tr>
                    <td class="px-5">{{ $activity->activityName }}</td> <!-- Display activity name -->
                    <td>{{ $activity->updated_at->format('d F Y') }}</td> <!-- Display formatted date -->
                    <td>{{ $activity->status }}</td> <!-- Display activity status column -->
                    <td class="text-center">
                        <div class="d-flex justify-content-around gap-3">
                            <!-- View Button -->
                            <a href="{{ route('kafa.viewActivity', $activity->id) }}" class="btn primaryButton"><i
                                    class="fas fa-eye" title="View"></i> View</a>
                            <!-- Edit and Delete Buttons -->
                            <a href="{{ route('kafa.editActivity', $activity->id) }}" class="btn primaryButton"><i
                                    class="fas fa-edit" title="Edit"></i> Edit</a>
                            <form action="{{ route('kafa.deleteActivity', $activity->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn darkButton"
                                    onclick="return confirm('Are you sure you want to delete this activity?')">
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
