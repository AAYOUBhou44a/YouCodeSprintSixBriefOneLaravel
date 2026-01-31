@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto px-4 py-10">
    <a href="/questions" class="inline-flex items-center text-slate-500 hover:text-indigo-600 font-semibold mb-8 transition">
        <span class="mr-2">←</span> Retour aux questions
    </a>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2 space-y-8">
            
            <div class="bg-white rounded-3xl shadow-sm border border-slate-100 p-8">
                <div class="flex justify-between items-start mb-6">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-2xl bg-indigo-600 flex items-center justify-center text-white font-bold text-xl">A</div>
                        <div>
                            <h1 class="text-2xl font-bold text-slate-900">{{$question->title}}</h1>
                            <p class="text-sm text-slate-400">{{$question->user->name}} • {{$question->city}} • {{$question->street}} • {{$question->created_at->diffForHumans()}}</p>
                        </div>
                    </div>
                    <button class="p-3 bg-slate-50 hover:bg-red-50 text-slate-400 hover:text-red-500 rounded-xl transition">
                        ❤
                    </button>
                </div>

                <div class="prose prose-slate max-w-none">
                    <p class="text-slate-600 text-lg leading-relaxed">
                        {{$question->content}}
                    </p>
                </div>
            </div>

            <div class="space-y-6">
                <h3 class="text-xl font-bold text-slate-800 flex items-center gap-2">
                    💬 Réponses <span class="text-sm font-medium px-2 py-0.5 bg-slate-100 rounded-md text-slate-500">{{$question->responses->count()}}</span>
                </h3>


                @foreach($question->responses as $response)
                <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-8 h-8 rounded-full bg-emerald-100 flex items-center justify-center text-emerald-600 font-bold text-xs">M</div>
                        <span class="font-bold text-slate-800 text-sm">{{$response->user->name}}</span>
                        <span class="text-xs text-slate-400">• {{$response->created_at->diffForHumans()}}</span>
                    </div>
                    <p class="text-slate-600">{{$response->response}}</p>
                </div>
                @endforeach
                @if($question->responses->isEmpty())
                    <h1>pas de réponses pour le moment , soyez le premier à aider !</h1>
                @endif


                <div class="bg-indigo-50 p-6 rounded-3xl border border-indigo-100">
                    <h4 class="font-bold text-indigo-900 mb-4">Apporter votre aide</h4>



                    <form action="/submitResponse" method="POST" class="space-y-4">
                        @csrf
                        <input type="hidden" name="question_id" value="{{$question->id}}">
                        <textarea rows="3" placeholder="Écrivez votre réponse ici..." name="response"
                            class="w-full px-4 py-3 bg-white border border-indigo-100 rounded-2xl focus:ring-2 focus:ring-indigo-500 outline-none transition"></textarea>
                        <button type="submit" class="px-6 py-3 bg-indigo-600 text-white font-bold rounded-xl hover:bg-indigo-700 transition shadow-md shadow-indigo-100">
                            Envoyer la réponse
                        </button>
                    </form>



                </div>
            </div>
        </div>

        <aside class="space-y-6">
            <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm">
                <h3 class="font-bold text-slate-900 mb-4">Localisation</h3>
                <div class="h-48 bg-slate-100 rounded-2xl flex items-center justify-center text-slate-400 font-medium">
                    [ Carte Google Maps ici ]
                </div>
                <p class="mt-4 text-sm text-slate-500 flex items-center gap-2">
                    {{$question->city}}, {{$question->street}}
                </p>
            </div>
        </aside>
    </div>
</div>
@endsection