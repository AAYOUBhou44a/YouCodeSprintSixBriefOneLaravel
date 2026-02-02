<header class="bg-white border-b border-slate-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center">
                    <a href="/questions" class="text-2xl font-bold text-indigo-600 italic">Voisinage</a>
                </div>

                <nav class="hidden md:flex space-x-8 text-sm font-medium text-slate-600">
                    @if(Auth::user()->role === 'admin')
                    <a href="/dashboard" class="hover:text-indigo-600 transition">Dashboard</a>
                    @endif
                    <a href="/questions" class="hover:text-indigo-600 transition">Accueil</a>
                    <a href="/questions" class="hover:text-indigo-600 transition">Questions</a>
                    <a href="/favorites" class="hover:text-indigo-600 transition">Favoris</a>
                </nav>

                <div class="flex items-center space-x-4">
                    <a href="/addQuestion" class="bg-indigo-600 text-white px-5 py-2 rounded-xl text-sm font-bold hover:bg-indigo-700 transition shadow-lg shadow-indigo-100">
                        + Poser une question
                    </a>
                    <a href="/profile" class="w-10 h-10 rounded-full bg-slate-200 border-2 border-white shadow-sm overflow-hidden">
                        <img src="https://ui-avatars.com/api/?name=User" alt="Profil">
                    </a>
                    </div>
            </div>
        </div>
    </header>