<?php

/*
 * Copyright (c) 2018, Semyon Mamonov <semyon.mamonov@gmail.com>.
 * All rights reserved.
 * 
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions
 * are met:
 * 
 *  * Redistributions of source code must retain the above copyright
 *    notice, this list of conditions and the following disclaimer.
 * 
 *  * Redistributions in binary form must reproduce the above copyright
 *    notice, this list of conditions and the following disclaimer in
 *    the documentation and/or other materials provided with the
 *    distribution.
 * 
 *  * Neither the name of Semyon Mamonov nor the names of his
 *    contributors may be used to endorse or promote products derived
 *    from this software without specific prior written permission.
 * 
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS
 * FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 * COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT,
 * INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING,
 * BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER
 * CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT
 * LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN
 * ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 */

namespace TBStatBundle\Tools\TBTelemetry;


use TBStatBundle\Tools\SQL\SQLableFields;


/**
 * Generated: Mar 21, 2018 10:51:55 PM
 * 
 * Description of TBTelemetryStatCommonCondition
 *
 * @author Semyon Mamonov <semyon.mamonov@gmail.com>
 */
class TBTelemetryStatCommonCondition extends SQLableFields{
    
    //put your code here
    
    protected function getDefaultFields(){
        return( 
                array(
                    'entity_type'=>'DEVICE',  /* t."entity_type" = :entityType -> 'DEVICE' - which entity type need fetch */
                    'key'=>'',          /* t."key" = :key -> 'doubleval' - what need calculate */
                    'entity_id'=>'',    /* t."entity_id" = :entityId -> '1e7d500d0b441c0b6a7134646a8fbab' */
                    'ts'=>''            /* t."ts"/1000/60/60/24 = :days -> intval(time()/60/60/24); */
                )
        );
    }
    
    public function __construct() {
        parent::__construct($this->getDefaultFields());
    }
    
    
    /**
     * Returns value for ThingsBoard entity type. In common case it is 'DEVICE' 
     * 
     * @return mixed 
     */
    public function getTBEntityType(){
        return($this->getField('entity_type'));
    }
    
    /**
     * Changes value for ThingsBoard entity type. In common case (and by default) using 'DEVICE' value.
     * 
     * @param mixed $value
     * @return TBTelemetryStatCommonCondition Itself
     */
    public function setTBEntityType($value){
        return($this->setField('entity_type',$value));
   }
    
    public function getTBValueName() {
        return($this->getField('key'));
    }
    
    /**
     * 
     * @param mixed $value
     * @return TBTelemetryStatCommonCondition Itself
     */
    public function setTBValueName($value) {
        return($this->setField('key',$value));
    }
    
    public function getTBEntityId() {
        return($this->getField('entity_id'));
    }
    
    /**
     * 
     * @param mixed $value
     * @return TBTelemetryStatCommonCondition Itself
     */
    public function setTBEntityId($value) {
        return($this->setField('entity_id',$value));
    }
    
    public function getTBTs() {
        return($this->getField('ts'));
    }
    
    /**
     * 
     * @param mixed $value
     * @return TBTelemetryStatCommonCondition Itself
     */
    public function setTBTs($value) {
        return($this->setField('ts',$value));
    }

}
