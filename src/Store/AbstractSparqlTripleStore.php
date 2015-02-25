<?php
namespace Saft\StoreInterface\Store;

abstract class AbstractSparqlTripleStore implements StoreInterface
{
    public function addStatements($Statements, $graphUri = null, array $options = array())
    {
        foreach ($Statements as &$st) {
            if ($st instanceof Statement) {
                if (!$st->isConcrete()) {
                    throw new \Exception("at least one Statement is not concrete");
                }
            }
        }
        $query = "Insert DATA\n"
            . "{\n";

        //TODO eliminate redundancy
        $query = $query . $this->sparqlStatementFormat($Statements, $graphUri) . "}";
        if (is_callable($this, 'sparqlQuery')) {
            return $this -> sparqlQuery($query);
        } else {
            return $query;
        }
    }

    public function deleteMatchingStatements($Statement, $graphUri = null, array $options = array())
    {
        $query = "Delete DATA\n"
            . "{\n";

        $query = $query . $this->sparqlStatementFormat(array($Statement), $graphUri) . "}";
        if (is_callable($this, 'sparqlQuery')) {
            return $this -> sparqlQuery($query);
        } else {
            return $query;
        }
    }

    public function getMatchingStatements($Statement, $graphUri = null, array $options = array())
    {
        //TODO Filter Select
        $query = "Select * \n"
            ."WHERE\n"
            . "{\n";

        $query = $query . $this->sparqlStatementFormat(array($Statement), $graphUri) . "}";
        if (is_callable($this, 'sparqlQuery')) {
            return $this -> sparqlQuery($query);
        } else {
            return $query;
        }
    }
    
    public function hasMatchingStatement($Statement, $graphUri = null, array $options = array())
    {
        $query = "ASK\n"
            . "{\n";

        $query = $query . $this->sparqlStatementFormat(array($Statement), $graphUri) . "}";
        if (is_callable($this, 'sparqlQuery')) {
            return $this -> sparqlQuery($query);
        } else {
            return $query;
        }
    }

    /**
     * [sparqlStatementFormat description]
     * @param array  $Statements
    * @param string $graphUri, use if Statement is a triple and to using another graph when the default.
     * @return string, part of query
     */
    private function sparqlStatementFormat($Statements, $graphUri = null)
    {
        $query = '';
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
        return $query;
    }
}
