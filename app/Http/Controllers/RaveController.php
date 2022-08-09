<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payonline;
use Unirest\Request as HttpRequest;
use App\User;
use App\Admin;
use Illuminate\Notifications\Notification;
use App\Notifications\OnlinePaymenentNotification;
use Session;
//use the Rave Facade
use Rave;

class RaveController extends Controller
{

  /**
   * Initialize Rave payment process
   * @return void
   */
  public function initialize(Request $request)
  {
    // validate the data
    $this->validate($request, array(
      'firstname'=>'required',
      'lastname'=>'required',
      'address' => 'required',
      'city' => 'required|max:20',
      // 'state' => 'required|max:20',
      'phonenumber' => 'required',
      'ref'=>'required'
 ));
 
  foreach (session('cart') as $id => $cart) {
      $pod = new Payonline();
      $pod->firstName = $request->firstname;
      $pod->lastName = $request->lastname;
      $pod->company = "Just Another Company";
      $pod->name = $cart['name'];
      $pod->price = $cart['price'];
      $pod->image = $cart['photo'];
      $pod->phone = $request->phonenumber;
      $pod->address = $request->address;
      $pod->weight = $cart['weight'];
      $pod->lga = $request->city;
      //$pod->state = $request->state;
      $pod->state = "Rivers";
      $pod->unit = $cart['unit'];
      $pod->quantity = $cart['quantity'];
      $pod->seller_name = $cart['userInfo'];
      $pod->buyer_name = $request->ref;
      $pod->cart_id = $id;
      $pod->status = 0;
      $pod->save();
  }
    //This initializes payment and redirects to the payment gateway
    //The initialize method takes the parameter of the redirect URL
    Rave::initialize(route('callback'));
  }

  /**
   * Obtain Rave callback information
   * @return void
   */
  public function callback(Request $request)
  {

    $data = Rave::verifyTransaction(request()->txref);

    //dd($data);
     $chargeResponsecode = $data->data->chargecode;
     $chargeAmount = $data->data->amount;
     $transactionRef = $data->data->txref;
     $amount = 0;
     //echo $transactionRef;
    // // $ref = "";
    // // $id = 0;
    //     // Get the transaction from your DB using the transaction reference (txref)
    //     // Check if you have previously given value for the transaction. If you have, redirect to your successpage else, continue
    //     // Comfirm that the transaction is successful
    //     // Confirm that the chargecode is 00 or 0
    //     // Confirm that the currency on your db transaction is equal to the returned currency
    //     // Confirm that the db transaction amount is equal to the returned amount
        
    $a['pays'] = Payonline::where('buyer_name','=',$transactionRef)->get();
        foreach($a['pays'] as $pay){
          $amount+=$pay->price;
        }

    $a['trx'] = $transactionRef;
        //($chargeResponsecode == "00" || $chargeResponsecode == "0") && 
          if ($data->status =='success'){
            foreach($a['pays'] as $pay){
              if($transactionRef == $pay->buyer_name){
                $pay->status = 2;
                $pay->save();
              }
            } 
            $users = Admin::all();

            $details = [
                'greeting' => 'Hello There!!!',
                'body' => 'An Order Was Placed Online',
                'thanks' => 'Thank you!',
            ];
          
            foreach($users as $user){
              $user->notify(new OnlinePaymenentNotification($details));
            }
        $request->session()->forget('cart');
        Session::flash('success','Your Order Was Recieved successfully And Receipt Has Been Sent To Your Email'); 

            return view('welcome');
          }else{
            return redirect('failed');
          }
        
    //     // Update the db transaction record (includeing parameters that didn't exist before the transaction is completed. for audit purpose)
    //     // Give value for the transaction
    //     // Update the transaction to note that you have given value for the transaction
    //     // You can also redirect to your success page from here
         
    //     // if ($data->status == 'success') {   
    //     //   //do something to your database
    //     //   $carts = User::find(Auth::user()->id)->carts;
    //     //   /*foreach ($carts as $cart) {
    //     //     $cart->delete();
    //     //   }*/
    //     //   return redirect()->route('welcome');
    //     // }
    //     // else {
    //     // //return invalid payment
    //     // }
  }

  public function makePayment(){
      return view('user.makePayment');
  }

}
