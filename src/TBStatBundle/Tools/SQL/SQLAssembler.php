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

namespace TBStatBundle\Tools\SQL;

/**
 * Generated: Mar 21, 2018 8:44:58 PM
 * 
 * Description of SQLAssembler
 *
 * @author Semyon Mamonov <semyon.mamonov@gmail.com>
 */
abstract class SQLAssembler {
    //put your code here
    
    /**
     *
     * @var array of descendants of SQLableFields 
     */
    protected $conditions = array();
    
    /**
     * Add condition in array of all conditions. Each conditions have AND logic between each element of within.
     * For example - will be find all information where $id == 'fff' && $key == 'fff' && $ts == 'fff' && $type == 'fff'
     * but if value is array then  $id ==  ( 'fff' || 'ff1' || 'ffn') etc.
     * But between each other they will have OR logic (entity condition 1) || (entity condition 2) || .....
     * 
     * @param ISQLable $condition
     * @return SQLAssembler Itself
     */
    public function addCondition(ISQLable $condition, $conditionIdentifier = ''){
        $conditionIdentifier = trim((string) $conditionIdentifier);
        if( $conditionIdentifier === '' ) $conditionIdentifier = spl_object_hash ($condition);
        $this->conditions[$conditionIdentifier] = $condition;
        return($this);
    }
    
    
    /**
     * 
     * @return array Array (list) of all TBTelemetryEntityCondition elements
     */
    public function getConditions(){
        return($this->conditions);
    }
    
    /**
     * Clear list of all TBTelemetryEntityCondition elements
     * 
     * @return TBTelemetryClient Itself
     */
    public function clearConditions(){
        $this->conditions= array();
        return($this);
    }
    
    
    /**
     * Get one SQLableFields (condition's fields) element from list.
     * 
     * @param object|string $indexObjName
     * @return \TBStatBundle\Tools\SQL\SQLableFields Returns the found the fields of conditions element
     */
    public function getCondition($objOrName){
        $result = null;
        $eCnt = count($this->conditions);
        
        if ( $eCnt > 0 ){
            $hash = null;
            if (is_object($objOrName) &&  $objOrName instanceof ISQLable ) {
                $hash = spl_object_hash($objOrName);
            } else if ( is_string($objOrName) ){
                $hash = trim($objOrName);
            } else throw new \Exception('$objOrName must be object that implements \TBStatBundle\Tools\SQL\ISQLable or some Name that contains not only space chars.');
            
            if( !is_null($hash) && isset($this->conditions["$hash"])){
                $result= $this->conditions["$hash"];
            }
        }
        return($result);
    }
    
    
    /**
     * Remove one TBTelemetryEntityCondition element from list.
     * 
     * @param integer $indexObjName
     * @return \TBStatBundle\Tools\TBTelemetryEntityCondition Removed entity element
     */
    public function removeCondition($objOrName){
        $result = $this->getCondition($objOrName);
        if (!is_null($result)){
           $key =  array_search($result, $this->conditions, true);
           if( $key !== false ) unset ($this->conditions[$key]);
        }
        return($result);
    }
    
    
    protected function assemblySQL($conditionsGlue = "\r\nAND ", $innerGlue = "\r\nAND "){
        $tRes = array();
        $entsCnt = count($this->conditions);
        $params = array();
        foreach ( $this->conditions as $index=>$entity ) {
            $paramSufix = "";
            if ($entsCnt > 1) $paramSufix = "_$index";
            $rawsql = $entity->prepareSQL($paramSufix);
            $tRes[]= implode("$innerGlue", array_keys($rawsql));
            array_walk( $rawsql, function($value) use (&$params) {
                $params = array_merge($params,$value); 
            } );
        }
        
        $resultSQL = implode("$conditionsGlue", $tRes);
        return(array($resultSQL, $params));
    }
    
    /**
     * Must return parameterized SQL statement like described in PDO documentation.
     * 
     * @param string $where SQL statement (where clauses) that was assembled to based on EntityCondition elements.
     * @param array $params array of values for parameters in $where clauses.
     * @return string Description
     */
    abstract protected function getSQLStatement($where, array $params);
    
    /**
     * Returns Assembled SQL from conditions and returned SQL by method $this->getSQLStatement()
     * 
     * @return array element with index [0] is assembled SQL and element with index [1] is array of parameters and their values.
     */
    public function getFullSQL(){
        list($where, $params) = $this->assemblySQL(" )\r\nOR ( ");
        if( $where !== '' ) $where = "WHERE\r\n".'( '.$where.' )';
        
        $sql = $this->getSQLStatement($where, $params);
       return(array($sql,$params));
    }
    
    
}
