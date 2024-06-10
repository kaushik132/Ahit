 <?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use BotMan\BotMan\BotMan;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Outgoing\Question;



class BotManController extends Controller
{
  
    public function handle()
    {
        $botman = app('botman');

        $botman->hears('{message}', function ($botman, $message) {

            if ($message == 'hi' || $message == 'Hi' || $message == 'Hii' || $message == 'hii' || $message == 'HI' || $message == 'hello' || $message == 'Hello' || $message== "hi." || $message== "Hii." || $message=="hii."|| $message=="Hello." || $message=="Hy." || $message=="hy." || $message=="Hy" || $message=="hy") {
                $this->askName($botman);
            }
            
            elseif ($message == 'a'|| $message== 'A' || $message== 'a.' || $message== 'A.') {
                $this->askNamea($botman);
            }

            elseif ($message == 'b'|| $message== 'B' || $message== 'b.'|| $message== 'B.') {
                $this->askNameb($botman);
            }
            elseif ($message == 'c'|| $message== 'C'|| $message== 'c.' || $message== 'C.') {
                $this->askNamec($botman);
            }
            elseif ($message == 'd'|| $message== 'D' || $message== 'd.'|| $message== 'D.') {
                $this->askNamed($botman);
            }
            elseif ($message == 'e'|| $message== 'E'|| $message== 'e.'|| $message== 'E.') {
                $this->askNamee($botman);
            }
            elseif ($message == 'f'|| $message== 'F'|| $message== 'f.'|| $message== 'F.') {
                $this->askNamef($botman);
            }
            elseif ($message == 'g'|| $message== 'G'|| $message== 'g.'|| $message== 'G.') {
                $this->askNameg($botman);
            }
            elseif ($message == 'h'|| $message== 'H'|| $message== 'h.'|| $message== 'H.') {
                $this->askNameh($botman);
            }
            elseif ($message == 'i'|| $message== 'I'|| $message== 'i.'|| $message== 'I.') {
                $this->askNamei($botman);
            }
            elseif ($message == 'j'|| $message== 'j'|| $message== 'j.'|| $message== 'J.') {
                $this->askNamej($botman);
            }
            elseif ($message == 'Thank you'|| $message== 'thank you' || $message== 'Thank you for your help' || $message== 'thank you for your help'|| $message== 'thank you.'|| $message== 'Thank you.') {
                $this->askName11($botman);
            }

            elseif ($message == 'What is your name'|| $message== 'what is your name' ||  $message== 'thank you.'|| $message== 'Thank you.') {
                $this->askName12($botman);
            }

             else {
                $botman->reply('For further information, <a href="https://ahitechno.com/contact-us" target="_blank">Contact us<a>');
            }
        });

        $botman->listen();
    }

  
    public function askName($botman)
    {
        $botman->reply('<b>Hello</b><br><b>Here are some options</b><br>
        a) Digital marketing services?<br>
        b) Web Design service?<br>
        c) Get Quotation.<br>
        d) Previous Projects?<br>
        e) Why choose us?<br>
        f) How long for a project? get quotation page redirect.<br>
        g) Support after? contact us<br>
        h) Graphic Design service?<br>
        i) Reach anytime?<br>
        j) Web Development service?
        ', function ($answer, $botman) {
            $name = $answer->getText();
            $botman->say('Nice to meet you, ' . $name);
        });
    }

    public function askNamea($botman)
    {
        $botman->reply('We help businesses grow online with our digital marketing services. Find out more, <a href="https://ahitechno.com/it-servies/digital-marketing" target="_blank">here<a>', function ($answer, $botman) {
          
            $botman->say('Somthing is Wrong ');
        });
    }
    public function askNameb($botman)
    {
        $botman->reply('Our team creates custom websites that suit your needs perfectly. Check out our services, <a href="https://ahitechno.com/it-servies/web-design" target="_blank">here<a>', function ($answer, $botman) {
          
            $botman->say('Somthing is Wrong ');
        });
    }
    public function askNamec($botman)
    {
        $botman->reply('Want to know how much our services cost? Get a quick quote, <a href="https://ahitechno.com/get-quotation" target="_blank">here<a>', function ($answer, $botman) {
          
            $botman->say('Somthing is Wrong ');
        });
    }
    public function askNamed($botman)
    {
        $botman->reply('See examples of our past work, <a href="https://ahitechno.com/project" target="_blank">here<a>', function ($answer, $botman) {
          
            $botman->say('Somthing is Wrong ');
        });
    }
    public function askNamee($botman)
    {
        $botman->reply('Discover why '."we're".' the best choice for your business, <a href="https://ahitechno.com/about-us" target="_blank">here<a>', function ($answer, $botman) {
          
            $botman->say('Somthing is Wrong ');
        });
    }
    public function askNamef($botman)
    {
        $botman->reply('Find out how long your project will take and get a quote, <a href="https://ahitechno.com/get-quotation" target="_blank">here<a>', function ($answer, $botman) {
          
            $botman->say('Somthing is Wrong ');
        });
    }
    public function askNameg($botman)
    {
        $botman->reply(''."We're".' here to help even after your project is finished, <a href="https://ahitechno.com/contact-us" target="_blank">Contact Us<a>', function ($answer, $botman) {
          
            $botman->say('Somthing is Wrong ');
        });
    }
    public function askNameh($botman)
    {
        $botman->reply('We offer custom graphic design services to meet your needs. Learn more, <a href="https://ahitechno.com/it-servies/graphic-design" target="_blank">here<a>', function ($answer, $botman) {
          
            $botman->say('Somthing is Wrong ');
        });
    }
    public function askNamei($botman)
    {
        $botman->reply(''."We're".' available 24/7 to assist you. <a href="https://ahitechno.com/contact-us" target="_blank">Contact Us<a> anytime, ', function ($answer, $botman) {
          
            $botman->say('Somthing is Wrong ');
        });
    }
    public function askNamej($botman)
    {
        $botman->reply('Our team specializes in creating top-quality websites <a href="https://ahitechno.com/it-servies/web-development
        " target="_blank">here<a>', function ($answer, $botman) {
          
            $botman->say('Somthing is Wrong ');
        });
    }
    public function askName11($botman)
    {
        $botman->reply('Welcome, For further information, <a href="https://ahitechno.com/contact-us" target="_blank">Contact Us<a>', function ($answer, $botman) {
          
            $botman->say('Somthing is Wrong ');
        });
    }

    public function askName12($botman)
    {
        $botman->reply('My name is Macaroni ', function ($answer, $botman) {
          
            $botman->say('Somthing is Wrong ');
        });
    }


}
