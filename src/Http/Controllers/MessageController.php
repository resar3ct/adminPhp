<?php
namespace App\Http\Controllers;

use App\Model\Validators\MessageValidator;
use App\Repository\MessageRepository;
use Slim\Http\ServerRequest;
use Slim\Http\Response;
use Slim\Views\Twig;
use Psr\Http\Message\ResponseInterface;

use Slim\Psr7\Response as Resp;
use GuzzleHttp\Client;


class MessageController
{
    public function index($request, $response)
    {
        $view = Twig::fromRequest($request);

        return $view->render($response, 'message/index.twig');
    }

    public function sendMessage($request, ResponseInterface  $response)
    {
        $view = Twig::fromRequest($request);
        $messageData  = $request->getParsedBody();
        // file_put_contents('php://stderr', print_r($request, TRUE));
        $validator = new MessageValidator();
        $errors = $validator->validate($messageData['message']);
        $repo = new MessageRepository();
        $repo->create($messageData['message']);
        
        if(!empty($errors)){
            return $view->render($response, 'message/index.twig', [
                "message" => $messageData,
                "errors" => $errors,
            ]);
        }


        $responseR = new Resp();
        $answer = $this->SendToBotGuzzle($messageData['message']);

        return $responseR->withHeader('Location', '/messages')->withStatus(302);
    }

    public function allMessages($request, $response) 
    {
        $parsedBody = $request->getParsedBody();
        echo $parsedBody;
        $repo = new MessageRepository();
        $messages = $repo->getAll();

        $view = Twig::fromRequest($request);

        return $view->render($response, 'message/messages.twig', ["messages" => $messages]);
    }

    public function SendToBot($message)
    {
        $url = "http://localhost:8001";
        
        $ch = curl_init($url);

        $content = json_encode($message);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $content);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($ch);

        curl_close($ch);

        $response = json_decode($result, true);
        return $response;
    }

    public function SendToBotGuzzle($message)
    {
        $client = new Client();
        $content = json_encode($message);
        
        $response = $client->request('POST', 'http://localhost:8001', ['body' =>$content]);
        return $response;
    }
}