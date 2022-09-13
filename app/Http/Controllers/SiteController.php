<?php

namespace App\Http\Controllers;

use App\Proposal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Quotation;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use App\Jobs\SendMessage;
use App\Mail\ContactUs;
use Illuminate\Support\Facades\Mail;

class SiteController extends Controller
{
    public $theme='new';
    public function index(Request $request)
    {

        //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

        $request->session()->forget('data');
        session()->save();
        $r=$request->session()->get('data');

        $data['page_title'] = 'Homepage | LogistiQuote';
        $data['page_name'] = 'homepage';
        return view($this->theme.'.frontend.index', $data);
    }

    public function contact_us()
    {
        $data['page_title'] = 'Contact Us | LogistiQuote';
        $data['page_name'] = 'contact_us';
        return view($this->theme.'.frontend.contact_us', $data);
    }

    public function contact(Request $request)
    {
        // dd( (string) $request->message);
        $data = [];
        $data = array(
            // 'to'      => array('yii86@ukr.net'),
           'to'      => array('support@logistiquote.com'),
            'subject' => $request->subject,
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'msg' => (string)$request->message,
        );
        Mail::to($data['to'])->send(new ContactUs($data));

        return redirect()->back();
    }

    public function get_quote_step1(Request $request)
    {
       //dd($request->all());
        if(explode('-' ,$request->date)[2] > 2037)
        {
            return redirect()->back()->withErrors(['Date year can not be greater than year-2037!']);
        }

        $data = [
            'type' => $request->type,
            'transportation_type' => $request->transportation_type,
            'origin' => $request->origin,
            'destination' => $request->destination,
            'ready_to_load_date' => $request->date,
        ];
     //..   $isDelete = Storage::disk('public')->delete('store_pending_form.json');
     //..   Storage::disk('public')->put('store_pending_form.json', json_encode($data));

        session([
            'transportation_type' => $request->transportation_type
        ]);

         session([
            'data' =>$data
        ]);
       session()->save();

        return redirect(route('get_quote_step2'));
    }
    public function get_quote_step2()
    {

      // .. $fileContents = Storage::disk('public')->get('store_pending_form.json');
      // .. $fileContents = json_decode($fileContents);
       $session_contents=session()->get('data');
    //   dd($session_contents);
       //.. if($fileContents->ready_to_load_date == null)
        if($session_contents['ready_to_load_date'] == null)
        {
            return redirect(route('index'));
        }
        $data['page_title'] = 'Request a quote | LogistiQuote';
        $data['page_name'] = 'get_quote_step2';
        $data['const_coeffiient']=(int)config('app.const');

       //.. if($fileContents->type == 'lcl' || $fileContents->transportation_type == 'air')
       if($session_contents['type'] == 'lcl' || $session_contents['transportation_type'] == 'air')
        {
            return view($this->theme.'.frontend.get_quote_lcl', $data);
        }
       //.. else if($fileContents->transportation_type == 'sea' && $fileContents->type == 'fcl')
        else if($session_contents['transportation_type'] == 'sea' && $session_contents['type'] == 'fcl')
        {
            return view($this->theme.'.frontend.get_quote_fcl', $data);
        }
        else
        {
            return redirect()->back();
        }
    }
    public function form_quote_step2(Request $request)
    {
          if($request->file('attachment'))
        {
            $file_name = rand().'.'.$request->file('attachment')->getClientOriginalExtension();
            $request->merge(['attachment_file' => $file_name]);
            $isStore = Storage::disk('attachments')->putFileAs('temp/', $request->file('attachment'), $file_name);
        }

     //..   $fileContents = Storage::disk('public')->get('store_pending_form.json');
     //..   $fileContents = json_decode($fileContents, true);
         $session_contents=session()->get('data');
     //...   $merge = array_merge($fileContents, $request->all());
        $merge_session= array_merge($session_contents, $request->all());
        session([
            'data' =>$merge_session
        ]);
        session()->save();
      //  dd(session()->get('data'));
     //..   $isDelete = Storage::disk('public')->delete('store_pending_form.json');
    //..    Storage::disk('public')->put('store_pending_form.json', json_encode($merge));

       //.. if($fileContents['origin'] == "")
       if($merge_session['origin'] == "")
        {
            return redirect(route('index'));
        }

        if(Auth::check())
        {
            if(Auth::user()->role != 'user')
            {
               //.. $isDelete = Storage::disk('public')->delete('store_pending_form.json');
                session()->forget('data');
               session()->save();
                return "You are no allowed to perform this action. Only user can add quotation.";
            }
            else
            {
                return redirect()->route('store_pending_form');
            }
        }
        else
        {
            return redirect(route('login'));
        }
    }

    public function mail_view_proposal($token)
    {
        $proposal = Proposal::where('url', $token)->first();
        return redirect(route('proposal.show', $proposal->id));
    }

    public function mail_view_quotation($token)
    {
        $quotation = Quotation::where('quotation_id', $token)->first();
        return redirect(route('quotation.show', $quotation->id));
    }
}
