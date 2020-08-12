<?php

namespace masserg\I18nDoctrineBundle\Doctrine\ODM\EventListener;

use masserg\I18nDoctrineBundle\EventListener\ControllerListener as BaseControllerListener,
    Symfony\Component\HttpKernel\Event\FilterControllerEvent,
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
     * @param FilterControllerEvent $event
     */
    public function onKernelController(FilterControllerEvent $event)
    {
        $controller = $event->getController();
        list($object, $method) = $controller;

        $className = ClassUtils::getClass($object);
        $reflectionClass = new \ReflectionClass($className);
        $reflectionMethod = $reflectionClass->getMethod($method);

        if ($this->annotationReader->getMethodAnnotation($reflectionMethod, 'masserg\I18nDoctrineBundle\Annotation\I18nDoctrine')) {
            $this->om->getFilterCollection()->disable('oneLocale');

        } else {
            $this->om->getFilterCollection()->enable('oneLocale')->setParameter('locale', $event->getRequest()->getLocale());
        }
    }

}