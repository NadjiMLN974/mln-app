<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('pages/contacts', [
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function send(array $data)
    {
        $firstname = htmlspecialchars($data['firstname']);
        $lastname = htmlspecialchars($data['lastname']);
        $email = htmlspecialchars($data['email']);
        $phone = htmlspecialchars($data['phone']);
        $subject = htmlspecialchars($data['subject']);
        $message =htmlspecialchars( $data['firstname']);
        $to = config('app.from.address');

        $body = "
        <html>
        <head>
            <title>Nouveau message .::. MLN</title>
        </head>
        <body>
            <section>
                <p>$firstname $lastname</p>
                <p>$email $phone</p>
                <p>$message</p>
            </section>
        </body>
        </html>
        ";

        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // More headers
        $headers .= 'From: <webmaster@example.com>' . "\r\n";
        $headers .= 'Cc: myboss@example.com' . "\r\n";

        mail($to, $subject,$body,$headers);
    }
}
