@extends('../master/kafa')
@section('content')

<div class="d-flex justify-content-end mb-3">
    <a href="{{route('kafa.createActivity')}}" class="btn btn-primary text-white btn-sm mx-3">+ Activity</a>
</div>

<table class="table table-success rounded-4 w-100">
    <thead class="table-secondary">
        <tr>
            <th scope="col" class="text-start px-5">Activity</th>
            <th scope="col" class="text-center" style="width: 200px;">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($activities as $activity)
            <tr>
                <td class="px-5">{{ $activity->activityName }}</td>
                <td class="text-center">
                    <div class="btn-group" role="group">
                            <a href="{{route('kafa.viewActivity', $activity->id)}}" class="btn btn-info btn-sm"><i class="fas fa-eye" title="View"></i> View</a>

                        <a href="{{ route('kafa.editActivity', $activity->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit" title="Edit"></i> Edit</a>
                        <a href="{{ route('kafa.deleteActivity', $activity->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this activity?')">
                            <i class="fas fa-trash" title="Delete"></i> Delete</a>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
