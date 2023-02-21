
@extends('layouts.app')

@section('content')
<div class="container">
    <h5 class="mb-3 pt-5">
        Create a new post from <span class="fw-semibold">{{ Auth::user()->name }} </span>
    </h5>

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

    <form action="{{ route('admin.projects.store') }}" method="POST" class="py-5">
        @csrf
        @method('POST')

        <div class="card">
            <div class="card-header">
            <h2 class="text-center py-2 mb-2">Add New Project</h2>

            <div class="form-outline w-25 mb-3">
                <label for="Title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" placeholder="Insert title" name="title" value="{{old('title')}}">
            </div>

            <div class="form-outline w-100 mb-3">
                <label for="Description<" class="form-label">Description</label>
                <input type="text" class="form-control" id="description" placeholder="Insert description" name="description" value="{{old('description')}}">
            </div>

            <div class="form-outline w-25 mb-3">
                <label for="Thumb" class="form-label">Thumb</label>
                <input type="text" class="form-control" id="thumb" placeholder="Insert path" name="thumb" value="{{old('thumb')}}">
            </div>

            <div class="form-outline w-25 mb-3">
                <label for="creation_date" class="form-label">Creation Date</label>
                <input type="date" class="form-control" id="creation_date" placeholder="Insert creation date" name="creation_date" value="{{old('creation_date')}}">
            </div>

            <div class="form-outline w-25 mb-3">
                <label for="Type" class="form-label">Type</label>
                <input type="text" class="form-control" id="type" placeholder="Insert type" name="type" value="{{old('type')}}">
            </div>

            <div class="mb-3">
                <input class="form-check-input" type="checkbox" value="1" {{old('completed')}} name="completed" id="completed">
                <label class="form-check-label" for="completed">Completed</label>
            </div>
        </div>

        <div class="card-footer text-end py-4 d-flex justify-content-between">
            <a href="{{ route('admin.projects.index')}}" class="btn btn-dark"><i class="fa-solid fa-angles-left"></i> Go Back</a>
            <button type="submit" class="btn btn-success"><i class="fa-solid fa-square-plus"></i> Create</button>
        </div>

    </form>

</div>
@endsection