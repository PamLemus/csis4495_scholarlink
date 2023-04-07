<?php

namespace App\Http\Controllers;
use BeyondCode\LaravelWebSockets\Apps\AppProvider;
use BeyondCode\LaravelWebSockets\Dashboard\DashboardLogger;
use App\Events\SendMessage;
use DateTime;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index(AppProvider $appProvider)
    {
        
        $viewData = array();
        $viewData['title'] = 'Interactive Chat Platform';
        $viewData['cluster'] = env('PUSHER_APP_CLUSTER');
        $viewData['port'] = env('LARAVEL_WEBSOCKETS_PORT');
        $viewData['host'] = env('LARAVEL_WEBSOCKETS_HOST');
        $viewData['authEndpoint'] = "/api/sockets/connect";
        $viewData['logChannel'] = DashboardLogger::LOG_CHANNEL_PREFIX;
        $viewData['apps'] = $appProvider->all();
        $viewData['user'] = auth()->user();

        return view('chat.chat')->with('viewData', $viewData);
    }

    public function sendMessage(Request $request){
        $message = $request->input("message", null);
        $name = $request->input("name", "Anonymous");
        $time = (new DateTime(now()))->format(DateTime::ATOM);
        if ($name == null) {
            $name = "Anonymous";
        }
        SendMessage::dispatch($name, $message, $time);
    }

}
