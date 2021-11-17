<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Conteudo extends Model
{
    use Sortable, HasFactory;

    protected $fillable = ['titulo', 'texto'];

    public $sortable = ['id', 'titulo'];
}
