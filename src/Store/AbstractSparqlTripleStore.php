<?php
namespace Saft\StoreInterface;

abstract class AbstractSparqlTripleStore extends AbstractStore
{
    public function addMultipleStatements(array $Statements, $graphUri = null, array $options = array())
    {
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

    public function deleteMatchingStatements(array $Statements, $graphUri = null)
    {
        $query = "Delete DATA\n"
            . "{\n";

        $query = $query . $this->sparqlStatementFormat($Statements, $graphUri) . "}";
        if (is_callable($this, 'sparqlQuery')) {
            return $this -> sparqlQuery($query);
        } else {
            return $query;
        }
    }

    public function getMatchingStatements(array $Statements, $graphUri = null, array $options = array())
    {
        //TODO Filter Select
        $query = "Select * \n"
            ."WHERE\n"
            . "{\n";

        $query = $query . $this->sparqlStatementFormat($Statements, $graphUri) . "}";
        if (is_callable($this, 'sparqlQuery')) {
            return $this -> sparqlQuery($query);
        } else {
            return $query;
        }
    }
    
    public function hasMatchingStatement(array $Statements, $graphUri = null)
    {
        $query = "ASK\n"
            . "{\n";

        $query = $query . $this->sparqlStatementFormat($Statements, $graphUri) . "}";
        if (is_callable($this, 'sparqlQuery')) {
            return $this -> sparqlQuery($query);
        } else {
            return $query;
        }
    }

    public function whatKindOfInstanz()
    {
        //@TODO
        return get_class($this);
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
