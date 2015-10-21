<?php

namespace Etki\SranyParserBundle\Service;

/**
 *
 *
 * @version 0.1.0
 * @since
 * @package Etki\SranyParserBundle\Service
 * @author  Etki <etki@etki.name>
 */
class UrlFetcher
{
    public function fetch($url) {
        return file_get_contents($url);
    }
}
