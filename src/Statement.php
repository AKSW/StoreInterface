<?php
namespace Saft\StoreInterface;

abstract class Statement
{
    private $subject;
    private $predicate;
    private $obj;
    private $graphUri;

    /**
     * Constructor method. Statement-Object is a Triple,
     * unless $graphUri is not null, then it is a Quad.
     * @param string $subject
     * @param string $predicate
     * @param string_type $obj
     * @param string $graphUri
     */
    public function __construct($subject, $predicate, $obj, $graphUri = null)
    {
        $this -> subject = $subject;
        $this -> predicate = $predicate;
        $this -> obj = $obj;
    }

    /**
     * Return Statements subject.
     * @return string
     */
    public function getSubject()
    {
        return $this -> subject;
    }

    /**
     * Return Statements predicate
     * @return string
     */
    public function getPredicate()
    {
        return $this -> predicate;
    }

    /**
     * Return Statements object.
     * @return string
     */
    public function getObject()
    {
        return $this -> obj;
    }

    /**
     * Return null if Statement is a Triple.
     * Return graphUri if Statement is a Quad.
     * @return null or string
     */
    abstract public function getGraph();
}
