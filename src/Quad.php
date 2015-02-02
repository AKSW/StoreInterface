<?php
namespace Saft\StoreInterface;

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
