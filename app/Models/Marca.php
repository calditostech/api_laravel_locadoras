<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    use HasFactory;
    protected $fillable = ['nome', 'imagem'];

    public function rules() {
        return [
            'nome' => 'required|unique:marcas|min:3',
            'imagem' => 'required'
        ];
    }

    public function feedback() {
        return [
            'required' => 'O campo :attribute é obrigatório',
            'nome.unique' => 'Nome da marca ja existe',
            'nome.min' => 'O nome deve ter no minimo 3 caracteres'
        ]; 
    }

    public function modelos() {
        //UMA marca Possui MUITOS modelos
        return $this->hasMany('App\Models\Modelo');
    }
}
