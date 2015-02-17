<?php
namespace Saft\StoreInterface;

/**
 * Abstract class for RDF- triples and quads.
 */
abstract class Statement
{
    private $subject;
    private $predicate;
    /**
     * (URI, literal or number) if $object should be a literal use the format '"value"'
     * @var string
     */
    private $obj;
    private $graphUri;

    /**
     * Constructor method. Statement-Object is a Triple,
     * unless $graphUri is not null, then it is a Quad.
     * @param string $subject
     * @param string $predicate
     * @param string_type $obj (URI, literal or number) if $object should be a literal
     * use the format '"value"'.
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
     * @param  string $x subject, predicate or object
     * @param  string $s Placeholder for free variable.
     * @return String triple-variable in sparql-format
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
            if (is_int($x) || $x[0] == '<' || $x[0] == '?' || $x[0] == '"') {
                return $x;
            } else {
                return '<' . $x . '>';
            }
        }
    }

    /**
     * Returns true if subject, predicate and object are not variables, i. e.
     * subject != ? AND predicate != ? AND object != ?.
     */
    public function isConcrete()
    {
        return (!is_null($this->subject) && $this->subject != '')
        && (!is_null($this->predicate) && $this->predicate != '')
        && (!is_null($this->obj) && $this->obj != '');
    }
}
