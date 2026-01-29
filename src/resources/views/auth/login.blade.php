@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center min-h-[calc(100vh-160px)] p-6">
    <div class="max-w-md w-full bg-white rounded-3xl shadow-xl p-10 border border-slate-100">
        <div class="text-center mb-10">
            <h1 class="text-3xl font-bold text-indigo-600 italic">Voisinage</h1>
            <p class="text-slate-500 mt-2">Heureux de vous revoir !</p>
        </div>

        <form action="#" method="POST" class="space-y-6">
            @csrf
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">Email</label>
                <input type="email" name="email" required
                    class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-indigo-500 outline-none transition">
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">Mot de passe</label>
                <input type="password" name="password" required
                    class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-indigo-500 outline-none transition">
            </div>

            <button type="submit" class="w-full py-4 bg-indigo-600 text-white rounded-xl font-bold shadow-lg shadow-indigo-100 hover:bg-indigo-700 transition-all">
                Se connecter
            </button>
        </form>

        <p class="text-center mt-8 text-sm text-slate-500">
            Pas encore membre ? <a href="#" class="text-indigo-600 font-bold">Créer un compte</a>
        </p>
    </div>
</div>
@endsection