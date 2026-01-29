@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto px-4 py-12">
    <div class="flex items-center justify-between mb-10">
        <div>
            <h1 class="text-3xl font-bold text-slate-900">Mes Favoris</h1>
            <p class="text-slate-500 mt-2">Retrouvez ici toutes les questions que vous avez enregistrées.</p>
        </div>
        <span class="px-4 py-2 bg-red-50 text-red-600 rounded-2xl font-bold text-sm border border-red-100">
            ❤️ 3 Questions sauvegardées
        </span>
    </div>

    <div class="grid grid-cols-1 gap-6">
        
        <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm hover:shadow-md transition-all relative overflow-hidden group">
            <div class="absolute top-0 left-0 w-1.5 h-full bg-red-400"></div>
            
            <div class="flex justify-between items-start">
                <div class="flex gap-4">
                    <div class="w-12 h-12 rounded-2xl bg-slate-100 flex items-center justify-center text-xl">
                        🏠
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-slate-900 group-hover:text-indigo-600 transition">Conseils pour le marché local</h3>
                        <p class="text-slate-500 text-sm mb-4">Posté par Julie • Il y a 2 jours</p>
                        
                        <div class="flex items-center gap-4 text-xs font-bold uppercase tracking-wider">
                            <span class="text-indigo-600">8 réponses</span>
                            <span class="text-slate-300">|</span>
                            <a href="#" class="text-red-500 hover:underline">Retirer des favoris</a>
                        </div>
                    </div>
                </div>
                <a href="#" class="px-4 py-2 bg-slate-50 text-slate-600 font-bold rounded-xl hover:bg-indigo-600 hover:text-white transition">
                    Voir
                </a>
            </div>
        </div>

        <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm hover:shadow-md transition-all relative overflow-hidden group">
            <div class="absolute top-0 left-0 w-1.5 h-full bg-red-400"></div>
            
            <div class="flex justify-between items-start">
                <div class="flex gap-4">
                    <div class="w-12 h-12 rounded-2xl bg-slate-100 flex items-center justify-center text-xl">
                        🔨
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-slate-900 group-hover:text-indigo-600 transition">Prêt d'escabeau pour samedi ?</h3>
                        <p class="text-slate-500 text-sm mb-4">Posté par Thomas • Il y a 5 heures</p>
                        
                        <div class="flex items-center gap-4 text-xs font-bold uppercase tracking-wider">
                            <span class="text-indigo-600">1 réponse</span>
                            <span class="text-slate-300">|</span>
                            <a href="#" class="text-red-500 hover:underline">Retirer des favoris</a>
                        </div>
                    </div>
                </div>
                <a href="#" class="px-4 py-2 bg-slate-50 text-slate-600 font-bold rounded-xl hover:bg-indigo-600 hover:text-white transition">
                    Voir
                </a>
            </div>
        </div>

        </div>
</div>
@endsection