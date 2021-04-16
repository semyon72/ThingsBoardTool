<?php

/*
 * Copyright (c) 2017, Semyon Mamonov <semyon.mamonov@gmail.com>.
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

namespace TBStatBundle\Tools\SQL;

/**
 * Generated: Dec 1, 2017 11:17:32 PM
 * 
 * Description of SQLableFields
 * 
 * Descendants have possibility to define methods like getCamelizedFieldNameSQL($params) which
 * must return part SQL statement for where part of SQL only for field with 'camelized_field_name' in conditions
 * something like - return '("ts"/1000/60/60/24) IN ('. implode(', ',array_keys($params)).')';
 * If method for getting SQL for certain field not defined will used default function with ' = ' condition for
 * resulting SQL statement for where part.  
 * 
 *
 * @author Semyon Mamonov <semyon.mamonov@gmail.com>
 */
class SQLableFields implements ISQLable{
    
    protected $fields = array();
    
    
    public function __construct(array $fields = array()) {
        $this->init($fields);
    }
    
    protected function init(array $fields){
        $this->fields = $fields;
    }

    
    protected function snakeToCamelCase($string){
        return(str_replace('_', '', ucwords($string, '_')));
    }
    
    /**
     * 
     * 
     * @param string $name if it is empty then will returned array of all fields that exist
     * otherwise only value of pointed field or null if field doesn't exist
     * @return mixed If $name is empty then array of all fields that exist
     * otherwise only value of pointed field or null if field doesn't exist.
     */
    public function getField($name = ''){
        $result = null;
        if( empty($name) ) $result= $this->fields;
        else if( array_key_exists("$name", $this->fields) ){
          $result = $this->fields["$name"];
        }
        return($result);
    }
    
    /**
     * Changes value only field with name that exists in list.
     * If you need add field in exist list you have possible do 
     * 
     * $existsFields = $this->getField();
     * Make changes in $existsFields
     * and $this->assignFields($existsFields);
     * 
     * @param string $name
     * @param mixed $value
     * @return \TBStatBundle\Tools\SQL\SQLableFields Itself
     */
    public function setField($name, $value){
        $strName = "$name";
        if( !empty($strName) && array_key_exists("$strName", $this->fields) ) {
          $this->fields["$strName"]= $value;
        }
        return($this);
    }

    /**
     * 
     * @param string $name
     * @return \TBStatBundle\Tools\SQL\SQLableFields Itself
     */
    public function removeField($name){
        $strName = "$name";
        if( !empty($strName) && array_key_exists("$strName", $this->fields) ) {
          unset($this->fields["$strName"]);
        }
        return($this);
    }

    
    /**
     * 
     * @param array $fields array of field name => value pairs
     * @return \TBStatBundle\Tools\SQL\SQLableFields Itself
     */
    public function assignFields(array $fields){
        $this->init($fields);
        return($this);
    }
    
    
    
    protected function getParametrizedValues($fieldName, $paramSufix = ''){
        $result= array();
        $value = $this->getField($fieldName);
        if ($value !== null){
            $camelizedPrmName = $this->snakeToCamelCase($fieldName);
            
            $values = (array) $value;
            $valCnt = count($values);
            foreach ($values as $key=>$value){
                $paramName= ISQLable::PARAMETER_PREFIX.$camelizedPrmName;
                if ( is_numeric($key) ) {
                    if ( $valCnt > 1 ) $paramName .= $key;
                } else $paramName = ISQLable::PARAMETER_PREFIX.$key;
                if( $paramSufix !== '' ) $paramName .= "$paramSufix";
                
                $result[$paramName]= $value;
            }
        }
        
        return($result);
    }
    
    protected function getSQLDefault($fieldName, array $params){
        $result = "$fieldName";
        if ( count($params) == 1 ){
            $result = $fieldName .' = '.key($params);
        } else if(count($params) > 1){
            $result = $fieldName .' IN ('. implode(', ',array_keys($params)).')';
        }
        
        return($result);
    }
    
    
    /**
     * 
     * {@inheritdoc}
     */
    public function prepareSQL($paramSufix = '') {
        $result = array();
        $settings= $this->getField();
        foreach ($settings as $fieldName => $value) {
            if($value !== '' && $value !== null ){
                $params = $this->getParametrizedValues($fieldName,$paramSufix);
                $cameledName = $this->snakeToCamelCase($fieldName);
                $getSQLMethod = 'get'.ucfirst($cameledName).'SQL';
                if ( method_exists($this, $getSQLMethod) ) $sql = call_user_func(array($this,$getSQLMethod), $params);
                 else $sql = $this->getSQLDefault($fieldName, $params);
                
                $result[$sql]= $params;
            }
        }
        return($result);
    }

    
    public function __get($name) {
        throw new Exception('Can\'t get value. SQLable field \''.$name.'\' not found');
    }
    
    public function __set($name, $value) {
        throw new Exception('Can\'t set value. SQLable field \''.$name.'\' not found');
    }
    
}
