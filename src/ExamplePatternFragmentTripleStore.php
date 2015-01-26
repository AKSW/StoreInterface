<?php
namespace Saft\StoreInterface;

class ExamplePatternFragmentTripleStore extends AbstractPatternFragmentTripleStore {

    public function delete($a) {
        echo "delete " . $a;
    }
    public function add($a) {
        echo "add " . $a;
    }
    public function get($a) {
        echo "get " . $a;
    }
    public function has($a) {
        echo "has " . $a;
    }
}
