<?php
namespace Saft\StoreInterface\Store;

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
