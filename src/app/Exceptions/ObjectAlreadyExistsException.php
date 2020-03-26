<?php
/**
 * Created by PhpStorm.
 * User: pablo
 * Date: 27/11/2017
 * Time: 12:00
 */

namespace  FlowInt\ExternalIdDuplicationHelper\Exceptions;

use Exception;
use Throwable;

class ObjectAlreadyExistsException extends Exception
{

    protected $objectId;
    protected $objectType;

    public function __construct($objectId,$objectType)
    {
        parent::__construct("El ".$objectType." con Id".$objectId." ya existe");
        $this->objectId = $objectId;
        $this->objectType = $objectType;
    }
}