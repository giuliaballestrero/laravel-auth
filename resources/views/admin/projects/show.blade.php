@extends('layouts.app')

@section('content')
<div class="container py-5">
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
            <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-success">
                Edit
            </a>

            {{-- inserire il bottone in un form --}}
            <a href="#" class="btn btn-danger">
                Delete this Project
            </a>
        </div>
        <div class="card-footer text-muted">
            Created on {{ $project->creation_date }} - Proj. id: {{ $project->slug }}
        </div>
      </div>
</div>
@endsection