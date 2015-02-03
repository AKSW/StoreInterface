<?php
namespace Saft\StoreInterface;

abstract class AbstractPatternFragmentTripleStore extends StoreInterface
{
    public function whatKindOfInstanz()
    {
        //@TODO
        return get_class($this);
    }

    public function sparqlQuery($query)
    {
        //@TODO
        if (stristr($a, 'select') || stristr($a, 'construct')) {
            $this->get($a);
        } else if (stristr($a, 'deslete')) {
            $this->delete($a);
        } else if (stristr($a, 'insert')) {
            $this->delete($a);
        }
    }
}
