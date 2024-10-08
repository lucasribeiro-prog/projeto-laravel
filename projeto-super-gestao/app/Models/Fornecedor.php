<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fornecedor extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $table = 'fornecedores';
    protected $fillable = ['nome', 'email', 'uf', 'site'];

    public function produtos() {
        return $this->hasMany('App\Models\Produto', 'fornecedor_id', 'id');
    }
}
