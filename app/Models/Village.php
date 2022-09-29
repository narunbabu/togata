<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Village extends Model
{
    protected $fillable = ['id','intiperu_id', 'name','mandal_id','created_by_id'];


    public function mandal()
    {
        return $this->belongsTo(Mandal::class, 'mandal_id');
    }
   
}