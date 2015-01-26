<?php
namespace Saft\StoreInterface;


abstract class AbstractPatternFragmentTripleStore implements StoreInterface {

    public abstract function delete($a);
    public abstract function add($a);
    public abstract function get($a);
    public abstract function has($a);
    public function query($a)
    {
        if (stristr($a, 'select') || stristr($a, 'construct')) {
            $this->get($a);
        } else if (stristr($a, 'delete')) {
            $this->delete($a);
        } else if (stristr($a, 'insert')) {
            $this->delete($a);
        }
    }
}
