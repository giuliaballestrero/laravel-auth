
@extends('layouts.app')

@section('content')
<div class="container py-5">

     <!--aggiungo un div per mostrare l'errore tramite foreach e endif per visualizzarlo dopo-->
     @if ($errors->any())
     <div class="alert alert-danger">
         <ul>
             @foreach ($errors->all() as $error)
                 <li>
                     {{$error}}
                 </li>
             @endforeach
         </ul>
     </div>
    @endif

    <form action="{{ route('admin.projects.update', compact('project')) }}" method="POST" class="py-5">
        @csrf
        {{--Inserisco il metodo PUT per la rotta update // vedere rotte con route:list--}}
        @method('PUT')

        <div class="card">
            <div class="card-header">
            <h2 class="text-center py-2 mb-2">Edit project: "{{$project->title}}"</h2>

            <div class="form-outline w-25 mb-3">
                <label for="Title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" placeholder="Insert title" name="title" value="{{old('title', $project->title)}}">
            </div>

            <div class="form-outline w-100 mb-3">
                <label for="Description<" class="form-label">Description</label>
                <input type="text" class="form-control" id="description" placeholder="Insert description" name="description" value="{{old('description', $project->description)}}">
            </div>

            <div class="form-outline w-25 mb-3">
                <label for="Thumb" class="form-label">Thumb</label>
                <input type="text" class="form-control" id="thumb" placeholder="Insert path" name="thumb" value="{{old('thumb', $project->thumb)}}">
            </div>

            <div class="form-outline w-25 mb-3">
                <label for="creation_date" class="form-label">Creation Date</label>
                <input type="date" class="form-control" id="creation_date" placeholder="Insert creation date" name="creation_date" value="{{old('creation_date', $project->creation_date)}}">
            </div>

            <div class="form-outline w-25 mb-3">
                <label for="Type" class="form-label">Type</label>
                <input type="text" class="form-control" id="type" placeholder="Insert type" name="type" value="{{old('type', $project->type)}}">
            </div>

            <div class="mb-3 form-check form-switch">
                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" role="switch" value="1" {{old('completed', $project->completed)}} name="completed" id="completed">
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