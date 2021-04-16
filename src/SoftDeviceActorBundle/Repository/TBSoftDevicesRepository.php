<?php

namespace SoftDeviceActorBundle\Repository;

use Doctrine\ORM\Query\ResultSetMappingBuilder;
use SoftDeviceActorBundle\Entity\TBSoftDevices;

/**
 * TBSoftDevicesRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class TBSoftDevicesRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * 
     * @param \DateTime $onDate
     * @param string $thingsBoardId
     * @param string $valueName
     * @return array
     */
    public function getActiveDevices(\DateTime $onDate = null, $thingsBoardId = '', $valueName = ''){
        if (is_null($onDate)) $onDate = new \DateTime();
        return( $this->getOverlappedDevicesFor($onDate, $onDate, $thingsBoardId, $valueName) );
    }
    
    /**
     * 
     * @param \DateTime $dateBegin
     * @param \DateTime $dateEnd
     * @param string $thingsBoardId It can be array of strings and then it will check those items on matching
     * @param string $valueName It can be array of strings and then it will check those items on matching 
     * @return array
     */
    public function getOverlappedDevicesFor(\DateTime $dateBegin, \DateTime $dateEnd = null, $thingsBoardId = '', $valueName = '') {
        
        $em= $this->getEntityManager();
        $metaInfo = $this->getClassMetadata();

        $sqlBuilder = new \SoftDeviceActorBundle\Utils\SQLBuilder();
        $where = array();
        if ( (is_array($thingsBoardId) && count($thingsBoardId) > 0) || trim("$thingsBoardId") !== '' ) $where['tb_id'] = $thingsBoardId ;
        if ( (is_array($valueName) && count($valueName) > 0) || trim("$valueName") !== '' )  $where['value_name'] = $valueName;
        list($whereStr,$params) = $sqlBuilder->addCondition(new \TBStatBundle\Tools\SQL\SQLableFields($where))->assemblySQL();

        $params[':DateBegin'] = $dateBegin;
        $params[':DateEnd'] = $dateEnd;
        
        
        //condition of overlapping
        //'IF( :DateEnd IS NULL, TRUE, date_begin <= :DateEnd )'
        //' AND IF ( date_end IS NOT NULL, date_end >= :DateBegin, TRUE)'
        
        $sql= 'SELECT * '."\r\n"
            . 'FROM '.$metaInfo->getTableName().' '."\r\n"
            . 'WHERE '."\r\n"
            . 'IF( :DateEnd IS NULL, TRUE, date_begin <= :DateEnd )'."\r\n"
            . ' AND IF ( date_end IS NOT NULL, date_end >= :DateBegin, TRUE)'."\r\n"
            . ($whereStr !== '' ? ' AND '.$whereStr : '' );
        
        $rsm = new ResultSetMappingBuilder($em);
        $rsm->addRootEntityFromClassMetadata($metaInfo->getName(), 'd');
        
        $query = $em->createNativeQuery($sql, $rsm);
        $query->setParameters($params);

        return($query->getResult());
        
    }
    
    /**
     * 
     * @param type $thingsBoardId
     * @param type $valueName
     * @param type $phpClassnameForecast
     * @param \DateTime $dateBegin
     * @param \DateTime $dateEnd
     * @return type
     * @throws Exception
     */
    public function createDevice( $thingsBoardId, $valueName, $phpClassnameForecast, \DateTime $dateBegin = null, \DateTime $dateEnd = null, $closePreviousOne = true){
        
        list($thingsBoardId, $valueName, $phpClassnameForecast) = array(trim("$thingsBoardId"), trim("$valueName"), trim("$phpClassnameForecast"));
        
        if ($thingsBoardId === '' || $valueName === '' || $phpClassnameForecast === '')
            throw new Exception ('All parameters $thingsBoardId, $valueName, $phpClassNameForecast must have appropriate non empty values.');
        
        $device = new TBSoftDevices();
        if ( !is_null($dateBegin) ) $device->setDateBegin ($dateBegin);
        //now  $device->getDateBegin() always at least 'now' 
        if ( !is_null($dateEnd) ) $device->setDateEnd ($dateEnd);
        
        $validDates = is_null($device->getDateEnd()) || $device->getDateBegin()->diff($device->getDateEnd())->invert === 0;
        if( !$validDates ) throw new Exception ('Date begin (if NULL was presented then current date will use) can\'t be more than date end (if NOT NULL value was presented).' );

        $device->setTbId($thingsBoardId)->setValueName($valueName)->setPhpclassnameForecast($phpClassnameForecast);
        
        $messageAboutOverlapping = 'Table \''.$this->getClassMetadata()->getTableName().'\' contains values ['.$device->getTbId().':'.$device->getValueName()
        .'] that overlapping with proposed time range [dateBegin:'.$device->getDateBegin()->format('Y-m-d H:i:s')."; dateEnd:"
                  .is_null($device->getDateEnd())? 'NULL' : $device->getDateEnd()->format('Y-m-d H:i:s').']';
        
        $devices = $this->getActiveDevices($device->getDateEnd(), $device->getTbId(), $device->getValueName());
        if(count($devices) > 0){
            if($closePreviousOne === true && count($devices) === 1) {
                $newLastDate = clone($device->getDateBegin());   
                $this->closeDevice( $devices[0]->getId(), $newLastDate->sub( \DateInterval::createFromDateString('1 seconds')) );
            } else throw new Exception ($messageAboutOverlapping);
        }
        
        $this->getEntityManager()->persist($device);
        $this->getEntityManager()->flush($device);
        
        return($device);
    }
    
    public function closeDevice($id, \DateTime $dateEnd = null){
        
        $device = $this->find($id);
        if ( !is_null($device) ){
            if ( is_null($dateEnd) ) $dateEnd = new \DateTime();

            if( $device->getDateBegin()->diff($dateEnd)->invert === 1 ) throw new Exception ('Date begin can\'t be more than date end (if NULL was presented then current date will use).' );
        
            $device->setDateEnd($dateEnd);
            $this->getEntityManager()->persist($device);
            $this->getEntityManager()->flush($device);
        } else throw new \Exception ('Can\'t find device for [id = '."$id".']');        
        
        return($this);
    }
    
    
}
