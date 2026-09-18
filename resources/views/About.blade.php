@extends('layouts.app')

@section('title', 'À Propos')


@section('scripts')
   <script>
       document.addEventListener("DOMContentLoaded", () => {
           const fadeElements = document.querySelectorAll(".fade-in");

           const observer = new IntersectionObserver(entries => {
               entries.forEach(entry => {
                   if (entry.isIntersecting) {
                       entry.target.classList.add("visible");
                       observer.unobserve(entry.target); // animation une seule fois
                   }
               });
           }, {
               threshold: 0.2
           });

           fadeElements.forEach(el => observer.observe(el));
       });
   </script>
@endsection
@section('content')
  <div class="container mx-auto px-6 py-16 max-w-6xl">
      <div class="text-center mb-16">
          <h1 class="text-5xl font-bold text-black mb-6 leading-tight">
            À propos de DC-KNOWING
          </h1>
        <div class="w-24 h-1 bg-gradient-to-r from-primary to-secondary mx-auto rounded-full"></div>
      </div>

      <div class="grid lg:grid-cols-2 gap-16 items-start mb-20">
        <div class="space-y-8">
          <div
            class="bg-white rounded-2xl p-8 shadow-lg border border-slate-100"
          >
            <div class="flex items-center mb-6">
              <div
                class="w-12 h-12 bg-primary rounded-xl flex items-center justify-center mr-4"
              >
                <i class="ri-building-line text-white text-xl"></i>
              </div>
              <h2 class="text-2xl font-semibold text-slate-800">
                Notre Histoire
              </h2>
            </div>
            <p class="text-slate-600 text-lg leading-relaxed">
              DC-KNOWING est un cabinet d'assistance et de suivi en gestion
              d'entreprise créé en janvier 2019 avec un agrément pour exercer en
              tant que centre de gestion agréé (CGA). Motivé par une volonté
              ferme de contribuer significativement à la croissance des
              entreprises, nous accompagnons nos clients vers l'excellence
              opérationnelle.
            </p>
          </div>

          <div class="bg-white rounded-2xl p-8 shadow-lg border border-slate-100">
            <div class="flex items-center mb-6">
              <div
                class="w-12 h-12 bg-primary rounded-xl flex items-center justify-center mr-4"
              >
                <i class="ri-target-line text-white text-xl"></i>
              </div>
              <h2 class="text-2xl font-semibold text-slate-800">Notre Mission</h2>
            </div>
            <p class="text-slate-600 text-lg leading-relaxed">
              Nous nous engageons à fournir des solutions personnalisées et
              innovantes pour optimiser la performance de votre entreprise.
              Notre approche collaborative garantit un accompagnement sur mesure
              adapté à vos enjeux spécifiques.
            </p>
          </div>
        </div>
        </div>
      </div>

      <div class="mb-20">
        <div class="text-center mb-12">
          <h2 class="text-4xl font-bold text-slate-800 mb-4">
            Nos Domaines d'Expertise
          </h2>
          <p class="text-xl text-slate-600 max-w-3xl mx-auto">
            Nous intervenons dans plusieurs domaines clés pour accompagner votre
            entreprise vers le succès
          </p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
          <div
            class="bg-white rounded-2xl p-8 shadow-lg border border-slate-100 hover:shadow-xl transition-all duration-300 hover:-translate-y-2"
          >
            <div
              class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mb-6"
            >
              <i class="ri-calculator-line text-white text-2xl"></i>
            </div>
            <h3 class="text-xl font-semibold text-slate-800 mb-3">
              Comptabilité
            </h3>
            <p class="text-slate-600">
              Gestion comptable complète et tenue de livres professionnelle pour
              votre entreprise.
            </p>
          </div>

          <div
            class="bg-white rounded-2xl p-8 shadow-lg border border-slate-100 hover:shadow-xl transition-all duration-300 hover:-translate-y-2"
          >
            <div
              class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl flex items-center justify-center mb-6"
            >
              <i class="ri-file-text-line text-white text-2xl"></i>
            </div>
            <h3 class="text-xl font-semibold text-slate-800 mb-3">Fiscalité</h3>
            <p class="text-slate-600">
              Optimisation fiscale et conseil en matière de déclarations et
              obligations fiscales.
            </p>
          </div>

          <div
            class="bg-white rounded-2xl p-8 shadow-lg border border-slate-100 hover:shadow-xl transition-all duration-300 hover:-translate-y-2"
          >
            <div
              class="w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center mb-6"
            >
              <i class="ri-team-line text-white text-2xl"></i>
            </div>
            <h3 class="text-xl font-semibold text-slate-800 mb-3">
              Ressources Humaines
            </h3>
            <p class="text-slate-600">
              Gestion complète des RH, paie et accompagnement dans le
              développement des talents.
            </p>
          </div>

          <div
            class="bg-white rounded-2xl p-8 shadow-lg border border-slate-100 hover:shadow-xl transition-all duration-300 hover:-translate-y-2"
          >
            <div
              class="w-16 h-16 bg-gradient-to-br from-orange-500 to-orange-600 rounded-2xl flex items-center justify-center mb-6"
            >
              <i class="ri-funds-line text-white text-2xl"></i>
            </div>
            <h3 class="text-xl font-semibold text-slate-800 mb-3">
              Structuration Financière
            </h3>
            <p class="text-slate-600">
              Accompagnement dans la levée de fonds et l'optimisation de votre
              structure financière.
            </p>
          </div>

          <div
            class="bg-white rounded-2xl p-8 shadow-lg border border-slate-100 hover:shadow-xl transition-all duration-300 hover:-translate-y-2"
          >
            <div
              class="w-16 h-16 bg-gradient-to-br from-red-500 to-red-600 rounded-2xl flex items-center justify-center mb-6"
            >
              <i class="ri-graduation-cap-line text-white text-2xl"></i>
            </div>
            <h3 class="text-xl font-semibold text-slate-800 mb-3">Formation</h3>
            <p class="text-slate-600">
              Programmes de formation sur mesure pour développer les compétences
              de vos équipes.
            </p>
          </div>

          <div
            class="bg-white rounded-2xl p-8 shadow-lg border border-slate-100 hover:shadow-xl transition-all duration-300 hover:-translate-y-2"
          >
            <div
              class="w-16 h-16 bg-gradient-to-br from-teal-500 to-teal-600 rounded-2xl flex items-center justify-center mb-6"
            >
              <i class="ri-scales-line text-white text-2xl"></i>
            </div>
            <h3 class="text-xl font-semibold text-slate-800 mb-3">
              Assistance Juridique
            </h3>
            <p class="text-slate-600">
              Conseil juridique et accompagnement dans vos démarches
              administratives.
            </p>
          </div>
        </div>
      </div>

      <div class="bg-gradient-to-r from-gray-500 to-secondary rounded-3xl p-12 text-white mb-20">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold mb-4">Nos Valeurs Fondamentales</h2>
            <p class="text-xl opacity-90 max-w-3xl mx-auto">
                Pour la réalisation de notre objectif, nous avons adopté une
                philosophie de travail autour des valeurs fortes qui guident chacune
                de nos actions
            </p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
          <div
            class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 text-center hover:bg-white/20 transition-all duration-300"
          >
            <div
              class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4"
            >
              <i class="ri-star-line text-white text-xl"></i>
            </div>
            <h3 class="font-semibold text-lg">Excellence</h3>
          </div>

          <div
            class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 text-center hover:bg-white/20 transition-all duration-300"
          >
            <div
              class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4"
            >
              <i class="ri-award-line text-white text-xl"></i>
            </div>
            <h3 class="font-semibold text-lg">Qualité</h3>
          </div>

          <div
            class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 text-center hover:bg-white/20 transition-all duration-300"
          >
            <div
              class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4"
            >
              <i class="ri-focus-line text-white text-xl"></i>
            </div>
            <h3 class="font-semibold text-lg">Rigueur</h3>
          </div>

          <div
            class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 text-center hover:bg-white/20 transition-all duration-300"
          >
            <div
              class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4"
            >
              <i class="ri-timer-line text-white text-xl"></i>
            </div>
            <h3 class="font-semibold text-lg">Discipline</h3>
          </div>

          <div
            class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 text-center hover:bg-white/20 transition-all duration-300"
          >
            <div
              class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4"
            >
              <i class="ri-hand-heart-line text-white text-xl"></i>
            </div>
            <h3 class="font-semibold text-lg">Responsabilité</h3>
          </div>

          <div
            class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 text-center hover:bg-white/20 transition-all duration-300"
          >
            <div
              class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4"
            >
              <i class="ri-shield-check-line text-white text-xl"></i>
            </div>
            <h3 class="font-semibold text-lg">Intégrité</h3>
          </div>

          <div
            class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 text-center hover:bg-white/20 transition-all duration-300"
          >
            <div
              class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4"
            >
              <i class="ri-heart-line text-white text-xl"></i>
            </div>
            <h3 class="font-semibold text-lg">Courtoisie</h3>
          </div>

          <div
            class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 text-center hover:bg-white/20 transition-all duration-300"
          >
            <div
              class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4"
            >
              <i class="ri-eye-line text-white text-xl"></i>
            </div>
            <h3 class="font-semibold text-lg">Transparence</h3>
          </div>

          <div
            class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 text-center hover:bg-white/20 transition-all duration-300"
          >
            <div
              class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4"
            >
              <i class="ri-user-heart-line text-white text-xl"></i>
            </div>
            <h3 class="font-semibold text-lg">Respect</h3>
          </div>

          <div
            class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 text-center hover:bg-white/20 transition-all duration-300"
          >
            <div
              class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4"
            >
              <i class="ri-book-open-line text-white text-xl"></i>
            </div>
            <h3 class="font-semibold text-lg">Quête du Savoir</h3>
          </div>
        </div>
      </div>
      </div>
    </div>

@endsection