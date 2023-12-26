<?php

namespace App\Http\Managements;


use App\Mail\OrderShipped;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;

/**
 *
 */
class InvoiceManagement
{

    /**
     * @param $request
     * @return array
     */
    public function generateInvoiceData($request): array
    {
        $data ['order_id'] = $request->order_id;
        $data ['user_id'] = request()->header('X-USER-ID');
        $data ['user_name'] = request()->header('X-USER-NAME');
        $data ['user_email'] = request()->header('X-USER-EMAIL');
        $data ['product_id'] = $request->item['product_id'];
        $data ['product_name'] = $request->product['name'];
        $data ['path'] = uniqid() . '.pdf';
        $data ['quantity'] = $request->item['quantity'];
        $data ['price'] = $request->item['price'];
        return $data;
    }


    /**
     * @param $data
     * @return void
     */
    public function createInvoice($data): void
    {
        Pdf::loadView('invoice', $data)->save(storage_path('app/public/' . $data ['path']));
    }


    /**
     * @param $data
     * @return void
     */
    public function mailOrder($data): void
    {
        Mail::to($data ['user_email'])->queue(new OrderShipped($data));
    }
}
