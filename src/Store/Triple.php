<?php
namespace Saft\StoreInterface\Store;

/**
 * representation of the rdf-triple
 * http://www.w3.org/TR/2014/REC-rdf11-concepts-20140225/#dfn-rdf-triple
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
        return null;
    }

    public function getSparqlFormat($x, $s = null)
    {
        if (is_null($x) || $x == '') {
            if (is_null($s)) {
                return '?x';
            } else {
                return '?' . $s ;
            }
        } else {
            if (is_int($x) || $x[0] == '<' || $x[0] == '?' || $x[0] == '"') {
                return $x;
            } else {
                return '<' . $x . '>';
            }
        }
    }
}
