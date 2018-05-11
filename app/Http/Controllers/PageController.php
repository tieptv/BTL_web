<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Catagory;
use App\Manufacture;
use App\Oder;
use App\OderDetail;
use App\User;
use App\Comment;
use App\Contact;
use App\Slide;
use App\ProductDetail;
use Cart;
use Auth;

class PageController extends Controller
{
	public function getHome(){
		$slide = Slide::all();
		$product=Product::paginate(4);
		$new_product=Product::orderBy('id','desc')->paginate(5);
		$most_views_product = Product::orderBy('view','desc')->paginate(8);
		return view('pages.home',compact('slide','product','new_product','most_views_product'));
	}

	public function getProduct($id){
		$product = Product::find($id);
        $product -> view +=1;
        $product->update();
        $comments = Comment::all();
        $rel_product = Product::where('catalog_id',$product->catalog_id)->paginate(3);
		return view('pages.product_detail',compact('product','rel_product','comments'));
	}

	public function getProductType($id)
    {
    	$slide = Slide::all();
        $product = Product::where('catalog_id',$id)->get();
        return view('pages.product_type',compact('slide','product'));
    }

    public function getCart(){
    	$cart = Cart::content();
        $recommend_product = Product::paginate(4);
		return view('pages.cart',compact('cart','recommend_product'));
	}
	public function addCart($id)
    {
        $product = Product::find($id);
        Cart::add(['id'=>$id, 'name'=>$product->name,'qty'=>1, 'price'=>$product->price,'options'=>['image'=>$product->image_link,'catalog'=>$product->category->name,'manafacture'=>$product->manafacture->name]]);
        $content = Cart::content();
        return redirect()->route('cart');
    }
	public function removeCart($id){
        Cart::remove($id);
        return redirect()->route('cart');
    }
    public function destroyCart(){
        Cart::destroy();
        return redirect()->back();
    }
    public function minusQtyCart($id){
        $car = Cart::get($id);
        $car->qty -= 1;
        Cart::update($id,$car->qty);
        return redirect()->back();
    }
    public function addQtyCart($id){
        $car = Cart::get($id);
        $car->qty += 1;
        Cart::update($id,$car->qty);
        return redirect()->back();
    }
     public function getOrder(){
        $cart = Cart::content();
        return view('pages.checkout',['cart'=>$cart]);
    }
    public function checkout(Request $request){
        $content = Cart::content();
        $this->validate($request,
            [
                'name'=>'required|min:2|max:50',
                'phone'=>'required|min:10|max:12',
                'address'=>'required|min:6|max:200',
            ],
            [
                'name.required'=>'Vui lòng nhập tên',
                'name.min'=>'Tên tối thiểu 2 ký tự',
                'name.max'=>'Tên tối đa 50 ký tự',
                'phone.required'=>'Vui lòng nhập số điện thoại',
                'phone.min'=>'Số điện thoại tối thiểu 10 ký tự',
                'phone.max'=>'Số điện thoại tối đa 12 ký tự',
                'address.required'=>'Vui lòng nhập địa chỉ giao hàng',
                'address.min'=>'Địa chỉ tối thiểu 6 ký tự',
                'address.max'=>'Địa chỉ tối đa 200 ký tự',
            ]);
        if(Auth::check())
            {
                $order = new Oder();
                $order->user_id = Auth::User()->id;
                $order->date_order = Date('Y-m-d');
                $total = ((float)Cart::Subtotal());
                $order->total = $total;
                $order->name = $request->name;
                $order->phone = $request->phone;
                $order->address = $request->address;
                $order->note = $request->note;
                $order->payment = $request->payment;
                $order->save();
                foreach($content as $item)
                {
                    $order_detail = new OderDetail();
                    $order_detail->order_id = $order->id;
                    $order_detail->product_id = $item->id;
                    $order_detail->quantity = $item->qty;
                    $order_detail->price = ($item->price)*($item->qty);
                    $order_detail->save();
                }
            }
            else
            {
                return redirect()->route('login');
            }
            Cart::destroy();
         //   return redirect()->back()->with('message','Gửi đơn hàng thành công!');
            return view('pages.order_complete');
    }

	public function getShop(){
        $product = Product::paginate(8);
		return view('pages.shop',compact('product'));
	}
	public function getAbout(){
		return view('pages.about');
	}
	public function getContact(){
		return view('pages.contact');
	}
	
    public function getCheckout(){
		return view('pages.checkout');
	}

    public function search(Request $request)
    {
        $product = Product::where('name','like','%'.$request->key.'%')->get();
        return view('pages.search',compact('product'));
    }
}
