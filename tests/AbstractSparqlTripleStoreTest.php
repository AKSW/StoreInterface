<?php
namespace Saft\StoreInterface\Tests;

namespace Saft\StoreInterface;

class AbstractSparqlTripleStoreTest extends \PHPUnit_Framework_TestCase
{

    protected function setUp()
    {
        $this->store = $this -> getMockForAbstractClass(
            'Saft\StoreInterface\AbstractSparqlTripleStore'
        );
    }

    public function testCreateStatement()
    {
        //@TODO create Statement with too few argumenten


        $statement1 = $this->store -> createStatement('a1', 'b1', 'c1');
        $this->assertInstanceOf('Saft\StoreInterface\Triple', $statement1);

        $statement2 = $this->store -> createStatement('a2', 'b2', 'c2', 'd2');
        $this->assertInstanceOf('Saft\StoreInterface\Quad', $statement2);

        $statements = array($statement1, $statement2);

        return $statements;
    }

    /**
     * @depends testCreateStatement
     */
    public function testGetMatchingStatements(array $statements)
    {
        $query = $this->store -> getMatchingStatements($statements);
        //@TODO
        $this->assertEquals($query, "Select * \n{\n {<a1> b1 c1}\nGraph d2 {<a2> b2 c2}\n}");
    }

    public function tearDown()
    {
        unset($this->store);
    }
}
