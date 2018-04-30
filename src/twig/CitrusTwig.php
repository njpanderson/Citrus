<?php
/**
 * Citrus plugin for Craft CMS 3.x
 *
 * Automatically purge and ban elements in Varnish.
 *
 * @link      https://github.com/njpanderson/Citrus
 * @copyright Copyright (c) 2018 Neil Anderson
 */

namespace njpanderson\citrus\twig;

use njpanderson\citrus\services\Citrus;

use \Twig\Extension\ExtensionInterface;
use \Twig_Filter;

/**
 * CitrusTwig twig Extension
 *
 * @author    Neil Anderson
 * @package   Citrus
 * @since     0.1.0
 */
class CitrusTwig implements ExtensionInterface
{
    /**
     * Returns the token parser instances to add to the existing list.
     *
     * @return Twig_TokenParserInterface[]
     */
    public function getTokenParsers()
    {
        return [];
    }

    /**
     * Returns the node visitor instances to add to the existing list.
     *
     * @return Twig_NodeVisitorInterface[]
     */
    public function getNodeVisitors()
    {
        return [];
    }

    /**
     * Returns a list of filters to add to the existing list.
     *
     * @return Twig_Filter[]
     */
    public function getFilters() {
        return [
            new Twig_Filter('hostname', [$this, 'getHostname'])
        ];
    }

    /**
     * Returns a list of tests to add to the existing list.
     *
     * @return Twig_Test[]
     */
    public function getTests()
    {
        return [];
    }

    /**
     * Returns a list of functions to add to the existing list.
     *
     * @return Twig_Function[]
     */
    public function getFunctions()
    {
        return [];
    }

    /**
     * Returns a list of operators to add to the existing list.
     *
     * @return array<array> First array of unary operators, second array of binary operators
     */
    public function getOperators()
    {
        return [];
    }

    public function getHostname($url) {
        return Citrus::getHostnameFromUrl($url);
    }
}