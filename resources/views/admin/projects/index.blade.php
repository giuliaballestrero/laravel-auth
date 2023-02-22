@extends('layouts.app')

@section('content')
<div class="container">
    <!--Aggiungo un if session per i messaggi di conferma azioni-->
    @if (session('message'))
        <div class=" mt-5 alert alert-{{ session('alert-type') }}">
            {{ session('message')}}
        </div>
    @endif

    <h1 class="pt-5 text-center">{{ Auth::user()->name }} Projects</h1>
    
    <div class="pt-5 d-flex justify-content-between">
        <a  class="btn btn-sm btn-danger rounded-pill p-3" href="{{route('projects.trash')}}"> 
            Deleted <i class="fa-solid fa-trash ps-1"></i>
        </a>
        <a href="{{route('admin.projects.create')}}" class="btn btn-sm btn-success rounded-pill p-3">
            New Project <i class="fa-solid fa-plus ps-1"></i>
        </a>
    </div>
    <table class="table table-striped table-borderless table-hover mt-5">
        <thead>
            <tr>
                <th scope="col">#id</th>
                <th scope="col">Slug</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Thumb</th>
                <th scope="col">Date</th>
                <th scope="col">Type</th>
                <th scope="col">Completed</th>
                <th scope="col">Actions</th>
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

                    <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-sm btn-warning">
                        Edit
                    </a>
                    
                    {{-- per la delete inserire il bottone in un form --}}

                    <form class="" action="{{route('admin.projects.destroy', $project->id)}}" method="POST" >
                        @csrf
                        {{-- utilizzo il metodo delete --}}
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" title="delete"><i class="fa-solid fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

   {{-- inserisco la pagination --}}
    <div class="py-5">
        {{ $projects->links() }}
    </div>
 
</div>
@endsection