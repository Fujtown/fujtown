<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function respond(Request $request)
    {
        $message = strtolower($request->input('message'));

        $responses = [
            'hello' => 'Hi there! How can I help you?',
            'how are you' => 'I am just a chatbox, but I am doing great!',
            'bye' => 'Goodbye! Have a great day!',
            'help' => 'Sure! You can ask me anything about our services.',
            'add listing' => '<p>To add a new listing, follow these steps:</p>
                              <ol>
                                  <li>Provide the <strong>name</strong> of the business.</li>
                                  <li>Specify the <strong>category</strong> of the business.</li>
                                  <li>Mention the <strong>location</strong> of the business.</li>
                              </ol>
                              <p><strong>For example:</strong></p>
                              <ul>
                                  <li><strong>Name:</strong> ABC Plumbing</li>
                                  <li><strong>Category:</strong> Plumber</li>
                                  <li><strong>Location:</strong> New York</li>
                              </ul>
                              <p>Once you have all these details, you can submit your listing through our website!</p>'
       
        ];

        $reply = $responses[$message] ?? "Sorry, I didn't understand that. Try saying 'help'.";

        return response()->json(['response' => $reply]);

    }
}
