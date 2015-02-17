<?php
namespace Saft\StoreInterface\Test;

class RestAPITest extends \PHPUnit_Framework_TestCase
{


    /**
     * @runInSeparateProcess
     */
    public function testCreateStatement()
    {
        /*$this->restApi = $this -> getMockForAbstractClass(
            'Saft\StoreInterface\Rest\RestAPI',
            $arguments
        );*/
        $_SERVER['REQUEST_METHOD'] = 'POST';
        $_POST['request'] = "store/statement/foo/bar";
        $_POST['subject'] = "a1";
        $_POST['predicate'] = "b1";
        $_POST['object'] = "c1";
        $_SERVER['HTTP_ORIGIN'] = "servername";
        $store = new \Saft\StoreInterface\ExampleSparqlTripleStore();
        try {
            $API = new \Saft\StoreInterface\Rest\RestApi(
                $_POST['request'],
                $_SERVER['HTTP_ORIGIN'],
                $store
            );
            echo $API->processAPI();
        } catch (Exception $e) {
            echo json_encode(array('error' => $e->getMessage()));
        }
    }
}
