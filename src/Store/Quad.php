<?php
namespace Saft\StoreInterface;

/**
 * sequence of (subject, predicate, object) terms forming an RDF triple
 * and an optional graphURI labeling what graph in a dataset the triple belongs to
 */
class Quad extends Statement
{
    public function __construct($subject, $predicate, $obj, $graphUri)
    {
        parent::__construct($subject, $predicate, $obj);
        $this -> graphUri = $graphUri;
    }

    public function getGraph()
    {
        return $this -> graphUri;
    }
}
