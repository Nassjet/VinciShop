@extends('main')

@section('title', "Admin - Vinci'SHOP")

@section('content')
    <main class="container">
        <div class="row">
            <h1>Formulaire d'ajout d'un fournisseur</h1>
        </div>
        <div class="row">
            <form class="col-lg-3 col-md-6 col-8 mx-auto" action="/admin/fournisseur" method="post">
                @method('post')
                @csrf
                <div class='row mb-2'>
                    <div class="form-floating mb-3">
                        <input value='{{ old('nom') }}' name='nom' required type='text' class="form-control"
                            id="nom" placeholder="Saisir le nom">
                        <label for='nom'>Nom * :</label>
                    </div>
                    @error('nom')
                        <div class='alert alert-danger mt-1'>{{ $message }}</div>
                    @enderror
                </div>
                <div class='row mb-2'>
                    <label for='adresse'>Adresse :</label>
                    <input value='{{ old('adresse') }}' name='adresse' required type='text' class="form-control"
                         placeholder="Saisir l'adresse">
                    @error('adresse')
                        <div class='alert alert-danger mt-1'>{{ $message }}</div>
                    @enderror
                </div>
                <div class='row mb-2'>
                    <label for='ville'>Ville</label>
                    <input value='{{ old('ville') }}' name='ville' required type='text' class="form-control"
                         placeholder="Saisir la ville">
                    @error('ville')
                        <div class='alert alert-danger mt-1'>{{ $message }}</div>
                    @enderror
                </div>
                <div class='row mb-2'>
                    <label for='email'>Email :</label>
                    <input value='{{ old('email') }}' name='email' required type='email' class="form-control"
                         placeholder="Saisir le email">
                    @error('email')
                        <div class='alert alert-danger mt-1'>{{ $message }}</div>
                    @enderror
                </div>
                <div class='row mb-2'>
                    <label for='telephone'>Telephone :</label>
                    <input value='{{ old('telephone') }}' name='telephone' required type='tel'
                         class="form-control" id="telephone"
                        placeholder="Saisir le numéro de téléphone">
                    </textarea>
                    @error('telephone')
                        <div class='alert alert-danger mt-1'>{{ $message }}</div>
                    @enderror
                </div>
                <div class="row">
                    <button type="submit" class="btn btn-primary">Envoyer</button>
                </div>
            </form>
        </div>
    </main>
@endsection
