<?php
namespace Saft\StoreInterface;

abstract class AbstractStore
{
    /**
    * Returns array with graphUri's which are available.
    * @return array, where the key is the URI of a graph.
    */
    abstract public function getAvailableGraphs();

    /**
    * Adds multiple Statements to (default-) graph.
    *
    * @param mixed array|StatementsIterator $Statements
    * @param string $graphUri, use if Statement is a triple and to using another graph when the default.
    * $graphUri has priority over Statement.getGraph(), so if $graphUri != null and Statement is a Quad,
    * Graph of the Quad will be ignore.
    * @param array $options submitter additional instructions
    *
    * @return boolean, true if function is correctly performed
    */
    abstract public function addStatements($Statements, $graphUri = null, array $options = array());

    /**
    * Removes all Statements from a (default-) graph wich match with given $Statement.
    *
    * @param Statement $Statement
    * @param string $graphUri, use if Statement is a triple and to using another graph when the default.
    * $graphUri has priority over Statement.getGraph(), so if $graphUri != null and Statement is a Quad,
    * Graph of the Quad will be ignore.
    * @param array $options submitter additional instructions
    *
    * @return boolean, true if function is correctly performed
    */
    abstract public function deleteMatchingStatements($Statement, $graphUri = null, array $options = array());

    /**
    * This method returns all those Statements in the given graph which match the statement pattern.
    * Graph-triple is included in the output, if:
    * - calling Triple.subject.equals with $Statement.subject returns true, or the $Statement.subject argument is null or empty, AND
    * - calling Triple.predicate.equals with $Statement.predicate returns true, or the $Statement.predicate argument is null or empty, AND
    * - calling Triple.object.equals with $Statement.object returns true, or the $Statement.object argument is null or empty
    * @param Statement $Statement
    * @param string $graphUri, use if Statement is a triple and to using another graph when the default.
    * $graphUri has priority over Statement.getGraph(), so if $graphUri != null and Statement is a Quad,
    * Graph of the Quad will be ignore.
    * @param array $options submitter additional instructions
    *
    * @return array with matching Statements
    */
    abstract public function getMatchingStatements($Statement, $graphUri = null, array $options = array());
    
    /**
    * Returns true or false depending on whether or not the statements pattern has any matches in the given graph.
    * @param Statement $Statement
    * @param string $graphUri, use if Statement is a triple and to using another graph when the default.
    * $graphUri has priority over Statement.getGraph(), so if $graphUri != null and Statement is a Quad,
    * Graph of the Quad will be ignore.
    * @param array $options submitter additional instructions
    *
    * @return boolean, true if at least one Statement match
    */
    abstract public function hasMatchingStatement($Statement, $graphUri = null, array $options = array());

    /**
     * Get feature-Information and description of Store.
     * @return array String
     */
    abstract public function getStoreDescription();

    /**
    * Use SPARQL to interact with store.
    * @param string $query A string containing a sparql query
    * -Select: Returns all the variables bound in a query pattern match.
    * -Insert:
    * -Ask: returns true or false depending on whether or not the query pattern has any matches in the dataset.
    * -Delete:
    * @param array $options submitter additional instructions
    *
    * @throws Throws an exception if query is no string.
    *
    * @return mixed Returns a result depending on the query
    */
    abstract public function query($query, array $options = array());
}
