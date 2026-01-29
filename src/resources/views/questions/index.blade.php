@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8">
    <div class="mb-10">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div>
                <h1 class="text-3xl font-bold text-slate-900">Questions à proximité</h1>
                <p class="text-slate-500 mt-1">Découvrez comment vous pouvez aider vos voisins aujourd'hui.</p>
            </div>
            <a href="#" class="inline-flex items-center justify-center px-6 py-3 bg-indigo-600 text-white font-bold rounded-2xl shadow-lg shadow-indigo-100 hover:bg-indigo-700 transition">
                + Poser une question
            </a>
        </div>

        <div class="mt-8 flex flex-col md:flex-row gap-4">
            <div class="flex-grow relative">
                <span class="absolute left-4 top-3.5 text-slate-400">🔍</span>
                <input type="text" placeholder="Rechercher par mot-clé (ex: serrurier, jardin...)" 
                    class="w-full pl-12 pr-4 py-3.5 bg-white border border-slate-200 rounded-2xl focus:ring-2 focus:ring-indigo-500 outline-none transition shadow-sm">
            </div>
            <select class="px-6 py-3.5 bg-white border border-slate-200 rounded-2xl font-semibold text-slate-600 outline-none shadow-sm cursor-pointer">
                <option>Plus proches</option>
                <option>Plus récentes</option>
                <option>Les plus populaires</option>
            </select>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2 space-y-6">
            
            <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm hover:shadow-md transition-all">
                <div class="flex justify-between items-start mb-4">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-indigo-50 flex items-center justify-center text-indigo-600 font-bold">A</div>
                        <div>
                            <h4 class="font-bold text-slate-800">Amine</h4>
                            <p class="text-xs text-slate-400">📍 Quartier Nord • Il y a 15 min</p>
                        </div>
                    </div>
                    <span class="px-3 py-1 bg-amber-50 text-amber-600 text-[10px] font-bold uppercase tracking-wider rounded-full border border-amber-100">
                        Urgent
                    </span>
                </div>
                
                <a href="#" class="block group">
                    <h3 class="text-xl font-bold text-slate-900 mb-3 group-hover:text-indigo-600 transition">Besoin d'un serrurier de confiance ?</h3>
                    <p class="text-slate-600 leading-relaxed mb-6 line-clamp-2">
                        Bonjour, je viens d'emménager et ma serrure semble bloquée. Est-ce que quelqu'un connaît un artisan honnête qui ne facture pas trop cher ?
                    </p>
                </a>

                <div class="flex items-center justify-between pt-5 border-t border-slate-50">
                    <div class="flex gap-4 text-sm font-medium text-slate-500">
                        <span>💬 3 réponses</span>
                        <span>⭐ 12 favoris</span>
                    </div>
                    <a href="#" class="text-indigo-600 font-bold hover:underline text-sm">Voir les détails →</a>
                </div>
            </div>

            <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm hover:shadow-md transition-all">
                <div class="flex justify-between items-start mb-4">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-emerald-50 flex items-center justify-center text-emerald-600 font-bold">S</div>
                        <div>
                            <h4 class="font-bold text-slate-800">Sarah</h4>
                            <p class="text-xs text-slate-400">📍 Quartier Sud • Il y a 2 heures</p>
                        </div>
                    </div>
                </div>
                
                <a href="#" class="block group">
                    <h3 class="text-xl font-bold text-slate-900 mb-3 group-hover:text-indigo-600 transition">Prêt de tondeuse pour le week-end ?</h3>
                    <p class="text-slate-600 leading-relaxed mb-6 line-clamp-2">
                        Ma tondeuse vient de me lâcher. J'ai un petit jardin à faire samedi matin, je peux rendre service en échange !
                    </p>
                </a>

                <div class="flex items-center justify-between pt-5 border-t border-slate-50">
                    <div class="flex gap-4 text-sm font-medium text-slate-500">
                        <span>💬 0 réponse</span>
                        <span>⭐ 2 favoris</span>
                    </div>
                    <a href="#" class="text-indigo-600 font-bold hover:underline text-sm">Voir les détails →</a>
                </div>
            </div>

        </div>

        <aside class="space-y-6">
            <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm">
                <h3 class="font-bold text-slate-900 mb-4">Statistiques locales</h3>
                <div class="space-y-4">
                    <div class="flex justify-between p-3 bg-slate-50 rounded-xl">
                        <span class="text-sm text-slate-500">Questions actives</span>
                        <span class="font-bold text-indigo-600">24</span>
                    </div>
                    <div class="flex justify-between p-3 bg-slate-50 rounded-xl">
                        <span class="text-sm text-slate-500">Réponses ce jour</span>
                        <span class="font-bold text-indigo-600">12</span>
                    </div>
                </div>
            </div>
        </aside>
    </div>
</div>
@endsection