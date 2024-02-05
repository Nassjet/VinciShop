@extends('main')

@section('title', "Admin - Vinci'SHOP")

@section('content')
    <main class="container">
        <div class="row">
            <h1>Formulaire d'ajout d'un produit</h1>
        </div>
        <div class="row">
            <form enctype="multipart/form-data" class="col-lg-3 col-md-6 col-8 mx-auto" action="/admin/produit" method="post">
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
                    <label for='prix'>Prix *:</label>
                    <input value='{{ old('prix') }}' name='prix' required min='0' step="0.01" type='number'
                        class="form-control" id="prix" placeholder="Saisir le prix">
                    @error('prix')
                        <div class='alert alert-danger mt-1'>{{ $message }}</div>
                    @enderror
                </div>
                <div class='row mb-2'>
                    <label for='qteEnStock'>Quantite En Stock *</label>
                    <input value='{{ old('qteEnStock') }}' name='qteEnStock' required type='text' class="form-control"
                        id="qteEnStock" placeholder="Saisir la quantite en Stock">
                    @error('qteEnStock')
                        <div class='alert alert-danger mt-1'>{{ $message }}</div>
                    @enderror
                </div>
                <div class='row mb-2'>
                    <label for='prixHT'>Prix HT * :</label>
                    <input value='{{ old('prixHT') }}' name='prixHT' required min='0' step="0.01" type='number'
                        class="form-control" id="prixHT" placeholder="Saisir le prixHT">
                    @error('prixHT')
                        <div class='alert alert-danger mt-1'>{{ $message }}</div>
                    @enderror
                </div>
                <div class='row mb-2'>
                    <label for='description'>Description *:</label>
                    <textarea name='description' type='text' class="form-control" id="description" placeholder="Saisir la description">
            </textarea>
                    @error('description')
                        <div class='alert alert-danger mt-1'>{{ $message }}</div>
                    @enderror
                </div>
                <div class="row mb-2">
                    <label for="categorie_id">categorie</label>
                    <select value="{{ old('categorie_id') }}" class="form-control" name="categorie_id" id="categorie_id">
                        <option value="" selected disabled>Choisir une categorie</option>
                        @foreach ($lesCategories as $uneCategorie)
                            <option value="{{ $uneCategorie->id }}">{{ Str::ucfirst($uneCategorie->nom) }}</option>
                        @endforeach
                    </select>
                    @error('categorie_id')
                        <div class="alert alert-danger my-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="row mb-2">
                    <label for="fournisseur_id">Fournisseur</label>
                    <select value="{{ old('fournisseur_id') }}" class="form-control" name="fournisseur_id" id="fournisseur_id">
                        <option value="" selected disabled>Choisir un fournisseur</option>
                        @foreach ($lesFournisseurs as $unFournisseur)
                            <option value="{{ $unFournisseur->id }}">{{ Str::ucfirst($unFournisseur->nom) }}</option>
                        @endforeach
                    </select>
                    @error('fournisseur_id')
                        <div class="alert alert-danger my-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
<div class='row mb-2'>
    <label for='lienImage'>Image *</label>
        <input accept="image/*" value='{{old("lienImage")}}' name='lienImage' required type='file' class="form-control" id="imageProduit" placeholder="Indiquer une Image">
    @error('lienImage')
        <div class='alert alert-danger mt-1'>{{message}}</div>
    @enderror
</div>
                <div class="row">
                    <button class="btn-primary">Envoyer</button>
                </div>
            </form>
        </div>
    </main>
@endsection
