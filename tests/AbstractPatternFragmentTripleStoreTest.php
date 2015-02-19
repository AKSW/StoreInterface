<?php
namespace Saft\StoreInterface\Tests;

class AbstractPatternFragmentTripleStoreTest extends \PHPUnit_Framework_TestCase
{

    protected function setUp()
    {
        $this->store = $this -> getMockForAbstractClass(
            '\Saft\StoreInterface\AbstractPatternFragmentTripleStore'
        );
    }

    public function testCreateStatement()
    {
        $statement1 = new \Saft\StoreInterface\Triple('a1', 'b1', 'c1');
        $statement2 = new \Saft\StoreInterface\Quad('a2', 'b2', 'c2', 'd2');

        $statements = array($statement1, $statement2);

        return $statements;
    }

    public function tearDown()
    {
        unset($this->store);
    }
}
