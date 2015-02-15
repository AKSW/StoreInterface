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
        $statement1 = $this->store -> createStatement('a1', 'b1', 'c1');
        $statement2 = $this->store -> createStatement('a2', 'b2', 'c2', 'd2');

        $statements = array($statement1, $statement2);

        return $statements;
    }

    /**
     * @depends testCreateStatement
     */
    public function testGetMatchingStatements(array $statements)
    {
        $query = $this->store -> getMatchingStatements($statements);
        $this->assertEquals($query, "Select * \n"
            ."WHERE\n"
            . "{\n"
            . "<a1> <b1> <c1>.\n"
            ."Graph <d2> {<a2> <b2> <c2>.}\n"
            ."}");
    }

    /**
     * @depends testCreateStatement
     */
    public function testAddMultipleStatements(array $statements)
    {
        $query = $this->store -> addMultipleStatements($statements);
        //echo $query;
        $this->assertEquals($query, "Insert DATA\n"
            . "{\n"
            . "<a1> <b1> <c1>.\n"
            ."Graph <d2> {<a2> <b2> <c2>.}\n"
            ."}");

        $statement3 = $this->store -> createStatement('a1', 'b1', 42);
        $statements = array($statement3);

        $query = $this->store -> addMultipleStatements($statements);
        $this->assertEquals($query, "Insert DATA\n"
            . "{\n"
            . "<a1> <b1> 42.\n"
            ."}");

        $statement4 = $this->store -> createStatement('a1', 'b1', '"John"');
        $statements = array($statement4);

        $query = $this->store -> addMultipleStatements($statements);
        $this->assertEquals($query, "Insert DATA\n"
            . "{\n"
            . "<a1> <b1> \"John\".\n"
            ."}");
    }


    /**
     * @depends testCreateStatement
     */
    public function testDeleteMultipleStatements(array $statements)
    {
        $query = $this->store -> deleteMultipleStatements($statements);
        //echo $query;
        $this->assertEquals($query, "Delete DATA\n"
            . "{\n"
            . "<a1> <b1> <c1>.\n"
            ."Graph <d2> {<a2> <b2> <c2>.}\n"
            ."}");
    }

    public function tearDown()
    {
        unset($this->store);
    }
}
