@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8">
    <div class="mb-10">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div>
                <h1 class="text-3xl font-bold text-slate-900">Questions à proximité</h1>
                <p class="text-slate-500 mt-1">Découvrez comment vous pouvez aider vos voisins aujourd'hui.</p>
            </div>
            <a href="/addQuestion" class="inline-flex items-center justify-center px-6 py-3 bg-indigo-600 text-white font-bold rounded-2xl shadow-lg shadow-indigo-100 hover:bg-indigo-700 transition">
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
            
            @foreach($questions as $question)
            <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm hover:shadow-md transition-all">
                <div class="flex justify-between items-start mb-4">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-indigo-50 flex items-center justify-center text-indigo-600 font-bold">A</div>
                        <div>
                            <h4 class="font-bold text-slate-800">{{$question->user->name}}</h4>
                            <p class="text-xs text-slate-400">{{$question->city}} • {{$question->street}} • {{$question->created_at->diffForHumans()}}</p>
                        </div>
                    </div>
                    <span class="px-3 py-1 bg-amber-50 text-amber-600 text-[10px] font-bold uppercase tracking-wider rounded-full border border-amber-100">
                        Urgent
                    </span>
                </div>
                


                <a href="#" class="block group">
                    <h3 class="text-xl font-bold text-slate-900 mb-3 group-hover:text-indigo-600 transition">{{$question->title}}</h3>
                    <p class="text-slate-600 leading-relaxed mb-6 line-clamp-2">
                        {{$question->content}}
                    </p>
                </a>

                <div class="flex items-center justify-between pt-5 border-t border-slate-50">
                    <div class="flex gap-4 text-sm font-medium text-slate-500">
                        <form action="/like" method="POST">
                            <input type="hidden" name="_token" value="VOTRE_TOKEN_ICI">
                            <button type="submit" class="group flex items-center space-x-2 transition-colors text-slate-400 hover:text-red-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 transition-transform group-hover:scale-110 fill-none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                                <span class="text-sm font-bold">12</span>
                            </button>
                        </form>

                        <form action="/showQuestion/{{$question->id}}" method="GET">
                            <!-- <input type="hidden" name="_token" value="VOTRE_TOKEN_ICI"> -->
                            <button type="submit" class="group flex items-center space-x-2 text-slate-400 hover:text-indigo-600 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 transition-transform group-hover:scale-110 fill-none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                </svg>
                                <span class="text-sm font-bold">5</span>
                            </button>
                        </form>

                        <form action="/addFavorite/{{$question->id}}" method="GET">
                            <!-- <input type="hidden" name="_token" value="VOTRE_TOKEN_ICI"> -->
                            <button type="submit" class="group transition-colors text-slate-400 hover:text-yellow-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 transition-transform group-hover:scale-110 fill-none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                                </svg>
                            </button>
                        </form>
                    </div>
                    <a href="/showQuestion/{{$question->id}}" class="text-indigo-600 font-bold hover:underline text-sm">Voir les détails →</a>
                </div>
            </div>

            @endforeach
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