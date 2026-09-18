<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Show the form for adding a new item to an order.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function create(Order $order)
    {
        $this->authorize('update', $order);
        
        // Only allow adding items to pending orders
        if (!$order->isPending()) {
            return redirect()->route('orders.show', $order)
                ->with('error', 'Vous ne pouvez ajouter des services qu\'aux commandes en attente de paiement.');
        }
        
        $services = Service::active()->get();
        
        return view('order_items.create', compact('order', 'services'));
    }
    
    /**
     * Store a newly created item in the order.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Order $order)
    {
        $this->authorize('update', $order);
        
        // Validate request
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'quantity' => 'required|integer|min:1',
        ]);
        
        // Only allow adding items to pending orders
        if (!$order->isPending()) {
            return redirect()->route('orders.show', $order)
                ->with('error', 'Vous ne pouvez ajouter des services qu\'aux commandes en attente de paiement.');
        }
        
        try {
            DB::beginTransaction();
            
            $service = Service::findOrFail($request->service_id);
            
            // Check if the service already exists in the order
            $existingItem = $order->items()->where('service_id', $service->id)->first();
            
            if ($existingItem) {
                // Update existing item
                $existingItem->quantity += $request->quantity;
                $existingItem->save();
            } else {
                // Create new item
                $orderItem = new OrderItem();
                $orderItem->order_id = $order->id;
                $orderItem->service_id = $service->id;
                $orderItem->quantity = $request->quantity;
                $orderItem->price = $service->price;
                $orderItem->save();
            }
            
            // Update order total
            $order->total_amount = $order->items()->sum(DB::raw('quantity * price'));
            $order->save();
            
            DB::commit();
            
            return redirect()->route('orders.show', $order)
                ->with('success', 'Le service a été ajouté à votre commande.');
                
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Une erreur est survenue. Veuillez réessayer.');
        }
    }
    
    /**
     * Show the form for editing an order item.
     *
     * @param  \App\Models\Order  $order
     * @param  \App\Models\OrderItem  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order, OrderItem $item)
    {
        $this->authorize('update', $order);
        
        // Check if the item belongs to the order
        if ($item->order_id !== $order->id) {
            abort(404);
        }
        
        // Only allow editing items in pending orders
        if (!$order->isPending()) {
            return redirect()->route('orders.show', $order)
                ->with('error', 'Vous ne pouvez modifier des services que dans les commandes en attente de paiement.');
        }
        
        return view('order_items.edit', compact('order', 'item'));
    }
    
    /**
     * Update the specified order item.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @param  \App\Models\OrderItem  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order, OrderItem $item)
    {
        $this->authorize('update', $order);
        
        // Check if the item belongs to the order
        if ($item->order_id !== $order->id) {
            abort(404);
        }
        
        // Validate request
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);
        
        // Only allow updating items in pending orders
        if (!$order->isPending()) {
            return redirect()->route('orders.show', $order)
                ->with('error', 'Vous ne pouvez modifier des services que dans les commandes en attente de paiement.');
        }
        
        try {
            DB::beginTransaction();
            
            // Update the item
            $item->quantity = $request->quantity;
            $item->save();
            
            // Update order total
            $order->total_amount = $order->items()->sum(DB::raw('quantity * price'));
            $order->save();
            
            DB::commit();
            
            return redirect()->route('orders.show', $order)
                ->with('success', 'La quantité a été mise à jour.');
                
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Une erreur est survenue. Veuillez réessayer.');
        }
    }
    
    /**
     * Remove the specified order item.
     *
     * @param  \App\Models\Order  $order
     * @param  \App\Models\OrderItem  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order, OrderItem $item)
    {
        $this->authorize('update', $order);
        
        // Check if the item belongs to the order
        if ($item->order_id !== $order->id) {
            abort(404);
        }
        
        // Only allow removing items from pending orders
        if (!$order->isPending()) {
            return redirect()->route('orders.show', $order)
                ->with('error', 'Vous ne pouvez supprimer des services que des commandes en attente de paiement.');
        }
        
        // Don't allow removing the last item
        if ($order->items()->count() <= 1) {
            return redirect()->route('orders.show', $order)
                ->with('error', 'Vous ne pouvez pas supprimer le dernier service de la commande.');
        }
        
        try {
            DB::beginTransaction();
            
            // Delete the item
            $item->delete();
            
            // Update order total
            $order->total_amount = $order->items()->sum(DB::raw('quantity * price'));
            $order->save();
            
            DB::commit();
            
            return redirect()->route('orders.show', $order)
                ->with('success', 'Le service a été supprimé de la commande.');
                
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Une erreur est survenue. Veuillez réessayer.');
        }
    }
}