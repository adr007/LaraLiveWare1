<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students'; // Iisi jika table tidak sesuai aturan
    protected $primaryKey = 'std_id'; // Iisi jika table tidak sesuai aturan
    protected $fillable = ['std_nim','std_nama','std_jurusan','std_jk'];
}
