<?php
namespace Saft\StoreInterface;

abstract class AbstractSparqlTripleStore implements StoreInterface
{
    public function te()
    {
        $q = "da";
        return $q;
    }
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
        foreach ($Statements as &$statement) {
            $query = "";
            $construct = "";
            if (is_subclass_of($st, 'Statement')) {
                $construct = "construct
                    {<" . $st.getSubject() ."> ". $st.getPredicate() ." " . $st.getObject() . "}
                    WHERE { }";
            }
            if ($st instanceof Triple) {
                //@TODO use default Graph or $graphUri
            } elseif ($st instanceof Quad) {
                //@TODO
            }
            $this -> sparqlQuery($query);
        }
        unset($statement);
    }

    public function deleteMultipleStatements(array $Statements, $graphUri = null)
    {

    }

    public function getMatchingStatements(array $Statements, $graphUri = null)
    {
        $query = "Select * \n{\n";

        foreach ($Statements as &$st) {
            if ($st instanceof Statement) {
                $con = "";
                if ($st instanceof Triple) {
                    //@TODO use default Graph or $graphUri
                } elseif ($st instanceof Quad) {
                    $con = "Graph " . $st->getGraph();
                }
                
                $con = $con . " {<" . $st->getSubject() ."> ". $st->getPredicate()
                    ." " . $st->getObject() . "}";
                
                $query = $query . $con ."\n";
            }
        }
        unset($statement);
        $query = $query . "}";
        return $query;
        //$this -> sparqlQuery($query);
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

    /*public function get($statement)
    {
        //@TODO
        /*
         * Check if $statement is Triple or Quad
         */

/*
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
    /*}*/
    /*public function has($a)
    {
        $this->query("ask " . $a);
    }

    public function add($a)
    {
        $this->query("insert into " . $a);
    }*/
}
