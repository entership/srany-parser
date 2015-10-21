<?php

namespace Etki\SranyParserBundle\Service\Parser\HttpUtility;

/**
 *
 *
 * @version 0.1.0
 * @since
 * @package Etki\SranyParserBundle\Service\Parser\HttpUtility
 * @author  Etki <etki@etki.name>
 */
class PageDownloader
{
    /**
     *
     *
     * @type CacheInterface
     * @since
     */
    private $cache;

    public function downloadPage($url) {
        // возвращает содержимое страницы по урлу
        // кэширует содержимое для того, чтобы повторные вызовы не отнимали
        // время
    }
}
