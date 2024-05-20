@extends('layouts.extends.form')

@section('content')
    @include('layouts.includes.navbar')

    <div class="py-2"></div>
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="progress mb-4">
                    <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0"
                        aria-valuemax="100">
                        <div class="progress-text"></div>
                    </div>
                </div>

                @if (session('message'))
                    <div class="alert alert-success alert-dismissible fade show shadow" role="alert">
                        <strong>{{ session('message') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="card">
                    <div class="card-header">
                        <b>Master 2</b>
                    </div>

                    <div class="card-body">

                        <form id="multi-step-form" method="post" action="{{ url('/submit-master2') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="step" id="step1">
                                <div class="form-group md-3 py-3">
                                    <label for="title">Nom</label>
                                    <input type="text" id="nom" name="nom" class="form-control" required>
                                </div>

                                <div class="form-group md-3">
                                    <label for="title">Prenom</label>
                                    <input type="text" id="prenom" name="prenom" class="form-control" required>
                                </div>

                                <div class="py-2"><label for="title">Sexe</label></div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="sexe" value="Féminin">
                                    <label class="form-check-label" for="inlineRadio1">Masculin</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="sexe" value="Masculin">
                                    <label class="form-check-label" for="inlineRadio2">Féminin</label>
                                </div><br>
                                <div class="py-2"></div>

                                <div class="form-group md-3">
                                    <label for="">Age</label>
                                    <input type="number" min="10" max="100" class="form-control" id="age" name="age" required>
                                 </div>

                                <div class="form-group md-3 py-2">
                                    <label for="">Nationalité</label>
                                    <select class="form-control" name="nationalite" id="nationalite" required>
                                        <option value="">CHOIX NATIONALITE</option>
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

                                 <div class="form-group md-3 py-3">
                                    <label for="formFile" class="form-label">Joindre l'acte de naissance scanné(.pdf)</label>
                                    <input class="form-control" type="file" accept=".pdf" name="acte_naissance" id="" required>
                                </div>

                                <button type="button" class="btn btn-primary next-step hov">Next</button>
                            </div>

                            <div class="step" id="step2" style="display: none;">
                                <div class="form-group md-3 py-3">
                                    <label for="">Adresse Email</label>
                                    <input type="email" id="email" name="email" class="form-control" required>
                                </div>

                                <div class="form-group md-3 py-1">
                                    <label for="">Région</label>
                                    <select class="form-control" name="region" id="region" required>
                                        <option value="">CHOIX REGION</option>
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

                                <div class="form-group md-3 py-3">
                                    <label for="">Nom Etablissement Niveau 4</label>
                                    <input type="text" class="form-control" id='nomEtb4' name="nomEtb4" required>
                                </div>

                                <button type="button" class="btn btn-warning prev-step">Previous</button>
                                <button type="button" class="btn btn-primary next-step float-end hov">Next</button>
                            </div>

                            <div class="step" id="step3" style="display: none;">
                                <div class="form-group md-3 py-3">
                                    <label for="age">MGP Niveau 4</label>
                                    <input type="number" min="0" max="20" step="0.01" class="form-control" id="mgp4" name="mgp4" required>
                                 </div>

                                <div class="form-group md-3 py-1">
                                    <label for="">Numéro</label>
                                    <input type="number" id="numero" name="numero" class="form-control" required>
                                </div>

                                <div class="form-group md-3 py-1">
                                    <label for="">Filière</label>
                                    <select class="form-control"  name="filiere" id="filiere" required>
                                        <option value="">CHOIX FILIERE</option>
                                        <option value="ICT4D">ICT4D</option>
                                        <option value="Informatique">Informatique</option>
                                        <option value="Mathematique">Mathematique</option>
                                    </select>
                                </div>

                                <div class="form-group md-3 py-3">
                                    <label for="formFile" class="form-label">Joindre le Releve scanné(.pdf)</label>
                                    <input class="form-control" type="file" accept=".pdf" name="releve" id="" required>
                                </div>

                                <div class="form-group md-3 py-1">
                                    <label for="">Numéro acte de naissance</label>
                                    <input type="text" class="form-control" id="numero_acte" name="numero_acte" required>
                                </div>
            
                                <div class="form-group md-3 py-3">
                                    <label for="">Date de naissance</label>
                                    <input type="date" class="form-control" id="date_naissance" name="date_naissance" required>
                                </div>

                                <button type="button" class="btn btn-warning prev-step">Previous</button>
                                <button type="button" class="btn btn-primary next-step float-end hov">Next</button>
                            </div>

                            <div class="step" id="step4" style="display: none;">
                                <div class="form-group md-3 py-3">
                                    <label for="">Lieu de naissance</label>
                                    <input type="text" class="form-control" id="lieu_naissance" name="lieu_naissance" required>
                                </div>

                                <div class="form-group md-3 py-1">
                                    <label for="">Langue</label>
                                    <select class="form-control"  name="langue" id="langue" required>
                                        <option value="">CHOIX LANGUE</option>
                                        <option value="Anglais">ANGLAIS</option>
                                        <option value="Français">Français</option>
                                    </select>
                                </div>

                                <div class="form-group md-3 py-1">
                                    <label for="">Adresse</label>
                                    <input type="text" class="form-control" id="adresse" name="adresse" required>
                                </div>

                                <div class="form-group md-3 py-3">
                                    <label for="">Provenance du diplome</label>
                                    <select class="form-control" name="provDiplome" id="provDiplome" required>
                                        <option value="">CHOIX PROVENANCE DU DIPLOME</option>
                                        <option value="PUBLIC">PUBLIC</option>
                                        <option value="PRIVE">PRIVE</option>
                                    </select>
                                </div>

                                <button type="button" class="btn btn-warning prev-step">Previous</button>
                                <button type="submit" class="btn btn-primary float-end hov">Submit</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    @include('layouts.includes.footer')

    <script src="{{ asset('styles/js/multi_step_form.js') }}"></script>
@endsection
