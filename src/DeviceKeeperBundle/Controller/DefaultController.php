<?php

namespace DeviceKeeperBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use DeviceKeeperBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
//        if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
//            throw $this->createAccessDeniedException();
//        }        
        
        $eventDispatcher= $this->get('event_dispatcher');
        
        $user= $this->getUser();        
        
        return $this->render('DeviceKeeperBundle:Default:index.html.twig');
    }


    /**
     * @Route("/admin")
     */
    public function adminAction()
    {
        
        return $this->render('DeviceKeeperBundle:Default:index.html.twig');
    }

    /**
     * @Route("/admin1")
     */
    public function adminOneAction()
    {
        
        return $this->render('DeviceKeeperBundle:Default:index.html.twig');
    }
    
    
    /**
     * 
     * @return \Symfony\Component\HttpFoundation\Response A Response instance
     * 
     * @Route("/test/ownergroupdevice/create")
     */
    public function testCreatingOwnerGroupDevice(){

        $_em= $this->getDoctrine()->getManager('house_keeper_devicekeeper_data_mysql');
        
        $owner = new Entity\Owner();
        $owner->setDescription('OWNER 11111111 DESCR');
        $_em->persist($owner);
//        $_em->flush($owner);

        
        
        $groups = new ArrayCollection();
        $groups->add((new Entity\OwnerGroup())->setDescription('111111111111 Descr')->setOwnerId($owner->getId()));
        $groups->add((new Entity\OwnerGroup())->setDescription('222222222222 Descr')->setOwnerId($owner->getId()));
        $groups->add((new Entity\OwnerGroup())->setDescription('333333333333 Descr')->setOwnerId($owner->getId()));
        $owner->setGroups($groups);
        $_em->persist($groups->get(0));
        $_em->persist($groups->get(1));
        $_em->persist($groups->get(2));
        $_em->flush();
        
        
        $groupDevice = new ArrayCollection();
        $groupDevice->add( (new Entity\OwnerGroupDevice())->setTbId('111111111 111111111 TBID')->setOwnergroupId($groups->get(0)->getId()) );
        $groupDevice->add( (new Entity\OwnerGroupDevice())->setTbId('111111111 222222222 TBID')->setOwnergroupId($groups->get(0)->getId()) );
        $groups->get(0)->setDevices($groupDevice);
        $_em->flush($groups);

        
        $groupDevice = new ArrayCollection();
        $groupDevice->add( (new Entity\OwnerGroupDevice())->setTbId('222222222 111111111 TBID') );
        $groups->get(1)->setDevices($groupDevice);

        
        $groupDevice = new ArrayCollection();
        $groupDevice->add( (new Entity\OwnerGroupDevice())->setTbId('333333333 111111111 TBID') );
        $groupDevice->add( (new Entity\OwnerGroupDevice())->setTbId('333333333 222222222 TBID') );
        $groupDevice->add( (new Entity\OwnerGroupDevice())->setTbId('333333333 222222222 TBID') );
        $groups->get(2)->setDevices($groupDevice);
        
        
        
        
        return $this->render('DeviceKeeperBundle:Default:index.html.twig');
    }
    
}
