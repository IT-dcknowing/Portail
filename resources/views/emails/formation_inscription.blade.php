<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Nouvelle Pré-inscription Formation</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #0d0d0d; color: #f5f5f5; margin: 0; padding: 0; }
        .container { max-width: 600px; margin: 20px auto; background-color: #1a1a1a; border: 1px solid #c5a059; padding: 30px; }
        .header { text-align: center; border-bottom: 2px solid #c5a059; padding-bottom: 20px; margin-bottom: 30px; }
        .logo { font-size: 24px; font-weight: bold; color: #c5a059; text-transform: uppercase; letter-spacing: 2px; }
        .subtitle { font-size: 13px; color: rgba(255,255,255,0.4); margin-top: 4px; text-transform: uppercase; letter-spacing: 1px; }
        .title { font-size: 20px; margin: 10px 0 0 0; color: #ffffff; }
        .section { margin-bottom: 25px; background: #262626; padding: 20px; border-radius: 4px; }
        .section-title { font-size: 14px; text-transform: uppercase; color: #c5a059; margin-bottom: 15px; font-weight: bold; border-bottom: 1px solid #333; padding-bottom: 5px; }
        .detail-row { display: flex; justify-content: space-between; margin-bottom: 8px; border-bottom: 1px solid #2a2a2a; padding-bottom: 5px; }
        .label { color: #888; font-size: 13px; }
        .value { color: #fff; font-weight: 600; font-size: 14px; text-align: right; max-width: 65%; }
        .highlight-box { background: linear-gradient(135deg, #c5a059 0%, #9a7b41 100%); color: #000; padding: 16px 20px; margin-top: 20px; }
        .highlight-text { font-size: 14px; font-weight: 700; }
        .message-box { background: #1a1a1a; border: 1px solid #333; padding: 14px; font-size: 13px; color: rgba(255,255,255,0.7); line-height: 1.6; font-style: italic; }
        .footer { text-align: center; margin-top: 40px; font-size: 12px; color: #666; border-top: 1px solid #333; padding-top: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo">DC-KNOWING</div>
            <div class="subtitle">DC Formation × DC-KNOWING Academy</div>
            <p class="title">Nouvelle Pré-inscription Formation</p>
        </div>

        <div style="padding: 0 0 20px; font-size: 14px; color: rgba(255,255,255,0.6); line-height: 1.7;">
            Bonjour,<br>
            Une nouvelle demande de pré-inscription a été reçue via le portail <strong style="color:#c5a059;">DC-KNOWING Academy</strong>.
        </div>

        <!-- Formation choisie -->
        <div class="section">
            <div class="section-title">Formation Demandée</div>
            @php
                $formationLabels = [
                    'pack_forfaitaire' => 'Pack Forfaitaire (2 mois — CAPG)',
                    'fne'              => 'FNE — Facture Normalisée Électronique',
                    'eimpots'          => 'E-impôts — Télédéclaration DGI',
                    'syscohada'        => 'SYSCOHADA Révisé',
                    'paie'             => 'Gestion de Paie & CNPS/CMU',
                ];
                $formationLabel = $formationLabels[$data['formation']] ?? $data['formation'];
            @endphp
            <div class="highlight-box">
                <div class="highlight-text">{{ $formationLabel }}</div>
            </div>
            <div class="detail-row" style="margin-top:16px;">
                <span class="label">Ville :</span>
                <span class="value">{{ ucfirst($data['ville'] ?? 'Non précisée') }}</span>
            </div>
        </div>

        <!-- Informations du candidat -->
        <div class="section">
            <div class="section-title">Informations du Candidat</div>
            <div class="detail-row">
                <span class="label">Nom complet :</span>
                <span class="value">{{ $data['nom'] ?? 'Non précisé' }}</span>
            </div>
            <div class="detail-row">
                <span class="label">Email :</span>
                <span class="value">{{ $data['email'] ?? 'Non précisé' }}</span>
            </div>
            <div class="detail-row">
                <span class="label">Téléphone WhatsApp :</span>
                <span class="value">{{ $data['telephone'] ?? 'Non précisé' }}</span>
            </div>
        </div>

        <!-- Message optionnel -->
        @if(!empty($data['message']))
        <div class="section">
            <div class="section-title">Message du Candidat</div>
            <div class="message-box">{{ $data['message'] }}</div>
        </div>
        @endif

        <div class="footer">
            <p>Cet e-mail a été généré automatiquement par le portail DC-KNOWING.</p>
            <p>© 2026 DC-KNOWING. Tous droits réservés.</p>
        </div>
    </div>
</body>
</html>
