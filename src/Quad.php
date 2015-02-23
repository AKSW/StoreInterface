<?php
namespace Saft\StoreInterface;

/**
 * @author Viktor Befort <Viktor.Befort@stud.htwk-leipzig.de>
 * @author Natanael Arndt <arndtn@gmail.com>
 */
class Quad extends Statement
{
    public function __construct($subject, $predicate, $obj, $graphUri)
    {
        parent::__construct($subject, $predicate, $obj);
        $this->graphUri = $graphUri;
    }

    public function getGraph()
    {
        return $this->graphUri;
    }
}
