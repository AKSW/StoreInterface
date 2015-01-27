<?php
namespace Saft\StoreInterface;

interface StoreInterface
{
    /**
    * Returns array with graphUri's which are available.
    * @return array, where the key is the URI of a graph.
    */
    public function getAvailableGraphs();

    /**
    * Get default graph. A Graph holds a set of 1 or more Triples.
    * @return string graphUri for default graph.
    */
    public function getDefaultGraph();

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
    public function createStatement($subject, $predicate, $object, $graphUri = null);

    /**
    * Adds multiple Statements to graph specified by $graphUri.
    *
    * @param array  $Statements
    * @param string $graphUri, need if Statement is a triple
    */
    public function addMultipleStatements(array $Statements, $graphUri = null);

    /**
    * Removes all given Statements from a graph specified by $graphUri.
    *
    * @param array $Statements
    * @param string $graphUri, need if Statement is a triple
    */
    public function deleteMultipleStatements(array $Statements, $graphUri = null);

    /**
    *
    * @param $Statement
    * @param string $graphUri, need if Statement is a triple
    *
    * @return array Statements
    */
    public function getMatchingStatements($Statement, $graphUri = null);
    
    /**
    * @param $Statement
    * @param string $graphUri, need if Statement is a triple
    *
    * @return boolean
    */
    public function hasMatchingStatement($Statement, $graphUri = null);

    /**
    * This method returns all those Statements in the given graph (specified by $graphUri)
    * which match the given $Statement, that is, for each Statement in $graphUri, it is included in the output, if:
    * - calling Statement.subject.equals with the specified $Statement.subject as an argument returns true, or the $Statement.subject argument is null, AND
    * - calling Statement.predicate.equals with the specified $Statement.predicate as an argument returns true, or the $Statement.predicate argument is null, AND
    * - calling Statement.object.equals with the specified $Statement.object as an argument returns true, or the $Statement.object argument is null
    *
    * @param $Statement
    * @param string $graphUri, need if Statement is a triple
    *
    */
    public function match($Statement, $graphUri = null);

    public function whatKindOfInstanz();

    public function getStoreInformation();

    /**
    * Retrun wich sparql-feature are supported.
    * @return string with with permitted Feature's: Select, Construct,
    * Ask, Describe.
    */
    public function featureSupported();

    /**
    * @param string $query A string containing a sparql query
    * -Select: Returns all the variables bound in a query pattern match.
    * -Construct:
    * -Ask: Returns a boolean indicating whether a query pattern matches or not.
    * -Describe:
    *
    * @throws Throws an exception if query is no string.
    *
    * @return mixed Returns a result depending on the query
    */
    public function sparqlQuery($query);
}
