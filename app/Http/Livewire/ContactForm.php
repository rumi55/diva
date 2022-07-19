<?php

namespace App\Http\Livewire;

use App\Models\Message;
use Livewire\Component;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\DB;



class ContactForm extends Component
{
    public $name;
    public $email;
    public $phone;
    public $text;
    public $checkbox = true;
    public $success;

    
    
    protected $rules =[
        'name' => 'required',
        'email' => 'required|email',
        'text' => 'required|min:5',
        'checkbox' => 'accepted'
    ];
    protected $messages = [
        'name.required' => 'Обязательное поле',
        'email.required' => 'Обязательное поле',
        'email.email' => 'Проверьте email',
        'text.required' => 'Обязательное поле',
        'text.min' => 'Задайте ваш вопрос',
        'checkbox.accepted' => 'Задайте ваш вопрос'
    ];

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }
    public function saveMessage()
    
    {
        $sendemail = DB::table('settings')->where('name','email')->first();
        $sendemail = str_replace(['"', ' '], '', $sendemail->{'payload'});
        $this->validate();

        Message::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'text' => $this->text,
        ]);
       
      
        session()->flash('message', 'Сообщение отправлено!');
        Mail::to($sendemail)->send(new ContactMail($this->name, $this->email, $this->phone, $this->text));
        $this->reset();
        
       
        
    }

    public function render()
    {
        return \view('livewire.contact-form');
    }
    
}
