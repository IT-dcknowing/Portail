<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Nouvelle Adhésion CGA</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #0d0d0d; color: #f5f5f5; margin: 0; padding: 0; }
        .container { max-width: 620px; margin: 20px auto; background-color: #1a1a1a; border: 1px solid #c5a059; padding: 30px; }
        .header { text-align: center; border-bottom: 2px solid #c5a059; padding-bottom: 20px; margin-bottom: 30px; }
        .logo { font-size: 24px; font-weight: bold; color: #c5a059; text-transform: uppercase; letter-spacing: 2px; }
        .subtitle { font-size: 12px; color: rgba(255,255,255,0.35); text-transform: uppercase; letter-spacing: 1.5px; margin-top: 4px; }
        .title { font-size: 20px; margin: 10px 0 0 0; color: #ffffff; }
        .section { margin-bottom: 20px; background: #262626; padding: 20px; }
        .section-title { font-size: 13px; text-transform: uppercase; color: #c5a059; margin-bottom: 14px; font-weight: bold; border-bottom: 1px solid #333; padding-bottom: 5px; letter-spacing: 1px; }
        .detail-row { display: flex; justify-content: space-between; margin-bottom: 7px; border-bottom: 1px solid #2a2a2a; padding-bottom: 7px; }
        .detail-row:last-child { border-bottom: none; margin-bottom: 0; padding-bottom: 0; }
        .label { color: #888; font-size: 12px; }
        .value { color: #fff; font-weight: 600; font-size: 13px; text-align: right; max-width: 60%; }
        .highlight-box { background: linear-gradient(135deg, #c5a059 0%, #9a7b41 100%); color: #000; padding: 14px 20px; text-align: center; margin: 20px 0; }
        .highlight-text { font-size: 15px; font-weight: 800; text-transform: uppercase; letter-spacing: 1px; }
        .footer { text-align: center; margin-top: 30px; font-size: 11px; color: #555; border-top: 1px solid #2a2a2a; padding-top: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo">DC-KNOWING</div>
            <div class="subtitle">Centre de Gestion Agréé</div>
            <p class="title">Nouvelle Adhésion CGA</p>
        </div>

        <div style="font-size:14px; color:rgba(255,255,255,0.6); line-height:1.7; margin-bottom:20px;">
            Bonjour,<br>
            Une nouvelle demande d'adhésion CGA a été soumise via le portail <strong style="color:#c5a059;">DC-KNOWING</strong>.
        </div>

        <!-- Adhésion validée -->
        <div class="highlight-box">
            <div class="highlight-text">Cotisation annuelle à partir de 120 000 FCFA HT</div>
        </div>

        <!-- Infos Contact -->
        <div class="section">
            <div class="section-title">Informations du Dirigeant</div>
            <div class="detail-row">
                <span class="label">Nom :</span>
                <span class="value">{{ $data['nom'] ?? 'Non précisé' }}</span>
            </div>
            <div class="detail-row">
                <span class="label">Email :</span>
                <span class="value">{{ $data['email'] ?? 'Non précisé' }}</span>
            </div>
            <div class="detail-row">
                <span class="label">Téléphone :</span>
                <span class="value">{{ $data['telephone'] ?? 'Non précisé' }}</span>
            </div>
            <div class="detail-row">
                <span class="label">Ville :</span>
                <span class="value">{{ $data['ville'] ?? 'Non précisée' }}</span>
            </div>
        </div>

        <!-- Infos Entreprise -->
        <div class="section">
            <div class="section-title">Informations Entreprise</div>
            <div class="detail-row">
                <span class="label">Entreprise :</span>
                <span class="value">{{ $data['entreprise'] ?? $data['nom_commercial'] ?? 'Non précisée' }}</span>
            </div>
            <div class="detail-row">
                <span class="label">Forme Juridique :</span>
                <span class="value">{{ $data['statut'] ?? 'Non précisée' }}</span>
            </div>
            @if(!empty($data['rccm']))
            <div class="detail-row">
                <span class="label">RCCM :</span>
                <span class="value">{{ $data['rccm'] }}</span>
            </div>
            @endif
            @if(!empty($data['capital']))
            <div class="detail-row">
                <span class="label">Capital :</span>
                <span class="value">{{ $data['capital'] }} FCFA</span>
            </div>
            @endif
            @if(!empty($data['secteur']))
            <div class="detail-row">
                <span class="label">Secteur :</span>
                <span class="value">{{ $data['secteur'] }}</span>
            </div>
            @endif
            @if(!empty($data['effectif']))
            <div class="detail-row">
                <span class="label">Effectif :</span>
                <span class="value">{{ $data['effectif'] }} employé(s)</span>
            </div>
            @endif
            @if(!empty($data['type_regime']))
            <div class="detail-row">
                <span class="label">Régime fiscal :</span>
                <span class="value">{{ $data['type_regime'] }}</span>
            </div>
            @endif
        </div>

        @if(!empty($data['message']))
        <div class="section">
            <div class="section-title">Message</div>
            <p style="font-size:13px; color:rgba(255,255,255,0.65); line-height:1.6; font-style:italic; margin:0;">{{ $data['message'] }}</p>
        </div>
        @endif

        <div class="footer">
            <p>Cet e-mail a été généré automatiquement par le portail DC-KNOWING.</p>
            <p>© 2026 DC-KNOWING. Tous droits réservés.</p>
        </div>
    </div>
</body>
</html>
