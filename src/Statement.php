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
        return $this -> getCorrectFormat($this -> subject, 's');
    }

    /**
     * Return Statements predicate
     * @return string
     */
    public function getPredicate()
    {
        return $this -> getCorrectFormat($this -> predicate, 'p');
    }

    /**
     * Return Statements object.
     * @return string
     */
    public function getObject()
    {
        //TODO check if uri or String. If String add "" instead of <>
        return $this -> getCorrectFormat($this -> obj, 'o');
    }

    /**
     * Return null if Statement is a Triple.
     * Return graphUri if Statement is a Quad.
     * @return null or string
     */
    abstract public function getGraph();

    /**
    * Use a free variable if $x is empty or null.
    */
    private function getCorrectFormat($x, $s)
    {
        if (is_null($x) || $x == '') {
            return '?' . $s ;
        } else {
            return '<' . $x . '>';
        }
    }
}
