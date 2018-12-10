<?php
namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{

    /* relasi */
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function setIfExists($data, $input_field, $db_field = null)
    {
        if (isset($data[$input_field])) {
            if ($db_field === null) {
                $db_field = $input_field;
            }

            $this->$db_field = $data[$input_field];
        }
    }


    public static function addOrModify($data, $id = null)
    {
        // BETTER USE ID IN POST $data
        $m = new static;

        if (isset($data['id']) and $data['id'] != '') {
            $id = $data['id'];
        }

        if ($id !== null) {
            $m = static::find($id);
            $m->updated_by = \Auth::user()->id;
        } else {
            $m->created_by = (\Auth::check()) ? \Auth::user()->id : null ;
        }

        return $m;
    }

}
