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

namespace SoftDeviceActorBundle\Utils;

use TBStatBundle\Tools\SQL\SQLAssembler;


/**
 * Generated: Mar 30, 2018 8:44:20 PM
 * 
 * Description of SQLBuilder
 *
 * @author Semyon Mamonov <semyon.mamonov@gmail.com>
 */
class SQLBuilder extends SQLAssembler {
    //put your code here
    
    protected $SQLStatementCallback = null;
    
    /**
     * 
     * @param \SoftDeviceActorBundle\Utils\callable $SQLStatementCallback
     * @return SQLBuilder
     */
    public function setSQLStatementCallback(callable $SQLStatementCallback){
        $this->SQLStatementCallback = $SQLStatementCallback;
        return($this);
    }

    public function getSQLStatementCallback(){
        return($this->SQLStatementCallback);
    }

    protected function getSQLStatement($where, array $params) {
        $result = '';
        $callback= $this->getSQLStatementCallback();
        if ( is_callable($callback) ) $result= call_user_func($callback, $where, $params);
        return($result);
    }

    public function assemblySQL($conditionsGlue = "\r\nAND ", $innerGlue = "\r\nAND ") {
        return(parent::assemblySQL($conditionsGlue, $innerGlue));
    }
}
