@extends('layouts.app')

@section('content')
<div class="container py-5">
    <!--Aggiungo un if session per i messaggi di conferma azioni-->
    @if (session('message'))
        <div class=" mt-5 alert alert-{{ session('alert-type') }}">
                {{ session('message')}}
        </div>
    @endif

    <h1>Trashed Projects</h1>
    
    @forelse ($projects as $project)
    <table class="table table-striped table-borderless table-hover mt-5">
        <thead>
            <tr>
                <th scope="col">#id</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Creation Date</th>
            </tr>
        </thead>
        <tbody>
           
                <tr>
                    <td>{{ $project->id }}</td>
                    <td>{{ $project->title }}</td>
                    <td>{{ $project->description }}</td>
                    <td>{{ $project->creation_date }}</td>
                    <td>

                        <form action="{{route('projects.restore', $project->id)}}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-success" title="restore">
                                Restore Project
                            </button>
                        </form>       

                        <form action="{{route('projects.force-delete', $project->id)}}" method="POST">
                            @csrf
                            {{--utilizzo il medodo delete per eliminare definitivamente il progetto--}}
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" title="delete">
                                Permanently Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <h5 class="py-5 text-center text-secondary">
                    No projects to show.
                </h5>
            @endforelse
        </tbody>
    </table>

   {{-- inserisco la pagination --}}

  
</div>
@endsection