<?php 

namespace App\Models;
use CodeIgniter\Model;

class GalleryModel extends Model
{
    protected $table='record';
    protected $allowedFields=['image','user'];

    public function get($id=false)
    {
        if($id===false)
        {
            return $this->findAll();
        }
        return $this->asArray()->where(['id'=>$id])->first();
    }

}