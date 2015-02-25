<?php
namespace Saft\StoreInterface\Store;

/**
 * representation of the rdf-triple
 * http://www.w3.org/TR/2014/REC-rdf11-concepts-20140225/#dfn-rdf-triple
 */
class Triple extends Statement
{
    public function __construct($subject, $predicate, $obj)
    {
        parent::__construct($subject, $predicate, $obj);
    }

    public function getGraph()
    {
        return null;
    }
}
