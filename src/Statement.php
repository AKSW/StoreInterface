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
     * @param boolean $opt, true for output in sparqlformat
     * @return string
     */
    public function getSubject($opt = false)
    {
        if ($opt) {
            return $this -> getSparqlFormat($this -> subject, 's');
        } else {
            return $this -> subject;
        }
    }

    /**
     * Return Statements predicate
     * @param boolean $opt, true for output in sparqlformat
     * @return string
     */
    public function getPredicate($opt = false)
    {
        if ($opt) {
            return $this -> getSparqlFormat($this -> predicate, 'p');
        } else {
            return $this -> predicate;
        }
    }

    /**
     * Return Statements object.
     * @param boolean $opt, true for output in sparqlformat
     * @return string
     */
    public function getObject($opt = false)
    {
        if ($opt) {
            return $this -> getSparqlFormat($this -> obj, 'o');
        } else {
            return $this -> obj;
        }
    }

    /**
     * Return null if Statement is a Triple.
     * Return graphUri if Statement is a Quad.
     * @return null or string
     */
    abstract public function getGraph();

    /**
    * get triple-variable in sparql-format.
    * Use a free variable if $x is empty or null.
    */
    public function getSparqlFormat($x, $s = null)
    {
        if (is_null($x) || $x == '') {
            if (is_null($s)) {
                return '?x';
            } else {
                return '?' . $s ;
            }
        } else {
            //TODO check if uri or literal. If literal add "" instead of <>
            if ($x[0] == '<' || $x[0] == '?') {
                return $x;
            } else {
                return '<' . $x . '>';
            }
        }
    }
}
