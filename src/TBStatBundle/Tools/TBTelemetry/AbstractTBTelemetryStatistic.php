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

use TBStatBundle\Tools\SQL\SQLAssembler;
use Doctrine\ORM\EntityManager;


/**
 * Generated: Mar 21, 2018 9:50:09 PM
 * 
 * Description of AbstractTBTelemetryStatistic
 *
 * @author Semyon Mamonov <semyon.mamonov@gmail.com>
 */
abstract class AbstractTBTelemetryStatistic extends SQLAssembler{
    
    /**
     *
     * @var \Doctrine\ORM\EntityManager 
     */
    protected $entityManager = null; 
    
    
    /**
     * 
     * @param \Doctrine\ORM\EntityManager $entityManagerName 
     */
    public function __construct(EntityManager $entityManagerName) {
        $this->setEntityManager($entityManagerName);
    }
    
    
    /**
     * Returns main condition that have name that returned by static::class.
     * Commonly 
     * 
     * @return TBTelemetryStatValueCondition
     */
    public function getMainCondition() {
        return($this->getCondition(static::class));
    }
    
    
    
    /**
     * 
     * @param EntityManager $entityManager
     * @return TBTelemetryClient Itself
     */
    protected function setEntityManager(EntityManager $entityManager){
        $this->entityManager = $entityManager;
        return($this);
    }
    
    /**
     * 
     * @return array Empty or resulted rows
     * @throws Exception If doctrine's entity manager is null
     */
    public function run() {
        if ( $this->entityManager == null ) throw new Exception ('Instance of \Doctrine\ORM\EntityManager to ThingsBoard database don\'t accessible.');
        $conn = $this->entityManager->getConnection();
        list ( $whereSQL, $params ) = $this->getFullSQL();
        //$queryBuilder->createNamedParameter($userInputEmail);
        //$query= $conn->createQueryBuilder();
        return($conn->fetchAll($whereSQL,$params));
    }
    
}
