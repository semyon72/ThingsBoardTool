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

namespace TBStatBundle\Tools\TBTelemetry\PostgreSQL;

use TBStatBundle\Tools\TBTelemetry\TBTelemetryStatCommonCondition;

/**
 * Generated: Mar 21, 2018 9:33:31 PM
 * 
 * Description of TBTelemetryStatAvgValueCondition
 *
 * @author Semyon Mamonov <semyon.mamonov@gmail.com>
 */
class TBTelemetryStatValueCondition extends TBTelemetryStatCommonCondition{

    //put your code here
    
    
    /**
     * Declaration getTsSQL($params) must be exact as is for change behavior by 
     * default for where statement assembler of this field - "ts".
     * 
     * @param type $params
     * @return type
     */
    protected function getTsSQL($params) {
        $result = 'floor("ts"/1000/60/60/24)::integer'; //PgSQL but posible just "ts"/1000/60/60/24 if "ts" integer value  
        if ( count($params) == 1 ){
            $result .= ' = '.key($params);
        } else if(count($params) > 1){
            $result .= ' IN ('. implode(', ',array_keys($params)).')';
        }
        
        return($result);
    }
    
}
