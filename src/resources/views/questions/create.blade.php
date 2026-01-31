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

        <form action="/submitQuestion" method="POST" class="p-8 space-y-8">
            @csrf

            {{-- Titre --}}
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Titre de votre demande</label>
                <input type="text" name="title" value="{{old('title')}}" placeholder="Ex: Recherche un jardinier pour dimanche, Problème de fuite..." 
                    class="w-full px-5 py-4 bg-slate-50 border border-slate-100 rounded-2xl focus:ring-2 focus:ring-indigo-500 focus:bg-white outline-none transition-all">
                <p class="text-xs text-slate-400 mt-2 font-medium italic">Soyez précis pour attirer l'attention.</p>
                @error('title')
                    <span style="color: red; font-size: 12px;">{{ $message }}</span>
                @enderror
            </div>

            {{-- Localisation (Ville et Quartier) --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Ville</label>
                    <div class="relative">
                        <span class="absolute left-4 top-4">🏙️</span>
                        <input type="text" name="city" value="{{old('city')}}" placeholder="ex: Paris" required 
                            class="w-full pl-12 pr-5 py-4 bg-slate-50 border border-slate-100 rounded-2xl focus:ring-2 focus:ring-indigo-500 focus:bg-white outline-none transition-all">
                            @error('city')
                                <span style="color: red; font-size: 12px;">{{ $message }}</span>
                            @enderror
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Quartier</label>
                    <div class="relative">
                        <span class="absolute left-4 top-4">📍</span>
                        <input type="text" name="street" value="{{old('street')}}" placeholder="ex: Quartier Centre" required 
                            class="w-full pl-12 pr-5 py-4 bg-slate-50 border border-slate-100 rounded-2xl focus:ring-2 focus:ring-indigo-500 focus:bg-white outline-none transition-all">
                            @error('street')
                                <span style="color: red; font-size: 12px;">{{ $message }}</span>
                            @enderror
                    </div>
                </div>
            </div>

            {{-- Date --}}
            <!-- <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Date souhaitée</label>
                <input type="date" name="date"
                    class="w-full px-5 py-4 bg-slate-50 border border-slate-100 rounded-2xl focus:ring-2 focus:ring-indigo-500 focus:bg-white outline-none transition-all">
            </div> -->

            {{-- Détails --}}
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Détails de la question</label>
                <textarea name="content" rows="6" value="{{old('content')}}" placeholder="Décrivez votre situation en quelques lignes..." 
                    class="w-full px-5 py-4 bg-slate-50 border border-slate-100 rounded-2xl focus:ring-2 focus:ring-indigo-500 focus:bg-white outline-none transition-all"></textarea>
                    @error('content')
                        <span style="color: red; font-size: 12px;">{{ $message }}</span>
                    @enderror
            </div>

            {{-- Boutons --}}
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