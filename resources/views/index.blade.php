@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Youth Profiles</h1>
    
    <a href="{{ route('youths.create') }}" class="btn btn-success mb-3">Add New Youth Profile</a>
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Age</th>
                <th>Sex</th>
                <th>Civil Status</th>
                <th>Classification</th>
                <th>Age Group</th>
                <th>Email</th>
                <th>Contact Number</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($youths as $youth)
            <tr>
                <td>{{ $youth->first_name }} {{ $youth->middle_name }} {{ $youth->last_name }}</td>
                <td>{{ $youth->age }}</td>
                <td>{{ $youth->sex }}</td>
                <td>{{ $youth->civil_status }}</td>
                <td>{{ $youth->youth_classification }}</td>
                <td>{{ $youth->youth_age_group }}</td>
                <td>{{ $youth->email }}</td>
                <td>{{ $youth->contact_number }}</td>
                <td>
                    <a href="{{ route('youths.show', $youth->id) }}" class="btn btn-info">View</a>
                    <a href="{{ route('youths.edit', $youth->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('youths.destroy', $youth->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
