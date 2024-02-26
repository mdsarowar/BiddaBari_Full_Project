<?php

namespace App\Http\Controllers\Backend\OrderManagement;

use App\DataTables\ParentOrderDataTable\AllOrders;
use App\Http\Controllers\Controller;
use App\Models\Backend\OrderManagement\ParentOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class AllOrdersController extends Controller
{
    //    permission seed done
    protected $allOrders;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, AllOrders $dataTable)
    {

        abort_if(Gate::denies('manage-all-order'), Response::HTTP_FORBIDDEN, '403 Forbidden');
//        return $dataTable->render('backend.order-management.all-order.index');
        if (!empty($request->order_type) && $request->order_type != 'all')
        {
            $this->allOrders = ParentOrder::where(['ordered_for' => $request->order_type, 'is_free_course' => 0])->where('status','pending')->latest()->paginate(30);
        } else {
//            $this->courseOrders = CourseOrder::latest()->take(30)->get();
            $this->allOrders = ParentOrder::where('status','pending')->latest()->take(1000)->paginate(30);
        }
        return view('backend.order-management.all-order.index', [
            'allOrders'  => !empty($this->allOrders) ? $this->allOrders : '',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getCourseOrderDetails ($id)
    {
        return view('backend.order-management.all-order.course-order-details', [
//            'courseOrder'   => CourseOrder::find($id),
            'order'   => ParentOrder::find($id),
        ]);
    }
}
