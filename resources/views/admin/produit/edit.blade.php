@extends('main')

@section('title', "Admin - Vinci'SHOP")

@section('content')
<main class="container">
    <div class="row">
        <div class="col-12 col-sm-10 col-md-6 col-lg-4 mx-auto">
            <h1 class="my-1">Formulaire de modification d'un produit</h1>
            <form action="/admin/produit/{{$produit->id}}" method="post">
                @csrf
                @method('put')

                <div class='form-floating mb-3'>
                    <input value='{{$produit->nom}}' name='nom' required type='text' class="form-control" id="nom" placeholder="Saisir le nom">
                    <label for='nom'>Nom * :</label>
                    @error('nom')
                        <div class='alert alert-danger mt-1'>{{ $message }}</div>
                    @enderror
                </div>

                <div class='mb-3'>
                    <label for='prix'>Prix *:</label>
                    <input value='{{ $produit->prix }}' name='prix' required min='0' step="0.01" type='number' class="form-control" id="prix" placeholder="Saisir le prix">
                    @error('prix')
                        <div class='alert alert-danger mt-1'>{{ $message }}</div>
                    @enderror
                </div>

                <div class='mb-3'>
                    <label for='qteEnStock'>Quantite En Stock *:</label>
                    <input value='{{ $produit->qteEnStock }}' name='qteEnStock' required type='number' class="form-control" id="qteEnStock" placeholder="Saisir la quantité en Stock">
                    @error('qteEnStock')
                        <div class='alert alert-danger mt-1'>{{ $message }}</div>
                    @enderror
                </div>

                <div class='mb-3'>
                    <label for='prixHT'>Prix HT * :</label>
                    <input value='{{ $produit->prixHT }}' name='prixHT' required min='0' step="0.01" type='number' class="form-control" id="prixHT" placeholder="Saisir le prix HT">
                    @error('prixHT')
                        <div class='alert alert-danger mt-1'>{{ $message }}</div>
                    @enderror
                </div>

                <div class='mb-3'>
                    <label for='description'>Description *:</label>
                    <textarea name='description' class="form-control" id="description" placeholder="Saisir la description">{{ $produit->description }}</textarea>
                    @error('description')
                        <div class='alert alert-danger mt-1'>{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="categorie_id">Catégorie</label>
                    <select class="form-control" name="categorie_id" id="categorie_id">
                        <option value="" disabled>Choisir une catégorie</option>
                        @foreach ($lesCategories as $uneCategorie)
                            <option value="{{ $uneCategorie->id }}" {{ $uneCategorie->id == $produit->categorie_id ? 'selected' : '' }}>
                                {{ Str::ucfirst($uneCategorie->nom) }}
                            </option>
                        @endforeach
                    </select>
                    @error('categorie_id')
                        <div class="alert alert-danger my-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="fournisseur_id">Fournisseur</label>
                    <select class="form-control" name="fournisseur_id" id="fournisseur_id">
                        <option value="" disabled>Choisir un fournisseur</option>
                        @foreach ($lesFournisseurs as $unFournisseur)
                            <option value="{{ $unFournisseur->id }}" {{ $unFournisseur->id == $produit->fournisseur_id ? 'selected' : '' }}>
                                {{ Str::ucfirst($unFournisseur->nom) }}
                            </option>
                        @endforeach
                    </select>
                    @error('fournisseur_id')
                        <div class="alert alert-danger my-2">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</main>
@endsection
