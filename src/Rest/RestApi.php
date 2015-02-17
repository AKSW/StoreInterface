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
     * Endpoint
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
                return $this->createStatement($sub, $pred, $ob);
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

    private function createStatement($subject, $predicate, $object, $graphUri = null)
    {
        return $this->store->createStatement($subject, $predicate, $object, $graphUri);
    }
}
