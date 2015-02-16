<?php
namespace Saft\StoreInterface\Rest;

/**
 * http://coreymaynard.com/blog/creating-a-restful-api-with-php/
 */
class RestApi extends RestAbstract
{
    public function __construct($request, $origin)
    {
        parent::__construct($request);

        // Abstracted out for example
        //$APIKey = new Models\APIKey();
        //$User = new Models\User();

        if (!array_key_exists('apiKey', $this->request)) {
            //throw new Exception('No API Key provided');
        } else if (!$APIKey->verifyKey($this->request['apiKey'], $origin)) {
            //throw new Exception('Invalid API Key');
        } else if (array_key_exists('token', $this->request) &&
             !$User->get('token', $this->request['token'])) {
            //throw new Exception('Invalid User Token');
        }

        //$this->User = $User;
    }

    /**
     * Example of an Endpoint
     */
    protected function example()
    {
        if ($this->method == 'GET') {
            return "Your name is " . $this->User->name;
        } else {
            return "Only accepts GET requests";
        }
    }

    protected function store()
    {
        if ($this->verb == "statement") {
            if ($this->method == 'POST') {
                $sub = $_POST['subject'];
                $pred = $_POST['predicate'];
                $ob = $_POST['object'];
                $store = new \Saft\StoreInterface\ExampleSparqlTripleStore();
                $store->getAvailableGraphs();
                return "erfolg";
            } else {
                return "Only accepts POST requests";
            }
        } else {
            return "Wrong input";
        }
    }
}
