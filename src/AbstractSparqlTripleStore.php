<?php
namespace Saft\StoreInterface;


abstract class AbstractSparqlTripleStore implements StoreInterface {
    public function delete($a)
    {
        $this->query("delete " . $a);
    }

    public function get($statement)
    {

        /*
         * Check if $statement is Triple or Quad
         */


        $s = $statement->getSubject();
        if ($s == null) {
            $s = '?s';
        }
        $p = $statement->getPredicate();
        if ($p == null) {
            $p = '?p';
        }
        $o = $statement->getObject();
        if ($o == null) {
            $o = '?p';
        }
        $result = $this->query("select ?s ?p ?o WHERE {" . $s . " " . $p . " " . $o . ". }");

        /*
         * maybe convert $result
         */
    }
    public function has($a)
    {
        $this->query("ask " . $a);
    }

    public function add($a) {
        $this->query("insert into " . $a);
    }
    public abstract function query($a);
}
