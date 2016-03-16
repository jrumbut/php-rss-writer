<?php

namespace Suin\RSSWriter;

/**
 * Class SimpleXMLElement
 * @package Suin\RSSWriter
 */
class SimpleXMLElement extends \SimpleXMLElement
{
    public function addChild($name, $value = null, $namespace = null)
    {
        if ($value !== null and is_string($value) === true) {
            $value = str_replace('&', '&amp;', $value);
        }

        return parent::addChild($name, $value, $namespace);
    }

    public function appendChildWithCdata($name, $value = null, $namespace = null)
    {
        $child = $this->addChild($name, null, $namespace);
        if ($child !== null) {
            $node = dom_import_simplexml($child);
            $no = $node->ownerDocument;
            $node->appendChild($no->createCDATASection($value));
        }
    }
}
