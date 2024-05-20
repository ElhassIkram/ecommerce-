<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produits; // Ensure this line is present
use App\Models\Commandes;
use App\Models\details_commandes;
use App\Models\mode_reglements;
use App\Models\etats;
use Gloudemans\Shoppingcart\Facades\Cart;// Import the Cart class
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        $mode_reglements = mode_reglements::all();
        $etats = etats::all();
        return view('cart.index', compact('cart', 'mode_reglements', 'etats'));
  
    }

    public function someControllerMethod()
    {
        // Assuming you have a Cart model or session handling for the cart
        $count = Cart::count(); // Or however you calculate the cart item count
    
        return view('interface.nav', compact('count'));
    }



    public function addProductToCart(Request $request)
    {
        $productId = $request->input('product_id');
        $produit = Produits::findOrFail($productId);

        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity']++;
        } else {
            $cart[$productId] = [
                "designation" =>  $produit->designation,
                "quantity" => 1,
                "price"=>$produit->prix_ht,
                "description" => $produit->description,
                "image" => $produit->image
            ];
        }
//dd("cart", $cart);
        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart successfully!');

    }

    public function updateProductOnCart(Request $request, $productId)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] = $request->input('quantity');
            session()->put('cart', $cart);
        }

        return response()->json(['success' => true]);
    }


    public function removeProductFromCart($productId)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            session()->put('cart', $cart);
        }

        return redirect()->route("cart.index")->with('success', 'Product removed from cart successfully!');
    }

    public function placeOrder(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You need to create an account to place an order.');
        }

        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->back()->with('error', 'Your cart is empty!');
        }

        $commande = Commandes::create([
            'date' => Carbon::now()->toDateString(),
            'time' => Carbon::now()->toTimeString(),
            'regle' => false,
            'mode_reglements_id' => $request->input('mode_reglements_id'),
            'etat_id' => $request->input('etat_id'),
            'user_id' => auth()->id(),
        ]);

        foreach ($cart as $id => $details) {
            details_commandes::create([
                'commande_id' => $commande->id,
                'produit_id' => $id,
                'quantite' => $details['quantity'],
                'prix_ht' => $details['price'],
                'tva' => 0,
            ]);
        }

        session()->forget('cart');

        return redirect()->route('cart.index')->with('success', 'Order placed successfully!');
    }

}
