<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    use HasFactory;

    protected $fillable = [ // Permite quais colunas podem serem inseridas no banco de dados
        'subject' ,
        'body' ,
        'status'
    ];
}
