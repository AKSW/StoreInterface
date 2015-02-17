<?php
namespace Saft\StoreInterface\Rest;

/**
 * http://coreymaynard.com/blog/creating-a-restful-api-with-php/
 */
class RestApi extends RestAbstract
{
    public function __construct($request, $origin, \Saft\StoreInterface\AbstractStore $store)
    {
        parent::__construct($request, $store);
    }

    /**
     * Rest-Endpoint
     * @return [type] [description]
     */
    protected function store()
    {
        //TODO eliminate redundancy
        if ($this->verb == "statement") {
            if ($this->method == 'POST') {
                $sub = $_POST['subject'];
                $pred = $_POST['predicate'];
                $ob = $_POST['object'];
                //pass function createStatement to the store.
                return $this->store->createStatement($sub, $pred, $ob);
            } else {
                return "Only accepts POST requests";
            }
        } if ($this->verb == "statements") {
            if ($this->method == 'POST') {
                //TODO
            } elseif ($this->method == 'GET') {
                //TODO
            } elseif ($this->method == 'DELETE') {
                //TODO
            }
        } elseif ($this->verb == "graphs") {
            if ($this->method == 'GET') {
                //TODO
            }
        } else {
            return "Wrong input";
        }
    }
}
