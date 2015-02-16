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
        $statement1 = $this->store -> createStatement('a1', 'b1', 'c1');
        $statement2 = $this->store -> createStatement('a2', 'b2', 'c2', 'd2');

        $statements = array($statement1, $statement2);

        return $statements;
    }

    public function tearDown()
    {
        unset($this->store);
    }
}
