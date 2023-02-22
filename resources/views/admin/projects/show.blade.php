@extends('layouts.app')

@section('content')
<div class="container py-5 vh-100">
    <!--Aggiungo un if session per i messaggi di conferma azioni-->
    @if (session('message'))
        <div class=" mt-5 alert alert-{{ session('alert-type') }}">
                {{ session('message')}}
        </div>
    @endif

    <div class="card text-center">
        <div class="card-header bg-dark text-light">
            Author: <span class="fw-bold">{{ Auth::user()->name }} </span>
        </div>
        <div class="card-body p-3 m-3">
            <h2 class="card-title fw-bold p-3">
                {{ $project->title }}
            </h2>
            <img src="http:/{{$project->thumb}}" class="card-img-top" alt="{{$project->title}}">
            <p class="card-text mb-4">
                {{ $project->description }}
            </p>
            <p class="fw-bold">
                Tag: {{$project->type}}
            </p>
            <div class="d-flex justify-content-center">
                <a href="{{ route('admin.projects.edit', $project->slug) }}" class="btn btn-success rounded-circle me-2">
                    <i class="fa-solid fa-pencil"></i>
                </a>

                {{-- inserire il bottone in un form --}}
                <form class="delete" action="{{ route('admin.projects.destroy', $project->slug) }}"
                    method="POST">
                    @csrf
                    {{-- utilizzo il metodo delete --}}
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger delete rounded-circle" title="delete">
                    <i class="fa-solid fa-trash"></i></button>
                </form>
            </div>
        </div>
        <div class="card-footer text-muted">
            Created on {{ $project->creation_date }} - Proj. id: {{ $project->slug }}
        </div>
    </div>
</div>
@endsection