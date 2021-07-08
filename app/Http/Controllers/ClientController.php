<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Client;

class ClientController extends Controller
{
    public function getClient()
    {
        $clients=Client::all();
        return view("client",compact("clients"));
    }
    
    public function store(Request $request)
    {
        //return $request->all();
        $this->validate(request(),[
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);

        $client = new Client();
        $client->name = request('name');
        $client->surname = request('surname');
        $client->email = request('email');
        $client->phone = request('phone'); 
        $client->save();
        return response()->json($client);
        
    }

    public function update(Request $request)
    {
        //return $request->all();
      
       $client = Client::find($request->id);
       $client->name = $request->name;
       $client->surname = $request->surname;
       $client->email = $request->email;
       $client->phone = $request->phone;
       $client->save();

       return response()->json($client);
    }
    
    public function destroy($id)
    {
       //return $request->all();
        $client = Client::find($id);
        $client ->delete();
        return response()->json($client);
    }
    
}
