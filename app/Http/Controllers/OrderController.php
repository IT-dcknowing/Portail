<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Service;
use App\Models\OrderItem;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreOrderRequest;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the user's orders.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Auth::user()->orders()->with('items.service')->latest()->paginate(10);
        return view('orders.index', compact('orders'));
    }
    
    /**
     * Show the form for creating a new order.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $service = null;
        $company = null;
        
        if ($request->has('service_id')) {
            $service = Service::active()->findOrFail($request->service_id);
        }
        
        if ($request->has('company_id')) {
            $company = Auth::user()->companies()->findOrFail($request->company_id);
        }
        
        $companies = Auth::user()->companies;
        
        return view('orders.create', compact('service', 'company', 'companies'));
    }
    
    /**
     * Store a newly created order in storage.
     *
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        try {
            DB::beginTransaction();
            
            $order = new Order();
            $order->user_id = Auth::id();
            $order->company_id = $request->company_id;
            $order->status = 'pending';
            $order->total_amount = 0; // Will be updated after adding items
            $order->save();
            
            // Add the service as an order item
            $service = Service::findOrFail($request->service_id);
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->service_id = $service->id;
            $orderItem->quantity = 1;
            $orderItem->price = $service->price;
            $orderItem->save();
            
            // Update total amount
            $order->total_amount = $orderItem->price;
            $order->save();
            
            DB::commit();
            
            // Redirect to payment page
            return redirect()->route('orders.payment', $order)
                ->with('success', 'Votre commande a été créée avec succès.');
                
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Une erreur est survenue lors de la création de votre commande. Veuillez réessayer.');
        }
    }
    
    /**
     * Display the specified order.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $this->authorize('view', $order);
        
        $order->load('items.service', 'user', 'company');
        
        return view('orders.show', compact('order'));
    }
    
    /**
     * Show the payment form for an order.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function showPayment(Order $order)
    {
        $this->authorize('view', $order);
        
        if (!$order->isPending()) {
            return redirect()->route('orders.show', $order)
                ->with('info', 'Cette commande a déjà été traitée.');
        }
        
        return view('orders.payment', compact('order'));
    }
    
    /**
     * Process payment for an order.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function processPayment(Request $request, Order $order)
    {
        $this->authorize('view', $order);
        
        if (!$order->isPending()) {
            return redirect()->route('orders.show', $order)
                ->with('info', 'Cette commande a déjà été traitée.');
        }
        
        // In a real application, you would integrate with a payment gateway
        // For this example, we'll simply mark the order as paid
        
        $order->status = 'paid';
        $order->payment_method = $request->payment_method;
        $order->payment_id = 'DEMO-' . time(); // In a real app, this would be the transaction ID
        $order->save();
        
        return redirect()->route('orders.show', $order)
            ->with('success', 'Votre paiement a été traité avec succès.');
    }
    
    /**
     * Cancel an order.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function cancel(Order $order)
    {
        $this->authorize('update', $order);
        
        if (!$order->canBeCancelled()) {
            return redirect()->route('orders.show', $order)
                ->with('error', 'Cette commande ne peut plus être annulée.');
        }
        
        $order->status = 'cancelled';
        $order->save();
        
        return redirect()->route('orders.show', $order)
            ->with('success', 'Votre commande a été annulée.');
    }
}