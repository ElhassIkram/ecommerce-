<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('id', 'desc')->get();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

 
public function store(Request $request)
{
    // 1. إضافة الحقول الجديدة للتحقق (Validation)
    $request->validate([
        'nom' => 'required|string|max:255',
        'prenom' => 'required|string|max:255',
        'adresse' => 'required|string|max:255', // أضفنا هذا
        'ville' => 'required|string|max:255',   // أضفنا هذا
        'tel' => 'required|string|max:20',      // أضفنا هذا
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:8|confirmed',
        'isAdmin' => 'required|boolean',
    ]);

    // 2. إرسال جميع الحقول إلى قاعدة البيانات
    User::create([
        'nom' => $request->nom,
        'prenom' => $request->prenom,
        'adresse' => $request->adresse, // تأكد من إضافتها هنا
        'ville' => $request->ville,     // تأكد من إضافتها هنا
        'tel' => $request->tel,         // تأكد من إضافتها هنا
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'isAdmin' => $request->isAdmin,
    ]);

    return redirect()->route('users.index')
                     ->with('success', 'Utilisateur ajouté avec succès.');
}
    
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    
  public function update(Request $request, User $user)
{
    $request->validate([
        'nom' => 'required|string|max:255',
        'prenom' => 'required|string|max:255',
        'adresse' => 'required|string',
        'ville' => 'required|string',
        'tel' => 'required|string',
        'email' => 'required|email|unique:users,email,'.$user->id,
        'password' => 'nullable|string|min:8', // nullable مهم جداً هنا
        'isAdmin' => 'required|boolean',
    ]);

    $data = $request->except(['password']); // نأخذ كل البيانات إلا كلمة المرور

    if ($request->filled('password')) {
        $data['password'] = bcrypt($request->password); // نحدثها فقط إذا كانت موجودة
    }

    $user->update($data);

    return redirect()->route('users.index')->with('success', 'Utilisateur mis à jour avec succès.');
}

   public function destroy(User $user)
{
    try {
        $user->delete();

        return redirect()->route('users.index')
                         ->with('success', 'Utilisateur supprimé avec succès.');

    } catch (\Exception $e) {
        // Redirection avec un message d'erreur si la suppression échoue
        // (par exemple, si l'utilisateur est lié à d'autres enregistrements)
        return redirect()->route('users.index')
                         ->with('error', 'Erreur lors de la suppression de l\'utilisateur.');
    }
}
}
