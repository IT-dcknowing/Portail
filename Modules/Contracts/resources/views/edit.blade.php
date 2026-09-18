@extends('layouts.app')

@section('title', 'Modification du contrat - RH Flow')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <!-- En-tête de la page -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="mb-1">✏️ Modification du contrat</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('company.contracts.index') }}">Gestion des contrats</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('company.contracts.show', $contract->id) }}">{{ $contract->subject }}</a>
                            </li>
                            <li class="breadcrumb-item active">Modifier</li>
                        </ol>
                    </nav>
                </div>
                <div>
                    <a href="{{ route('company.contracts.show', $contract->id) }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left me-1"></i>Retour
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Formulaire de modification -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Informations du contrat</h5>
                    <span class="badge bg-{{ $contract->status == 'active' ? 'success' : ($contract->status == 'draft' ? 'warning' : 'danger') }}">
                        {{ $contract->status == 'active' ? 'Actif' : ($contract->status == 'draft' ? 'Brouillon' : 'Terminé') }}
                    </span>
                </div>
                <form action="{{ route('company.contracts.update', $contract->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row g-3">
                            <!-- Informations générales -->
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="subject" class="form-label">Intitulé du contrat <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('subject') is-invalid @enderror" id="subject" name="subject" value="{{ old('subject', $contract->subject) }}" required>
                                    @error('subject')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="employee_id" class="form-label">Employé <span class="text-danger">*</span></label>
                                    <select class="form-select @error('employee_id') is-invalid @enderror" id="employee_id" name="employee_id" required>
                                        <option value="">Sélectionner un employé</option>
                                        @foreach($employees as $employee)
                                            <option value="{{ $employee->id }}" {{ old('employee_id', $contract->employee_id) == $employee->id ? 'selected' : '' }}>
                                                {{ $employee->first_name }} {{ $employee->last_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('employee_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="type_id" class="form-label">Type de contrat <span class="text-danger">*</span></label>
                                    <select class="form-select @error('type_id') is-invalid @enderror" id="type_id" name="type_id" required>
                                        <option value="">Sélectionner un type</option>
                                        @foreach($contractTypes as $type)
                                            <option value="{{ $type->id }}" {{ old('type_id', $contract->type_id) == $type->id ? 'selected' : '' }}>
                                                {{ $type->names }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('type_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="value" class="form-label">Valeur du contrat</label>
                                    <div class="input-group">
                                        <input type="number" step="0.01" class="form-control @error('value') is-invalid @enderror" id="value" name="value" value="{{ old('value', $contract->value) }}">
                                        <span class="input-group-text">{{ $company->currency ?? 'EUR' }}</span>
                                    </div>
                                    @error('value')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Dates et durée -->
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="start_date" class="form-label">Date de début <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control @error('start_date') is-invalid @enderror" id="start_date" name="start_date" value="{{ old('start_date', $contract->start_date) }}" required>
                                    @error('start_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="end_date" class="form-label">Date de fin</label>
                                    <input type="date" class="form-control @error('end_date') is-invalid @enderror" id="end_date" name="end_date" value="{{ old('end_date', $contract->end_date) }}">
                                    <small class="text-muted">Laisser vide pour un contrat à durée indéterminée</small>
                                    @error('end_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="duration" class="form-label">Durée</label>
                                    <input type="text" class="form-control @error('duration') is-invalid @enderror" id="duration" name="duration" value="{{ old('duration', $contract->duration) }}" placeholder="Ex: 12 mois">
                                    @error('duration')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Statut -->
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="status" class="form-label">Statut</label>
                                    <select class="form-select @error('status') is-invalid @enderror" id="status" name="status">
                                        <option value="draft" {{ old('status', $contract->status) == 'draft' ? 'selected' : '' }}>Brouillon</option>
                                        <option value="active" {{ old('status', $contract->status) == 'active' ? 'selected' : '' }}>Actif</option>
                                        <option value="terminated" {{ old('status', $contract->status) == 'terminated' ? 'selected' : '' }}>Terminé</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Description et notes -->
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{ old('description', $contract->description) }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="contract_description" class="form-label">Contenu du contrat</label>
                                    <textarea class="form-control @error('contract_description') is-invalid @enderror" id="contract_description" name="contract_description" rows="5">{{ old('contract_description', $contract->contract_description) }}</textarea>
                                    @error('contract_description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="notes" class="form-label">Notes internes</label>
                                    <textarea class="form-control @error('notes') is-invalid @enderror" id="notes" name="notes" rows="2">{{ old('notes', $contract->notes) }}</textarea>
                                    @error('notes')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Pièces jointes -->
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="attachments" class="form-label">Ajouter des pièces jointes</label>
                                    <input type="file" class="form-control @error('attachments.*') is-invalid @enderror" id="attachments" name="attachments[]" multiple>
                                    <small class="text-muted">Vous pouvez sélectionner plusieurs fichiers (PDF, Word, Excel, Images)</small>
                                    @error('attachments.*')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <a href="{{ route('company.contracts.show', $contract->id) }}" class="btn btn-outline-secondary">
                            <i class="fas fa-times me-1"></i>Annuler
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-1"></i>Enregistrer les modifications
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('page-script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialisation des sélecteurs avec Select2
        if ($.fn.select2) {
            $('select').select2({
                placeholder: 'Sélectionner une option',
                allowClear: true
            });
        }

        // Initialisation de l'éditeur de texte riche pour le contenu du contrat
        if (typeof Quill !== 'undefined') {
            var quill = new Quill('#contract_description_editor', {
                theme: 'snow',
                modules: {
                    toolbar: [
                        [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                        ['bold', 'italic', 'underline', 'strike'],
                        [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                        [{ 'indent': '-1'}, { 'indent': '+1' }],
                        ['clean']
                    ]
                }
            });
            
            // Synchroniser le contenu de l'éditeur avec le champ caché
            var form = document.querySelector('form');
            form.onsubmit = function() {
                var contractDescription = document.querySelector('#contract_description');
                contractDescription.value = quill.root.innerHTML;
                return true;
            };
        }

        // Calcul automatique de la durée en fonction des dates
        const startDateInput = document.getElementById('start_date');
        const endDateInput = document.getElementById('end_date');
        const durationInput = document.getElementById('duration');

        function updateDuration() {
            if (startDateInput.value && endDateInput.value) {
                const startDate = new Date(startDateInput.value);
                const endDate = new Date(endDateInput.value);
                
                if (endDate >= startDate) {
                    // Calculer la différence en mois
                    const diffYears = endDate.getFullYear() - startDate.getFullYear();
                    const diffMonths = endDate.getMonth() - startDate.getMonth();
                    const totalMonths = diffYears * 12 + diffMonths;
                    
                    if (totalMonths === 0) {
                        const diffDays = Math.floor((endDate - startDate) / (1000 * 60 * 60 * 24));
                        durationInput.value = diffDays + ' jour(s)';
                    } else if (totalMonths < 12) {
                        durationInput.value = totalMonths + ' mois';
                    } else {
                        const years = Math.floor(totalMonths / 12);
                        const months = totalMonths % 12;
                        durationInput.value = years + ' an(s)' + (months > 0 ? ' et ' + months + ' mois' : '');
                    }
                }
            }
        }

        startDateInput.addEventListener('change', updateDuration);
        endDateInput.addEventListener('change', updateDuration);
    });
</script>
@endsection