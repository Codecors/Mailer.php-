<?php 

namespace Project\Mail; 

class Mailer
{
    Protected $mailer
    
    public function _construct($mailer)
    {
        $this->mailer = $mailer; 
    }
    
    public function send($template, $data, $callback)
    {
        $message = new Message($this->Mailer);
        
        extract($data);
        
        ob_start();
        require $template; 
        $template = ob_get_clean();
        ob_end_clean();
        
        $message->body($template);
        
        call_user_func($callback, $messsage);
        
        $this->mailer->send();
    }
}
