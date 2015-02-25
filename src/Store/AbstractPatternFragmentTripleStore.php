<?php
namespace Saft\StoreInterface;

abstract class AbstractPatternFragmentTripleStore extends AbstractStore
{
    public function query($query, array $options = array())
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
