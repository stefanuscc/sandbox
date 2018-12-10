<?php

namespace App\Models;

use App\Models\BaseModel;

class Pegawai extends BaseModel
{
    protected $table 		= 'ref_pegawai';
    protected $fillable 	= [
						    	'nik', 'nama',
						    	'alamat', 'jabatan_id'
						      ];

	public function jabatan()
	{
		return $this->belongsTo(Jabatan::class, 'jabatan_id');
	}
}
