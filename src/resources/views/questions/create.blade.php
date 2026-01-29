@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-12">
    <nav class="flex text-slate-400 text-sm mb-6" aria-label="Breadcrumb">
        <ol class="flex items-center space-x-2">
            <li><a href="#" class="hover:text-indigo-600">Questions</a></li>
            <li><span>/</span></li>
            <li class="text-slate-800 font-medium">Poser une question</li>
        </ol>
    </nav>

    <div class="bg-white rounded-3xl shadow-xl shadow-slate-100/50 border border-slate-100 overflow-hidden">
        <div class="bg-indigo-600 p-8 text-white">
            <h1 class="text-3xl font-bold">Poser une question</h1>
            <p class="text-indigo-100 mt-2">Expliquez votre besoin pour recevoir l'aide de vos voisins.</p>
        </div>

        <form action="#" method="POST" class="p-8 space-y-8">
            @csrf

            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Titre de votre demande</label>
                <input type="text" placeholder="Ex: Recherche un jardinier pour dimanche, Problème de fuite..." 
                    class="w-full px-5 py-4 bg-slate-50 border border-slate-100 rounded-2xl focus:ring-2 focus:ring-indigo-500 focus:bg-white outline-none transition-all">
                <p class="text-xs text-slate-400 mt-2 font-medium italic">Soyez précis pour attirer l'attention.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Localisation précise</label>
                    <div class="relative">
                        <span class="absolute left-4 top-4">📍</span>
                        <input type="text" placeholder="ex: Quartier Centre, Rue de la Paix" 
                            class="w-full pl-12 pr-5 py-4 bg-slate-50 border border-slate-100 rounded-2xl focus:ring-2 focus:ring-indigo-500 focus:bg-white outline-none transition-all">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Date souhaitée</label>
                    <input type="date" 
                        class="w-full px-5 py-4 bg-slate-50 border border-slate-100 rounded-2xl focus:ring-2 focus:ring-indigo-500 focus:bg-white outline-none transition-all">
                </div>
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Détails de la question</label>
                <textarea rows="6" placeholder="Décrivez votre situation en quelques lignes..." 
                    class="w-full px-5 py-4 bg-slate-50 border border-slate-100 rounded-2xl focus:ring-2 focus:ring-indigo-500 focus:bg-white outline-none transition-all"></textarea>
            </div>

            <div class="flex flex-col sm:flex-row gap-4 pt-4 border-t border-slate-50">
                <button type="button" class="flex-1 py-4 text-slate-500 font-bold hover:bg-slate-50 rounded-2xl transition">
                    Annuler
                </button>
                <button type="submit" class="flex-1 py-4 bg-indigo-600 text-white rounded-2xl font-bold shadow-lg shadow-indigo-100 hover:bg-indigo-700 transition-all">
                    Publier ma question
                </button>
            </div>
        </form>
    </div>
</div>
@endsection