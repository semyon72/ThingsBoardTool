<?php

namespace SoftDeviceActorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use SoftDeviceActorBundle\Entity\TBSoftDevicesScheduledTasks;
use SoftDeviceActorBundle\Entity\TBSoftDevices;
use SoftDeviceActorBundle\Entity\TBSoftDevicesTokens;

use IoT\Entity\Fields\Field;
use IoT\Entity\ThingsBoard\REST\Device as SoftDevice;



class DefaultController extends Controller
{
    
    private $_em = null;
        
    public function setContainer(\Symfony\Component\DependencyInjection\ContainerInterface $container = null) {
        parent::setContainer($container);
        if (is_null($this->_em) ) $this->_em = $this->getDoctrine()->getManager('house_keeper_softdeviceactor_data_mysql');
    }
    
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        
        $repoDevice = $this->_em->getRepository(TBSoftDevices::class);
        
        //$repoDevice->createDevice('1e7d500d0b441c0b6a7134646a8fbab', 'WaterMeterCold', 'WaterMeterColdClassNew');
        
        $devices = $repoDevice->getActiveDevices();
        
//        $overlappedDevices = $repoDevice->getOverlappedDevicesFor( new \DateTime('2018-03-31'), null, '1e7d500d0b441c0b6a7134646a8fbab', array('WaterMeterCold','doubleval','GasMeter') );
        
        $repoScheduledTasks= $this->_em->getRepository(TBSoftDevicesScheduledTasks::class);
        $activeTasks= $repoScheduledTasks->getActiveTasks();
        
        $scheduledTasks = array();
        foreach($activeTasks as $task){
            $scheduledTasks[]= $repoScheduledTasks->getSchedule($task->getId());
        }
        
        
//        foreach($activeTasks as $task){
//            $scheduledTaskInfo= $repoScheduledTasks->getNextScheduleItem($task->getId());
//            $repoScheduledTasks->closeScheduleItem($scheduledTaskInfo->ScheduledTask->getId(), $scheduledTaskInfo->ScheduleItemKey );
//        }
        
//        foreach ( $devices as $device){
//            $task = $repoScheduledTasks->createTaskFor($device,13);
//        }
//        $repoScheduledTasks->closeScheduleItem(10, "00000000415e7e320027400040866de9");
        
        return $this->render('SoftDeviceActorBundle:Default:index.html.twig',array('devices'=>$devices, 'activeTasks'=>$scheduledTasks));
    }

    
    /**
     * @Route("/perform", name="perform_scheduled_tasks")
     */
    public function performScheduledTasksAction() {

        $rScheduledTasks= $this->_em->getRepository(TBSoftDevicesScheduledTasks::class);
        
        //1: Getting list of active tasks
        $activeTasks= $rScheduledTasks->getActiveTasks();
        foreach($activeTasks as $task){

            //2: Getting next value of item of schedule that must be processed.
            $scheduledTaskInfo= $rScheduledTasks->getNextScheduleItem($task->getId());
            $scheduleItem = $scheduledTaskInfo->Schedule[$scheduledTaskInfo->ScheduleItemKey];
            if ( $scheduleItem['isProcessed'] === true ) throw new \Exception ('Error of model logic - $scheduledTaskInfo->ScheduleItemKey must contain key of schedule item that need closing.');
            
            //3: Using ThingsBoard device object We send data into ThingsBoard.
            $rDevicesTokens = $this->_em->getRepository(TBSoftDevicesTokens::class);
            $tokens= $rDevicesTokens->findBy( array('tb_id'=>$scheduledTaskInfo->ScheduledTask->getTbId()) );
            if ( count($tokens) === 0 )
                throw new \Exception ('Can\'t find appropriate ThingsBoard\'s ACCESS_TOKEN for ThingsBoard\'s Id ['
                    .$scheduledTaskInfo->ScheduledTask->getTbId().']');
            
            $softDevice = new SoftDevice($tokens[0]->getTbToken());
            $softDevice->getUrl()->setHost('')->setPort('8080');
            $field = new Field($scheduledTaskInfo->ScheduledTask->getValueName(),'double',$scheduleItem['value']);
            $softDevice->setField($field);
            $result = $softDevice->run();
            if ( $result ){
                
                //4:If previous action is success then We closing this $scheduledTaskInfo in DataBase
                $rScheduledTasks->closeScheduleItem($scheduledTaskInfo->ScheduledTask->getId(), $scheduledTaskInfo->ScheduleItemKey );

            }
        }
        
        return $this->forward(array($this,'indexAction'));  // or static::class."::indexAction" instead array

    }
    
    
    /**
     * @Route("/prepare")
     */
    public function prepareScheduledTasksAction()
    {
        //1: get all active devices
        $rDevices = $this->_em->getRepository(TBSoftDevices::class)->getActiveDevices();
        
        //2+3: Getting and Storing forecasted values for certain device into DataBase
        $rScheduledTasks= $this->_em->getRepository(TBSoftDevicesScheduledTasks::class);
        foreach ( $rDevices as $device){

            //2: Invoke appropriate classes for getting the forecast values.
            $value = 0.024;

            //3: Storring forecasted values for certain device into DataBase
            $task = $rScheduledTasks->createTaskFor($device,$value);
        }
        
        return $this->render('SoftDeviceActorBundle:Default:index.html.twig');
    }
    
    
}
