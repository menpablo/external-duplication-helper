<?php

namespace FlowInt\ExternalIdDuplicationHelper\App\Helpers;

use FlowInt\ExternalIdDuplicationHelper\App\Exceptions\ObjectAlreadyExistsException;
use FlowInt\ExternalIdDuplicationHelper\App\Models\ExternalIdAux;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Request;

class ObjectDuplicationHelper
{
    static function saveNewObject($objectId,$objectType,$integrationSystem) {
        $externalIdAux = new ExternalIdAux([
                                            'external_id' => $objectId,
                                            'object_type' => $objectType,
                                            'integration_system_id' => $integrationSystem
                                           ]);
        try{
            $externalIdAux->save();
        }catch (QueryException $e){
            if($e->errorInfo[1] == 1062){
                throw new ObjectAlreadyExistsException($externalIdAux->external_id,$externalIdAux->object_type);
            }
            throw $e;
        }
    }
}
