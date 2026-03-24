@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#F8FAFC] pb-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        
        <div class="mb-12">
            <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-8">
                <div class="space-y-2">
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-indigo-100 text-indigo-700 uppercase tracking-wider">
                        📍 Communauté de Safi
                    </span>
                    <h1 class="text-4xl md:text-5xl font-black text-slate-900 tracking-tight">
                        Local<span class="text-indigo-600">Mind</span>
                    </h1>
                    <p class="text-lg text-slate-500 font-medium">L'entraide de proximité, simplifiée et sécurisée.</p>
                </div>
                
                <div class="flex items-center gap-4">
                    <a href="/addQuestion" class="group relative inline-flex items-center justify-center px-8 py-4 font-bold text-white transition-all duration-200 bg-indigo-600 font-pj rounded-2xl focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 shadow-xl shadow-indigo-200 hover:bg-indigo-700" role="button">
                        <svg class="w-5 h-5 mr-2 transition-transform group-hover:rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                        Poser une question
                    </a>
                </div>
            </div>

            <div class="mt-10 p-2 bg-white rounded-[2rem] shadow-sm border border-slate-100 flex flex-col md:flex-row items-center gap-2">
                <div class="relative flex-grow w-full">
                    <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none text-slate-400">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    </div>
                    <input type="text" placeholder="Rechercher un service, un besoin..." 
                        class="block w-full pl-12 pr-4 py-4 bg-transparent border-none focus:ring-0 text-slate-600 placeholder-slate-400 font-medium outline-none">
                </div>
                <div class="h-8 w-px bg-slate-100 hidden md:block"></div>
                <select class="w-full md:w-48 py-4 px-6 bg-transparent border-none text-slate-600 font-bold focus:ring-0 cursor-pointer outline-none">
                    <option>Plus proches</option>
                    <option>Plus récentes</option>
                    <option>Urgent</option>
                </select>
                <button class="w-full md:w-auto px-8 py-4 bg-slate-900 text-white rounded-[1.5rem] font-bold hover:bg-indigo-600 transition-colors">
                    Filtrer
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
            <div class="lg:col-span-2 space-y-8">
                
                @forelse($questions as $question)
                <div class="group bg-white rounded-[2.5rem] border border-slate-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 p-8 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-amber-50 rounded-bl-full -mr-16 -mt-16 opacity-50 transition-colors group-hover:bg-indigo-50"></div>

                    <div class="relative">
                        <div class="flex justify-between items-start mb-6">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center text-white font-black shadow-lg shadow-indigo-100 uppercase">
                                    {{ substr($question->user->name, 0, 1) }}
                                </div>
                                <div>
                                    <h4 class="font-black text-slate-800 tracking-tight">{{$question->user->name}}</h4>
                                    <p class="text-[11px] font-bold text-slate-400 uppercase tracking-widest flex items-center gap-1">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                        {{$question->city}} • {{$question->created_at->diffForHumans()}}
                                    </p>
                                </div>
                            </div>
                            <span class="px-4 py-1.5 bg-white shadow-sm border border-slate-100 text-amber-600 text-[10px] font-black uppercase tracking-widest rounded-full">
                                Urgent
                            </span>
                        </div>

                        <a href="/showQuestion/{{$question->id}}" class="block">
                            <h3 class="text-2xl font-black text-slate-900 mb-4 group-hover:text-indigo-600 transition-colors leading-tight">
                                {{$question->title}}
                            </h3>
                            <p class="text-slate-500 leading-relaxed mb-8 line-clamp-3 font-medium">
                                {{$question->content}}
                            </p>
                        </a>

                        <div class="flex items-center justify-between pt-6 border-t border-slate-50">
                            <div class="flex items-center gap-6">
                                <form action="/likeQuestion/{{$question->id}}" method="POST">
                                    @csrf
                                    <button type="submit" class="flex items-center gap-2 font-bold transition-all {{ $question->likes->contains('user_id', Auth::id()) ? 'text-rose-500' : 'text-slate-400 hover:text-rose-500' }}">
                                        <svg class="w-6 h-6 {{ $question->likes->contains('user_id', Auth::id()) ? 'fill-current' : 'fill-none' }}" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" /></svg>
                                        <span class="text-sm">{{$question->likes->count()}}</span>
                                    </button>
                                </form>

                                <a href="/showQuestion/{{$question->id}}" class="flex items-center gap-2 text-slate-400 font-bold hover:text-indigo-600 transition-all">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" /></svg>
                                    <span class="text-sm">{{$question->responses->count()}}</span>
                                </a>
                            </div>

                            <div class="flex gap-3">
                                @if(Auth::id() === $question->user_id)
                                    <a href="/edit/{{$question->id}}" class="p-2 text-slate-400 hover:text-indigo-600 transition-colors">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                                    </a>
                                    <form action="/delete/{{$question->id}}" method="POST" onsubmit="return confirm('Supprimer cette question ?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="p-2 text-slate-400 hover:text-red-600 transition-colors">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="text-center py-20 bg-white rounded-[2.5rem] border-2 border-dashed border-slate-100 text-slate-400 font-bold">
                    Aucune question trouvée dans votre secteur.
                </div>
                @endforelse
            </div>

            <aside class="space-y-8">
                <div class="bg-slate-900 rounded-[2.5rem] p-8 text-white shadow-2xl shadow-indigo-200 relative overflow-hidden">
                    <div class="absolute top-0 left-0 w-full h-full opacity-10 pointer-events-none">
                        <svg class="w-full h-full" viewBox="0 0 100 100"><circle cx="50" cy="50" r="40" stroke="currentColor" stroke-width="0.5" fill="none"/></svg>
                    </div>
                    <h3 class="text-xl font-black mb-6 flex items-center gap-2">
                        <span class="w-2 h-2 bg-indigo-500 rounded-full animate-pulse"></span>
                        Activités à Safi
                    </h3>
                    <div class="space-y-4">
                        <div class="flex justify-between items-center p-4 bg-white/5 rounded-2xl">
                            <span class="text-slate-400 font-bold text-xs uppercase tracking-widest">Questions</span>
                            <span class="text-2xl font-black">{{$questions->count()}}</span>
                        </div>
                        <div class="flex justify-between items-center p-4 bg-white/5 rounded-2xl">
                            <span class="text-slate-400 font-bold text-xs uppercase tracking-widest">Réponses</span>
                            <span class="text-2xl font-black">{{$totalResponses ?? 12}}</span>
                        </div>
                    </div>
                    <button class="w-full mt-6 py-4 bg-indigo-600 rounded-2xl font-black hover:bg-indigo-500 transition-all text-sm uppercase tracking-widest">
                        Maître du quartier
                    </button>
                </div>
                
                <div class="bg-white rounded-[2.5rem] p-8 border border-slate-100 shadow-sm">
                    <h3 class="font-black text-slate-800 mb-6 uppercase text-xs tracking-[0.2em]">Sujets Populaires</h3>
                    <div class="flex flex-wrap gap-2">
                        @foreach(['Jardinage', 'Plomberie', 'Transport', 'Électronique', 'Garde'] as $tag)
                            <span class="px-4 py-2 bg-slate-50 text-slate-600 rounded-xl text-xs font-bold hover:bg-indigo-50 hover:text-indigo-600 cursor-pointer transition-colors border border-slate-100">
                                #{{$tag}}
                            </span>
                        @endforeach
                    </div>
                </div>
            </aside>
        </div>
    </div>
</div>
@endsection