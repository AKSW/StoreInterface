<?php
namespace Saft\StoreInterface\Test;

require('vendor/autoload.php');
/*use Guzzle\Http\Client;
use Guzzle\Http\EntityBody;
use Guzzle\Http\Message\Request;
use Guzzle\Http\Message\Response;*/

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
        $_POST['request'] = "store/statement";
        $_POST['subject'] = "a1";
        $_POST['predicate'] = "b1";
        $_POST['object'] = "c1";
        $_SERVER['HTTP_ORIGIN'] = "servername";
        try {
            $API = new \Saft\StoreInterface\Rest\RestApi($_POST['request'], $_SERVER['HTTP_ORIGIN']);
            echo $API->processAPI();
        } catch (Exception $e) {
            echo json_encode(array('error' => $e->getMessage()));
        }
    }

    /*public function testPOST()
    {
        // create our http client (Guzzle)
        $client = new Client(
            'http://localhost:8000',
            array(
                'request.options' => array(
                'exceptions' => false,
                )
            )
        );

        $nickname = 'ObjectOrienter'.rand(0, 999);
        $data = array(
            'nickname' => $nickname,
            'avatarNumber' => 5,
            'tagLine' => 'a test dev!'
        );

        //$request = $client->post('/api/programmers', null, json_encode($data));
        //$response = $request->send();
    }*/
}
