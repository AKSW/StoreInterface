<?php
namespace Saft\StoreInterface\Tests;

class AbstractStoreTest extends \PHPUnit_Framework_TestCase
{

    protected function setUp()
    {
        $this->store = $this -> getMockForAbstractClass(
            '\Saft\StoreInterface\AbstractStore'
        );
    }

    public function testCreateStatement()
    {
        //@TODO create Statement with too few argumenten

        $statement1 = new \Saft\StoreInterface\Triple('a1', 'b1', 'c1');
        $this->assertInstanceOf('Saft\StoreInterface\Triple', $statement1);

        $statement2 = new \Saft\StoreInterface\Quad('a2', 'b2', 'c2', 'd2');
        $this->assertInstanceOf('Saft\StoreInterface\Quad', $statement2);

        $statements = array($statement1, $statement2);

        return $statements;
    }

    public function tearDown()
    {
        unset($this->store);
    }
}
