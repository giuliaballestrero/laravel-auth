<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ProjectController extends Controller
{

    //Definisco le variabili per la validation e i relativi messaggi di errore

    protected $rules =
    [
        'title' => 'required|min:2|max:200|unique:projects',
        'description' => 'required|min:8|max:200',
        'thumb' => 'required',
        'creation_date' => 'required|date',
        'type' => 'max:50',
    ];

    protected $messages = [
        'title.required' => 'Per favore, inserire un titolo',
        'title.min' => 'Titolo troppo corto',
        'title.max' => 'Superati i 200 caratteri masssimi consentiti per il titolo',
        'title.unique' => 'Non puoi inserire un progetto esistente',

        'description.required' => 'Per favore, inserire una descrizione',
        'description.min' => 'Descrizione troppo corta, inserire almeno 8 caratteri',
        'description.max' => 'Superati i 200 caratteri masssimi consentiti per la descrizione',

        'thumb.required' => 'Path immagine non inserito',

        'creation_date.required' => 'Data creazione progetto non inserita',
        'creation_date.date' => 'La data di creazione deve essere un numero',

        'type.max' => 'Superati i 50 caratteri masssimi consentiti per il tipo',

    ];



    public function index()
    {
        $projects = Project::paginate(10);
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$data = $request->all();
        $data = $request->validate($this->rules, $this->messages);
        $data['slug'] = Str::slug($data['title']);
        $newProject = new Project();
        $newProject->fill($data);
        $newProject->save();

        return redirect()->route('admin.projects.index')->with('message', "Project $newProject->title has been created!")->with('alert-type', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  Project $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project) //Uso la dependency injection al posto di passare l'id e fare find or fail
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  Project $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //richiamare la validation con i metodi creati
         
        $newRules = $this->rules;
        $newRules['title'] = ['required', 'min:2', 'max:200', Rule::unique('projects')->ignore($project->id)];
        
        $data = $request->validate($newRules, $this->messages);
        $project->update($data);

        //ritorno sulla pagina dello show
        return redirect()->route('admin.projects.show', compact('project'))->with('message', "$project->title has been edited")->with('alert-type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
