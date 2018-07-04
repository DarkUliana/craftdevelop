<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Messages;
use App\Http\Requests\CreateMessagesRequest;
use App\Http\Requests\UpdateMessagesRequest;
use Illuminate\Http\Request;



class MessagesController extends Controller {

	/**
	 * Display a listing of messages
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $messages = Messages::all();

		return view('admin.messages.index', compact('messages'));
	}

	/**
	 * Show the form for editing the specified messages.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$messages = Messages::find($id);
	    
	    
		return view('admin.messages.edit', compact('messages'));
	}

	/**
	 * Remove the specified messages from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Messages::destroy($id);

		return redirect()->route(config('quickadmin.route').'.messages.index');
	}

    /**
     * Mass delete function from index page
     * @param Request $request
     *
     * @return mixed
     */
    public function massDelete(Request $request)
    {
        if ($request->get('toDelete') != 'mass') {
            $toDelete = json_decode($request->get('toDelete'));
            Messages::destroy($toDelete);
        } else {
            Messages::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.messages.index');
    }

}
