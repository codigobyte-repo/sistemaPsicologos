<?php

namespace App\Http\Livewire\Admin\Message;

use App\Models\Message;
use App\Models\User;
use App\Notifications\MessageSent;
use Livewire\Component;

class NewMessage extends Component
{
    public $subject, $body, $to_user_id;

    public function render()
    {
        /* $users = User::where('id', '<>' , auth()->user()->id)->get(); */
        return view('livewire.admin.message.new-message');
    }

    public function resetForm()
    {
        $this->subject = '';
        $this->body = '';
        $this->to_user_id = '';
    }

    public function enviarNotificacion()
    {

        $validatedData = $this->validate([
            'subject' => 'required|min:3',
            'body' => 'required|min:3',
            'to_user_id' => 'required|exists:users,id'
        ], [
            'subject.required' => 'El campo asunto es obligatorio.',
            'body.required' => 'El cuerpo del mensaje es obligatorio',
            'to_user_id.required' => 'El destinatario es obligatorio'
        ]);

        $message = Message::create([
            'subject' => $this->subject,
            'body' => $this->body,
            'from_user_id' => auth()->user()->id,
            'to_user_id' => $this->to_user_id,
        ]);

        $user = User::find($this->to_user_id);
        $user->notify(new MessageSent($message));
        
        return redirect()->route('admin.messages.index')->with('message', 'Mensaje enviado correctamente.');
    
    }
}
