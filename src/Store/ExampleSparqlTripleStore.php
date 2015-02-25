<?php
namespace Saft\StoreInterface;

class ExampleSparqlTripleStore extends AbstractSparqlTripleStore
{

    public function getAvailableGraphs()
    {
        echo "test";
    }

    public function getStoreDescription()
    {
        
    }

    public function query($query, array $options = array())
    {

    }
}
