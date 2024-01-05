@extends('layouts.extends.admin')

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
                    <h5>Customer:</h5>
                    <hr>
                    <a class="btn btn-outline-info btn-sm btn-block" id="block-btn">block</a>
                    <a class="btn btn-outline-danger btn-sm btn-block" id="unblock-btn">de-block</a>

                    <form action="{{ url('/licence1_import') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="file" id="">
                        <input type="submit" class="btn btn-outline-danger btn-sm btn-block" value="Import excel">
                    </form>

                    

                </div>
            </div>

            <div class="col-md">
                <div class="card card-body">
                    <h5>Contact Information:</h5>
                    <hr>
                    <p>Email: {customer.email}</p>
                    <p>Phone: {customer.phone}</p>
                </div>
            </div>

            <div class="col-md">
                <div class="card card-body">
                    <h5>Total Orders:</h5>
                    <hr>
                    <h1 style="text-align: center; padding:10px;">{order_count}</h1>
                </div>
            </div>
        </div>

        <br>

        <div class="row">
            <div class="col-md">
                <div class="card card-body">
                    <h2 style="color: #0088cc;">VEUILLEZ DÉFINIR VOS CRITÈRES DE SÉLECTION</h2>
                    <form class="form-inline" action="{{ url('/selectlicence1') }}" method="get">
                        <div class="form-group">
                            <label for="moyenne">Moyenne Baccalauréat >= à</label>
                            <input type="number" class="form-control" id="moyenne" placeholder="Moyenne" name="moyenne">
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
                            <label for="sexe">Sexe</label>
                            <div class="form-check form-check-inline">
                                <input type="radio" name="sexe" value="Masculin" class="form-check-input"
                                    id="masculin">
                                <label class="form-check-label" for="masculin">Masculin</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" name="sexe" value="Feminin" class="form-check-input"
                                    id="feminin">
                                <label class="form-check-label" for="feminin">Féminin</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="age">Âge <= à</label>
                                    <input type="number" class="form-control" id="age" placeholder="Âge"
                                        name="age">
                        </div>

                        <div class="form-group">
                            <label for="nationalite">Nationalité</label>
                            <select name="nationalite" id="nationalite" class="form-control">
                                <option value="">CHOIX NATIONALITÉS</option>
                                <option value="Algérie">Algérie</option>
                                <option value="Angola">Angola</option>
                                <option value="Bénin">Bénin</option>
                                <option value="Botswana">Botswana</option>
                                <option value="Burkina Faso">Burkina Faso</option>
                                <option value="Burundi">Burundi</option>
                                <option value="Cameroun">Cameroun</option>
                                <option value="Cap-Vert">Cap-Vert</option>
                                <option value="Comores">Comores</option>
                                <option value="Congo">Congo</option>
                                <option value="Côte d'Ivoire">Côte d'Ivoire</option>
                                <option value="Djibouti">Djibouti</option>
                                <option value="Égypte">Égypte</option>
                                <option value="Érythrée">Érythrée</option>
                                <option value="Eswatini">Eswatini</option>
                                <option value="Éthiopie">Éthiopie</option>
                                <option value="Gabon">Gabon</option>
                                <option value="Gambie">Gambie</option>
                                <option value="Ghana">Ghana</option>
                                <option value="Guinée">Guinée</option>
                                <option value="Guinée-Bissau">Guinée-Bissau</option>
                                <option value="Guinée équatoriale">Guinée équatoriale</option>
                                <option value="Kenya">Kenya</option>
                                <option value="Lesotho">Lesotho</option>
                                <option value="Liberia">Liberia</option>
                                <option value="Libye">Libye</option>
                                <option value="Madagascar">Madagascar</option>
                                <option value="Malawi">Malawi</option>
                                <option value="Mali">Mali</option>
                                <option value="Maroc">Maroc</option>
                                <option value="Maurice">Maurice</option>
                                <option value="Mauritanie">Mauritanie</option>
                                <option value="Mozambique">Mozambique</option>
                                <option value="Namibie">Namibie</option>
                                <option value="Niger">Niger</option>
                                <option value="Nigeria">Nigeria</option>
                                <option value="Ouganda">Ouganda</option>
                                <option value="République centrafricaine">République centrafricaine</option>
                                <option value="République démocratique du Congo">République démocratique du Congo</option>
                                <option value="Rwanda">Rwanda</option>
                                <option value="São Tomé-et-Príncipe">São Tomé-et-Príncipe</option>
                                <option value="Sénégal">Sénégal</option>
                                <option value="Seychelles">Seychelles</option>
                                <option value="Sierra Leone">Sierra Leone</option>
                                <option value="Somalie">Somalie</option>
                                <option value="Soudan">Soudan</option>
                                <option value="Soudan du Sud">Soudan du Sud</option>
                                <option value="Tanzanie">Tanzanie</option>
                                <option value="Tchad">Tchad</option>
                                <option value="Togo">Togo</option>
                                <option value="Tunisie">Tunisie</option>
                                <option value="Zambie">Zambie</option>
                                <option value="Zimbabwe">Zimbabwe</option>
                            </select>
                        </div>

                        <div class="form-group">
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
                        </div>

                        <div class="form-group">
                            <label for="typebaccalaureat">Baccalauréat</label>
                            <select name="typebaccalaureat" id="type_baccalaureat" class="form-control">
                                <option value="">CHOIX TYPE DE BAC</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                                <option value="A4">A4</option>
                            </select>
                        </div>

                        <button name="selectionner" type="submit" class="btn btn-primary">SÉLECTIONNER</button>
                    </form>
                </div>
            </div>
        </div>

        <br>

        <div class="row">
            <div class="col-md">
                <div class="card mt-4">
                    <div class="card-header">
                        <h4 class="border-bottom pb-2 mb-4" style="color: #0088cc;">LISTE DES CANDIDATS DU <b>NIVEAU 1</b>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table id="myDataTable" class="table table-sm table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nom</th>
                                    <th>Prenom</th>
                                    <th>Sexe</th>
                                    <th>Nationalité</th>
                                    <th>email</th>
                                    <th>Type Baccalaureat</th>
                                    <th>Moyenne</th>
                                    <th>Age</th>
                                    <th>Region</th>
                                    <th>Nom de l'Etablissement</th>
                                    <th>Filiere</th>
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
                                        <td>{{ $candidat->typebaccalaureat }}</td>
                                        <td>{{ $candidat->moyenne }}</td>
                                        <td>{{ $candidat->age }}</td>
                                        <td>{{ $candidat->region }}</td>
                                        <td>{{ $candidat->nomEtb }}</td>
                                        <td>{{ $candidat->filiere }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md">
                <div class="card mt-4">
                    <div class="card-header">
                        <h4 class="border-bottom pb-2 mb-4" style="color: #0088cc;">LISTE DES CANDIDATS SELECTIONNES À
                            PARTIR DE CES CRITERES DU <b>NIVEAU 1</b></h4>
                    </div>
                    <div class="card-body">
                        <table id="myDataTable" class="table table-sm table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nom</th>
                                    <th>Prenom</th>
                                    <th>Sexe</th>
                                    <th>Nationalité</th>
                                    <th>email</th>
                                    <th>Type Baccalaureat</th>
                                    <th>Moyenne</th>
                                    <th>Age</th>
                                    <th>Region</th>
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
                                        <td>{{ $pre_candidat->typebaccalaureat }}</td>
                                        <td>{{ $pre_candidat->moyenne }}</td>
                                        <td>{{ $pre_candidat->age }}</td>
                                        <td>{{ $pre_candidat->region }}</td>
                                        <td>{{ $pre_candidat->nomEtb }}</td>
                                        <td>{{ $pre_candidat->filiere }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-center">
            <form class="my-form" action="{{ url('/validselect1') }}" method="POST">
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
                        <h4 class="border-bottom pb-2 mb-4" style="color: #0088cc;">LISTE VALIDE DES CANDIDATS SELCTIONNES
                            <b>NIVEAU 1</b></h4>
                    </div>
                    <div class="card-body">
                        <table id="myDataTable" class="table table-sm table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nom</th>
                                    <th>Prenom</th>
                                    <th>Sexe</th>
                                    <th>Nationalité</th>
                                    <th>email</th>
                                    <th>Type Baccalaureat</th>
                                    <th>Moyenne</th>
                                    <th>Age</th>
                                    <th>Region</th>
                                    <th>Nom de l'Etablissement</th>
                                    <th>Filiere</th>
                                    <th>Date Naissance</th>
                                    <th>Lieu Naissance</th>
                                    <th>Langue</th>
                                    <th>Delivrance Diplome</th>
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
                                        <td>{{ $sel->typebaccalaureat }}</td>
                                        <td>{{ $sel->moyenne }}</td>
                                        <td>{{ $sel->age }}</td>
                                        <td>{{ $sel->region }}</td>
                                        <td>{{ $sel->nomEtb }}</td>
                                        <td>{{ $sel->filiere }}</td>
                                        <td>{{ $sel->dateNaiss }}</td>
                                        <td>{{ $sel->lieuNaiss }}</td>
                                        <td>{{ $sel->langue }}</td>
                                        <td>{{ $sel->delivBac }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
                            <button name="selectionner" type="submit" class="btn btn-primary">Export pdf</button>
                        </div>

                        <div class="col-md">
                            <a class="btn btn-warning" href="{{ url('/licence1_export') }}">Export Excel</a>
                        </div>

                        <div class="col-md">
                            <button name="selectionner" type="submit" class="btn btn-primary">Envoyer un Email aux Candidats Sélectionnés</button>
                        </div>

                        <form class="col-md" action="{{ url('delete-select1') }}" method="POST">
                            @csrf
                            <div class="col-md">
                              <button class="btn btn-primary" type="submit">VIDER LA LISTE</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="{{ asset('styles/js/stop_selection/stop_l1.js') }}"></script>
@endsection
