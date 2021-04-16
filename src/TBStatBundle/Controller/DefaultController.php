<?php

namespace TBStatBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use TBStatBundle\Tools\TBTelemetryTools;
use TBStatBundle\Tools\TBTelemetry\PostgreSQL;
use TBStatBundle\Entity\MySQL;

use Doctrine\Common\Collections;

class DefaultController extends Controller
{
    
    /**
     * @Route("/", defaults={"tbDevId"="dfasdfadsfa"})
     */
    public function indexAction($tbDevId = '')
    {
        $emPgSQL = $this->getDoctrine()->getManager('things_board_telemetry_pgsql');
        
        $TBTelemetryStatSumByInterval = new PostgreSQL\TBTelemetryStatSumByInterval($emPgSQL);
        $statDay = TBTelemetryTools::getNowDay()-4; 
        $TBTelemetryStatSumByInterval->getMainCondition()->setTBEntityId(TBTelemetryTools::getTestDeviceId($this->container,$tbDevId))
                ->setTBValueName('doubleval')->setTBTs(array(17602, 17604));
        
        $result = $TBTelemetryStatSumByInterval->run();
        
        $eTBTelemetryStat = $this->getDoctrine()->getManager('house_keeper_telemetry_data_mysql');
        $repo = $eTBTelemetryStat->getRepository(MySQL\TBTelemetryStat::class);

        $repoRes= $repo->findAll();
        
        print ( implode("</br>\r\n",$repoRes)); 
        
        return $this->render('TBStatBundle:Default:index.html.twig');
    }
    
    
    /**
     * @Route("/stat/update")
     */
    public function updateStatDataAction($tbDeviceID = '', $tbDeviceValueName='')
    {
        
        $eTBTelemetryStat = $this->getDoctrine()->getManager('house_keeper_telemetry_data_mysql');
        $repo = $eTBTelemetryStat->getRepository(MySQL\TBTelemetryStat::class);

//        $tbDeviceID = TBTelemetryTools::getTestDeviceId($this->container,"$tbDeviceID");
//        $tbDeviceValueName = TBTelemetryTools::getTestDeviceValueName($this->container, $tbDeviceValueName);
        
        $repo->updateByInterval($tbDeviceID, $tbDeviceValueName, 17000, 17 );
//        $repo->update('', 'doubleval', array($statDay,$statDay-1,$statDay-2,$statDay-3,$statDay-4,$statDay-5,$statDay-6,$statDay-7,$statDay-8));
        return(new \Symfony\Component\HttpFoundation\Response('Statistic data were updated successfully !!!'));
    }    
    
    /**
     * @Route("/stat/average/update")
     */
    public function statAverageUpdateAction($tbDeviceID = '', $tbDeviceValueName='')
    {
        $eTBTelemetryStat = $this->getDoctrine()->getManager('house_keeper_telemetry_data_mysql');
        $repo = $eTBTelemetryStat->getRepository(MySQL\TBTelemetryStatAvg::class);

        $tbDeviceID = TBTelemetryTools::getTestDeviceId($this->container,"$tbDeviceID");
        $tbDeviceValueName = TBTelemetryTools::getTestDeviceValueName($this->container, $tbDeviceValueName);
        
        $onDate = new \DateTime();
        $onDate->sub(\DateInterval::createFromDateString('55 day'));
        
//        $repo->updateNumDaysBefore($tbDeviceID, $tbDeviceValueName, new \DateTime("@".strval(17607*60*60*24)), 1);
        $repo->update($tbDeviceID, $tbDeviceValueName, new \DateTime("@".strval(17604*60*60*24)), '2 day');
        
//        $repo->update('', 'doubleval', array($statDay,$statDay-1,$statDay-2,$statDay-3,$statDay-4,$statDay-5,$statDay-6,$statDay-7,$statDay-8));
        return(new \Symfony\Component\HttpFoundation\Response('Averaged statistic data were updated successfully !!!'));
    }    
    
    /**
     * 
     * @Route("/stat/average")
     * 
     * @param string $tbId ThingBoard device's id like in table ts_kv (not same like in UI)  
     * @param integer $day
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getAverageAction($tbDevId = '', $day = -1)
    {
        
        $doctrine = $this->getDoctrine();
        
        $emMySQL= $doctrine->getManager('house_keeper_telemetry_data_mysql');
        
        $tbDevId = TBTelemetryTools::getTestDeviceId($this->container, $tbDevId);
        $nowStatDay = TBTelemetryTools::getNowDay();

        $statAvgRep= $emMySQL->getRepository(MySQL\TBTelemetryStatAvg::class);
        
//First way through native SQL   
        
        $avgAvgRows = $statAvgRep->getAverageValue($tbDevId,17607);
        
        $nearestAvgRows = $statAvgRep->getNearestAverageValue($tbDevId);
        
        

//Second way through DQL

        $expBuilder = new Collections\ExpressionBuilder();
        $criteria= new Collections\Criteria($expBuilder->gte('day_ts',$nowStatDay) ,array('day_ts'=>'DESC'),0,5);
        $result= $statAvgRep->matching($criteria)->toArray();

        $criteria= new Collections\Criteria( Collections\Criteria::expr()->lte('day_ts',$nowStatDay), array('day_ts'=>'DESC'),0,5 );
        $result = $statAvgRep->matching($criteria)->toArray();
        
        $result= new \stdClass();
        $result->ttt = 'ttttttttt';
        //$this->renderView()
        return new \Symfony\Component\HttpFoundation\Response(json_encode($result));
    }
    
    
    
}
