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

namespace TBStatBundle\Tools;

/**
 * Generated: Mar 20, 2018 11:39:56 PM
 * 
 * Description of TBTelemetryTools
 *
 * @author Semyon Mamonov <semyon.mamonov@gmail.com>
 */
class TBTelemetryTools {
    //put your code here
    
    private static $testDeviceId = '1e7d500d0b441c0b6a7134646a8fbab';

    private static $testDeviceValueName = 'doubleval';
    

    public static function isTestEnvironment($container){
        $request = $container->get('request_stack')->getCurrentRequest();
        return($request->getHost() === 'localhost' || $container->getParameter('kernel.environment') === 'dev');
    }
    
    public static function getTestDeviceValueName($container, $tbDevValueName = ''){
        $result = trim("$tbDevValueName");
        if ($result === '' && self::isTestEnvironment($container) ){
            $result = self::$testDeviceValueName;
        }        
        return($result);
    }

    
    public static function getTestDeviceId($container, $tbDevId = ''){
        $result = trim("$tbDevId");
        if ($result === '' && self::isTestEnvironment($container) ){
            $result = self::$testDeviceId;
        }        
        return($result);
    }
    
    
    public static function getNowDay(){
        return( intval(time()/60/60/24) );
    }
    
    
    /**
     * Returns day as integer value from timestamp.
     * If $day is not integer or instances of \DateTime or DateInterval then
     * will be returned current day. Otherwise if it is integer value >= 0 then
     * interpreted as day from start of epoch and it will returned without any changes.
     * If integer value < 0  then the result will be calculated as difference between
     * current day and presented integer value. If $day is DateTime or DateInterval object
     * then will returned DateTime value converted into integer or DateInterval
     * will be subtracted from DateTime('now') value accordingly (correspondingly).
     * 
     * @param mixed $day for positive changes need DateInterval::createFromDateString('-89 days') because always invoking \DateTime::sub() function ;
     * @return integer
     */
    public static function getDayWisely($day = null){
        $result = self::getNowDay();

        if (is_object($day) ){
            if ($day instanceof \DateInterval) {
                $nowDate = new \DateTime();
                $day = $nowDate->sub($day);
            }
            if ( $day instanceof \DateTime ){
                $result = intval($day->getTimestamp()/60/60/24);
            }
        } else if ( is_int($day) ){
            if( $day < 0 )  $result = self::getNowDay() - $day;
              else $result = $day;
        }
        
        return( $result );
    }
    
    
    
    public static function getDayToTS($dayTs){
        return( intval($dayTs)*60*60*24 + 12*60*60 );
    }
    
    
    
    
}
