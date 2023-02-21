@extends('layouts.app')

@section('content')
<div class="container">
    <!--Aggiungo un if session per i messaggi di conferma azioni-->
    @if (session('message'))
        <div class=" mt-5 alert alert-{{ session('alert-type') }}">
            {{ session('message')}}
        </div>
    @endif
    
    <table class="table table-striped table-borderless table-hover mt-5">
        <thead>
            <tr>
                <th scope="col">#id</th>
                <th scope="col">Slug</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Thumb</th>
                <th scope="col">Creation Date</th>
                <th scope="col">Type</th>
                <th scope="col">Completed</th>
                <th scope="col">
                    <a href="{{route('admin.projects.create')}}" class="btn btn-success">
                        Add new Project
                    </a>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
            <tr>
                <td>{{ $project->id }}</td>
                <td>{{ $project->slug }}</td>
                <td>{{ $project->title }}</td>
                <td>{{ $project->description }}</td>
                <td>{{ $project->thumb }}</td>
                <td>{{ $project->creation_date }}</td>
                <td>{{ $project->type }}</td>
                <td>{{ $project->completed }}</td>
                <td>
                    <a href="{{ route('admin.projects.show', $project->id) }}" class="btn btn-sm btn-primary">
                        Show
                    </a>

                    <a href="" class="btn btn-sm btn-warning">
                        Edit
                    </a>
                    
                    {{-- per la delete inserire il bottone in un form --}}
                    <a href="" class="btn btn-sm btn-danger">
                        Delete
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{-- inserisco la pagination --}}
    {{ $projects->links() }}
</div>
@endsection