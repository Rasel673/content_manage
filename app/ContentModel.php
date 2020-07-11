<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContentModel extends Model
{
    public $table='contents';
    public $primaryKey='id';
    public $incrementing=true;
    public $keyType='int';
    public  $timestamps=false;
}
