<?php
namespace Saft\StoreInterface;

abstract class AbstractPatternFragmentTripleStore implements StoreInterface
{
    public function createStatement($subject, $predicate, $object, $graphUri = null)
    {
        if ($subject != null && $predicate != null &&
            $object != null && $graphUri != null) {
            $quad = new Quad($subject, $predicate, $object, $graphUri);
            return $quad;
        } elseif ($subject != null && $predicate != null &&
            $object != null && $graphUri == null) {
            $triple = new Triple($subject, $predicate, $object);
            return $triple;
        } else {
            //@TODO
        }
    }

    public function whatKindOfInstanz()
    {
        //@TODO
        return get_class($this);
    }

    public function sparqlQuery($query)
    {
        //@TODO
        if (stristr($a, 'select') || stristr($a, 'construct')) {
            $this->get($a);
        } else if (stristr($a, 'deslete')) {
            $this->delete($a);
        } else if (stristr($a, 'insert')) {
            $this->delete($a);
        }
    }
}
