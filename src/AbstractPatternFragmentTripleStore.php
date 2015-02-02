<?php
namespace Saft\StoreInterface;

abstract class AbstractPatternFragmentTripleStore implements StoreInterface
{
    abstract public function getAvailableGraphs();

    abstract public function getDefaultGraph();

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

    abstract public function addMultipleStatements(array $Statements, $graphUri = null);

    abstract public function deleteMultipleStatements(array $Statements, $graphUri = null);

    abstract public function getMatchingStatements($Statement, $graphUri = null);
    
    abstract public function hasMatchingStatement($Statement, $graphUri = null);

    abstract public function match($Statement, $graphUri = null);

    public function whatKindOfInstanz()
    {
        //@TODO
        return get_class($this);
    }

    abstract public function getStoreInformation();

    abstract public function featureSupported();

    abstract public function sparqlQuery($query);

    public function query($a)
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
