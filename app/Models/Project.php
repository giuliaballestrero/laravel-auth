<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Project extends Model
{
    use HasFactory;

    // Inserire lista tabella quando nella funzione store() usiamo fill()
    protected $fillable = ['slug', 'title', 'description', 'thumb', 'creation_date', 'type', 'completed'];

    //uso la soft deletes
    use SoftDeletes;
}
