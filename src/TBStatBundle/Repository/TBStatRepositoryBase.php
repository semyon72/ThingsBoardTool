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


namespace TBStatBundle\Repository;

/**
 * Generated: Mar 24, 2018 8:53:18 AM
 * 
 * Description of TBStatRepositoryBase
 *
 * @author Semyon Mamonov <semyon.mamonov@gmail.com>
 */
class TBStatRepositoryBase extends \Doctrine\ORM\EntityRepository{
    
    //put your code here
    
    // \Doctrine\DBAL\Connection
    protected $connection = null;
    
    protected $container = null;
    
    public function __construct($em, \Doctrine\ORM\Mapping\ClassMetadata $class) {
        parent::__construct($em, $class);
        
        $this->connection= $this->getEntityManager()->getConnection();
        
        //$em is Doctrine\ORM\EntityManager
        $eventManager = $em->getEventManager();
        $reflectionProp= new \ReflectionProperty($eventManager,'container');
        $reflectionProp->setAccessible(true);
        $this->container =  $reflectionProp->getValue($eventManager);
    }
    
    /**
     * 
     * @param array $source
     * @param type $destEntityClass
     * @param callable $getFindByArrayForRepo 
     * @param array $destSettersTosrcFieldsEntMapper
     */
    protected function _updateARfromArray(array $source, $destEntityClass, callable $getFindByArrayForRepo, array $destSettersTosrcFieldsEntMapper){
     
        $entityManager = $this->getEntityManager();
        $repo = $entityManager->getRepository($destEntityClass);

        $cntr = 0;
        foreach ( $source  as $srcRow ) {
            
            $destARow = $repo->findBy(call_user_func($getFindByArrayForRepo, $srcRow));
            if ( is_array($destARow) && count($destARow) > 0)
                $destARow = $destARow[0];
             else $destARow =  new $destEntityClass();
            
            foreach($destSettersTosrcFieldsEntMapper as $destMethod=>$srcRowFieldName){
                if ( method_exists($destARow, $destMethod) ){
                    $param = null;
                    if ( is_object($srcRowFieldName) || is_array($srcRowFieldName) ){
                        if ( is_callable($srcRowFieldName) ) $param = $srcRowFieldName($srcRow);
                    } else if( array_key_exists($srcRowFieldName, $srcRow) ){
                        $param = $srcRow["$srcRowFieldName"];
                    } else  throw new \Exception ('Sorce row doesn\'t contains field with name "'.$srcRowFieldName.'".');
                    call_user_func(array($destARow,$destMethod), $param);
                } else throw new \Exception (get_class($destARow).'::'."$destMethod".' method doesn\'t exists.');
            } 

            $entityManager->persist($destARow);
            $cntr++;
            if ($cntr >= 40) {
                $entityManager->flush();
                $cntr = 0;
            }
        }
        
        if ($cntr > 0) $entityManager->flush();
        
    }

    
    
}
