<?php

namespace masserg\I18nDoctrineBundle\Doctrine\ORM\EventListener;

use masserg\I18nDoctrineBundle\EventListener\ControllerListener as BaseControllerListener,
    Symfony\Component\HttpKernel\Event\ControllerEvent,
    Doctrine\Common\Util\ClassUtils;

/**
 * Controller Listener
 *
 * @author
 */
class ControllerListener extends BaseControllerListener
{
    /**
     *
     * @param \Symfony\Component\HttpKernel\Event\FilterControllerEvent $event
     * @return type
     */
    public function onKernelController(ControllerEvent $event)
    {
        //@TODO fix this
//        $controller = $event->getController();
//        list($object, $method) = $controller;
//
//        $className = ClassUtils::getClass($object);
//        $reflectionClass = new \ReflectionClass($className);
//
//        // Sonata
//        $sonataAdmin = 'Sonata\AdminBundle\Controller\CRUDController';
//        if (class_exists($sonataAdmin) && ($sonataAdmin === $className || $reflectionClass->isSubclassOf($sonataAdmin)) && in_array($method, array('createAction', 'editAction'))) {
//            $this->om->getFilters()->disable('oneLocale');
//            return;
//        }
//
//        $reflectionMethod = $reflectionClass->getMethod($method);
//        if ($this->annotationReader->getMethodAnnotation($reflectionMethod, 'masserg\I18nDoctrineBundle\Annotation\I18nDoctrine')) {
//            $this->om->getFilters()->disable('oneLocale');
//
//        } else {
//            $this->om->getFilters()->enable('oneLocale')->setParameter('locale', $event->getRequest()->getLocale());
//        }
    }

}
