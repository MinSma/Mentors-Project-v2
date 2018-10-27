<?php
declare(strict_types = 1);

namespace App\Http\Controllers;

use App\Notifications\InboxMessage;
use App\Http\Requests\ContactFormRequest;
use App\Admin;

/**
 * Class ContactsController
 * @package App\Http\Controllers
 */
class ContactsController extends Controller
{
    /**
     * @return View
     */
    public function show() {
        return view('guestPages.contactus.index');
    }

    /**
     * @param ContactFormRequest $message
     * @param Admin $admin
     * @return \Illuminate\Http\RedirectResponse
     */
    public function mailToAdmin(ContactFormRequest $message, Admin $admin) {
        $admin->notify(new InboxMessage($message));

        return redirect()->back()->with('message', 'Dėkojame už pranešimą! Greitai susisieksime!');
    }
}
