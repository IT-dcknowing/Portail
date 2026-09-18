@extends('layouts.golden')

@section('title', 'Nos Offres de Services - DC-KNOWING')

@section('content')
<style>
    .offres-page-section { background: var(--noir); color: var(--blanc); }
    .offre-card {
        background: var(--gris);
        border: 1px solid var(--ligne);
        padding: 40px 30px;
        transition: all 0.4s var(--transition);
        position: relative;
        overflow: hidden;
        height: 100%;
        display: flex;
        flex-direction: column;
    }
    .offre-card:hover {
        border-color: var(--or-base);
        transform: translateY(-5px);
    }
    .offre-badge {
        position: absolute;
        top: 20px;
        right: 20px;
        background: var(--or-degrade);
        color: #1A1000;
        font-size: 10px;
        font-weight: 700;
        padding: 4px 12px;
        letter-spacing: 1px;
        text-transform: uppercase;
    }
    .offre-icon {
        width: 50px;
        height: 50px;
        border: 1px solid var(--ligne);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        margin-bottom: 30px;
        color: var(--or-base);
    }
    .offre-title {
        font-size: 24px;
        font-weight: 600;
        margin-bottom: 10px;
        background: var(--or-degrade);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    .offre-price {
        font-size: 18px;
        font-weight: 700;
        color: var(--blanc);
        margin-bottom: 24px;
    }
    .offre-feature-list {
        list-style: none;
        padding: 0;
        margin: 0 0 30px 0;
        flex-grow: 1;
    }
    .offre-feature-item {
        display: flex;
        align-items: flex-start;
        gap: 12px;
        font-size: 14px;
        color: rgba(250, 248, 244, 0.6);
        margin-bottom: 12px;
    }
    .offre-feature-item i {
        color: var(--or-base);
        margin-top: 3px;
    }
    .offre-adh-note {
        font-size: 11px;
        color: rgba(250, 248, 244, 0.3);
        font-style: italic;
        margin-top: auto;
        padding-top: 20px;
    }
    .btn-add-offre {
        background: transparent;
        border: 1px solid var(--ligne);
        color: var(--blanc);
        padding: 14px 24px;
        font-size: 12px;
        font-weight: 600;
        letter-spacing: 1px;
        text-transform: uppercase;
        transition: all 0.3s;
        cursor: none;
        margin-top: 24px;
    }
    .btn-add-offre:hover {
        background: var(--or-degrade);
        color: #1A1000;
        border-color: transparent;
    }
    .return-link {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: rgba(250, 248, 244, 0.5);
        text-decoration: none;
        font-size: 14px;
        margin-bottom: 40px;
        transition: color 0.3s;
    }
    .return-link:hover { color: var(--or-base); }
</style>

<section class="offres-page-section py-20">
    <div class="container mx-auto px-6">
        
        <a href="javascript:history.back()" class="return-link">
            <i class="ri-arrow-left-line"></i>
            <span>Retour</span>
        </a>
        
        <div class="section-header mb-16">
            <div class="section-tag">Catalogue</div>
            <h2 class="section-title">Nos <em>Offres</em><strong>de Services</strong></h2>
            <p class="section-intro">
                Cabinet agréé FDFP et MBPE (Agrément N° 296/SEPMBPE/DGI), nous développons des compétences pointues pour accompagner la performance de vos équipes.
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            {{-- Offre 1 --}}
            <div class="offre-card">
                <div class="offre-badge">Offre 1</div>
                <div class="offre-icon"><i class="ri-numbers-line"></i></div>
                <h3 class="offre-title">TEE</h3>
                <div class="offre-price">60.000 F / an <span style="font-size:12px; font-weight:400; color:rgba(255,255,255,0.4)">(5.000 F/mois)</span></div>
                
                <ul class="offre-feature-list">
                    <li class="offre-feature-item"><i class="ri-check-line"></i><span>Critère : CA ≤ 15 millions</span></li>
                    <li class="offre-feature-item"><i class="ri-check-line"></i><span>Déclaration annuelle TEE incluse</span></li>
                    <li class="offre-feature-item"><i class="ri-check-line"></i><span>Comptabilité & Juridique sur demande</span></li>
                </ul>
                
                <div class="offre-adh-note">Droit d'adhésion : 25.000 F</div>
                <button onclick="openModal('Offre 1')" class="btn-add-offre">Ajouter au devis</button>
            </div>

            {{-- Offre 2 --}}
            <div class="offre-card">
                <div class="offre-badge">Offre 2</div>
                <div class="offre-icon"><i class="ri-briefcase-line"></i></div>
                <h3 class="offre-title">TEE</h3>
                <div class="offre-price">360.000 F / an <span style="font-size:12px; font-weight:400; color:rgba(255,255,255,0.4)">(30.000 F/mois)</span></div>
                
                <ul class="offre-feature-list">
                    <li class="offre-feature-item"><i class="ri-check-line"></i><span>Critère : 15M < CA ≤ 30 millions</span></li>
                    <li class="offre-feature-item"><i class="ri-check-line"></i><span>Supervision comptable (max 50 op./mois)</span></li>
                    <li class="offre-feature-item"><i class="ri-check-line"></i><span>Déclarations TEE annuelles</span></li>
                    <li class="offre-feature-item"><i class="ri-check-line"></i><span>Déclarations CNPS & DISA</span></li>
                </ul>
                
                <div class="offre-adh-note">Droit d'adhésion : 25.000 F</div>
                <button onclick="openModal('Offre 2')" class="btn-add-offre">Ajouter au devis</button>
            </div>

            {{-- Offre 3 --}}
            <div class="offre-card">
                <div class="offre-badge">Offre 3</div>
                <div class="offre-icon"><i class="ri-line-chart-line"></i></div>
                <h3 class="offre-title">TEE</h3>
                <div class="offre-price">504.000 F / an <span style="font-size:12px; font-weight:400; color:rgba(255,255,255,0.4)">(42.000 F/mois)</span></div>
                
                <ul class="offre-feature-list">
                    <li class="offre-feature-item"><i class="ri-check-line"></i><span>Critère : 30M < CA ≤ 50 millions</span></li>
                    <li class="offre-feature-item"><i class="ri-check-line"></i><span>Régularisation complète SYSCOHADA</span></li>
                    <li class="offre-feature-item"><i class="ri-check-line"></i><span>Établissement de TOUTES les déclarations</span></li>
                    <li class="offre-feature-item"><i class="ri-check-line"></i><span>Assistance juridique & sociale complète</span></li>
                </ul>
                
                <div class="offre-adh-note">Droit d'adhésion : 25.000 F</div>
                <button onclick="openModal('Offre 3')" class="btn-add-offre">Ajouter au devis</button>
            </div>

            {{-- RME --}}
            <div class="offre-card">
                <div class="offre-badge">RME</div>
                <div class="offre-icon"><i class="ri-building-line"></i></div>
                <h3 class="offre-title">Micro-Entreprise</h3>
                <div class="offre-price">1.020.000 F / an <span style="font-size:12px; font-weight:400; color:rgba(255,255,255,0.4)">(85.000 F/mois)</span></div>
                
                <ul class="offre-feature-list">
                    <li class="offre-feature-item"><i class="ri-check-line"></i><span>Critère : CA > 50 millions</span></li>
                    <li class="offre-feature-item"><i class="ri-check-line"></i><span>Révision et veille fiscale permanente</span></li>
                    <li class="offre-feature-item"><i class="ri-check-line"></i><span>Gestion des paies, ruptures & DISA</span></li>
                    <li class="offre-feature-item"><i class="ri-check-line"></i><span>Supervision comptable approfondie</span></li>
                </ul>
                
                <div class="offre-adh-note">Droit d'adhésion : 35.000 F</div>
                <button onclick="openModal('RME')" class="btn-add-offre">Ajouter au devis</button>
            </div>
            
        </div>
    </div>
</section>

<!-- MODAL FORMULAIRE -->
<div id="offre-form-modal" class="fixed inset-0 bg-black bg-opacity-80 hidden items-center justify-center z-[2000] p-4">
    <div class="bg-gray-900 border border-yellow-500/30 rounded-lg p-8 w-full max-w-lg relative shadow-2xl">
        <button onclick="closeModal()" class="absolute top-4 right-4 text-gray-400 hover:text-white transition">
            <i class="ri-close-line ri-xl"></i>
        </button>
        <h2 class="text-2xl font-bold mb-6 text-white">Souscription : <span id="offre_title_display" class="text-yellow-500"></span></h2>
        <form method="POST" action="">
            @csrf
            <input type="hidden" name="offre_type" id="offre_type">
            <div class="mb-5">
                <label class="block text-gray-400 text-sm font-medium mb-2 uppercase tracking-wider">Nom de l'entreprise *</label>
                <input type="text" name="company_name" class="w-full bg-black/50 border border-yellow-500/20 rounded px-4 py-3 text-white focus:outline-none focus:border-yellow-500 transition" required>
            </div>
            <div class="mb-5">
                <label class="block text-gray-400 text-sm font-medium mb-2 uppercase tracking-wider">Numéro SIRET / RCCM *</label>
                <input type="text" name="siret" class="w-full bg-black/50 border border-yellow-500/20 rounded px-4 py-3 text-white focus:outline-none focus:border-yellow-500 transition" required>
            </div>
            <div class="mb-6">
                <label class="block text-gray-400 text-sm font-medium mb-2 uppercase tracking-wider">Email de contact</label>
                <input type="email" name="contact_email" class="w-full bg-black/50 border border-yellow-500/20 rounded px-4 py-3 text-white focus:outline-none focus:border-yellow-500 transition">
            </div>
            <button type="submit" class="w-full bg-yellow-500 hover:bg-yellow-400 text-black py-4 px-6 rounded font-bold uppercase tracking-widest transition transform hover:-translate-y-1">Confirmer la demande</button>
        </form>
    </div>
</div>

<script>
function openModal(offre) {
    document.getElementById('offre_type').value = offre;
    document.getElementById('offre_title_display').textContent = offre;
    const modal = document.getElementById('offre-form-modal');
    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

function closeModal() {
    const modal = document.getElementById('offre-form-modal');
    modal.classList.remove('flex');
    modal.classList.add('hidden');
}
</script>
@endsection
