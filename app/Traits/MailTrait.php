<?php
/**
 * Created by PhpStorm.
 * User: NnamdiAlexanderAkamu
 * Date: 3/26/2020
 * Time: 11:07 AM
 */

namespace App\Traits;


use Illuminate\Support\Facades\Mail;

trait MailTrait
{

	 function sendMail(callable $callback){
	 	$config = [];
	 	$config = $callback($config);
		 try{
			 Mail::send([],[], function ($message) use ($config) {

//			 	 if (isset($config['from'])){
//			 	 	$message->from($config['from'],$config['from']);
//				    $message->sender($config['from'], $config['from']);
//			     }

			 	$message->from('info@snapnet.com.ng','info@snapnet.com.ng');


			     if (isset($config['to'])){
				    $message->to($config['to'], $config['to']);
			     }

			     if (isset($config['message'])){
				     $message->setBody($config['message'], 'text/html');
			     }

				 $message->subject($config['subject']);

				 // $message->cc('john@johndoe.com', 'John Doe');
				 // $message->bcc('john@johndoe.com', 'John Doe');
				 // $message->replyTo('john@johndoe.com', 'John Doe');
				 $message->priority(3);
//				 $message->attachData($pdf->stream(), $detail->user->name . ' payslip.pdf', [
//					 'mime' => 'application/pdf',
//				 ]);
				 //    $message->attach('pathToFile');
			 });
		 }catch (\Exception $ex){

		 	dd($ex->getMessage());

		 }

	 }


}