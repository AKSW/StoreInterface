<?php
namespace Saft\StoreInterface\Tests;

namespace Saft\StoreInterface;

class AbstractPatternFragmentTripleStoreTest extends \PHPUnit_Framework_TestCase
{
    public function testCreateStatement()
    {
        $store = $this -> getMockForAbstractClass(
            'Saft\StoreInterface\AbstractPatternFragmentTripleStore'
        );

        //@TODO create Statement with too few argumenten

        $statement = $store -> createStatement('a1', 'b1', 'c1');
        $this->assertInstanceOf('Saft\StoreInterface\Triple', $statement);

        $statement = $store -> createStatement('a2', 'b2', 'c2', 'd2');
        $this->assertInstanceOf('Saft\StoreInterface\Quad', $statement);

        return $statement;
    }
}
