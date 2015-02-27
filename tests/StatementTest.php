<?php
namespace Saft\StoreInterface\Test;

class StackTest extends \PHPUnit_Framework_TestCase
{
    public function testCreateTriple()
    {
        $triple1 = new \Saft\StoreInterface\Store\Triple('a1', 'b1', 'c1');
        $this->assertEquals('a1', $triple1->getSubject());

        //@TODO Triple.getGraph
    }

    public function testCreateQuad()
    {
        $quad1 = new \Saft\StoreInterface\Store\Quad('a2', 'b2', 'c2', 'd2');
        $this->assertEquals('a2', $quad1->getSubject());
    }

    public function testStatementWithEmptyVariables()
    {
        $quad1 = new \Saft\StoreInterface\Store\Quad('', "", null, 'd2');
        $this->assertEquals('?s', $quad1->getSparqlFormat($quad1->getSubject(), 's'));
        $this->assertEquals('?p', $quad1->getSparqlFormat($quad1->getPredicate(), 'p'));
        $this->assertEquals('?o', $quad1->getSparqlFormat($quad1->getObject(), 'o'));
    }

    public function testSparqlFormat()
    {
        $triple1 = new \Saft\StoreInterface\Store\Triple('a1', 'b1', 'c1');
        $this->assertEquals('<a1>', $triple1->getSubject(true));

        $triple2 = new \Saft\StoreInterface\Store\Triple('<a1>', '<b1>', '<c1>');
        $this->assertEquals('<a1>', $triple2->getSubject(true));
        $this->assertEquals('<a1>', $triple2->getSubject());

        $triple3 = new \Saft\StoreInterface\Store\Triple('?a', 'b1', 'c1');
        $this->assertEquals('?a', $triple3->getSubject());
        $this->assertEquals('?a', $triple3->getSubject(true));
    }

    public function testStatementEqual()
    {
        $triple1 = new \Saft\StoreInterface\Store\Triple('a1', 'b1', 'c1');
        $this->assertEquals(true, $triple1->equal($triple1));

        $triple2 = new \Saft\StoreInterface\Store\Triple('<a1>', '<b1>', '<c1>');
        $this->assertEquals(true, $triple1->equal($triple2));

        $triple3 = new \Saft\StoreInterface\Store\Triple('a3', 'b3', 'c3');
        $this->assertEquals(false, $triple1->equal($triple3));
    }
}
