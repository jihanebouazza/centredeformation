<!DOCTYPE html>
<html>

<head>
    <title>Certificat de Formation</title>
    <style>
        /* Styles CSS pour le certificat */
        body {
            font-family: Arial, sans-serif;
        }

        .certificat {
            width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            background-color: #f9f9f9;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
            color: #333;
            /* Couleur du titre */
        }

        .subtitle {
            font-size: 18px;
            margin-bottom: 20px;
            color: #555;
            /* Couleur du sous-titre */
        }

        .content {
            font-size: 16px;
            margin-bottom: 10px;
        }

        .frame {
            border: 4px solid #000;
            padding: 20px;
            background-color: #f5f5f5;
            /* Couleur de fond du cadre */
        }

        .highlight {
            font-weight: bold;
            color: #c0392b;
            /* Couleur pour mettre en évidence les éléments importants */
        }

        .navbar {
            background-color: #0B3D91;
            /* Couleur de fond de la barre de navigation */
            color: #fff;
            /* Couleur du texte de la barre de navigation */
            padding: 10px;
            margin-bottom: 20px;
        }

        .nav-item {
            display: inline-block;
            margin-right: 20px;
            font-size: 14px;
        }

        .description {
            font-size: 14px;
            color: #555;
            /* Couleur du texte de la description */
        }

        .signature {
            margin-top: 20px;
            text-align: right;
        }

        .director {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .director span {
            display: block;
        }

        .signature-image img {
            width: 150px;
            height: auto;
        }
    </style>
</head>

<body>
    <div class="navbar">
        <div class="nav-item"> Centre: MegaDev</div>
        <div class="nav-item"> E-mail: contact.megadev@gmail.com</div>
        <div class="nav-item">Tél: 05 37 81 12 68</div>
        <div class="nav-item">Salé 11003 Maroc</div>

    </div>


    <div class="certificat">
        <div class="header">
            <div class="title">Attestation de Réussite</div>
            <div class="subtitle">Certificat d'Accomplissement</div>
        </div>
        <div class="content frame">
            <p>Ce certificat est décerné à :</p>
            <p><strong>{{ $user->first_name }} {{ $user->last_name }}</strong></p>
            <p>pour avoir terminé avec succès sa formation en :</p>
            <p><strong>{{ $formation->titre }}</strong></p>
            <p>Durée de la formation : {{ $formation->duree }} mois</p>
            <p>Groupe : <span class="highlight">{{ $groupe->nom }}</span></p>
            <div class="description">
                <p>{{ $user->first_name }} {{ $user->last_name }} a démontré un niveau élevé de compétence et de maîtrise dans les domaines couverts par la
                    formation. Son engagement, son travail acharné et son dévouement lui ont permis d'atteindre des
                    résultats remarquables.</p>
                <p>Félicitations pour cette réalisation exceptionnelle ! Nous sommes convaincus que {{ $user->first_name }} {{ $user->last_name }} continuera
                    d'exceller dans ses futurs projets.</p>
            </div>
            <div class="signature">
                <div class="director">
                    <span>Directeur :</span>
                    <span>M.Aziz</span>
                </div>

            </div>
        </div>


    </div>


</body>

</html>
