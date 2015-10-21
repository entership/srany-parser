<?php

namespace Etki\SranyParserBundle\Service\Parser\Analyzer;

use Etki\SranyParserBundle\Service\Parser\PageParser\PaginationParser;

/**
 *
 *
 * @version 0.1.0
 * @since
 * @package Etki\SranyParserBundle\Service\Parser\Analyzer
 * @author  Etki <etki@etki.name>
 */
class LinksExtractor
{
    public function getPageLinks($url, $type)
    {
        // должен вернуть все ссылки для соответствующего типа

        // если тип == категория, то он получает все страницы категории, для
        // которых получает список альбомов, по которому проходится с вызовом
        // getPageLinks(урл альбома, ТИП_АЛЬБОМ)

        // все полученные ссылки скидываются в один массив и затем возвращаются

        $links = [];
        $notAnalyzedLinks = [$url,];
        $parser = new PaginationParser();

        while ($notAnalyzedLinks) {
            $notAnalyzedLink = array_pop($notAnalyzedLinks);
            $pageLinks = $parser->getPageLinks($downloader->getPage($notAnalyzedLink), $type);
            foreach ($pageLinks as $link) {
                if (!in_array($link, $links, true)) {
                    $links[] = $link;
                    $notAnalyzedLinks[] = $link;
                }
            }
        }
        return $links;
    }
}
