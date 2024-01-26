@extends('main')

@section('title', "Admin - Vinci'SHOP")

@section('content')
    <main class="container">
        <div class="row">
            <h1>Formulaire d'ajout d'une Catégorie</h1>
        </div>
        <div class="row">
            <form class="col-lg-3 col-md-6 col-8 mx-auto" action="/admin/categorie" method="post">
                @method('post')
                @csrf
                <div class='row mb-2'>
                    <div class="form-floating mb-3">
                        <input value='{{ old('nom') }}' name='nom' required type='text' class="form-control"
                            id="nom" placeholder="Saisir le nom">
                        <label for='nom'>Nom :</label>
                    </div>
                    @error('nom')
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
