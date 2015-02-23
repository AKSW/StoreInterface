<?php
namespace Saft\StoreInterface;

/**
 * @author Viktor Befort <Viktor.Befort@stud.htwk-leipzig.de>
 * @author Natanael Arndt <arndtn@gmail.com>
 */
class Triple extends Statement
{
    public function __construct($subject, $predicate, $obj)
    {
        parent::__construct($subject, $predicate, $obj);
    }

    public function getGraph()
    {

    }
}
