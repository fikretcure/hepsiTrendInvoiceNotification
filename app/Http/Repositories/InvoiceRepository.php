<?php

namespace App\Http\Repositories;


use App\Models\Invoice;
use Illuminate\Database\Eloquent\Model;


/**
 *
 */
class InvoiceRepository extends Repository
{
    /**
     * @var Model|Invoice
     */
    public Model|Invoice $model;

    /**
     *
     */
    public function __construct()
    {
        $this->model = new Invoice();
        parent::__construct($this->model);
    }

}
