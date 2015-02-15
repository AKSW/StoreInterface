<?php
namespace Saft\StoreInterface;

abstract class AbstractSparqlTripleStore extends StoreInterface
{
    public function addMultipleStatements(array $Statements, $graphUri = null, array $options = array())
    {
        $query = "Insert DATA\n"
            . "{\n";

        //TODO eliminate redundancy
        foreach ($Statements as &$st) {
            if ($st instanceof Statement) {
                $con = $st->getSubject(true) ." ". $st->getPredicate(true) ." " .
                    $st->getObject(true) . ".";

                $graph = $st->getGraph();
                if (!is_null($graph)) {
                    $con = "Graph <" . $graph . "> {" . $con . "}";
                } elseif (!is_null($graphUri)) {
                    $con = "Graph <" . $graphUri . "> {" . $con . "}";
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

                $graph = $st->getGraph();
                if (!is_null($graph)) {
                    $con = "Graph <" . $graph . "> {" . $con . "}";
                } elseif (!is_null($graphUri)) {
                    $con = "Graph <" . $graphUri . "> {" . $con . "}";
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
        //TODO Filter Select
        $query = "Select * \n"
            ."WHERE\n"
            . "{\n";

        foreach ($Statements as &$st) {
            if ($st instanceof Statement) {
                $con = $st->getSubject(true) ." ". $st->getPredicate(true) ." " .
                    $st->getObject(true) . ".";

                $graph = $st->getGraph();
                if (!is_null($graph)) {
                    $con = "Graph <" . $graph . "> {" . $con . "}";
                } elseif (!is_null($graphUri)) {
                    $con = "Graph <" . $graphUri . "> {" . $con . "}";
                }
      
                $query = $query . $con ."\n";
            }
        }
        unset($statement);
        $query = $query . "}";
        $this -> sparqlQuery($query);
        return $query;
    }
    
    public function hasMatchingStatement($Statements, $graphUri = null)
    {
        $query = "ASK\n"
            . "{\n";

        foreach ($Statements as &$st) {
            if ($st instanceof Statement) {
                $con = $st->getSubject(true) ." ". $st->getPredicate(true) ." " .
                    $st->getObject(true) . ".";

                $graph = $st->getGraph();
                if (!is_null($graph)) {
                    $con = "Graph <" . $graph . "> {" . $con . "}";
                } elseif (!is_null($graphUri)) {
                    $con = "Graph <" . $graphUri . "> {" . $con . "}";
                }
      
                $query = $query . $con ."\n";
            }
        }
        unset($statement);
        $query = $query . "}";
        $this -> sparqlQuery($query);
        return $query;
    }

    public function whatKindOfInstanz()
    {
        //@TODO
        return get_class($this);
    }
}
