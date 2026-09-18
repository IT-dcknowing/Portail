<form id="overtimeEditForm" method="POST">
    @csrf
    @method('PUT')
    <input type="hidden" id="overtime_id" name="overtime_id" value="">
    <div class="row">
        @if(auth()->user()->type != 'employee')
        <div class="col-md-6 mb-3">
            <label for="edit_employee_id" class="form-label">{{ __('Employé') }} <span class="text-danger">*</span></label>
            <select class="select2 form-select" id="edit_employee_id" name="employee_id" required>
                @foreach($employees as $employee)
                    <option value="{{ $employee->id }} {{$employee->get_brut_salary_base_sup()}}" {{ $overtime->employee_id == $employee->id ? 'selected' : '' }}>{{ $employee->name }}</option>
                @endforeach
            </select>
            <input type="text" class="form-control" id="employee_id" name="employee_id" value="" hidden>
        </div>
        @else
            <input type="hidden" name="employee_id" value="{{ $overtime->employee_id }}">
        @endif

        <div class="col-md-6 mb-3">
            <label for="taux_hour" class="form-label">Salaire de base heure supplémentaire <span class="text-danger">*</span></label>
            <input type="number" class="form-control" id="brut" name="brut" value="" >
            <input type="number" class="form-control" id="taux_hour" name="taux_hour" value="" hidden>
        </div>
        
        <div class="col-md-6 mb-3">
            <label for="edit_start_date" class="form-label">{{ __('Date et heure de début') }} <span class="text-danger">*</span></label>
            <input type="datetime-local" class="form-control datetimepicker" id="edit_start_date" name="start_date" value="{{$overtime->start_date}}" required>
        </div>
        
        <div class="col-md-6 mb-3">
            <label for="edit_end_date" class="form-label">{{ __('Date et heure de fin') }} <span class="text-danger">*</span></label>
            <input type="datetime-local" class="form-control datetimepicker" id="edit_end_date" name="end_date" value="{{$overtime->end_date}}" required>
        </div>
        
        <div class="col-md-6 mb-3">
            <label for="edit_statut" class="form-label">{{ __('Statut') }} <span class="text-danger">*</span></label>
            <select class="form-select" id="edit_statut" name="statut" required>
                <option value="pending" {{ $overtime->statut === 'pending' ? 'selected' : '' }}>{{ __('En attente') }}</option>
                <option value="approved" {{ $overtime->statut === 'approved' ? 'selected' : '' }}>{{ __('Approuvé') }}</option>
                <option value="rejected" {{ $overtime->statut === 'rejected' ? 'selected' : '' }}>{{ __('Rejeté') }}</option>
            </select>
        </div>
        
        <div class="col-md-6 mb-3">
            <div class="form-check form-switch mt-4 pt-2">
                <input class="form-check-input" type="checkbox" id="edit_paid" name="paid" {{$overtime->paid ? 'checked' : ''}}>
                <label class="form-check-label" for="edit_paid">{{ __('Payé') }}</label>
            </div>
        </div>
        
        <div class="col-12">
            <h6 class="mt-3 mb-3">{{ __('Détails des heures supplémentaires') }} - Taux horaire : <span id="taux_quar_heure" class="text-success">0.00</span> FCFA</h6>
            
            <div class="table-responsive mb-3">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th colspan="2">{{ __('Type d\'heure') }}</th>
                            <th>{{ __('Nombre d\'heures') }}</th>
                            <th>{{ __('Montant (MAD)') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="2">De la 41è à la 46è heure</td>
                            <td>
                                <input type="number" step="0.25" min="0" class="form-control form-control-sm" id="edit_quar_heure" name="quar_heure" value="{{$overtime->quar_heure}}" oninput="calculateEditOvertime()">
                            </td>
                            <td id="edit_montant_quar_heure">0.00</td>
                        </tr>
                        <tr>
                            <td colspan="2">Au délà de la 46è heure</td>
                            <td>
                                <input type="number" step="0.25" min="0" class="form-control form-control-sm" id="edit_heure_audd" name="heure_audd" value="{{$overtime->heure_audd}}" oninput="calculateEditOvertime()">
                            </td>
                            <td id="edit_montant_heure_audd">0.00</td>
                        </tr>
                        <tr>
                            <td colspan="2">Nuit (autres jours que jours fériés et dimanche)</td>
                            <td>
                                <input type="number" step="0.25" min="0" class="form-control form-control-sm" id="edit_heure_nuit_ferie" name="heure_nuit_ferie" value="{{$overtime->heure_nuit_ferie}}" oninput="calculateEditOvertime()">
                            </td>
                            <td id="edit_montant_nuit_ferie">0.00</td>
                        </tr>
                        <tr>
                            <td colspan="2">Journée dimanche et jours fériés</td>
                            <td>
                                <input type="number" step="0.25" min="0" class="form-control form-control-sm" id="edit_heure_dim_ferie" name="heure_dim_ferie" value="{{$overtime->heure_dim_ferie}}" oninput="calculateEditOvertime()">
                            </td>
                            <td id="edit_montant_dim_ferie">0.00</td>
                        </tr>
                        <tr>
                            <td colspan="2">Nuit dimanche et jours fériés</td>
                            <td>
                                <input type="number" step="0.25" min="0" class="form-control form-control-sm" id="edit_heure_nuit_dim_ferie" name="heure_nuit_dim_ferie" value="{{$overtime->heure_nuit_dim_ferie}}" oninput="calculateEditOvertime()">
                            </td>
                            <td id="edit_montant_nuit_dim_ferie">0.00</td>
                        </tr>
                        <tr class="table-active">
                            <td colspan="2"><strong>{{ __('Total') }}</strong></td>
                            <td id="edit_total_heures">0.00</td>
                            <td><strong id="edit_montant_total">0.00</strong> FCFA</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <input type="hidden" id="edit_montant" name="montant" value="0">
            
            <div class="mb-3">
                <label for="edit_remark" class="form-label">{{ __('Remarques') }}</label>
                <textarea class="form-control" id="edit_remark" name="remark" rows="3">{{$overtime->remark ?? ''}}</textarea>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Annuler') }}</button>
        <button type="submit" class="btn btn-primary">{{ __('Enregistrer les modifications') }}</button>
    </div>
</form>
        

@push('scripts')
<script>
// Vérification que le DOM est chargé
$(document).ready(function() {
    console.log('Document ready - Initialisation du formulaire');
    
    // Initialisation de Flatpickr
    if (typeof flatpickr !== 'undefined') {
        $('.datetimepicker').flatpickr({
            enableTime: true,
            dateFormat: 'Y-m-d H:i',
            time_24hr: true,
            locale: 'fr',
            onChange: function(selectedDates, dateStr, instance) {
                updateEditPeriod();
            }
        });
    } else {
        console.error('Flatpickr n\'est pas chargé');
    }

    // Initialisation de Select2
    if (typeof $.fn.select2 !== 'undefined') {
        $('.select2').select2({
            placeholder: 'Sélectionner un employé',
            dropdownParent: $('#overtimeEditModal') // Assurez-vous que c'est l'ID de votre modal
        });
        
        // Gestion du changement d'employé
        $(document).on('change', '#edit_employee_id', function() {
            var selectedOption = $(this).find('option:selected');
            var values = selectedOption.val().split(' ');
            var selectedEmployeeId = values[0];
            var selectedBrutSalary = values[1] || 0;
            
            console.log('Employé sélectionné:', selectedEmployeeId, 'Salaire brut:', selectedBrutSalary);
            
            $('#employee_id').val(selectedEmployeeId);
            $('#brut').val(Math.round(selectedBrutSalary));
            
            // Calcul du taux horaire
            var tauxHoraire = Math.round(selectedBrutSalary / 173.33) || 0;
            $('#taux_quar_heure').text(tauxHoraire);
            $('#taux_hour').val(tauxHoraire);
            
            // Recalcul des montants
            calculateEditOvertime();
        });
    } else {
        console.error('Select2 n\'est pas chargé');
    }
    
    // Écouteurs d'événements pour le calcul automatique
    $(document).on('input', '#brut, #edit_quar_heure, #edit_heure_audd, #edit_heure_nuit_ferie, #edit_heure_dim_ferie, #edit_heure_nuit_dim_ferie', function() {
        console.log('Champ modifié:', this.id);
        calculateEditOvertime();
    });
    
    // Calcul initial
    calculateEditOvertime();
    console.log('Initialisation terminée');
});

// Mise à jour de la période dans le formulaire d'édition
function updateEditPeriod() {
    console.log('Mise à jour de la période');
    var startDate = $('#edit_start_date').val();
    var endDate = $('#edit_end_date').val();
    
    if (startDate && endDate) {
        var start = new Date(startDate);
        var end = new Date(endDate);
        
        // Vérifier si les dates sont valides
        if (isNaN(start.getTime()) || isNaN(end.getTime())) {
            console.error('Dates invalides');
            return;
        }
        
        // Formater la période (ex: "01/01/2023 - 31/01/2023")
        var formattedStart = start.toLocaleDateString('fr-FR', { 
            day: '2-digit', 
            month: '2-digit', 
            year: 'numeric',
            hour: '2-digit',
            minute: '2-digit'
        });
        
        var formattedEnd = end.toLocaleDateString('fr-FR', { 
            day: '2-digit', 
            month: '2-digit', 
            year: 'numeric',
            hour: '2-digit',
            minute: '2-digit'
        });
        
        console.log('Période:', formattedStart + ' - ' + formattedEnd);
        
        // Mettre à jour le champ période s'il existe
        var $periodField = $('#edit_period');
        if ($periodField.length) {
            $periodField.val(formattedStart + ' - ' + formattedEnd);
        }
        
        // Déclencher le calcul
        calculateEditOvertime();
    }
    }
    
    function calculateEditOvertime() {
        // Récupération des valeurs des champs
        var brut = parseFloat($('#brut').val()) || 0;
        var tauxHoraire = brut / 173.33; // Calcul du taux horaire à partir du brut
        
        // Récupération des heures saisies
        var quarHeure = parseFloat($('#edit_quar_heure').val()) || 0;
        var heureAudd = parseFloat($('#edit_heure_audd').val()) || 0;
        var heureNuitFerie = parseFloat($('#edit_heure_nuit_ferie').val()) || 0;
        var heureDimFerie = parseFloat($('#edit_heure_dim_ferie').val()) || 0;
        var heureNuitDimFerie = parseFloat($('#edit_heure_nuit_dim_ferie').val()) || 0;
        
        // Calcul des majorations
        // 1. Heures 41-46 : majoration de 15%
        var montantQuarHeure = (tauxHoraire * 1.15) * quarHeure;
        
        // 2. Heures > 46 : majoration de 50%
        var montantHeureAudd = (tauxHoraire * 1.5) * heureAudd;
        
        // 3. Nuit fériée : majoration de 75%
        var montantNuitFerie = (tauxHoraire * 1.75) * heureNuitFerie;
        
        // 4. Dimanche/jour férié : majoration de 75%
        var montantDimFerie = (tauxHoraire * 1.75) * heureDimFerie;
        
        // 5. Nuit dimanche/férié : majoration de 100%
        var montantNuitDimFerie = (tauxHoraire * 2.0) * heureNuitDimFerie;
        
        // Calcul du total des heures et du montant total
        var totalHeures = quarHeure + heureAudd + heureNuitFerie + heureDimFerie + heureNuitDimFerie;
        var montantTotal = montantQuarHeure + montantHeureAudd + montantNuitFerie + montantDimFerie + montantNuitDimFerie;
        
        // Mise à jour de l'interface utilisateur
        $('#edit_montant_quar_heure').text(Math.round(montantQuarHeure).toLocaleString('fr-FR'));
        $('#edit_montant_heure_audd').text(Math.round(montantHeureAudd).toLocaleString('fr-FR'));
        $('#edit_montant_nuit_ferie').text(Math.round(montantNuitFerie).toLocaleString('fr-FR'));
        $('#edit_montant_dim_ferie').text(Math.round(montantDimFerie).toLocaleString('fr-FR'));
        $('#edit_montant_nuit_dim_ferie').text(Math.round(montantNuitDimFerie).toLocaleString('fr-FR'));
        
        $('#edit_total_heures').text(totalHeures.toFixed(2));
        $('#edit_montant_total').text(Math.round(montantTotal).toLocaleString('fr-FR'));
        
        // Mise à jour des champs cachés
        $('#edit_montant').val(Math.round(montantTotal));
        
        // Mise à jour du taux horaire affiché
        $('#taux_quar_heure').text(Math.round(tauxHoraire).toLocaleString('fr-FR'));
        $('#taux_hour').val(Math.round(tauxHoraire));
    }
    
    // Fonction utilitaire pour formater la date au format attendu par l'input datetime-local
    function formatDateTimeForInput(dateTimeString) {
        if (!dateTimeString) return '';
        
        var date = new Date(dateTimeString);
        
        // Vérifier si la date est valide
        if (isNaN(date.getTime())) {
            return '';
        }
        
        // Formater la date au format YYYY-MM-DDThh:mm
        var year = date.getFullYear();
        var month = String(date.getMonth() + 1).padStart(2, '0');
        var day = String(date.getDate()).padStart(2, '0');
        var hours = String(date.getHours()).padStart(2, '0');
        var minutes = String(date.getMinutes()).padStart(2, '0');
        
        return `${year}-${month}-${day}T${hours}:${minutes}`;
    }
    
// Fonction utilitaire pour le débogage
function debugLog(message, data) {
    console.log('[DEBUG] ' + message, data || '');
}

// Vérifier que toutes les dépendances sont chargées
function checkDependencies() {
    if (typeof $ === 'undefined') {
        console.error('jQuery n\'est pas chargé');
        return false;
    }
    if (typeof flatpickr === 'undefined') {
        console.error('Flatpickr n\'est pas chargé');
    }
    if (typeof $.fn.select2 === 'undefined') {
        console.error('Select2 n\'est pas chargé');
    }
    return true;
}

// Vérifier les dépendances au chargement
if (!checkDependencies()) {
    console.error('Des dépendances sont manquantes');
}
</script>
@endpush
