<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventFormRequest;

use App\Models\Event;
use Illuminate\Http\Request;
use MercurySeries\Flashy\Flashy;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$events = Event::all();

        $events = Event::paginate(2);

        return view('events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $event = new Event;

        return view('events.create', compact('event'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventFormRequest $request)
    {
        /*$this->validate($request, [
            'title' => 'required|min:3',
            'description' => 'required|min:5'
        ]);*/

        Event::create(['title' => $request->title, 'description' => $request->description]);

        flashy('Evenement crée avec succès !');

        //flash('Evenement crée avec succès !');
        

        return redirect(route('home'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //$event = Event::findOrFail($id);

        return view('events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //$event = Event::findOrFail($id);

        return view('events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EventFormRequest $request, Event $event)
    {
        /*$this->validate($request, [
            'title' => 'required|min:3',
            'description' => 'required|min:5'
        ]);*/

        //$event = Event::findOrFail($id);

        $event->update(['title' => $request->title, 'description' => $request->description]);

        flashy(sprintf("Evenement '#%s' modifié avec succès ! ", $event->title));
        //session()->flash('notification.message', sprintf("Evenement #%s modifié avec succès ! ", $event->id));
        //session()->flash('notification.type', 'success');


        return redirect()->route('events.show', $event);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        
        $event->delete();

        //Event::destroy($id);

        flashy::error(sprintf("Evenement '#%s' supprimé avec succès ! ", $event->title));
        //session()->flash('notification.message', sprintf("Evenement #%s supprimé avec succès ! ", $event->id), 'danger');

        //session()->flash('notification.type', 'danger');

        return redirect()->route('home');
    }
}
