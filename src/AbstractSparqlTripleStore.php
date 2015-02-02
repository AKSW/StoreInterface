<?php
namespace Saft\StoreInterface;

abstract class AbstractSparqlTripleStore implements StoreInterface
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

    public function addMultipleStatements(array $Statements, $graphUri = null)
    {

    }

    public function deleteMultipleStatements(array $Statements, $graphUri = null)
    {

    }

    public function getMatchingStatements($Statement, $graphUri = null)
    {

    }
    
    public function hasMatchingStatement($Statement, $graphUri = null)
    {

    }
    
    public function match($Statement, $graphUri = null)
    {

    }

    public function whatKindOfInstanz()
    {
        //@TODO
        return get_class($this);
    }

    public function get($statement)
    {
        //@TODO
        /*
         * Check if $statement is Triple or Quad
         */


        $s = $statement->getSubject();
        if ($s == null) {
            $s = '?s';
        }
        $p = $statement->getPredicate();
        if ($p == null) {
            $p = '?p';
        }
        $o = $statement->getObject();
        if ($o == null) {
            $o = '?p';
        }
        $result = $this->query("select ?s ?p ?o WHERE {" . $s . " " . $p . " " . $o . ". }");

        /*
         * maybe convert $result
         */
    }
    public function has($a)
    {
        $this->query("ask " . $a);
    }

    public function add($a)
    {
        $this->query("insert into " . $a);
    }
}
