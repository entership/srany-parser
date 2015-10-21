<?php

namespace Etki\SranyParserBundle\Service\Parser;

/**
 *
 *
 * @version 0.1.0
 * @since
 * @package Etki\SranyParserBundle\Service\Parser
 * @author  Etki <etki@etki.name>
 */
class SpecificParser
{
    public function run($url, $type)
    {
        // получает все ссылки на страницы (например, на все страницы галереи),
        // которые нужно распарсить, из PaginationAnalyzer

        // натравливает ImageParser на каждую из этих страниц
        // на выходе из ImageParser получаем набор ссылок на изображения
        // если результат работы парсера в целом - набор ссылок, то они же и
        // возвращаются одним массивом

        // если нет, то какой-нибудь DownloadManager получает на вход все эти
        // ссылки, который в ответ возвращает пути на диске
    }
}
