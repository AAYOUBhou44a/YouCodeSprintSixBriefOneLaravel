@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-10">
    <h1 class="text-3xl font-bold text-slate-900 mb-8">Tableau de Bord Administrateur</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
        <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm">
            <p class="text-slate-500 text-sm font-bold uppercase tracking-wider">Total Questions</p>
            <p class="text-4xl font-black text-indigo-600 mt-2">{{$questions->count()}}</p>
        </div>
        <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm">
            <p class="text-slate-500 text-sm font-bold uppercase tracking-wider">Réponses cumulées</p>
            <p class="text-4xl font-black text-emerald-500 mt-2">{{$totalResponses}}</p>
        </div>
        <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm">
            <p class="text-slate-500 text-sm font-bold uppercase tracking-wider">Utilisateurs</p>
            <p class="text-4xl font-black text-amber-500 mt-2">{{$totalUsers}}</p>
        </div>
    </div>

    <div class="bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden">
        <div class="p-6 border-b border-slate-50 flex justify-between items-center">
            <h2 class="text-xl font-bold text-slate-800">Modération des Questions</h2>
            <button class="text-sm text-indigo-600 font-bold hover:underline">Voir tout</button>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-slate-50 text-slate-400 text-xs font-bold uppercase">
                    <tr>
                        <th class="px-6 py-4">Auteur</th>
                        <th class="px-6 py-4">Titre</th>
                        <th class="px-6 py-4">Date</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    
                @foreach($questions as $question)
                    <tr class="hover:bg-slate-50 transition">
                        <td class="px-6 py-4 font-bold text-slate-700">{{$question->user->name}}</td>
                        <td class="px-6 py-4 text-slate-600">{{$question->title}}</td>
                        <td class="px-6 py-4 text-slate-400 text-sm">{{$question->created_at->diffForHumans()}}</td>
                        <td class="px-6 py-4 text-right">
                            <form action="/adminDelete/{{$question->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-500 font-bold text-sm hover:underline">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection