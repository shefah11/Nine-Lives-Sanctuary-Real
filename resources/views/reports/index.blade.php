@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-3">Stray Reports Action Center</h2>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table align-middle">
        <thead class="table-dark">
            <tr>
                <th>Image</th>
                <th>Location</th>
                <th>Status</th>
                <th>Update Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reports as $report)
            <tr>
                <td>
                    @if($report->photo_path)
                        <img src="{{ asset('storage/' . $report->photo_path) }}" style="width:60px; height:60px; object-fit:cover;">
                    @else
                        <span class="text-muted">No Image</span>
                    @endif
                </td>
                <td>{{ $report->location }}</td>
                <td><span class="badge bg-secondary">{{ $report->status }}</span></td>
                <td>
                    <form action="{{ route('reports.update', $report->id) }}" method="POST">
                        @csrf @method('PUT')
                        <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                            <option value="Pending" {{ $report->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                            <option value="Investigating" {{ $report->status == 'Investigating' ? 'selected' : '' }}>Investigating</option>
                            <option value="Resolved" {{ $report->status == 'Resolved' ? 'selected' : '' }}>Resolved</option>
                        </select>
                    </form>
                </td>
                <td>
                    <div class="d-flex gap-1">
                        <a href="{{ route('reports.show', $report->id) }}" class="btn btn-sm btn-info text-white">View</a>
                        <form action="{{ route('reports.destroy', $report->id) }}" method="POST">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
