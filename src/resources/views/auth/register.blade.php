@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center min-h-[calc(100vh-160px)] p-6">
    <div class="max-w-md w-full bg-white rounded-3xl shadow-xl p-10 border border-slate-100">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-indigo-600 italic">Rejoindre Voisinage</h1>
            <p class="text-slate-500 mt-2">Créez votre compte pour aider vos voisins.</p>
        </div>

        <form action="/submitRegister" method="POST" class="space-y-5">
            @csrf
            
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">Nom complet</label>
                <input type="text" name="name" required
                    class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-indigo-500 outline-none transition">
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">Email</label>
                <input type="email" name="email" required
                    class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-indigo-500 outline-none transition">
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Ville</label>
                    <input type="text" name="city" placeholder="ex: Paris" required
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-indigo-500 outline-none transition">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Quartier</label>
                    <input type="text" name="street" placeholder="ex: Centre" required
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-indigo-500 outline-none transition">
                </div>
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">Mot de passe</label>
                <input type="password" name="password" required
                    class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-indigo-500 outline-none transition">
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">Confirmer le mot de passe</label>
                <input type="password" name="password_confirmation" required
                    class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-indigo-500 outline-none transition">
            </div>

            <button type="submit" class="w-full py-4 bg-indigo-600 text-white rounded-xl font-bold shadow-lg shadow-indigo-100 hover:bg-indigo-700 transition-all">
                S'inscrire
            </button>
        </form>

        <p class="text-center mt-8 text-sm text-slate-500">
            Déjà membre ? <a href="/connexion" class="text-indigo-600 font-bold">Se connecter</a>
        </p>
    </div>
</div>
@endsection