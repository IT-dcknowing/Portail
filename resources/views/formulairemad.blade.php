@extends('layouts.app')

@section('title', 'Inscription DC-KNOWING Academy')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-gray-900 px-4">
    <div class="bg-black rounded-lg shadow-lg p-6 max-w-xl w-full text-white">
        <div class="text-center mb-6">
            <h1 class="text-4xl md:text-5xl font-bold mb-2">
                FORMULAIRE D'INSCRIPTION <span class="gradient-text">DC-KNOWING ACADEMY</span>
            </h1>
            <p class="text-lg text-gray-300 mb-4 max-w-3xl mx-auto">
                DC-KNOWING Academy – étape finale.
            </p>
        </div>

        @if(session('success'))
            <div id="success-message" class="mb-4 p-4 bg-green-500 text-white rounded-lg shadow-lg flex items-center justify-between">
                <span>{{ session('success') }}</span>
                <button onclick="closeMessage('success-message')" class="text-white hover:text-gray-200">✖</button>
            </div>
        @endif

        @if($errors->any())
            <div id="validation-errors" class="mb-4 p-4 bg-orange-500 text-white rounded-lg shadow-lg">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button onclick="closeMessage('validation-errors')" class="text-white hover:text-gray-200 mt-2">✖</button>
            </div>
        @endif

        <form method="POST" action="">
            @csrf

            <!-- Informations personnelles -->
            <div class="mb-4">
                <label class="block text-yellow-400 mb-1">Nom *</label>
                <input type="text" name="nom" class="w-full px-3 py-2 rounded text-black" required>
            </div>
            <div class="mb-4">
                <label class="block text-yellow-400 mb-1">Prénoms *</label>
                <input type="text" name="prenom" class="w-full px-3 py-2 rounded text-black" required>
            </div>
            <div class="mb-4">
                <label class="block text-yellow-400 mb-1">Email *</label>
                <input type="email" name="email" class="w-full px-3 py-2 rounded text-black" required>
            </div>
            <div class="mb-4">
                <label class="block text-yellow-400 mb-1">Numéro de téléphone *</label>
                <input type="text" name="telephone" class="w-full px-3 py-2 rounded text-black" required>
            </div>
            <div class="mb-4">
                <label class="block text-yellow-400 mb-1">Niveau d'études *</label>
                <select name="niveau" class="w-full px-3 py-2 rounded text-black" required>
                    <option value="">Sélectionnez votre niveau</option>
                    <option value="Bac">Baccalauréat</option>
                    <option value="Bac+2">Bac +2 (BTS, DUT, Licence 2)</option>
                    <option value="Bac+3">Bac +3 (Licence)</option>
                    <option value="Bac+4">Bac +4 (Master 1)</option>
                    <option value="Bac+5">Bac +5 et plus (Master 2, Doctorat)</option>
                    <option value="Autres">Autres</option>
                </select>
            </div>

            <!-- Modules d'intérêt -->
            <div class="mb-4">
                <label class="block text-yellow-400 mb-1">Modules d'intérêt *</label>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
                    @php
                    $modules = [
                        'Comptabilité', 'Fiscalité', 'Marketing et Vente', 'Droit des Affaires',
                        'Bureautique avancée (Word, Excel, PowerPoint)',
                        'Outils informatiques de gestion (SAGE, Odoo, Flow)',
                        'Français professionnel', 'Anglais professionnel'
                    ];
                    @endphp
                    @foreach($modules as $module)
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="modules[]" value="{{ $module }}" class="form-checkbox h-5 w-5 text-yellow-400">
                        <span class="ml-2">{{ $module }}</span>
                    </label>
                    @endforeach
                </div>
            </div>

            <!-- Attentes vis-à-vis de la formation -->
            <div class="mb-4">
                <label class="block text-yellow-400 mb-1">Vos attentes vis-à-vis de cette formation *</label>
                <textarea name="attentes" placeholder="Décrivez vos objectifs et votre projet professionnel..." class="w-full px-3 py-2 rounded text-black" rows="4" required></textarea>
            </div>

            <!-- Mode de paiement -->
            <div class="mb-4">
                <label class="block text-yellow-400 mb-1">Mode de paiement *</label>
                <p class="text-sm mb-2 text-gray-300">Rappel : Les frais d'inscription de 50 000 FCFA doivent être réglés avant le 17 février 2025.</p>
                <label class="inline-flex items-center mb-1">
                    <input type="radio" name="paiement" value="Espèce" class="form-radio text-yellow-400" required>
                    <span class="ml-2">Espèce au cabinet</span>
                </label>
                <label class="inline-flex items-center mb-1">
                    <input type="radio" name="paiement" value="Orange Money" class="form-radio text-yellow-400">
                    <span class="ml-2">Orange Money</span>
                </label>
                <label class="inline-flex items-center">
                    <input type="radio" name="paiement" value="Wave" class="form-radio text-yellow-400">
                    <span class="ml-2">Wave</span>
                </label>
            </div>

    
            

            <!-- Confirmation -->
            <div class="mb-4">
                <label class="inline-flex items-center">
                    <input type="checkbox" name="confirm" required class="form-checkbox text-yellow-400">
                    <span class="ml-2">Je confirme l'exactitude des informations fournies et je m'engage à régler les frais d'inscription selon les modalités choisies.</span>
                </label>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-yellow-400 text-black font-bold px-6 py-2 rounded">
                    Valider mon inscription
                </button>
            </div>
        </form>
    </div>
</div>

<style>
.gradient-text {
    background: linear-gradient(90deg,#000 0%,#000 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}
</style>

@section('scripts')
<script>
function closeMessage(elementId){
    const el = document.getElementById(elementId);
    if(el){ el.remove(); }
}

// Récapitulatif dynamique
document.addEventListener('DOMContentLoaded', function(){
    const inputs = document.querySelectorAll('input, select, textarea');
    const recapNom = document.getElementById('recap-nom');
    const recapPrenom = document.getElementById('recap-prenom');
    const recapEmail = document.getElementById('recap-email');
    const recapTel = document.getElementById('recap-telephone');
    const recapNiveau = document.getElementById('recap-niveau');
    const recapModules = document.getElementById('recap-modules');
    const recapPaiement = document.getElementById('recap-paiement');

    function updateRecap(){
        recapNom.textContent = document.querySelector('input[name="nom"]').value;
        recapPrenom.textContent = document.querySelector('input[name="prenom"]').value;
        recapEmail.textContent = document.querySelector('input[name="email"]').value;
        recapTel.textContent = document.querySelector('input[name="telephone"]').value;
        recapNiveau.textContent = document.querySelector('select[name="niveau"]').value;
        const modules = Array.from(document.querySelectorAll('input[name="modules[]"]:checked')).map(m=>m.value);
        recapModules.textContent = modules.join(', ');
        const paiement = document.querySelector('input[name="paiement"]:checked');
        recapPaiement.textContent = paiement ? paiement.value : '';
    }

    inputs.forEach(input => input.addEventListener('change', updateRecap));
    updateRecap();
});
</script>
@endsection
