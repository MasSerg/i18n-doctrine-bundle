<?php

namespace masserg\I18nDoctrineBundle\Doctrine\Interfaces;

/**
 *
 * @author
 */
interface ManyLocalesInterface
{
    public function getLocales();

    public function setLocales($locales);
}