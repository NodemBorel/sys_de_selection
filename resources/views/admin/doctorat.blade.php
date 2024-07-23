@extends('layouts.extends.login')

@section('content')
    <br>
    <div class="container-fluid px-4">
        <div class="row" id="alert-container">

            @if (session('message'))
                <div class="alert alert-success alert-dismissible fade show shadow" role="alert">
                    <strong>{{ session('message') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="col-md">
                <div class="card card-body">
                    <h5>Stoper la selection:</h5>
                    <hr>
                    <a class="btn btn-info btn-sm btn-block" id="block-btn">block</a>
                    <br>
                    <a class="btn btn-danger btn-sm btn-block" id="unblock-btn">de-block</a>
                </div>
            </div>

            <div class="col-md">
                <div class="card card-body">
                    <h5>Importer:</h5>
                    <hr>
                    <form action="{{ url('/doctorat_import') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Default file Import</label>
                            <input class="form-control" type="file" accept=".xls,.xlsx" name="file" id=""
                                required>
                        </div>
                        <input type="submit" class="btn btn-outline-danger btn-block" value="Import excel">
                    </form>
                </div>
            </div>

        </div>

        <br>

        <div class="row">
            <div class="col-md">
                <div class="card mt-4">
                    <div class="card-header">
                        <h4 class="border-bottom pb-2 mb-4" style="color:rgb(0, 130, 115);">LISTE DES CANDIDATS DU
                            <b>DOCTORAT</b>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover" id="myDataTable" class="table table-bordered">
                                <thead style=" text-align: center;" class="table-bordered">
                                    <tr style="background-color:rgb(0, 130, 115); text-align: center; color:antiquewhite">
                                        <th>ID</th>
                                        <th>Nom</th>
                                        <th>Prenom</th>
                                        <th>Sexe</th>
                                        <th>Nationalité</th>
                                        <th>email</th>
                                        <th>Age</th>
                                        <th>MGP M2</th>
                                        <th>Nom de l'Etablissement L2</th>
                                        <th>Filiere</th>
                                        <th>Acte Naissance</th>
                                        <th>Releve M2</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($candidats as $candidat)
                                        <tr>
                                            <td>{{ $candidat->id }}</td>
                                            <td>{{ $candidat->nom }}</td>
                                            <td>{{ $candidat->prenom }}</td>
                                            <td>{{ $candidat->sexe }}</td>
                                            <td>{{ $candidat->nationalite }}</td>
                                            <td>{{ $candidat->email }}</td>
                                            <td>{{ $candidat->age }}</td>
                                            <td>{{ $candidat->mgp5 }}</td>
                                            <td>{{ $candidat->nomEtb5 }}</td>
                                            <td>{{ $candidat->filiere }}</td>
                                            <td><a href="{{ url('/view_acte_naiss_PHD', $candidat->id) }}"
                                                    class="btn btn-warning btn-sm" style="display: inline;">view</a></td>
                                            <td><a href="{{ url('/view_releve_PHD', $candidat->id) }}"
                                                    class="btn btn-warning btn-sm" style="display: inline;">view</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br>

        <div class="row">
            <div class="col-md">
                <div class="card card-body">
                    <h2 style="color:rgb(0, 130, 115);">VEUILLEZ DÉFINIR VOS CRITÈRES DE SÉLECTION</h2>
                    <form class="form-inline" action="{{ url('/selectdoctorat') }}" method="get">

                        <div class="form-group">
                            <label for="moyenne">MGP M2 >= à</label>
                            <input type="number" class="form-control" id="moyenne" placeholder="MGP" name="mgp">
                        </div>

                        <div class="form-group">
                            <label for="filiere">Filière</label>
                            <select name="filiere" id="filiere" class="form-control">
                                <option value="">CHOIX FILIÈRES</option>
                                <option value="ICT4D">ICT4D</option>
                                <option value="Informatique">Informatique</option>
                                <option value="Mathematique">Mathématique</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="pourcentageFemmes">Pourcentage de femmes</label>
                            <input type="number" class="form-control" id="pourcentageFemmes" placeholder="100 = toute"
                                name="pourcentageFemmes">
                        </div>

                        <div class="form-group">
                            <label for="pourcentageHommes">Pourcentage d'hommes</label>
                            <input type="number" class="form-control" id="pourcentageHommes" placeholder="100 = tous"
                                name="pourcentageHommes">
                        </div>

                        <div class="form-group">
                            <label for="age">Âge >= à</label>
                            <input type="number" class="form-control" id="age" placeholder="Âge" name="age">
                        </div>

                        <div class="form-group">
                            <label for="pourcentageAlgerie">Pourcentage Cameroun</label>
                            <input type="number" class="form-control" id="pourcentageCmr" placeholder="100 = tous"
                                name="pourcentageCmr">
                        </div>

                        <div class="form-group">
                            <label for="pourcentageAlgerie">Pourcentage Autre pay</label>
                            <input type="number" class="form-control" id="pourcentageAutrePay" placeholder="100 = tous"
                                name="pourcentageAutrePay">
                        </div>

                        <!-- <div class="form-group">
                                <label for="region">Région</label>
                                <select name="region" id="region" class="form-control">
                                    <option value="">CHOIX RÉGIONS</option>
                                    <option value="Centre">Centre</option>
                                    <option value="Nord">Nord</option>
                                    <option value="Sud">Sud</option>
                                    <option value="Est">Est</option>
                                    <option value="Ouest">Ouest</option>
                                    <option value="Nord-Ouest">Nord-Ouest</option>
                                    <option value="Nord-Est">Nord-Est</option>
                                    <option value="Sud-Ouest">Sud-Ouest</option>
                                    <option value="Sud-Est">Sud-Est</option>
                                </select>
                            </div> -->

                        <!--- <div class="form-group">
                                <label for="typebaccalaureat">Baccalauréat</label>
                                <select name="typebaccalaureat" id="type_baccalaureat" class="form-control">
                                    <option value="">CHOIX TYPE DE BAC</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                    <option value="A4">A4</option>
                                </select>
                            </div>  --->

                        <button name="selectionner" type="submit" class="btn btn-primary">SÉLECTIONNER</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md">
                <div class="card mt-4">
                    <div class="card-header">
                        <h4 class="border-bottom pb-2 mb-4" style="color:rgb(0, 130, 115);">LISTE DES CANDIDATS
                            SELECTIONNES À
                            PARTIR DE CES CRITERES DU <b>DOCTORAT</b></h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover" id="myDataTable1" class="table table-bordered">
                                <thead style=" text-align: center;" class="table-bordered">
                                    <tr style="background-color:rgb(0, 130, 115); text-align: center; color:antiquewhite">
                                        <th>ID</th>
                                        <th>Nom</th>
                                        <th>Prenom</th>
                                        <th>Sexe</th>
                                        <th>Nationalité</th>
                                        <th>email</th>
                                        <th>Age</th>
                                        <th>MGP M2</th>
                                        <th>Nom de l'Etablissement</th>
                                        <th>Filiere</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pre_candidats as $pre_candidat)
                                        <tr>
                                            <td>{{ $pre_candidat->id }}</td>
                                            <td>{{ $pre_candidat->nom }}</td>
                                            <td>{{ $pre_candidat->prenom }}</td>
                                            <td>{{ $pre_candidat->sexe }}</td>
                                            <td>{{ $pre_candidat->nationalite }}</td>
                                            <td>{{ $pre_candidat->email }}</td>
                                            <td>{{ $pre_candidat->age }}</td>
                                            <td>{{ $pre_candidat->mgp5 }}</td>
                                            <td>{{ $pre_candidat->nomEtb5 }}</td>
                                            <td>{{ $pre_candidat->filiere }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-center">
            <form class="my-form" action="{{ url('/validselectPHD') }}" method="POST">
                @csrf
                <div class="my-3 mx-2">
                    <button class="btn btn-primary" type="submit">VALIDER LA SELECTION</button>
                </div>
            </form>
        </div>

        <div class="row">
            <div class="col-md">
                <div class="card mt-4">
                    <div class="card-header">
                        <h4 class="border-bottom pb-2 mb-4" style="color:rgb(0, 130, 115);">LISTE VALIDE DES CANDIDATS
                            SELCTIONNES
                            <b>DOCTORAT</b>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover" id="myDataTable2" class="table table-bordered">
                                <thead style=" text-align: center;" class="table-bordered">
                                    <tr style="background-color:rgb(0, 130, 115); text-align: center; color:antiquewhite">
                                        <th>ID</th>
                                        <th>Nom</th>
                                        <th>Prenom</th>
                                        <th>Sexe</th>
                                        <th>Nationalité</th>
                                        <th>email</th>
                                        <th>Age</th>
                                        <th>Region</th>
                                        <th>Filiere</th>
                                        <th>MGP M2</th>
                                        <th>Lieu Naissance</th>
                                        <th>Langue</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($select as $sel)
                                        <tr>
                                            <td>{{ $sel->id }}</td>
                                            <td>{{ $sel->nom }}</td>
                                            <td>{{ $sel->prenom }}</td>
                                            <td>{{ $sel->sexe }}</td>
                                            <td>{{ $sel->nationalite }}</td>
                                            <td>{{ $sel->email }}</td>
                                            <td>{{ $sel->age }}</td>
                                            <td>{{ $sel->region }}</td>
                                            <td>{{ $sel->filiere }}</td>
                                            <td>{{ $sel->mgp5 }}</td>
                                            <td>{{ $sel->lieuNaiss }}</td>
                                            <td>{{ $sel->langue }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br>

        <div class="row">
            <div class="col">
                <div class="card card-body d-flex justify-content-center">
                    <div class="row">

                        <div class="col-md">
                            <a class="btn btn-success" href="{{ url('/doctorat_exportpdf') }}">Export pdf</a>
                        </div>

                        <div class="col-md">
                            <a class="btn btn-warning" href="{{ url('/doctorat_export-excel') }}">Export Excel</a>
                        </div>

                        <div class="col-md">
                            <a href="email-selectPHD" class="btn btn-primary">Notifier candidats</a>
                        </div>

                        <form class="col-md" action="{{ url('delete-selectPHD') }}" method="POST">
                            @csrf
                            <div class="col-md">
                                <button class="btn btn-primary" type="submit">VIDER LA LISTE</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

        <br>

        <div class="row">

            <div class="col-sm">
                <div class="card card-body">
                    <h5>Statistiques age:</h5>
                    <hr>
                    <canvas id="ageChart" style="width: 100%; height: 300px;"></canvas>
                </div>
            </div>

            <div class="col-sm">
                <div class="card card-body">
                    <h5>Statistiques sexe:</h5>
                    <hr>
                    <canvas id="chartSexe" style="width: 100%; height: 300px;"></canvas>
                </div>
            </div>

        </div>
        <br>
    </div>
    <script src="{{ asset('styles/js/stop_selection/stop_phd.js') }}"></script>
    <script>
        // Récupérez les pourcentages depuis le contrôleur
        var malePercentage = {{ $malePercentage }};
        var femalePercentage = {{ $femalePercentage }};

        // Créez le graphique circulaire avec Chart.js
        var ctx = document.getElementById('chartSexe').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Masculin', 'Féminin'],
                datasets: [{
                    data: [malePercentage, femalePercentage],
                    backgroundColor: ['rgba(54, 162, 235, 0.2)', 'rgba(255, 99, 132, 0.2)'],
                }]
            },
            options: {
                responsive: false, // Désactivez la réactivité pour fixer les dimensions du graphique
                plugins: {
                    labels: {
                        render: 'percentage', // Afficher le pourcentage
                        fontColor: ['#000', '#000'], // Couleur du texte pour chaque section (facultatif)
                        fontSize: 12, // Taille du texte pour chaque section (facultatif)
                        precision: 1 // Précision du pourcentage (1 décimale)
                    }
                }
            }
        });


        // Récupérer les statistiques d'âge à partir du contrôleur (vous pouvez les passer depuis le contrôleur ou les récupérer en utilisant une requête Ajax)

        // Supposons que vous ayez déjà les valeurs des statistiques d'âge calculées dans le contrôleur
        var averageAge = {{ $averageAge }};
        var minAge = {{ $minAge }};
        var maxAge = {{ $maxAge }};

        // Utilisez les valeurs pour afficher les statistiques avec Chart.js
        var ctx = document.getElementById('ageChart').getContext('2d');
        var ageChart = new Chart(ctx, {
            type: 'bar', // Utilisez le type de graphique souhaité (bar, line, pie, etc.)
            data: {
                labels: ['Moyenne', 'Minimum', 'Maximum'],
                datasets: [{
                    label: 'Âge',
                    data: [averageAge, minAge, maxAge],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(153, 102, 255, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(75, 192, 192, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
