<?php

namespace App\Http\Controllers;

use App\Http\Managements\ExitManagement;
use App\Http\Managements\InvoiceManagement;
use App\Http\Repositories\InvoiceRepository;
use App\Http\Requests\StoreInvoinceRequest;
use Illuminate\Http\JsonResponse;

/**
 *
 */
class InvoiceController extends Controller
{


    /**
     * @var InvoiceRepository
     */
    public InvoiceRepository $invoiceRepository;


    /**
     * @var InvoiceManagement
     */
    public InvoiceManagement $invoiceManagement;



    /**
     *
     */
    public function __construct()
    {
        $this->invoiceRepository = new InvoiceRepository();
        $this->invoiceManagement = new InvoiceManagement();
    }


    /**
     * @param StoreInvoinceRequest $request
     * @return JsonResponse
     */
    public function store(StoreInvoinceRequest $request): JsonResponse
    {
        $data = $this->invoiceManagement->generateInvoiceData($request);
        $this->invoiceRepository->create($data);
        $this->invoiceManagement->createInvoice($data);
        $this->invoiceManagement->mailOrder($data);
        return ExitManagement::ok();
    }
}
