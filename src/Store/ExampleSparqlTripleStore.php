<?php
namespace Saft\StoreInterface\Store;

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
