<?php

namespace App\Http\Controllers;


use App\Http\Managements\ExitManagement;
use App\Http\Managements\NotificationManagement;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 *
 */
class NotificationController extends Controller
{


    /**
     * @var NotificationManagement
     */
    public NotificationManagement $notificationManagement;

    /**
     *
     */
    public function __construct()
    {
        $this->notificationManagement = new NotificationManagement();
    }


    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function failedService(Request $request): JsonResponse
    {
        $data = $this->notificationManagement->generateFailedData($request);
        $this->notificationManagement->failedMail($data);
        return ExitManagement::ok();
    }
}
