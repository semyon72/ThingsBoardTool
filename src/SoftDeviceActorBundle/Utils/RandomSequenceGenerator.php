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

/**
 * Generated: Apr 2, 2018 9:11:02 PM
 * 
 * Description of RandomSequenceGenerator
 *
 * @author Semyon Mamonov <semyon.mamonov@gmail.com>
 */
class RandomSequenceGenerator {
    //put your code here
    
    protected $sequence = array();
    
    protected $maxPercentForSequenceItem = 0.44;
    
    protected $total = 1;
    
    protected $precisionSequenceItemValue = 6;
    
    
    public function __construct($total, $maxPercentForSequenceItem = 0.44) {
        $this->setTotal($total)->setMaxPercentForSequenceItem($maxPercentForSequenceItem);
        
    }

    
    public function getPrecisionSequenceItemValue() {
        return($this->precisionSequenceItemValue);
    }
    
    public function getMaxPercentForSequenceItem() {
        return($this->maxPercentForSequenceItem);
    }

    
    public function setMaxPercentForSequenceItem($maxPercentForSequenceItem = 0.44) {
        $maxPercentForSequenceItem = round(floatval($maxPercentForSequenceItem),2);
        if ($maxPercentForSequenceItem < 0 || $maxPercentForSequenceItem > 1)
            throw new Exception ('Wrong value for $maxPercentForSequenceItem ['."$maxPercentForSequenceItem".']. It must be in range from 0..1.');
        $this->maxPercentForSequenceItem = $maxPercentForSequenceItem;
        return($this);
    }




    /**
     * 
     * @return float
     */
    public function getTotal() {
        return($this->total);
    }
    
    /**
     * 
     * @param integer $numbers
     * @return RandomSequenceGenerator
     */
    public function setTotal($total = 40.0) {
        $total = round(floatval($total),$this->getPrecisionSequenceItemValue());
        $this->total = $total > 0 ? $total : 40.0;
        return($this);
    }
    
    public function getSequence(){
        if ( count($this->sequence) === 0 ) $this->initSequence();
        return($this->sequence);
    }
    
    public function initSequence(){
        $this->sequence = array();
        
        $Vmax = $this->getTotal();
        while ( $Vmax > $seqSumm = array_sum($this->sequence) ) {
            $stagePercent = mt_rand(0, 10000)/10000 * $this->getMaxPercentForSequenceItem();
            $randValue = mt_rand(0, intval($Vmax*1000000))/1000000;
            $this->sequence[] = round($randValue * $stagePercent, $this->getPrecisionSequenceItemValue());
        }
        
        $diff = array_push( $this->sequence, round(array_pop($this->sequence) - ($seqSumm - $Vmax),$this->getPrecisionSequenceItemValue() ) );
        shuffle($this->sequence);
        
        return($this);
    }
    
    
}
