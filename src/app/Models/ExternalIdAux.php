<?php

namespace FlowInt\ExternalIdDuplicationHelper\Models;

use Illuminate\Database\Eloquent\Model;

class ExternalIdAux extends Model
{

    protected $table = 'external_id_aux';

    protected $fillable = [
         'external_id','object_type','integration_system_id'
    ];
}
