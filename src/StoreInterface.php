<?php
namespace Saft\StoreInterface;

abstract class StoreInterface
{
    /**
    * Returns array with graphUri's which are available.
    * @return array, where the key is the URI of a graph.
    */
    abstract public function getAvailableGraphs();

    /**
    * Get default graph. A Graph holds a set of 1 or more Triples.
    * @return string graphUri for default graph.
    */
    abstract public function getDefaultGraph();

    /**
    * Create a Statement-Object.
    * Statement-Object is a Triple, unless $graphUri is not null,
    * then it is a Quad.
    * @param string $graphUri
    * @param string $subject (IRI)
    * @param string $predicate (IRI)
    * @param string $object (IRI or Literal)
    * @return Statement
    */
    public function createStatement($subject, $predicate, $object, $graphUri = null)
    {
        $statement;
        if ($graphUri != null) {
            $statement = new Quad($subject, $predicate, $object, $graphUri);
        } else {
            $statement = new Triple($subject, $predicate, $object);
        }
        return $statement;
    }

    /**
    * Adds multiple Statements to graph. If Statement is a Triple graph specified by $graphUri.
    *
    * @param array  $Statements
    * @param string $graphUri, use if Statement is a triple and to using another graph when the default.
    */
    abstract public function addMultipleStatements(array $Statements, $graphUri = null, array $options = array());

    /**
    * Removes all given Statements from a graph. If Statement is a Triple graph specified by $graphUri.
    *
    * @param array $Statements
    * @param string $graphUri, use if Statement is a triple and to using another graph when the default.
    */
    abstract public function deleteMultipleStatements(array $Statements, $graphUri = null);

    /**
    * This method returns all those Statements in the given graph which match the statement pattern.
    * Graph-triple is included in the output, if:
    * - calling Triple.subject.equals with $Statement.subject returns true, or the $Statement.subject argument is null or empty, AND
    * - calling Triple.predicate.equals with $Statement.predicate returns true, or the $Statement.predicate argument is null or empty, AND
    * - calling Triple.object.equals with $Statement.object returns true, or the $Statement.object argument is null or empty
    * @param $Statement
    * @param string $graphUri, use if Statement is a triple and to using another graph when the default.
    *
    * @return array Statements
    */
    abstract public function getMatchingStatements(array $Statements, $graphUri = null, array $options = array());
    
    /**
    * Returns true or false depending on whether or not the statement pattern has any matches in the given graph.
    * @param $Statement
    * @param string $graphUri, use if Statement is a triple and to using another graph when the default.
    *
    * @return boolean
    */
    abstract public function hasMatchingStatement($Statement, $graphUri = null);

    abstract public function whatKindOfInstanz();

    abstract public function getStoreInformation();

    /**
    * Retrun wich sparql-feature are supported.
    * @return string with with permitted Feature's: Select, Insert,
    * Ask, Delete.
    */
    abstract public function featureSupported();

    /**
    * @param string $query A string containing a sparql query
    * -Select: Returns all the variables bound in a query pattern match.
    * -Insert:
    * -Ask: returns true or false depending on whether or not the query pattern has any matches in the dataset.
    * -Delete:
    *
    * @throws Throws an exception if query is no string.
    *
    * @return mixed Returns a result depending on the query
    */
    abstract public function sparqlQuery($query);
}
