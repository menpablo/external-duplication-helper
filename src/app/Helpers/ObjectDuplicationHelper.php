<?php

namespace FlowInt\ExternalIdDuplicationHelper\Helpers;

use FlowInt\ExternalIdDuplicationHelper\Exceptions\ObjectAlreadyExistsException;
use FlowInt\ExternalIdDuplicationHelper\Models\ExternalIdAux;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Request;

class ObjectDuplicationHelper
{
    static function saveNewObject($objectId,$objectType,$integrationSystem) {
        $externalIdAux = new ExternalIdAux([
                                            'objectId' => $objectId,
                                            'objectType' => $objectType,
                                            'integrationSystem' => $integrationSystem
                                           ]);
        try{
            $externalIdAux->save();
        }catch (QueryException $e){
            echo $e->getCode();
            if($e->errorInfo[1] == 1062){
                throw new ObjectAlreadyExistsException($externalIdAux->external_id,$externalIdAux->object_type);
            }
            throw $e;
        }
    }
}
