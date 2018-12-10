<?php

namespace App\Models;

use App\Models\BaseModel;

class Jabatan extends BaseModel
{
    protected $table 		= 'jabatan';
    protected $fillable 	= ['nama'];

    public function pegawai()
    {
    	return $this->hasMany(Pegawai::class, 'jabatan_id');
    }
}
