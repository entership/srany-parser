<?php

namespace Etki\SranyParserBundle\Service;

use DOMElement;
use Etki\SranyParserBundle\Service\Parser\Selectors;
use Etki\SranyParserBundle\Service\Parser\Urls;
use GuzzleHttp\Client;
use Monolog\Logger;
use Symfony\Component\DomCrawler\Crawler;

/**
 *
 *
 * @version 0.1.0
 * @since
 * @package Etki\SranyParserBundle\Service
 * @author  Etki <etki@etki.name>
 */
class Parser
{
    /**
     *
     *
     * @type Logger
     * @since
     */
    private $logger;
    /**
     *
     *
     * @type Client
     * @since 0.1.0
     */
    private $guzzle;

    public function __construct(Client $client, Logger $logger)
    {
        $this->logger = $logger;
        $this->guzzle = $client;
    }

    public function parse($url)
    {
        $chunks = parse_url($url);
        if ($chunks['path'] !== Urls::URL_ALBUM) {
            $this->logger->error('Unknown URL received');
            return;
        }
        $host = $chunks['host'];
        $schema = $chunks['scheme'];
        $this->logger->info('Resolved host and schema', ['host' => $host, 'schema' => $schema,]);
        $this->logger->info('Fetching url', ['url' => $url,]);
        $response = $this->guzzle->get($url);
        $this->logger->info('Fetched first page',['url' => $url,]);

        $crawler = new Crawler((string) $response->getBody());
        $links = $crawler->filter(Selectors::SELECTOR_PAGINATION_NUMBER_LINKS);
        $pages = [];
        for ($i = 0; $i < $crawler->count(); $i++) {
            $link = $links->eq($i);
            $chunks = parse_url($link->attr('href'));
            parse_str($chunks['query'], $query);
            $pages[] = $query['page'];
        }
        $this->logger->info('', ['pages' => $pages]);
    }
}
