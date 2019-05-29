<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use Mail;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.contact.contact');
    }
    public function contactDone(){
        return view('frontend.contact.contact-done');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactRequest $request)
    {
        //dd($request->all());
        $data = $request->only('name','email','phone','content');
        Mail::send('mail.contact-mail', $data, function($message) use ($data){
            $message->from($data['email']);
            $message->to('ducmanhcit@gmail.com');
            $message->subject('[DucManhITShoes.com] Liên hệ từ khách hàng');
        });
        Mail::send('mail.reply-contact',$data,function($message) use ($data){
            $message->from('ducmanhcit@gmail.com',"QV_Watch");
            $message->to($data['email'])->subject('[DucManhITShoes.com] Cảm ơn bạn đã liên hệ với shop! tin nhắn sẽ được hồi âm trong thời gian sớm nhất');
       });
        return redirect()->route('contact-done-user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
