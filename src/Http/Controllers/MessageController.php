<?php
namespace App\Http\Controllers;

use App\Model\Validators\MessageValidator;
use App\Repository\MessageRepository;
use Slim\Http\ServerRequest;
use Slim\Http\Response;
use Slim\Views\Twig;

class MessageController
{
    //public function index(ServerRequest $request, Response $response)
    public function index($request, $response)
    {
        $view = Twig::fromRequest($request);

        return $view->render($response, 'message/index.twig');
    }

    //public function sendMessage(ServerRequest $request, Response $response)
    public function sendMessage($request, $response)
    {
        $view = Twig::fromRequest($request);
        $messageData  = $request->getParsedBody();
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

        return $view->render($response, 'message/index.twig', ["message" => $messageData]);
    }

    //public function allMessages(ServerRequest $request, Response $response)
    public function allMessages($request, $response) 
    {
        $repo = new MessageRepository();
        $messages = $repo->getAll();

        $view = Twig::fromRequest($request);

        return $view->render($response, 'message/messages.twig', ["messages" => $messages]);
    }
}