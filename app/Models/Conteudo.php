<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conteudo extends Model
{
   protected $table = 'conteudo';
   public $timestamps = true;
   protected $fillable = ["id", "titulo", "tipo_conteudo", "file_path", "conteudo","created_at", "updated_at"];

}