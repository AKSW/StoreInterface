<?php
namespace Saft\StoreInterface;

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
