@extends('main')

@section('title', "Admin - Vinci'SHOP")

@section('content')
<main class="container">
    <div class="row">
        <div class="col-12 col-sm-10 col-md-6 col-lg-4 mx-auto">
            <h1 class="my-1">Formulaire de modification d'un fournisseur</h1>
            <form action="/admin/fournisseur/{{$fournisseur->id}}" method="post">
                @csrf
                @method('put')

                <div class='form-floating mb-3'>
                    <input value='{{$fournisseur->nom}}' name='nom' required type='text' class="form-control" id="nom" placeholder="Saisir le nom">
                    <label for='nom'>Nom * :</label>
                    @error('nom')
                        <div class='alert alert-danger mt-1'>{{ $message }}</div>
                    @enderror
                </div>

                <div class='mb-3'>
                    <label for='adresse'>Adresse :</label>
                    <input value='{{$fournisseur->adresse}}' name='adresse' required type='text' class="form-control" placeholder="Saisir l'adresse">
                    @error('adresse')
                        <div class='alert alert-danger mt-1'>{{ $message }}</div>
                    @enderror
                </div>

                <div class='mb-3'>
                    <label for='ville'>Ville</label>
                    <input value='{{$fournisseur->ville}}' name='ville' required type='text' class="form-control" placeholder="Saisir la ville">
                    @error('ville')
                        <div class='alert alert-danger mt-1'>{{ $message }}</div>
                    @enderror
                </div>

                <div class='mb-3'>
                    <label for='email'>Email :</label>
                    <input value='{{$fournisseur->email}}' name='email' required type='email' class="form-control" placeholder="Saisir le email">
                    @error('email')
                        <div class='alert alert-danger mt-1'>{{ $message }}</div>
                    @enderror
                </div>

                <div class='mb-3'>
                    <label for='telephone'>Telephone :</label>
                    <input value='{{$fournisseur->tel}}' name='telephone' required type='tel' class="form-control" id="telephone" placeholder="Saisir le numéro de téléphone">
                    @error('telephone')
                        <div class='alert alert-danger mt-1'>{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Modifier</button>
            </form>
        </div>
    </div>
</main>
@endsection
