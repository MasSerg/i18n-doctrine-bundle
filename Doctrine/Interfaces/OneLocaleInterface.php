<?php

namespace masserg\I18nDoctrineBundle\Doctrine\Interfaces;

/**
 *
 * @author
 */
interface OneLocaleInterface
{
    public function getLocale();

    public function setLocale($locale);
}