@extends('layouts.app')

@section('title', 'DC-KNOWING - Tout savoir')

@section('styles')
<style>
    /* Hero Section */
    .knowledge-hero {
        background: linear-gradient(135deg, #1a56a1 0%, #0c2d5e 100%);
        color: white;
        position: relative;
        overflow: hidden;
        padding: 80px 0;
    }
    
    .knowledge-pattern {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 0.1;
        background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.4'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    }
    
    /* Knowledge Cards */
    .knowledge-card {
        transition: all 0.3s ease;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        background: white;
        height: 100%;
        display: flex;
        flex-direction: column;
    }
    
    .knowledge-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.12);
    }
    
    .knowledge-icon {
        width: 48px;
        height: 48px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 8px;
        margin-bottom: 16px;
    }
    
    /* Accordion */
    .accordion-item {
        border-bottom: 1px solid #e2e8f0;
    }
    
    .accordion-header {
        padding: 20px 0;
        cursor: pointer;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    
    .accordion-content {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.3s ease;
    }
    
    .accordion-content-inner {
        padding: 0 0 20px 0;
    }
    
    .accordion-item.active .accordion-content {
        max-height: 500px;
    }
    
    .accordion-item.active .accordion-header svg {
        transform: rotate(180deg);
    }
    
    /* Steps */
    .step-item {
        position: relative;
        padding-left: 40px;
        margin-bottom: 30px;
    }
    
    .step-number {
        position: absolute;
        left: 0;
        top: 0;
        width: 30px;
        height: 30px;
        background-color: #1a56a1;
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
    }
    
    /* Section titles */
    .section-title {
        font-size: 32px;
        font-weight: 700;
        margin-bottom: 48px;
        text-align: center;
    }
    
    /* CTA */
    .cta-section {
        background-color: #f8fafc;
        padding: 60px 0;
    }
    
    /* Responsive adjustments */
    @media (max-width: 768px) {
        .knowledge-image {
            display: none;
        }
        
        .section-title {
            font-size: 28px;
            margin-bottom: 32px;
        }
    }
</style>
@endsection

@section('content')
<!-- Hero Section -->
<section class="knowledge-hero">
    <div class="knowledge-pattern"></div>
    <div class="container mx-auto px-4">
        <div class="flex flex-col lg:flex-row items-center">
            <div class="lg:w-1/2 mb-12 lg:mb-0">
                <h1 class="text-4xl md:text-5xl font-bold mb-6 leading-tight">Tout savoir sur vos d�marches en C�te d'Ivoire</h1>
                <p class="text-xl mb-8 text-blue-100 max-w-lg">
                    Un guide complet pour comprendre et r�ussir vos d�marches administratives, juridiques et financi�res.
                </p>
                <div class="relative max-w-md">
                    <input type="text" placeholder="Rechercher une information..." class="w-full py-3 px-5 rounded-lg bg-blue-900 bg-opacity-50 text-white placeholder-blue-200 focus:outline-none focus:ring-2 focus:ring-white">
                    <button class="absolute right-3 top-3 text-blue-200 hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>
                </div>
            </div>
            <div class="lg:w-1/2 flex justify-center knowledge-image">
                <img src="{{ asset('images/knowledge.svg') }}" alt="Connaissances" class="w-full max-w-lg">
            </div>
        </div>
    </div>
</section>

<!-- Categories Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <h2 class="section-title">Explorez nos guides par cat�gorie</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Cr�ation d'entreprise -->
            <div class="knowledge-card p-6">
                <div class="knowledge-icon bg-blue-50 text-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-3">Cr�ation d'entreprise</h3>
                <p class="text-gray-600 mb-4 flex-grow">
                    Tout ce que vous devez savoir pour cr�er votre entreprise en C�te d'Ivoire, de A � Z.
                </p>
                <a href="{{ route('Cr�ation') }}" class="text-blue-600 font-medium hover:text-blue-800 inline-flex items-center">
                    Voir le guide
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
            
            <!-- Fiscalit� -->
            <div class="knowledge-card p-6">
                <div class="knowledge-icon bg-green-50 text-green-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-3">Fiscalit� & Comptabilit�</h3>
                <p class="text-gray-600 mb-4 flex-grow">
                    Comprendre le syst�me fiscal ivoirien et g�rer efficacement votre comptabilit�.
                </p>
                <a href="{{ route('CGA') }}" class="text-blue-600 font-medium hover:text-blue-800 inline-flex items-center">
                    Voir le guide
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
            
            <!-- Ressources Humaines -->
            <div class="knowledge-card p-6">
                <div class="knowledge-icon bg-purple-50 text-purple-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-3">Ressources Humaines</h3>
                <p class="text-gray-600 mb-4 flex-grow">
                    Gestion du personnel, contrats de travail, obligations l�gales et bonnes pratiques.
                </p>
                <a href="#" class="text-blue-600 font-medium hover:text-blue-800 inline-flex items-center">
                    Voir le guide
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Resources Section -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <h2 class="section-title">Ressources utiles</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="knowledge-card p-6">
                <div class="flex items-center mb-4">
                    <div class="bg-blue-100 p-3 rounded-lg mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold">Mod�les de documents</h3>
                </div>
                <p class="text-gray-600 mb-4">T�l�chargez gratuitement nos mod�les de statuts, contrats et autres documents types.</p>
                <a href="#" class="text-blue-600 font-medium hover:text-blue-800 inline-flex items-center">
                    Acc�der aux mod�les
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
            
            <div class="knowledge-card p-6">
                <div class="flex items-center mb-4">
                    <div class="bg-green-100 p-3 rounded-lg mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold">Calendrier fiscal</h3>
                </div>
                <p class="text-gray-600 mb-4">Ne manquez aucune �ch�ance avec notre calendrier des obligations fiscales et sociales.</p>
                <a href="#" class="text-blue-600 font-medium hover:text-blue-800 inline-flex items-center">
                    Voir le calendrier
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
            
            <div class="knowledge-card p-6">
                <div class="flex items-center mb-4">
                    <div class="bg-purple-100 p-3 rounded-lg mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold">V�rificateur de documents</h3>
                </div>
                <p class="text-gray-600 mb-4">V�rifiez que vos documents sont complets avant soumission aux administrations.</p>
                <a href="#" class="text-blue-600 font-medium hover:text-blue-800 inline-flex items-center">
                    V�rifier mes documents
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <h2 class="section-title">Questions fr�quemment pos�es</h2>
            
            <div class="space-y-2">
                <!-- Question 1 -->
                <div class="accordion-item">
                    <div class="accordion-header">
                        <h3 class="text-lg font-semibold">Quels documents faut-il pour cr�er une entreprise en C�te d'Ivoire ?</h3>
                        <svg class="w-5 h-5 text-gray-500 transform transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>
                    <div class="accordion-content">
                        <div class="accordion-content-inner text-gray-600">
                            <p>Les documents n�cessaires varient selon le type d'entreprise :</p>
                            <ul class="list-disc pl-5 mt-2 space-y-1">
                                <li>Copie de la pi�ce d'identit� du ou des associ�s</li>
                                <li>Formulaire de d�claration d�ment rempli</li>
                                <li>Justificatif de domicile de l'entreprise</li>
                                <li>Statuts de la soci�t� sign�s</li>
                                <li>Attestation de d�p�t de capital</li>
                            </ul>
                            <p class="mt-3">Notre �quipe peut vous accompagner dans la pr�paration de tous ces documents.</p>
                        </div>
                    </div>
                </div>
                
                <!-- Question 2 -->
                <div class="accordion-item">
                    <div class="accordion-header">
                        <h3 class="text-lg font-semibold">Quelle est la diff�rence entre une SARL et une SA ?</h3>
                        <svg class="w-5 h-5 text-gray-500 transform transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>
                    <div class="accordion-content">
                        <div class="accordion-content-inner text-gray-600">
                            <p>La SARL (Soci�t� � Responsabilit� Limit�e) et la SA (Soci�t� Anonyme) sont deux formes juridiques distinctes :</p>
                            <div class="grid md:grid-cols-2 gap-4 mt-3">
                                <div class="bg-gray-50 p-4 rounded-lg">
                                    <h4 class="font-bold text-blue-600 mb-2">SARL</h4>
                                    <ul class="space-y-1">
                                        <li>1 � 100 associ�s</li>
                                        <li>Capital minimum : 100 000 FCFA</li>
                                        <li>Gestion plus simple</li>
                                        <li>Id�ale pour PME</li>
                                    </ul>
                                </div>
                                <div class="bg-gray-50 p-4 rounded-lg">
                                    <h4 class="font-bold text-blue-600 mb-2">SA</h4>
                                    <ul class="space-y-1">
                                        <li>Minimum 7 actionnaires</li>
                                        <li>Capital minimum : 10 000 000 FCFA</li>
                                        <li>Structure plus complexe</li>
                                        <li>Adapt�e aux grandes entreprises</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Question 3 -->
                <div class="accordion-item">
                    <div class="accordion-header">
                        <h3 class="text-lg font-semibold">Quels sont les avantages d'un Cabinet de Gestion Agr�� (CGA) ?</h3>
                        <svg class="w-5 h-5 text-gray-500 transform transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>
                    <div class="accordion-content">
                        <div class="accordion-content-inner text-gray-600">
                            <p>Un CGA comme DC-KNOWING vous offre plusieurs avantages :</p>
                            <ul class="list-disc pl-5 mt-2 space-y-1">
                                <li>R�duction d'imp�ts pouvant aller jusqu'� 50%</li>
                                <li>Accompagnement personnalis� par des experts</li>
                                <li>Optimisation de votre fiscalit�</li>
                                <li>Gestion simplifi�e de vos obligations comptables</li>
                                <li>Acc�s � des outils performants de suivi</li>
                            </ul>
                            <p class="mt-3">Notre CGA vous permet de vous concentrer sur votre activit� tout en �tant en conformit� avec la r�glementation.</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="text-center mt-12">
                <a href="{{ route('contact') }}" class="bg-blue-600 text-white font-semibold px-6 py-3 rounded-lg inline-flex items-center hover:bg-blue-700 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    Poser une question
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Steps Section -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <h2 class="section-title">Comment utiliser nos guides ?</h2>
        
        <div class="max-w-3xl mx-auto">
            <div class="step-item">
                <div class="step-number">1</div>
                <h3 class="text-xl font-semibold mb-2">Choisissez votre th�me</h3>
                <p class="text-gray-600">S�lectionnez la cat�gorie correspondant � votre besoin parmi nos diff�rents guides disponibles.</p>
            </div>
            
            <div class="step-item">
                <div class="step-number">2</div>
                <h3 class="text-xl font-semibold mb-2">Consultez les informations</h3>
                <p class="text-gray-600">Parcourez nos contenus clairs et d�taill�s, r�dig�s par nos experts.</p>
            </div>
            
            <div class="step-item">
                <div class="step-number">3</div>
                <h3 class="text-xl font-semibold mb-2">T�l�chargez les mod�les</h3>
                <p class="text-gray-600">Acc�dez � nos mod�les de documents pr�ts � l'emploi pour gagner du temps.</p>
            </div>
            
            <div class="step-item">
                <div class="step-number">4</div>
                <h3 class="text-xl font-semibold mb-2">Contactez-nous si besoin</h3>
                <p class="text-gray-600">Notre �quipe reste � votre disposition pour un accompagnement personnalis�.</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold mb-6">Vous avez encore des questions ?</h2>
        <p class="text-xl mb-8 max-w-2xl mx-auto text-gray-600">
            Notre �quipe d'experts est � votre disposition pour vous accompagner dans toutes vos d�marches.
        </p>
        <a href="{{ route('contact') }}" class="bg-blue-600 text-white font-semibold px-8 py-3 rounded-lg inline-flex items-center hover:bg-blue-700 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
            </svg>
            Contactez-nous
        </a>
    </div>
</section>

<script>
    // Script pour l'accord�on FAQ
    document.querySelectorAll('.accordion-header').forEach(header => {
        header.addEventListener('click', () => {
            const item = header.parentElement;
            item.classList.toggle('active');
            
            // Fermer les autres items
            document.querySelectorAll('.accordion-item').forEach(otherItem => {
                if (otherItem !== item && otherItem.classList.contains('active')) {
                    otherItem.classList.remove('active');
                }
            });
        });
    });
</script>
@endsection