@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-12 font-sans text-slate-900">
    <div class="bg-white rounded-[2.5rem] shadow-xl shadow-slate-100/50 border border-slate-100 overflow-hidden mb-8">
        <div class="h-40 bg-gradient-to-r from-indigo-600 to-violet-600"></div>
        
        <div class="px-8 pb-8">
            <div class="relative flex justify-between items-end -mt-16 mb-6">
                <div class="w-32 h-32 rounded-[2rem] bg-white p-2 shadow-2xl">
                    <div class="w-full h-full rounded-[1.5rem] bg-indigo-50 flex items-center justify-center text-4xl font-black text-indigo-600">
                        {{Str::upper(Str::substr($user->name, 0, 1))}}
                    </div>
                </div>
                <button class="px-6 py-3 bg-white text-slate-700 font-bold rounded-2xl border border-slate-200 hover:bg-slate-50 hover:border-indigo-200 transition-all shadow-sm">
                    Modifier le profil
                </button>
            </div>
            
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
                <div>
                    <h1 class="text-3xl font-black tracking-tight">{{$user->name}}</h1>
                    <p class="text-slate-500 font-medium">{{$user->email}}</p>
                </div>
                
                <div class="flex gap-4">
                    <div class="px-6 py-3 bg-slate-50 rounded-2xl border border-slate-100 text-center">
                        <span class="block text-xl font-black text-indigo-600">{{$user->questions->count()}}</span>
                        <span class="text-[10px] uppercase tracking-widest font-bold text-slate-400">Questions</span>
                    </div>
                    <div class="px-6 py-3 bg-slate-50 rounded-2xl border border-slate-100 text-center">
                        <span class="block text-xl font-black text-indigo-600">{{$user->likes->count()}}</span>
                        <span class="text-[10px] uppercase tracking-widest font-bold text-slate-400">Likes</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="space-y-6">
            <div class="bg-white p-8 rounded-[2rem] border border-slate-100 shadow-sm">
                <h3 class="text-lg font-bold mb-6">Informations personnelles</h3>
                <div class="space-y-4">
                    <div class="flex items-center gap-4">
                        <span class="w-10 h-10 rounded-xl bg-slate-50 flex items-center justify-center">📅</span>
                        <div>
                            <p class="text-[10px] uppercase tracking-wider font-bold text-slate-400">Membre depuis</p>
                            <p class="text-sm font-bold text-slate-700">{{$user->created_at->diffForHumans()}}</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-4">
                        <span class="w-10 h-10 rounded-xl bg-slate-50 flex items-center justify-center">📍</span>
                        <div>
                            <p class="text-[10px] uppercase tracking-wider font-bold text-slate-400">Localisation</p>
                            <p class="text-sm font-bold text-slate-700">{{$user->city}}, {{$user->street}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="lg:col-span-2 space-y-6">
            <h2 class="text-2xl font-black tracking-tight mb-4">Mes dernières activités</h2>
            
            @foreach($user->questions as $question)
            <div class="group bg-white p-6 rounded-[2rem] border border-slate-100 shadow-sm hover:shadow-md transition-all flex items-center justify-between">
                <div class="flex items-center gap-5">
                    <div class="w-14 h-14 rounded-2xl bg-amber-50 flex items-center justify-center text-xl">🛠️</div>
                    <div>
                        <h4 class="font-bold text-slate-900 group-hover:text-indigo-600 transition">{{$question->title}}</h4>
                        <p class="text-sm text-slate-400 font-medium">{{$question->created_at->diffForHumans()}} • {{$question->responses->count()}} réponses</p>
                    </div>
                </div>
                <div class="flex gap-2">
                    <a href="/edit/{{$question->id}}" class="p-3 text-slate-400 hover:text-indigo-600">
                        ✏️
                    </a>
                    <form action="/delete/{{$question->id}}" method="POST">
                        @csrf
                        @method('DELETE') 
                        <button class="p-3 text-slate-400 hover:bg-red-50 hover:text-red-600 rounded-xl transition">🗑️</button>
                    </form>
                </div>
            </div>
            @endforeach
            @if($user->questions->isEmpty())
            <h1>tu n'as pas encore créer des questions !!!</h1>
            @endif
            
        </div>
    </div>
</div>

@endsection