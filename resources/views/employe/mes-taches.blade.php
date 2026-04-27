@extends('layouts.global')
@section('title', 'Mes tâches')
@section('content')
<div class="container-fluid">
    <h1>Mes tâches</h1>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label for="titre" class="form-label">Titre</label>
                            <input type="text" class="form-control" id="titre" name="titre">
                        </div>
                        <div class="mb-3">
                            <label for="date_realisation" class="form-label">Date de réalisation</label>
                            <input type="date" class="form-control" id="date_realisation" name="date_realisation">
                        </div>

                        <div class="mb-3">
                            <label for="niveau" class="form-label">Niveau</label>
                            <select class="form-control" id="niveau" name="niveau">
                                <option value="basse">Bas</option>
                                <option value="moyenne">Moyen</option>
                                <option value="élevée">Haut</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Titre</th>
                                <th>Date</th>
                                <th>statut</th>
                                <th>Niveau</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Task 1</td>
                                <td>2024-06-01</td>
                                <td>En cours</td>
                                <td>Haut</td>
                                <td>
                                    <button class="btn btn-sm btn-primary"><i class="fas fa-fw fa-edit"></i></button>
                                    <button class="btn btn-sm btn-danger"><i class="fas fa-fw fa-trash"></i></button>
                                    <button class="btn btn-sm btn-info"><i class="fas fa-fw fa-eye"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection