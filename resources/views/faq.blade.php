@extends('layouts.app')

@section('title', 'FAQ - Questions fréquentes')

@section('content')
<div class="bg-white">
    <div class="max-w-7xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:px-8">
        <div class="max-w-3xl mx-auto divide-y-2 divide-gray-200">
            <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                Questions fréquentes
            </h2>
            <dl class="mt-6 space-y-6 divide-y divide-gray-200">
                <div class="pt-6">
                    <dt class="text-lg">
                        <button class="text-left w-full flex justify-between items-start text-gray-400">
                            <span class="font-medium text-gray-900">Combien de temps prend la création d'entreprise ?</span>
                        </button>
                    </dt>
                    <dd class="mt-2 pr-12">
                        <p class="text-base text-gray-500">La création d'entreprise avec notre service prend en moyenne 7 jours ouvrés à partir du moment où tous les documents nécessaires ont été fournis et validés.</p>
                    </dd>
                </div>

                <div class="pt-6">
                    <dt class="text-lg">
                        <button class="text-left w-full flex justify-between items-start text-gray-400">
                            <span class="font-medium text-gray-900">Quels documents dois-je fournir ?</span>
                        </button>
                    </dt>
                    <dd class="mt-2 pr-12">
                        <p class="text-base text-gray-500">Les documents nécessaires varient selon la forme juridique, mais généralement, vous aurez besoin d'une pièce d'identité, d'un justificatif de domicile, d'une attestation de dépôt de capital et d'un justificatif du local professionnel.</p>
                    </dd>
                </div>

                <div class="pt-6">
                    <dt class="text-lg">
                        <button class="text-left w-full flex justify-between items-start text-gray-400">
                            <span class="font-medium text-gray-900">Quelle forme juridique est la plus adaptée pour mon entreprise ?</span>
                        </button>
                    </dt>
                    <dd class="mt-2 pr-12">
                        <p class="text-base text-gray-500">Le choix de la forme juridique dépend de plusieurs facteurs : nombre d'associés, capital disponible, régime fiscal souhaité, etc. Nos experts peuvent vous conseiller sur la structure la plus adaptée à votre projet.</p>
                    </dd>
                </div>

                <div class="pt-6">
                    <dt class="text-lg">
                        <button class="text-left w-full flex justify-between items-start text-gray-400">
                            <span class="font-medium text-gray-900">Quels sont les frais de création d'entreprise ?</span>
                        </button>
                    </dt>
                    <dd class="mt-2 pr-12">
                        <p class="text-base text-gray-500">Les frais varient selon la forme juridique et les services choisis. Nous proposons des packs tout compris à partir de 99€ HT. Contactez-nous pour un devis personnalisé.</p>
                    </dd>
                </div>

                <div class="pt-6">
                    <dt class="text-lg">
                        <button class="text-left w-full flex justify-between items-start text-gray-400">
                            <span class="font-medium text-gray-900">Puis-je créer mon entreprise en ligne ?</span>
                        </button>
                    </dt>
                    <dd class="mt-2 pr-12">
                        <p class="text-base text-gray-500">Oui, notre service est 100% en ligne. Vous pouvez créer votre entreprise depuis chez vous, sans vous déplacer. Nos experts vous accompagnent à distance.</p>
                    </dd>
                </div>
            </dl>
        </div>
    </div>
</div>
@endsection 