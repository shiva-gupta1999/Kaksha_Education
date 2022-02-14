<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Paykun\Checkout\Payment;
use App\Models\Payment as PaymentModel;

class PaymentController extends Controller
{
    private $gateway;

    public function __construct()
    {
        $this->gateway = new Payment(env('PAYKUN_MERCHANT_ID'), env('PAYKUN_ACCESS_TOKEN'), env('PAYKUN_KEY_SECRET'), false); // here we pass last parameter as false to enable sandbox mode.
    }

    public function index()
    {
        return view('payment');
    }

    public function charge(Request $request)
    {
        if($request->input('submit'))
        {
            try {

                $this->gateway->setCustomFields(array('udf_1' => 'test')); //remove or comment this line when go live

                $this->gateway->initOrder('ORD'.uniqid(), 'My Product Name', $request->input('amount'), url('paymentsuccess'), url('error'));

                // Add Customer
                $this->gateway->addCustomer('', '', '');

                echo $this->gateway->submit();
            } catch(Exception $e) {
                return $e->getMessage();
            }
        }
    }

    public function payment_success(Request $request)
    {
        if ($request->input('payment-id'))
        {
            $transactionData = $this->gateway->getTransactionInfo($request->input('payment-id'));

            if ($transactionData['status'])
            {
                $arr_transaction = $transactionData['data']['transaction'];

                $payment = new PaymentModel;
                $payment->payment_id = $arr_transaction['payment_id'];
                $payment->payer_email = $arr_transaction['customer']['email_id'];
                $payment->payer_mobile = $arr_transaction['customer']['mobile_no'];
                $payment->amount = $arr_transaction['order']['gross_amount'];
                $payment->payment_status = $arr_transaction['status'];
                $payment->save();

                return redirect("payment")->with("success", "Payment is successful. Your payment id is: ". $arr_transaction['payment_id']);
            }
        }
    }

    public function payment_error(Request $request)
    {
        return redirect("payment")->with("error", "Something went wrong. Try again later.");
    }
}
