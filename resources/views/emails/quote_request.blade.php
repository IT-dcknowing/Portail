<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Nouvelle Demande de Devis</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #0d0d0d; color: #f5f5f5; margin: 0; padding: 0; }
        .container { max-width: 600px; margin: 20px auto; background-color: #1a1a1a; border: 1px solid #c5a059; padding: 30px; }
        .header { text-align: center; border-bottom: 2px solid #c5a059; padding-bottom: 20px; margin-bottom: 30px; }
        .logo { font-size: 24px; font-weight: bold; color: #c5a059; text-transform: uppercase; letter-spacing: 2px; }
        .title { font-size: 20px; margin: 10px 0 0 0; color: #ffffff; }
        .section { margin-bottom: 25px; background: #262626; padding: 20px; border-radius: 4px; }
        .section-title { font-size: 14px; text-transform: uppercase; color: #c5a059; margin-bottom: 15px; font-weight: bold; border-bottom: 1px solid #333; padding-bottom: 5px; }
        .detail-row { display: flex; justify-content: space-between; margin-bottom: 8px; border-bottom: 1px solid #333; padding-bottom: 5px; }
        .label { color: #888; font-size: 13px; }
        .value { color: #fff; font-weight: 600; font-size: 14px; }
        .total-box { background: linear-gradient(135deg, #c5a059 0%, #9a7b41 100%); color: #000; padding: 20px; text-align: right; margin-top: 20px; }
        .total-label { font-size: 12px; text-transform: uppercase; font-weight: bold; }
        .total-value { font-size: 24px; font-weight: 800; }
        .footer { text-align: center; margin-top: 40px; font-size: 12px; color: #666; border-top: 1px solid #333; padding-top: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo">DC-KNOWING</div>
            <p class="title">Nouvelle Demande de Devis</p>
        </div>

        <div class="content">
            <p>Bonjour,</p>
            <p>Une nouvelle demande de devis a été générée sur le portail <strong>DC-KNOWING</strong>.</p>

            <!-- Informations Client -->
            <div class="section">
                <div class="section-title">Informations Client</div>
                <div class="detail-row">
                    <span class="label">Nom :</span>
                    <span class="value">{{ $devis['client'] ?? 'Non précisé' }}</span>
                </div>
                <div class="detail-row">
                    <span class="label">Email :</span>
                    <span class="value">{{ $devis['email'] ?? 'Non précisé' }}</span>
                </div>
                <div class="detail-row">
                    <span class="label">Téléphone :</span>
                    <span class="value">{{ $devis['tel'] ?? 'Non précisé' }}</span>
                </div>
                <div class="detail-row">
                    <span class="label">Entreprise :</span>
                    <span class="value">{{ $devis['entreprise'] ?? 'Non précisé' }}</span>
                </div>
                <div class="detail-row">
                    <span class="label">Forme Juridique :</span>
                    <span class="value">{{ $devis['forme'] ?? 'Non précisée' }}</span>
                </div>
            </div>

            <!-- Détails du Devis -->
            <div class="section">
                <div class="section-title">Détails du Projet</div>
                <div class="detail-row">
                    <span class="label">Référence :</span>
                    <span class="value">{{ $devis['id'] ?? 'N/A' }}</span>
                </div>
                <div class="detail-row">
                    <span class="label">Date :</span>
                    <span class="value">{{ $devis['date'] ?? 'N/A' }}</span>
                </div>
                <div class="detail-row">
                    <span class="label">Offre :</span>
                    <span class="value">{{ $devis['offre'] ?? 'N/A' }}</span>
                </div>
                @if(!empty($devis['objet']))
                <div class="detail-row">
                    <span class="label">Objet :</span>
                    <span class="value">{{ $devis['objet'] }}</span>
                </div>
                @endif
                @if(!empty($devis['dateDemarrage']))
                <div class="detail-row">
                    <span class="label">Démarrage souhaité :</span>
                    <span class="value">{{ $devis['dateDemarrage'] }}</span>
                </div>
                @endif
            </div>

            <!-- Montant -->
            @php
                $montant = $devis['montant'] ?? 0;
            @endphp

            @if($montant > 0)
            <div class="total-box">
                @php
                    $tva = round($montant * 0.18);
                    $ttc = $montant + $tva;
                @endphp
                <div class="total-label">Montant HT : {{ number_format($montant, 0, ',', ' ') }} FCFA</div>
                <div class="total-label" style="margin-bottom: 10px;">TVA (18%) : {{ number_format($tva, 0, ',', ' ') }} FCFA</div>
                <div class="total-value">Total TTC : {{ number_format($ttc, 0, ',', ' ') }} FCFA</div>
            </div>
            @else
            <div class="section" style="text-align: center; color: #c5a059; font-weight: bold;">
                Tarif sur devis personnalisé
            </div>
            @endif
        </div>

        <div class="footer">
            <p>Cet e-mail a été généré automatiquement par le portail DC-KNOWING.</p>
            <p>© 2026 DC-KNOWING. Tous droits réservés.</p>
        </div>
    </div>
</body>
</html>
