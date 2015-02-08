<?php
namespace Saft\StoreInterface;

abstract class AbstractSparqlTripleStore extends StoreInterface
{
    public function addMultipleStatements(array $Statements, $graphUri = null, array $options = array())
    {
        $query = "Insert DATA\n"
            . "{\n";

        foreach ($Statements as &$st) {
            if ($st instanceof Statement) {
                $con = $st->getSubject(true) ." ". $st->getPredicate(true) ." " .
                    $st->getObject(true) . ".";

                if ($st instanceof Triple) {
                    //@TODO use default Graph or $graphUri
                } elseif ($st instanceof Quad) {
                    $con = "Graph :" . $st->getGraph() . " {" . $con . "}";
                }
      
                $query = $query . $con ."\n";
            }
        }
        unset($statement);
        $query = $query . "}";
        $this -> sparqlQuery($query);
        return $query;
    }

    public function deleteMultipleStatements(array $Statements, $graphUri = null)
    {
        $query = "Delete DATA\n"
            . "{\n";

        foreach ($Statements as &$st) {
            if ($st instanceof Statement) {
                $con = $st->getSubject(true) ." ". $st->getPredicate(true) ." " .
                    $st->getObject(true) . ".";

                if ($st instanceof Triple) {
                    //@TODO use default Graph or $graphUri
                } elseif ($st instanceof Quad) {
                    $con = "Graph :" . $st->getGraph() . " {" . $con . "}";
                }
      
                $query = $query . $con ."\n";
            }
        }
        unset($statement);
        $query = $query . "}";
        $this -> sparqlQuery($query);
        return $query;
    }

    public function getMatchingStatements(array $Statements, $graphUri = null, array $options = array())
    {
        $query = "Select * \n"
            ."WHERE\n"
            . "{\n";

        foreach ($Statements as &$st) {
            if ($st instanceof Statement) {
                $con = $st->getSubject(true) ." ". $st->getPredicate(true) ." " .
                    $st->getObject(true) . ".";

                if ($st instanceof Triple) {
                    //@TODO use default Graph or $graphUri
                } elseif ($st instanceof Quad) {
                    $con = "Graph :" . $st->getGraph() . " {" . $con . "}";
                }
      
                $query = $query . $con ."\n";
            }
        }
        unset($statement);
        $query = $query . "}";
        $this -> sparqlQuery($query);
        return $query;
    }
    
    public function hasMatchingStatement($Statement, $graphUri = null)
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
