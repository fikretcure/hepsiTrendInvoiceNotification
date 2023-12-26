<?php

namespace App\Http\Managements;


use App\Mail\FailedServiceShipped;
use Illuminate\Support\Facades\Mail;

/**
 *
 */
class NotificationManagement
{

    /**
     * @param $request
     * @return array
     */
    public function generateFailedData($request): array
    {
        $data ['order_id'] = $request->order_id;
        $data ['user_id'] = request()->header('X-USER-ID');
        $data ['user_name'] = request()->header('X-USER-NAME');
        $data ['user_email'] = request()->header('X-USER-EMAIL');
        $data ['product_id'] = $request->item['product_id'];
        $data ['product_name'] = $request->product['name'];
        $data ['quantity'] = $request->item['quantity'];
        $data ['price'] = $request->item['price'];
        return $data;
    }

    /**
     * @param $data
     * @return void
     */
    public function failedMail($data): void
    {
        Mail::to($data['user_email'])->queue(new FailedServiceShipped($data));
    }
}
