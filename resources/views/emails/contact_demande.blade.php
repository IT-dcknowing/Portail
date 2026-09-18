<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Nouvelle Demande de Contact</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #0d0d0d; color: #f5f5f5; margin: 0; padding: 0; }
        .container { max-width: 600px; margin: 20px auto; background-color: #1a1a1a; border: 1px solid #c5a059; padding: 30px; }
        .header { text-align: center; border-bottom: 2px solid #c5a059; padding-bottom: 20px; margin-bottom: 30px; }
        .logo { font-size: 24px; font-weight: bold; color: #c5a059; text-transform: uppercase; letter-spacing: 2px; }
        .subtitle { font-size: 12px; color: rgba(255,255,255,0.35); text-transform: uppercase; letter-spacing: 1.5px; margin-top: 4px; }
        .title { font-size: 20px; margin: 10px 0 0 0; color: #ffffff; }
        .section { margin-bottom: 20px; background: #262626; padding: 20px; }
        .section-title { font-size: 13px; text-transform: uppercase; color: #c5a059; margin-bottom: 14px; font-weight: bold; border-bottom: 1px solid #333; padding-bottom: 5px; letter-spacing: 1px; }
        .detail-row { display: flex; justify-content: space-between; margin-bottom: 7px; border-bottom: 1px solid #2a2a2a; padding-bottom: 7px; }
        .detail-row:last-child { border-bottom: none; margin-bottom: 0; padding-bottom: 0; }
        .label { color: #888; font-size: 12px; }
        .value { color: #fff; font-weight: 600; font-size: 13px; text-align: right; }
        .besoin-box { background: #1a1a1a; border: 1px solid #333; padding: 14px; font-size: 13px; color: rgba(255,255,255,0.7); line-height: 1.7; font-style: italic; }
        .badge { display: inline-block; background: linear-gradient(135deg, #c5a059 0%, #9a7b41 100%); color: #000; padding: 6px 16px; font-size: 12px; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 20px; }
        .footer { text-align: center; margin-top: 30px; font-size: 11px; color: #555; border-top: 1px solid #2a2a2a; padding-top: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo">DC-KNOWING</div>
            <div class="subtitle">Consultation Offerte — 30 minutes</div>
            <p class="title">Nouvelle Demande de Contact</p>
        </div>

        <div style="font-size:14px; color:rgba(255,255,255,0.6); line-height:1.7; margin-bottom:20px;">
            Bonjour,<br>
            Un prospect a soumis une demande de contact via le portail <strong style="color:#c5a059;">DC-KNOWING</strong>.
        </div>

        <div class="badge">À contacter rapidement</div>

        <!-- Informations du prospect -->
        <div class="section">
            <div class="section-title">Informations du Prospect</div>
            <div class="detail-row">
                <span class="label">Nom :</span>
                <span class="value">{{ $data['nom'] ?? 'Non précisé' }}</span>
            </div>
            <div class="detail-row">
                <span class="label">Email :</span>
                <span class="value">{{ $data['email'] ?? 'Non précisé' }}</span>
            </div>
            @if(!empty($data['telephone']))
            <div class="detail-row">
                <span class="label">Téléphone :</span>
                <span class="value">{{ $data['telephone'] }}</span>
            </div>
            @endif
            @if(!empty($data['entreprise']))
            <div class="detail-row">
                <span class="label">Entreprise :</span>
                <span class="value">{{ $data['entreprise'] }}</span>
            </div>
            @endif
        </div>

        <!-- Besoin exprimé -->
        @if(!empty($data['besoin']))
        <div class="section">
            <div class="section-title">Besoin Exprimé</div>
            <div class="besoin-box">{{ $data['besoin'] }}</div>
        </div>
        @endif

        <div class="footer">
            <p>Cet e-mail a été généré automatiquement par le portail DC-KNOWING.</p>
            <p>© 2026 DC-KNOWING. Tous droits réservés.</p>
        </div>
    </div>
</body>
</html>
