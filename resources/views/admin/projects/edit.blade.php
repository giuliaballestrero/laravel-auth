
@extends('layouts.app')

@section('content')
<div class="container py-5">

    <form action="{{ route('admin.projects.update', compact('project')) }}" method="POST" enctype="multipart/form-data" class="py-5">
        @csrf
        {{--Inserisco il metodo PUT per la rotta update // vedere rotte con route:list--}}
        @method('PUT')

        <div class="card">
            <div class="card-header">
            <h2 class="text-center py-2 mb-2">Edit project: "{{$project->title}}"</h2>

            <div class="form-outline w-25 mb-3">
                <label for="Title" class="form-label @error('title') is-invalid @enderror">Title</label>
                <input type="text" class="form-control" id="title" placeholder="Insert title" name="title" value="{{old('title', $project->title)}}">
                {{--inserisco l'errore sotto al singolo input--}}
                @error('title')
                    <div class="invalid-feedback px-2">
                        <i class="fa-solid fa-circle-exclamation pe-1"></i>{{ $message }}
                    </div>
                @enderror         
            </div>

            <div class="form-outline w-100 mb-3">
                <label for="Description<" class="form-label @error('description') is-invalid @enderror">Description</label>
                <input type="text" class="form-control" id="description" placeholder="Insert description" name="description" value="{{old('description', $project->description)}}">
                @error('description')
                    <div class="invalid-feedback px-2">
                        <i class="fa-solid fa-circle-exclamation pe-1"></i>{{ $message }}
                    </div>
                @enderror                  
            </div>

            <div class="form-outline w-25 mb-3">
                <label for="Thumb" class="form-label @error('thumb') is-invalid @enderror">Select image:</label>
                <input type="file" class="form-control" id="thumb" placeholder="Insert path" name="thumb" value="{{old('thumb', $project->thumb)}}">
            @error('thumb')
                <div class="invalid-feedback px-2">
                    <i class="fa-solid fa-circle-exclamation pe-1"></i>{{ $message }}
                </div>
            @enderror  
            </div>

            <div class="form-outline w-25 mb-3">
                <label for="creation_date" class="form-label @error('creation_date') is-invalid @enderror">Creation Date</label>
                <input type="date" class="form-control" id="creation_date" placeholder="Insert creation date" name="creation_date" value="{{old('creation_date', $project->creation_date)}}">
            @error('creation_date')
                <div class="invalid-feedback px-2">
                    <i class="fa-solid fa-circle-exclamation pe-1"></i>{{ $message }}
                </div>
            @enderror  
            </div>

            <div class="form-outline w-25 mb-3">
                <label for="Type" class="form-label @error('type') is-invalid @enderror">Type</label>
                <input type="text" class="form-control" id="type" placeholder="Insert type" name="type" value="{{old('type', $project->type)}}">
            @error('type')
                <div class="invalid-feedback px-2">
                    <i class="fa-solid fa-circle-exclamation pe-1"></i>{{ $message }}
                </div>
            @enderror  
            </div>
            
            <div class="mb-3">
                <input class="form-check-input" type="checkbox" value="1" {{ old('completed', $project->completed) ? 'checked' : '' }} name="completed" id="completed">
                <label class="form-check-label" for="completed">Completed</label>
            </div>
        </div>

        <div class="card-footer text-end py-4 d-flex justify-content-between">
            <a href="{{ route('admin.projects.index')}}" class="btn btn-dark rounded-circle"><i class="fa-solid fa-angles-left"></i></a>
            <button type="submit" class="btn btn-success rounded-circle"><i class="fa-solid fa-pencil"></i></i></button>
        </div>

    </form>

</div>
@endsection