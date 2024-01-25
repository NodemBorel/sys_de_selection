<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SYS-SELECT | Export Pdf Niveau 2</title>
    <link rel="stylesheet" href="{{ asset('styles/css/bootstrap.min.css') }}">
    <style>
        th {
            background-color: #557CBA;
        }

        /* Alternance de couleur sur les lignes */
        tr:nth-child(even) {
            background-color: #CED4E5;
        }

        tr:nth-child(odd) {
            background-color: #E8EBF5;
        }

        /* Ajouter la classe personnalisée pour centrer le tableau */
        .center-table {
            margin: 0 auto;
        }
        
        .pdf-container {
            margin-left: 20px; /* Adjust the margin value as needed */
        }

        table {
            font-size: 11px;
        }
    </style>
</head>
<body>

        <div class="position-relative my-1">
        <h3 style="color: #0088cc; margin-bottom: 20px; text-align: center; font-style: italic;">BIENVENUE SUR LA PAGE NIVEAU 2</h3>
        </div>

        <div class="my-3 p-3 bg-body rounded shadow-sn">
            <h4 class="border-bottom pb-2 mb-4" style="color: #0088cc; font-style: italic;">LISTE DES CANDIDATS SELECTIONNES  DU NIVEAU 2</h4>
            <div class="center-table">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Prenom</th>
                            <th scope="col">Sexe</th>
                            <th scope="col">Nationalité</th>
                            <th scope="col">email</th>
                            <th scope="col">Type Baccalaureat</th>
                            <th scope="col">Moyenne</th>
                            <th scope="col">Age</th>
                            <th scope="col">Region</th>
                            <th scope="col">Nom de l'Etablissement 1</th>
                            <th scope="col">MGP 1</th>
                            <th scope="col">Numero</th>
                            <th scope="col">Filiere</th>
                            <th scope="col">Numero Acte</th>
                            <th scope="col">Date Naissance</th>
                            <th scope="col">Lieu Naissance</th>
                            <th scope="col">Langue</th>
                            <th scope="col">Adresse</th>
                            <th scope="col">Provenace Diplome</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($candidats as $candidat)
                        <tr>
                        <td>{{$candidat->id}}</td>
                        <td>{{$candidat->nom}}</td>
                        <td>{{$candidat->prenom}}</td>
                        <td>{{$candidat->sexe}}</td>
                        <td>{{$candidat->nationalite}}</td>
                        <td>{{$candidat->email}}</td>
                        <td>{{$candidat->typebaccalaureat}}</td>
                        <td>{{$candidat->moyenne}}</td>
                        <td>{{$candidat->age}}</td>
                        <td>{{$candidat->region}}</td>
                        <td>{{$candidat->nomEtb1}}</td>
                        <td>{{$candidat->mgp1}}</td>
                        <td>{{$candidat->numero}}</td>
                        <td>{{$candidat->filiere}}</td>
                        <td>{{$candidat->numActe}}</td>
                        <td>{{$candidat->dateNaiss}}</td>
                        <td>{{$candidat->lieuNaiss}}</td>
                        <td>{{$candidat->langue}}</td>
                        <td>{{$candidat->adresse}}</td>
                        <td>{{$candidat->provDiplome}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
