<?php
namespace Saft\StoreInterface\Store;

abstract class AbstractPatternFragmentTripleStore implements StoreInterface
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
