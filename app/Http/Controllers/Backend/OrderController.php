<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use PDF;
use DB;
 
 

class OrderController extends Controller
{
    
	// Pending Orders 
	public function PendingOrders(){
		$orders = Order::where('status','ditunda')->orderBy('id','DESC')->get();
		return view('backend.orders.pending_orders',compact('orders'));

	}


	// Pending Order Details 
	public function PendingOrdersDetails($order_id){

		$order = Order::with('division','district','state','user')->where('id',$order_id)->first();
    	$orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();
    	return view('backend.orders.pending_orders_details',compact('order','orderItem'));

	} 



	// Confirmed Orders 
	public function ConfirmedOrders(){
		$orders = Order::where('status','di konfirmasi')->orderBy('id','DESC')->get();
		return view('backend.orders.confirmed_orders',compact('orders'));

	} 


	// Processing Orders 
	public function ProcessingOrders(){
		$orders = Order::where('status','dikemas')->orderBy('id','DESC')->get();
		return view('backend.orders.processing_orders',compact('orders'));

	} 


		// Picked Orders 
	public function PickedOrders(){
		$orders = Order::where('status','dikirim')->orderBy('id','DESC')->get();
		return view('backend.orders.picked_orders',compact('orders'));

	} 



			// Shipped Orders 
	public function ShippedOrders(){
		$orders = Order::where('status','dalam perjalanan')->orderBy('id','DESC')->get();
		return view('backend.orders.shipped_orders',compact('orders'));

	} 


			// Delivered Orders 
	public function DeliveredOrders(){
		$orders = Order::where('status','selesai')->orderBy('id','DESC')->get();
		return view('backend.orders.delivered_orders',compact('orders'));

	}


				// Cancel Orders 
	public function CancelOrders(){
		$orders = Order::where('status','batal')->orderBy('id','DESC')->get();
		return view('backend.orders.cancel_orders',compact('orders'));

	}




	public function PendingToConfirm($order_id){
   
      Order::findOrFail($order_id)->update(['status' => 'di konfirmasi']);

      $notification = array(
			'message' => 'Pesanan Berhasil Dikonfirmasi',
			'alert-type' => 'success'
		);

		return redirect()->route('pending-orders')->with($notification);


	}





	public function ConfirmToProcessing($order_id){
   
      Order::findOrFail($order_id)->update(['status' => 'dikemas']);

      $notification = array(
			'message' => 'Pesanan Berhasil Diproses',
			'alert-type' => 'success'
		);

		return redirect()->route('confirmed-orders')->with($notification);


	} 



		public function ProcessingToPicked($order_id){
   
      Order::findOrFail($order_id)->update(['status' => 'dikirim']);

      $notification = array(
			'message' => 'Order Berhasil Dikirim',
			'alert-type' => 'success'
		);

		return redirect()->route('processing-orders')->with($notification);


	}


	 public function PickedToShipped($order_id){
   
      Order::findOrFail($order_id)->update(['status' => 'dalam perjalanan']);

      $notification = array(
			'message' => 'Berhasil Dalam Perjalanan',
			'alert-type' => 'success'
		);

		return redirect()->route('picked-orders')->with($notification);


	}


	 public function ShippedToDelivered($order_id){

	 $product = OrderItem::where('order_id',$order_id)->get();
	 foreach ($product as $item) {
	 	Product::where('id',$item->product_id)
	 			->update(['product_qty' => DB::raw('product_qty-'.$item->qty)]);
	 } 
 
      Order::findOrFail($order_id)->update(['status' => 'selesai']);

      $notification = array(
			'message' => 'Pesanan Sudah Diterima',
			'alert-type' => 'success'
		);

		return redirect()->route('shipped-orders')->with($notification);


	} 


	public function AdminInvoiceDownload($order_id){

		$order = Order::with('division','district','state','user')->where('id',$order_id)->first();
    $orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();
    	 
		$pdf = PDF::loadView('backend.orders.order_invoice',compact('order','orderItem'))->setPaper('a4')->setOptions([
				'tempDir' => public_path(),
				'chroot' => public_path(),
		]);
		return $pdf->download('invoice.pdf');

	}



}
 