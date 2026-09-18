<?php

namespace Modules\Employees\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'dob',
        'gender',
        'nationality',
        'phone',
        'martalstatu_id',
        'enfant',
        'personneinf',
        'parts',
        'cmu',
        'contrat', 
        'charge_expat',
        'num_cnps',
        'num_secu_soc',
        'start_date',
        'end_date',
        'categorie',
        'end_leave',
        'address',
        'email',
        'device_token',
        'platform',
        'last_login_at',
        'password',
        'employee_id',
        'branch_id',
        'department_id',
        'designation_id',
        'company_doj',
        'documents',
        'account_holder_name',
        'account_number',
        'bank_name',
        'bank_identifier_code',
        'branch_location',
        'orange_money',
        'mtn_money',
        'moov_money',
        'wave_money',
        'tax_payer_id',
        'salary_type',
        'sous_categorie',
        'salary_horaire',
        'salary',
        'paytype',
        'id_secteur',
        'charge_its',
        'charge_cnps',
        'charge_cmu',
        'is_active',
        'secteur_id',
        'statut_emp',
        'company_id',
        'company_id'
    ];

    protected $casts = [
        'dob' => 'date',
        'start_date' => 'date',
        'end_date' => 'date',
        'end_leave' => 'date',
        'last_login_at' => 'datetime',
        'salary_horaire' => 'decimal:2',
        'salary' => 'decimal:2',
        'is_active' => 'boolean'
    ];

    /**
     * Relations
     */
    public function branch()
    {
        return $this->belongsTo(\App\Models\Branch::class);
    }

    public function department()
    {
        return $this->belongsTo(\App\Models\Department::class);
    }

    public function designation()
    {
        return $this->belongsTo(\App\Models\Designation::class);
    }

    public function company()
    {
        return $this->belongsTo(\App\Models\Company::class, 'company_id');
    }

    public function contracts()
    {
        return $this->hasMany(\Modules\Employees\Models\Contract::class, 'employee_id', 'id');
    }

    public function leaves()
    {
        return $this->hasMany(\Modules\Leaves\Models\Leave::class, 'employee_id', 'id');
    }

    public function ruptures()
    {
        return $this->hasMany(\Modules\Employees\Models\Rupture::class, 'employee_id', 'id');
    }

    /**
     * Scopes
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }

    /**
     * Récupère les allocations de l'employé
     */
    public function allowances()
    {
        return $this->hasMany(\App\Models\Allowance::class, 'employee_id');
    }

    /**
     * Calcule le salaire net de l'employé
     */
    public function get_net_salary()
    {
        //impots
        $employees       = Employee::where('id', '=', $this->id)->first();
        $nbre_jours      = $employees->tax_payer_id;
        $allowances      = \App\Models\Allowance::where('employee_id', '=', $this->id)->get();
        //leave
        $leaves = \Modules\Leaves\Models\Leave::where('company_id', \Auth::user()->company_id)
            ->where('leave_type_id', '=', 1)
            ->where('status', 'Approuvé')
            ->where('leave_statut','=', 2)
            ->where('employee_id', $employees->id)
            ->first();

        $totalleave = 0;
        if($leaves){
            $totalleave  =  $leaves->amount_leave;
        }else{
            $totalleave  = 0;
        }
        //Loan
        $loans      = \Modules\Loans\Models\Loan::where('employee_id', '=', $this->id)->get();
        $total_loan = 0;
        $deduc      = 0;
        $resultricf = 0;
        $brut_total = $employees->get_brut_salary();
        $brut = $employees->get_salary_imposable();
        $autreretenue = $employees->get_Autre_retenue();
        $loan = $employees->get_loan_retenue();
        $brut_cnps = $employees->get_salary_social();
        $autre_retenue_type = $employees->get_Autre_retenue_type();
        //calculons les charges des employés
        $cmu = $employees->cmu;

        if($cmu < 7){
            $coticmu = round($cmu*500);
            $coticmuemp = ($cmu*500);
        }else{
            $coticmu = 3000 + round(($cmu-6)*1000);
            $coticmuemp = 3000;
        }

        $cnps = round(($brut_cnps*6.3)/100);
        //$tt_cnps = ($brut_cnps*6.3)/100;
        $resultcmu =$coticmu;
        $resultcnps = $cnps;
        $resultimpricf = 0;
        if($nbre_jours =='30'){
            if($brut >= 0 && $brut <= 75000){
                $tot = ($brut*0)/100;
                $resultimpricf = round($tot);
            }else if($brut > 75000 && $brut <= 240000){
                $mt1 = $brut-75000;
                $tot1 = (((75000*0)/100)+(($mt1*16)/100));
                $resultimpricf = round($tot1);
            }else if($brut > 240000 && $brut <= 800000){
                $mt2 = $brut-240000;
                $tot2 = (((75000*0)/100)+((165000*16)/100)+(($mt2*21)/100));
                $resultimpricf = round($tot2);
            }else if($brut > 800000 && $brut <= 2400000){
                $mt3 = $brut-800000;
                $tot3 = (((75000*0)/100)+((165000*16)/100)+((560000*21)/100)+(($mt3*24)/100));
                $resultimpricf = round($tot3);
            }else if($brut > 2400000 && $brut <= 8000000){
                $mt4 = $brut-2400000;
                $tot4 = (((75000*0)/100)+((165000*16)/100)+((560000*21)/100)+((1600000*24)/100)+(($mt4*28)/100));
                $resultimpricf = round($tot4);
            }else if($brut > 8000000){
                $mt5 = $brut-8000000;
                $tot5 = (((75000*0)/100)+((165000*16)/100)+((560000*21)/100)+((1600000*24)/100)+((5600000*28)/100)+(($mt5*32)/100));
                $resultimpricf = round($tot5);
            }
            //nombre de part en FCFA
            $nbre = $employees->parts;
            if($nbre==1){
                $resultricf = (0);
            }else if($nbre==1.5){
                $resultricf = 5500;
            }else if($nbre==2){
                $resultricf = 11000;
            }else if($nbre==2.5){
                $resultricf = 16500;
            }else if($nbre==3){
                $resultricf = 22000;
            }else if($nbre==3.5){
                $resultricf = 27500;
            }else if($nbre==4){
                $resultricf = 33000;
            }else if($nbre==4.5){
                $resultricf = 38500;
            }else if($nbre==5){
                $resultricf = 44000;
            }

            $retenue2 = $resultimpricf - $resultricf;

            if($retenue2>0){
                $impots = ($resultimpricf - $resultricf) + $resultcnps + $resultcmu;
            }else{
                $impots = $resultcnps + $resultcmu;
            }
        }elseif($nbre_jours =='0' && $brut > 0){
            if($brut >= 0 && $brut <= 75000){
                $tot = ($brut*0)/100;
                $resultimpricf = round($tot);
            }else if($brut > 75000 && $brut <= 240000){
                $mt1 = $brut-75000;
                $tot1 = (((75000*0)/100)+(($mt1*16)/100));
                $resultimpricf = round($tot1);
            }else if($brut > 240000 && $brut <= 800000){
                $mt2 = $brut-240000;
                $tot2 = (((75000*0)/100)+((165000*16)/100)+(($mt2*21)/100));
                $resultimpricf = round($tot2);
            }else if($brut > 800000 && $brut <= 2400000){
                $mt3 = $brut-800000;
                $tot3 = (((75000*0)/100)+((165000*16)/100)+((560000*21)/100)+(($mt3*24)/100));
                $resultimpricf = round($tot3);
            }else if($brut > 2400000 && $brut <= 8000000){
                $mt4 = $brut-2400000;
                $tot4 = (((75000*0)/100)+((165000*16)/100)+((560000*21)/100)+((1600000*24)/100)+(($mt4*28)/100));
                $resultimpricf = round($tot4);
            }else if($brut > 8000000){
                $mt5 = $brut-8000000;
                $tot5 = (((75000*0)/100)+((165000*16)/100)+((560000*21)/100)+((1600000*24)/100)+((5600000*28)/100)+(($mt5*32)/100));
                $resultimpricf = round($tot5);
            }
            //nombre de part en FCFA
            $nbre = $employees->parts;
            if($nbre==1){
                $resultricf = (0);
            }else if($nbre==1.5){
                $resultricf = 5500;
            }else if($nbre==2){
                $resultricf = 11000;
            }else if($nbre==2.5){
                $resultricf = 16500;
            }else if($nbre==3){
                $resultricf = 22000;
            }else if($nbre==3.5){
                $resultricf = 27500;
            }else if($nbre==4){
                $resultricf = 33000;
            }else if($nbre==4.5){
                $resultricf = 38500;
            }else if($nbre==5){
                $resultricf = 44000;
            }

            $retenue2 = $resultimpricf - $resultricf;

            if($retenue2>0){
                $impots = ($resultimpricf - $resultricf) + $resultcnps + $resultcmu;
            }else{
                $impots = $resultcnps + $resultcmu;
            }
        }else{
            $day_salary = $brut/30;
            if($day_salary >= 0 && $day_salary <= 2500){
                $tot = ($day_salary*0)/100;
                $resultimpricf = round($tot*$nbre_jours);
            }else if($day_salary > 2500 && $day_salary <= 8000){
                $mt1 = $day_salary-2500;
                $tot1 = (((2500*0)/100)+(($mt1*16)/100));
                $resultimpricf = round($tot1*$nbre_jours);
            }else if($day_salary > 8000 && $day_salary <= 26667){
                $mt2 = $day_salary-8000;
                $tot2 = (((2500*0)/100)+((5500*16)/100)+(($mt2*21)/100));
                $resultimpricf = round($tot2*$nbre_jours);
            }else if($day_salary > 26667 && $day_salary <= 80000){
                $mt3 = $day_salary-26667;
                $tot3 = (((2500*0)/100)+((5500*16)/100)+((18667*21)/100)+(($mt3*24)/100));
                $resultimpricf = round($tot3*$nbre_jours);
            }else if($day_salary > 80000 && $day_salary <= 266667){
                $mt4 = $day_salary-80000;
                $tot4 = (((2500*0)/100)+((5500*16)/100)+((18667*21)/100)+((53333*24)/100)+(($mt4*28)/100));
                $resultimpricf = round($tot4*$nbre_jours);
            }else if($day_salary > 266667){
                $mt5 = $day_salary-266667;
                $tot5 = (((2500*0)/100)+((5500*16)/100)+((18667*21)/100)+((53333*24)/100)+((186667*28)/100)+(($mt5*32)/100));
                $resultimpricf = round($tot5*$nbre_jours);
            }
            //nombre de part en FCFA
            $nbre = $employees->parts;
            if($nbre==1){
                $resultricf = (0*$nbre_jours);
            }else if($nbre==1.5){
                $resultricf = (183*$nbre_jours);
            }else if($nbre==2){
                $resultricf = (367*$nbre_jours);
            }else if($nbre==2.5){
                $resultricf = (550*$nbre_jours);
            }else if($nbre==3){
                $resultricf = (733*$nbre_jours);
            }else if($nbre==3.5){
                $resultricf = (917*$nbre_jours);
            }else if($nbre==4){
                $resultricf = (1100*$nbre_jours);
            }else if($nbre==4.5){
                $resultricf = (1283*$nbre_jours);
            }else if($nbre==5){
                $resultricf = (1467*$nbre_jours);
            }
            $retenue2 = $resultimpricf - $resultricf;
            if($retenue2>0){
                $impots = ($resultimpricf - $resultricf) + $resultcnps + $resultcmu;
            }else{
                $impots = $resultcnps + $resultcmu;
            }
        }

        //avatnage en nature
        $avantages            = \Modules\NatureAvantage\Models\Avantage::where('employee_Id', '=', $this->id)->where('is_active', 1)->get();
        $total_avantages_real      = 0; $total_avantages_bare = 0;
        foreach ($avantages as $avantage) {
            $total_avantages_bare = $total_avantages_bare + $avantage->amount;
            $total_avantages_real = $total_avantages_real + $avantage->montant_reel;
        }
        $mont_cant = 0; $prime = 0;
        foreach ($allowances as $allowance) {
            if ($allowance->allowance_option == 31) {
                $mont_cant = $allowance->amount;
            }
            if ($allowance->allowance_option == 27 || $allowance->allowance_option == 28) {
                $prime = $allowance->amount;
            }
        }

        //Net Salary Calculate

        if(!empty($avantages)){
            if($autre_retenue_type <= 0){
                $salarynet2 = ($brut_total-($impots + $total_avantages_real + $mont_cant))-($autreretenue+$loan);
            }else{
                $salarynet2 = ($brut_total-($impots + $total_avantages_real + $mont_cant))-($autreretenue+$loan)+$autre_retenue_type;
            }
        }else{
            if($autre_retenue_type <= 0){
                $salarynet2 = ($brut_total-($impots+$mont_cant))-($autreretenue+$loan);
            }else{
                $salarynet2 = ($brut_total-($impots+$mont_cant))-($autreretenue+$loan)+$autre_retenue_type;
            }
        }

        if($nbre_jours <='0' && $brut_total <= 0){
            $impots = 0;
            $resultcmu = 0;
            $resultimpricf = 0;
            $resultricf = 0;
            $resultcnps  = 0;
            $resultcmu = 0;
        }

        // Gestion des statuts Stagiaire, Apprenti, ou Prestataire
        if (in_array($employees->statut_emp, ['Stagiaire', 'Apprenti'])) {
            $salarynet2 = ($nbre_jours == 30) ? $employees->salary : ($employees->salary / 30) * $nbre_jours;
            $impots = 0;
            $resultcmu = 0; $resulttax1 = 0;
            $resultimpricf = 0;$pf=0; $tt_cnpsemp = 0; $cnpsemp=0; $tauxact=0;
            $resultricf = 0; $tax1=0; $tax2=0; $tax3=0; $tax4 = 0; $tax5 =0;
            $resultcnps  = 0; $parpatronal = 0; $tt_cnpsemp=0; $resulttax2 =0;
            $resultcmu = 0;
            $cnps= 0; $cnpsemp = 0; $coticmu=0; $coticmuemp=0;
        } elseif ($employees->statut_emp == 'Prestataire') {
            // Pour les prestataires, le salaire reste inchangé
            $salarynet2 = $employees->salary;
        }

        if($salarynet2 <= 0){
            $salarynet2 = 0;
        }

        return $salarynet2;

    }

    public function get_net_salary_alltime()
    {
        //impots
        $employees       = Employee::where('id', '=', $this->id)->first();
        $nbre_jours      = 30; // Assuming 30 days for all time calculation
        $allowances      = \App\Models\Allowance::where('employee_id', '=', $this->id)->get();
        //Loan
        $loans      = \Modules\Loans\Models\Loan::where('employee_id', '=', $this->id)->get();
        $total_loan = 0;
        $deduc      = 0;
        $resultricf = 0;
        // Correction : Toujours calculer sur 30 jours pour l'alltime
        $tax_payer_id = ($employees->tax_payer_id != 0) ? $employees->tax_payer_id : 1;
        $brut_total = round(($employees->get_brut_salary()/$tax_payer_id)*30);
        $brut = round(($employees->get_salary_imposable()/$tax_payer_id)*30);
        $brut_cnps = round(($employees->get_salary_social()/$tax_payer_id)*30);
        $autreretenue = $employees->get_Autre_retenue();
        $loan = $employees->get_loan_retenue();
        $autre_retenue_type = $employees->get_Autre_retenue_type();
        //calculons les charges des employés
        $cmu = $employees->cmu;

        if($cmu < 7){
            $coticmu = round($cmu*500);
            $coticmuemp = ($cmu*500);
        }else{
            $coticmu = 3000 + round(($cmu-6)*1000);
            $coticmuemp = 3000;
        }

        $cnps = round(($brut_cnps*6.3)/100);
        //$tt_cnps = ($brut_cnps*6.3)/100;
        $resultcmu =$coticmu;
        $resultcnps = $cnps;
        $resultimpricf = 0;
        if($brut >= 0 && $brut <= 75000){
            $tot = ($brut*0)/100;
            $resultimpricf = round($tot);
        }else if($brut > 75000 && $brut <= 240000){
            $mt1 = $brut-75000;
            $tot1 = (((75000*0)/100)+(($mt1*16)/100));
            $resultimpricf = round($tot1);
        }else if($brut > 240000 && $brut <= 800000){
            $mt2 = $brut-240000;
            $tot2 = (((75000*0)/100)+((165000*16)/100)+(($mt2*21)/100));
            $resultimpricf = round($tot2);
        }else if($brut > 800000 && $brut <= 2400000){
            $mt3 = $brut-800000;
            $tot3 = (((75000*0)/100)+((165000*16)/100)+((560000*21)/100)+(($mt3*24)/100));
            $resultimpricf = round($tot3);
        }else if($brut > 2400000 && $brut <= 8000000){
            $mt4 = $brut-2400000;
            $tot4 = (((75000*0)/100)+((165000*16)/100)+((560000*21)/100)+((1600000*24)/100)+(($mt4*28)/100));
            $resultimpricf = round($tot4);
        }else if($brut > 8000000){
            $mt5 = $brut-8000000;
            $tot5 = (((75000*0)/100)+((165000*16)/100)+((560000*21)/100)+((1600000*24)/100)+((5600000*28)/100)+(($mt5*32)/100));
            $resultimpricf = round($tot5);
        }
        //nombre de part en FCFA
        $nbre = $employees->parts;
        if($nbre==1){
            $resultricf = (0);
        }else if($nbre==1.5){
            $resultricf = 5500;
        }else if($nbre==2){
            $resultricf = 11000;
        }else if($nbre==2.5){
            $resultricf = 16500;
        }else if($nbre==3){
            $resultricf = 22000;
        }else if($nbre==3.5){
            $resultricf = 27500;
        }else if($nbre==4){
            $resultricf = 33000;
        }else if($nbre==4.5){
            $resultricf = 38500;
        }else if($nbre==5){
            $resultricf = 44000;
        }

        $retenue2 = $resultimpricf - $resultricf;

        if($retenue2>0){
            $impots = ($resultimpricf - $resultricf) + $resultcnps + $resultcmu;
        }else{
            $impots = $resultcnps + $resultcmu;
        }

        //avatnage en nature
        $avantages            = \Modules\NatureAvantage\Models\Avantage::where('employee_Id', '=', $this->id)->where('is_active', 1)->get();
        $total_avantages_real      = 0; $total_avantages_bare = 0;
        foreach ($avantages as $avantage) {
            $total_avantages_bare = $total_avantages_bare + $avantage->amount;
            $total_avantages_real = $total_avantages_real + $avantage->montant_reel;
        }
        $mont_cant = 0; $prime = 0;
        foreach ($allowances as $allowance) {
            if ($allowance->allowance_option == 31) {
                $mont_cant = $allowance->amount;
            }
            if ($allowance->allowance_option == 27 || $allowance->allowance_option == 28) {
                $prime = $allowance->amount;
            }
        }

        //Net Salary Calculate

        if(!empty($avantages)){
            if($autre_retenue_type <= 0){
                $salarynet2 = ($brut_total-($impots + $total_avantages_real + $mont_cant))-($autreretenue+$loan);
            }else{
                $salarynet2 = ($brut_total-($impots + $total_avantages_real + $mont_cant))-($autreretenue+$loan)+$autre_retenue_type;
            }
        }else{
            if($autre_retenue_type <= 0){
                $salarynet2 = ($brut_total-($impots+$mont_cant))-($autreretenue+$loan);
            }else{
                $salarynet2 = ($brut_total-($impots+$mont_cant))-($autreretenue+$loan)+$autre_retenue_type;
            }
        }

        if($nbre_jours <='0'){
            $impots = 0;
            $resultcmu = 0;
            $resultimpricf = 0;
            $resultricf = 0;
            $resultcnps  = 0;
            $resultcmu = 0;
        }

        // Gestion des statuts Stagiaire, Apprenti, ou Prestataire
        if (in_array($employees->statut_emp, ['Stagiaire', 'Apprenti'])) {
            $salarynet2 = $employees->salary;
            $impots = 0;
            $resultcmu = 0; $resulttax1 = 0;
            $resultimpricf = 0;$pf=0; $tt_cnpsemp = 0; $cnpsemp=0; $tauxact=0;
            $resultricf = 0; $tax1=0; $tax2=0; $tax3=0; $tax4 = 0; $tax5 =0;
            $resultcnps  = 0; $parpatronal = 0; $tt_cnpsemp=0; $resulttax2 =0;
            $resultcmu = 0;
            $cnps= 0; $cnpsemp = 0; $coticmu=0; $coticmuemp=0;
        } elseif ($employees->statut_emp == 'Prestataire') {
            // Pour les prestataires, le salaire reste inchangé
            $salarynet2 = $employees->salary;
        }

        if($salarynet2 <= 0){
            $salarynet2 = 0;
        }

        return $salarynet2;

    }

    public function get_salary_imposable(){

        //Salary
        $employees       = Employee::where('id', '=', $this->id)->first();
        $nbre_jours      = $employees->tax_payer_id;
        //allowances
        $allowances      = \App\Models\Allowance::where('employee_id', '=', $this->id)->get();
        $total_allowance = 0;
        $total_exo = 0;
        $totalbase = 0;
        $mont_cant = 0;
        foreach ($allowances as $allowance) {
            if(strpos($allowance->trait_fisc, '100% - Art 116') === 0){
                if($allowance->allowance_option == 11 && $allowance->amount > 30000){
                    $total_exo = $total_exo +  30000;
                }else{
                    $total_exo = $total_exo +  $allowance->amount;
                }
            }

            if (strpos($allowance->trait_fisc, '10% - Art 116-1') === 0) {
                if ($allowance->allowance_option == 31) {
                    if($allowance->amount > 30000){
                        $mont_cant = $allowance->amount - 30000;
                    }else{
                        $mont_cant = 0;
                    }
                }else{
                    $total_allowance =  $total_allowance + $allowance->amount;
                }
                $total_allowance = $total_allowance + $mont_cant;
            }

            if($allowance->allowance_option == 26 || $allowance->allowance_option == 11){
                $totalbase += $allowance->amount;
            }
        }

        //OtherPayment
        $amount5 = 0; $impo_amount = 0;
        $terminations = \Modules\Ruptures\Models\Rupture::where('employee_id', '=', $this->id)->first();

            if($terminations){
                $amount5 = $terminations->indem_licence;
                if ( $amount5 > 75000) {
                    $impo_amount = round($amount5 / 2);
                } else {
                    $impo_amount = 0;
                }
                $totalright  = $impo_amount;
            }else{
                $totalright  = 0;
            }

        //Overtime
        $over_times      = \Modules\Time\Models\Overtime::where('employee_id', '=', $this->id)->where('statut', '=', 1)->where('paid', '=', 0)->get();
        $total_over_time = 0;
        foreach ($over_times as $over_time) {
            $amount          = $over_time->montant;
            $total_over_time = $amount + $total_over_time;
        }

        //avatnage en nature
        $avantages            = \Modules\NatureAvantage\Models\Avantage::where('employee_Id', '=', $this->id)->where('is_active', 1)->get();
        $total_avantages_real = 0; $total_avantages_bare = 0; $total_avantages_real1 = 0; $total_avantages_bare1 = 0; $total_avantages_real2 = 0; $total_avantages_bare2 = 0;
        foreach ($avantages as $avantage) {
            $total_avantages_bare = $total_avantages_bare + $avantage->amount;
            $total_avantages_real = $total_avantages_real + $avantage->montant_reel;
            if($avantage->type_avantage == 1){
                $total_avantages_bare1 = $total_avantages_bare1 + $avantage->amount;
                $total_avantages_real1 = $total_avantages_real1 + $avantage->montant_reel;
            }else{
                $total_avantages_bare2 = $total_avantages_bare2 + $avantage->amount;
                $total_avantages_real2 = $total_avantages_real2 + $avantage->montant_reel;
            }
        }
        if( $total_avantages_real > 0){
            $salary_brut_total = ($employees->get_brut_salary() - $total_avantages_real);
        }else{
            $salary_brut_total = $employees->get_brut_salary();
        }

        $exo_ten = (($salary_brut_total - $totalbase)*10)/100;

        if($total_allowance > $exo_ten){
            $net_salary_imposable = round($salary_brut_total - ($total_exo + $exo_ten + $totalright)) + $total_avantages_bare1 + $total_avantages_real2;
        }else{
            $net_salary_imposable = round($salary_brut_total - ($total_exo + $total_allowance + $totalright)) + $total_avantages_bare1 + $total_avantages_real2;
        }

        return $net_salary_imposable;
    }

    public function get_salary_social(){

        //Salary
        $employees       = Employee::where('id', '=', $this->id)->first();
        $totalbrut = $employees->get_brut_salary();
        $nbre_jours      = $employees->tax_payer_id;
        if($employees->tax_payer_id =='30'){
            $base_salary     = $employees->salary;
        }else{
            $base_salary     = $employees->branch_location;
        }

        //allowances
        $allowances      = \App\Models\Allowance::where('employee_id', '=', $this->id)->get();
        $total_allowance = 0;
        $total_exo = 0;
        $brut_total = 0;
        $total_exo2 = 0;

        foreach ($allowances as $allowance) {
            //$brut_total = $brut_total + $allowance->amount;
            if ($allowance->trait_cnps == 'Soumis') {
                $total_allowance =  $total_allowance + $allowance->amount;
            }else{
                $total_exo = $total_exo +  $allowance->amount;
            }
            if(strpos($allowance->trait_fisc, '100% - Art 116') === 0){
                if($allowance->allowance_option == 11 && $allowance->amount > 30000){
                    $total_exo2 = $total_exo2 +  30000;
                }else{
                    $total_exo2 = $total_exo2 +  $allowance->amount;
                }
            }
        }

        //timeSheet
        $times_sheets      = \Modules\Time\Models\TimeSheet::where('employee_id', '=', $this->id)->get();
        $total_time_sheet = 0;
        foreach ($times_sheets as $time_sheet) {
            $amount          = $time_sheet->retenue;
            $total_time_sheet = $amount + $total_time_sheet;
        }

        //Overtime
        $over_times      = \Modules\Time\Models\Overtime::where('employee_id', '=', $this->id)->where('statut', '=', 1)->where('paid', '=', 0)->get();

        $total_over_time = 0;
        foreach ($over_times as $over_time) {
            $amount          = $over_time->montant;
            $total_over_time = $amount + $total_over_time;
        }

        //avatnage en nature
        $avantages            = \Modules\NatureAvantage\Models\Avantage::where('employee_Id', '=', $this->id)->where('is_active', 1)->get();
        $total_avantages_real = 0; $total_avantages_bare = 0; $total_avantages_real1 = 0; $total_avantages_bare1 = 0; $total_avantages_real2 = 0; $total_avantages_bare2 = 0;
        foreach ($avantages as $avantage) {
            $total_avantages_bare = $total_avantages_bare + $avantage->amount;
            $total_avantages_real = $total_avantages_real + $avantage->montant_reel;
            if($avantage->type_avantage == 1){
                $total_avantages_bare1 = $total_avantages_bare1 + $avantage->amount;
                $total_avantages_real1 = $total_avantages_real1 + $avantage->montant_reel;
            }else{
                $total_avantages_bare2 = $total_avantages_bare2 + $avantage->amount;
                $total_avantages_real2 = $total_avantages_real2 + $avantage->montant_reel;
            }
        }

        if( $total_avantages_real > 0){
            $salary_brut_total = ($employees->get_brut_salary() - $total_avantages_real);
        }else{
            $salary_brut_total = $employees->get_brut_salary();
        }

        $net_salary_social = round($salary_brut_total - $total_exo2) + $total_avantages_bare1 + $total_avantages_real2;

        return $net_salary_social;
    }

    public function getTotalSalarybrut() {
        // Obtenez la somme du salaire brut par employé pour le mois spécifié
        $employees = Employee::where('id', $this->id)->first();

        $employees       = Employee::where('id', '=', $this->id)->first();
        $totalSalaryNet  = 0;
        $salarynet = PaySlip::where('employee_id', '=', $this->id)
                    ->whereBetween('salary_month', [date('Y-01'), date('Y-m')])
                    ->get();
        foreach ($salarynet as $net) {
            $totalSalaryNet =  $totalSalaryNet + $net->salary_brut;
        }

        return $totalSalaryNet;
    }

    public function getTotalSalaryRetenue() {
        // Obtenez la somme du salaire brut par employé jusqu'au mois en cours
        $employees       = Employee::where('id', '=', $this->id)->first();
        $totalSalaryNet  = 0;
        $salarynet = PaySlip::where('employee_id', '=', $this->id)
                    ->whereBetween('salary_month', [date('Y-01'), date('Y-m')])
                    ->get();
        foreach ($salarynet as $net) {
            $totalSalaryNet =  $totalSalaryNet + $net->total_retenue;
        }

        return $totalSalaryNet;
    }

    public function getTotalSalaryPatronale() {
        // Obtenez la somme du salaire brut par employé jusqu'au mois en cours
        $employees       = Employee::where('id', '=', $this->id)->first();
        $totalSalaryNet  = 0;
        $salarynet = PaySlip::where('employee_id', '=', $this->id)
                    ->whereBetween('salary_month', [date('Y-01'), date('Y-m')])
                    ->get();
        foreach ($salarynet as $net) {
            $totalSalaryNet =  $totalSalaryNet + $net->total_patronale;
        }

        return $totalSalaryNet;
    }

    public function getTotalSalaryImposable() {
        // Obtenez la somme du salaire brut par employé jusqu'au mois en cours
        $employees       = Employee::where('id', '=', $this->id)->first();
        $totalSalaryNet  = 0;
        $salarynet = PaySlip::where('employee_id', '=', $this->id)
                    ->whereBetween('salary_month', [date('Y-01'), date('Y-m')])
                    ->get();
        foreach ($salarynet as $net) {
            $totalSalaryNet =  $totalSalaryNet + $net->net_imposable;
        }

        return $totalSalaryNet;
    }

    public function getTotalSalaryNet() {
        // Obtenez la somme du salaire brut par employé jusqu'au mois en cours
        $employees       = Employee::where('id', '=', $this->id)->first();
        $totalSalaryNet  = 0;
        $salarynet = PaySlip::where('employee_id', '=', $this->id)
                    ->whereBetween('salary_month', [date('Y-01'), date('Y-m')])
                    ->get();
        foreach ($salarynet as $net) {
            $totalSalaryNet =  $totalSalaryNet + $net->net_payble;
        }

        return $totalSalaryNet;
    }


    /**
     * Calcule le salaire brut de l'employé
     */
    public function get_brut_salary()
    {
        //impots
        $employees       = Employee::where('id', '=', $this->id)->first();
        $nbre_jours      = $employees->tax_payer_id;
        if($employees->tax_payer_id =='30'){
            $base_salary     = $employees->salary;
        }else{
            $base_salary     = $employees->branch_location;
        }

        //leave
        $leaves = \Modules\Leaves\Models\Leave::where('company_id', \Auth::user()->company_id)
            ->where('leave_type_id', '=', 1)
            ->where('status', 'Approuvé')
            ->where('leave_statut','=', 2)
            ->where('employee_id', $employees->id)
            ->first();

        $totalleave = 0;
        if($leaves){
            $totalleave  =  $leaves->amount_leave;
        }else{
            $totalleave  = 0;
        }

        //allowances
        $allowances      = \App\Models\Allowance::where('employee_id', '=', $this->id)->get();
        $total_allowance = 0;

        foreach ($allowances as $allowance) {
            $total_allowance =  $total_allowance + $allowance->amount;
        }

        //OtherPayment
        $terminations = \Modules\Ruptures\Models\Rupture::where('employee_id', '=', $this->id)->where('statut', '=', 1)->first();
        if($terminations){
            $totalright  = $terminations->indem_comp + $terminations->indem_comp_cong + $terminations->imdem_prea + $terminations->indem_licence + $terminations->aggravation + $terminations->dom_inter;
        }else{
            $totalright  = 0;
        }

        //Overtime
        $over_times      = \Modules\Time\Models\Overtime::where('employee_id', '=', $this->id)->where('statut', '=', 1)->where('paid', '=', 0)->get();

        $total_over_time = 0;
        foreach ($over_times as $over_time) {
            $amount          = $over_time->montant;
            $total_over_time = $amount + $total_over_time;
        }

        //timeSheet
        $times_sheets = \Modules\Time\Models\TimeSheet::where('employee_id', '=', $this->id)
                                  ->where('deduc_abs', '=', 1)
                                  ->whereBetween('date', [date('Y-m-01'), date('Y-m-t')])
                                  ->get();
        $total_time_sheet = 0;
        foreach ($times_sheets as $time_sheet) {
            $amount          = $time_sheet->retenue;
            $total_time_sheet = $amount + $total_time_sheet;
        }
        //avatnage en nature
        $avantages            = \Modules\NatureAvantage\Models\Avantage::where('employee_Id', '=', $this->id)->where('is_active', 1)->get();
        $total_avantages_real      = 0;
        foreach ($avantages as $avantage) {
            $total_avantages_real = $total_avantages_real + $avantage->montant_reel;
        }

        //Brut Salary Calculate
        if($totalright > 0){
            if($employees->statut_emp =='Stagiaire' || $employees->statut_emp == 'Apprenti' || $employees->statut_emp == 'Prestataire'){
                if($total_allowance > 0){
                    $salary_brut_total = ($total_allowance + $total_over_time);
                }else{
                    $salary_brut_total = ($base_salary + $total_over_time);
                }
            }else{
                $salary_brut_total = ($base_salary + $total_allowance + $total_over_time + $totalright + $total_avantages_real + $totalleave);
            }
        }else{
            if($employees->statut_emp =='Stagiaire' || $employees->statut_emp == 'Apprenti' || $employees->statut_emp == 'Prestataire'){
                if($total_allowance > 0){
                    $salary_brut_total = ($total_allowance + $total_over_time);
                }else{
                    $salary_brut_total = ($base_salary + $total_over_time);
                }
            }else{
                $salary_brut_total = ($base_salary + $total_allowance + $total_over_time + $total_avantages_real + $totalleave);
            }
        }


        return $salary_brut_total;
    }

    public static function allowance($id)
    {
        //allowance
        $allowances      = \App\Models\Allowance::where('employee_id', '=', $id)->get();
        $total_allowance = 0;
        foreach ($allowances as $allowance) {
            $total_allowance = $allowance->amount + $total_allowance;
        }

        $allowance_json = json_encode($allowances);

        return $allowance_json;
    }

    public static function loan($id)
    {
        //Loan
        $loans      = \Modules\Loans\Models\Loan::where('employee_id', '=', $id)->get();
        $total_loan = 0;
        foreach ($loans as $loan) {
            $total_loan = $loan->amount + $total_loan;
        }
        $loan_json = json_encode($loans);

        return $loan_json;
    }

    public static function saturation_deduction($id)
    {
        //Saturation Deduction
        $saturation_deductions      = SaturationDeduction::where('employee_id', '=', $id)->get();
        $total_saturation_deduction = 0;
        foreach ($saturation_deductions as $saturation_deduction) {
            $total_saturation_deduction = $saturation_deduction->amount + $total_saturation_deduction;
        }
        $saturation_deduction_json = json_encode($saturation_deductions);

        return $saturation_deduction_json;
    }

    public static function other_payment($id)
    {
        //OtherPayment
        $other_payments      = OtherPayment::where('employee_id', '=', $id)->get();
        $total_other_payment = 0;
        foreach ($other_payments as $other_payment) {
            $total_other_payment = $other_payment->amount + $total_other_payment;
        }
        $other_payment_json = json_encode($other_payments);

        return $other_payment_json;
    }

    public static function overtime($id)
    {
        //Overtime
        $over_times      = Overtime::where('employee_id', '=', $id)->get();
        $total_over_time = 0;
        foreach ($over_times as $over_time) {
            $total_work      = $over_time->number_of_days * $over_time->hours;
            $amount          = $total_work * $over_time->rate;
            $total_over_time = $amount + $total_over_time;
        }
        $over_time_json = json_encode($over_times);

        return $over_time_json;
    }

    public static function employee_id()
    {
        $employee = Employee::latest()->first();

        return !empty($employee) ? $employee->id + 1 : 1;
    }

    public function phone()
    {
        return $this->hasOne('App\Models\Employee', 'id', 'phone');
    }

    public function categorie()
    {
        return $this->hasOne('App\Models\JobCategory', 'id', 'jobcategory_id');
    }

    public function sous_categorie()
    {
        return $this->hasOne('App\Models\Department', 'id', 'department_id');
    }

    public function salaryType()
    {
        return $this->hasOne('App\Models\PayslipType', 'id', 'salary_type');
    }

    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    public function paySlip()
    {
        return $this->hasOne('App\Models\PaySlip', 'id', 'employee_id');
    }

    public function present_status($employee_id, $data)
    {
        return AttendanceEmployee::where('employee_id', $employee_id)->where('date', $data)->first();
    }

    public static function employee_name($name)
    {

        $employee = Employee::where('id', $name)->first();
        if (!empty($employee)) {
            return $employee->name;
        }
    }

    public function employeeName()
    {

        $employees       = Employee::where('id', '=', $this->id)->first();
        $employee_name   = $employees->name;

        return $employee_name;
    }

    public static function login_user($name)
    {
        $user = User::where('id', $name)->first();
        return $user->name;
    }

    public static function employee_salary($salary)
    {

        $employee = Employee::where("salary", $salary)->first();
        if ($employee->salary == '0' || $employee->salary == '0.0') {
            return "-";
        } else {
            return $employee->salary;
        }
    }

    public function get_retenue()
    {
        //impots
        $employees       = Employee::where('id', '=', $this->id)->first();
        $nbre_jours      = $employees->tax_payer_id;
        $allowances      = \App\Models\Allowance::where('employee_id', '=', $this->id)->get();
        //Loan
        $loans      = \Modules\Loans\Models\Loan::where('employee_id', '=', $this->id)->get();
        $total_loan = 0;
        $deduc      = 0;
        foreach ($loans as $loan) {
            if ($loan->type == 'percentage') {
                $employee    = Employee::find($loan->employee_id);
                $total_loan  = $loan->amount * $employee->salary / 100   + $total_loan;
                $deduc       = $loan->deduc_loan;
            } else {
                $total_loan = $loan->amount + $total_loan;
                $deduc       = $loan->deduc_loan;
            }

        }

        $brut_total = $employees->get_brut_salary();
        $brut = $employees->get_salary_imposable();
        $brut_cnps = $employees->get_salary_social();
        //calculons les charges des employés
        $cmu = $employees->cmu;

        if($cmu < 7){
            if($nbre_jours <= 0 ){
                $coticmu = 0;
                $coticmuemp = 0;
            }else{
                $coticmu = round($cmu*500);
                $coticmuemp = ($cmu*500);
            }
        }else{
            if($nbre_jours <= 0 ){
                $coticmu = 0;
                $coticmuemp = 0;
            }else{
                $coticmu = 3000 + round(($cmu-6)*1000);
                $coticmuemp = 3000;
            }
        }

        $cnps = round(($brut_cnps*6.3)/100);
        //$tt_cnps = ($brut_cnps*6.3)/100;
        $resultcmu =$coticmu;
        $resultcnps = $cnps;
        $resultimpricf = 0;
        if($nbre_jours =='30'){
            if($brut >= 0 && $brut <= 75000){
                $tot = ($brut*0)/100;
                $resultimpricf = round($tot);
            }else if($brut > 75000 && $brut <= 240000){
                $mt1 = $brut-75000;
                $tot1 = (((75000*0)/100)+(($mt1*16)/100));
                $resultimpricf = round($tot1);
            }else if($brut > 240000 && $brut <= 800000){
                $mt2 = $brut-240000;
                $tot2 = (((75000*0)/100)+((165000*16)/100)+(($mt2*21)/100));
                $resultimpricf = round($tot2);
            }else if($brut > 800000 && $brut <= 2400000){
                $mt3 = $brut-800000;
                $tot3 = (((75000*0)/100)+((165000*16)/100)+((560000*21)/100)+(($mt3*24)/100));
                $resultimpricf = round($tot3);
            }else if($brut > 2400000 && $brut <= 8000000){
                $mt4 = $brut-2400000;
                $tot4 = (((75000*0)/100)+((165000*16)/100)+((560000*21)/100)+((1600000*24)/100)+(($mt4*28)/100));
                $resultimpricf = round($tot4);
            }else if($brut > 8000000){
                $mt5 = $brut-8000000;
                $tot5 = (((75000*0)/100)+((165000*16)/100)+((560000*21)/100)+((1600000*24)/100)+((5600000*28)/100)+(($mt5*32)/100));
                $resultimpricf = round($tot5);
            }
            //nombre de part en FCFA
            $nbre = $employees->parts;
            if($nbre==1){
                $resultricf = (0);
            }else if($nbre==1.5){
                $resultricf = 5500;
            }else if($nbre==2){
                $resultricf = 11000;
            }else if($nbre==2.5){
                $resultricf = 16500;
            }else if($nbre==3){
                $resultricf = 22000;
            }else if($nbre==3.5){
                $resultricf = 27500;
            }else if($nbre==4){
                $resultricf = 33000;
            }else if($nbre==4.5){
                $resultricf = 38500;
            }else if($nbre==5){
                $resultricf = 44000;
            }
            $retenue2 = $resultimpricf - $resultricf;
            if($retenue2>0){
                $impots = ($resultimpricf - $resultricf) + $resultcnps + $resultcmu;
            }else{
                $impots = $resultcnps + $resultcmu;
            }
        }elseif($nbre_jours =='0' && $brut > 0){
            if($brut >= 0 && $brut <= 75000){
                $tot = ($brut*0)/100;
                $resultimpricf = round($tot);
            }else if($brut > 75000 && $brut <= 240000){
                $mt1 = $brut-75000;
                $tot1 = (((75000*0)/100)+(($mt1*16)/100));
                $resultimpricf = round($tot1);
            }else if($brut > 240000 && $brut <= 800000){
                $mt2 = $brut-240000;
                $tot2 = (((75000*0)/100)+((165000*16)/100)+(($mt2*21)/100));
                $resultimpricf = round($tot2);
            }else if($brut > 800000 && $brut <= 2400000){
                $mt3 = $brut-800000;
                $tot3 = (((75000*0)/100)+((165000*16)/100)+((560000*21)/100)+(($mt3*24)/100));
                $resultimpricf = round($tot3);
            }else if($brut > 2400000 && $brut <= 8000000){
                $mt4 = $brut-2400000;
                $tot4 = (((75000*0)/100)+((165000*16)/100)+((560000*21)/100)+((1600000*24)/100)+(($mt4*28)/100));
                $resultimpricf = round($tot4);
            }else if($brut > 8000000){
                $mt5 = $brut-8000000;
                $tot5 = (((75000*0)/100)+((165000*16)/100)+((560000*21)/100)+((1600000*24)/100)+((5600000*28)/100)+(($mt5*32)/100));
                $resultimpricf = round($tot5);
            }
            //nombre de part en FCFA
            $nbre = $employees->parts;
            if($nbre==1){
                $resultricf = (0);
            }else if($nbre==1.5){
                $resultricf = 5500;
            }else if($nbre==2){
                $resultricf = 11000;
            }else if($nbre==2.5){
                $resultricf = 16500;
            }else if($nbre==3){
                $resultricf = 22000;
            }else if($nbre==3.5){
                $resultricf = 27500;
            }else if($nbre==4){
                $resultricf = 33000;
            }else if($nbre==4.5){
                $resultricf = 38500;
            }else if($nbre==5){
                $resultricf = 44000;
            }

            $retenue2 = $resultimpricf - $resultricf;

            if($retenue2>0){
                $impots = ($resultimpricf - $resultricf) + $resultcnps + $resultcmu;
            }else{
                $impots = $resultcnps + $resultcmu;
            }
        }else{
            $day_salary = $brut/30;
            if($day_salary >= 0 && $day_salary <= 2500){
                $tot = ($day_salary*0)/100;
                $resultimpricf = round($tot*$nbre_jours);
            }else if($day_salary > 2500 && $day_salary <= 8000){
                $mt1 = $day_salary-2500;
                $tot1 = (((2500*0)/100)+(($mt1*16)/100));
                $resultimpricf = round($tot1*$nbre_jours);
            }else if($day_salary > 8000 && $day_salary <= 26667){
                $mt2 = $day_salary-8000;
                $tot2 = (((2500*0)/100)+((5500*16)/100)+(($mt2*21)/100));
                $resultimpricf = round($tot2*$nbre_jours);
            }else if($day_salary > 26667 && $day_salary <= 80000){
                $mt3 = $day_salary-26667;
                $tot3 = (((2500*0)/100)+((5500*16)/100)+((18667*21)/100)+(($mt3*24)/100));
                $resultimpricf = round($tot3*$nbre_jours);
            }else if($day_salary > 80000 && $day_salary <= 266667){
                $mt4 = $day_salary-80000;
                $tot4 = (((2500*0)/100)+((5500*16)/100)+((18667*21)/100)+((53333*24)/100)+(($mt4*28)/100));
                $resultimpricf = round($tot4*$nbre_jours);
            }else if($day_salary > 266667){
                $mt5 = $day_salary-266667;
                $tot5 = (((2500*0)/100)+((5500*16)/100)+((18667*21)/100)+((53333*24)/100)+((186667*28)/100)+(($mt5*32)/100));
                $resultimpricf = round($tot5*$nbre_jours);
            }
            //nombre de part en FCFA
            $nbre = $employees->parts;
            if($nbre==1){
                $resultricf = (0*$nbre_jours);
            }else if($nbre==1.5){
                $resultricf = (183*$nbre_jours);
            }else if($nbre==2){
                $resultricf = (367*$nbre_jours);
            }else if($nbre==2.5){
                $resultricf = (550*$nbre_jours);
            }else if($nbre==3){
                $resultricf = (733*$nbre_jours);
            }else if($nbre==3.5){
                $resultricf = (917*$nbre_jours);
            }else if($nbre==4){
                $resultricf = (1100*$nbre_jours);
            }else if($nbre==4.5){
                $resultricf = (1283*$nbre_jours);
            }else if($nbre==5){
                $resultricf = (1467*$nbre_jours);
            }
            $retenue2 = $resultimpricf - $resultricf;
            if($retenue2>0){
                $impots = ($resultimpricf - $resultricf) + $resultcnps + $resultcmu;
            }else{
                $impots = $resultcnps + $resultcmu;
            }
        }
        $mont_cant = 0;
        foreach ($allowances as $allowance) {
            if ($allowance->allowance_option == 31) {
                $mont_cant = $allowance->amount;
            }
        }

        //Net Salary Calculate
        $total_retenue = ($mont_cant+$impots);

        // Gestion des statuts Stagiaire, Apprenti, ou Prestataire
        if (in_array($employees->statut_emp, ['Stagiaire', 'Apprenti'])) {
            $total_retenue = 0;
        }

        return $total_retenue;
    }

    public function get_patronale()
    {
        //impots
        $employees       = Employee::where('id', '=', $this->id)->first();
        $nbre_jours      = $employees->tax_payer_id;
        //Loan
        $loans      = \Modules\Loans\Models\Loan::where('employee_id', '=', $this->id)->get();
        $total_loan = 0;
        $deduc      = 0;
        foreach ($loans as $loan) {
            if ($loan->type == 'percentage') {
                $employee    = Employee::find($loan->employee_id);
                $total_loan  = $loan->amount * $employee->salary / 100   + $total_loan;
                $deduc       = $loan->deduc_loan;
            } else {
                $total_loan = $loan->amount + $total_loan;
                $deduc       = $loan->deduc_loan;
            }

        }

        $brut_total = $employees->get_brut_salary();
        $brut = $employees->get_salary_imposable();
        $brut_cnps = $employees->get_salary_social();
        //calculons les charges des employés
        $cmu = $employees->cmu;

        if($cmu < 7){
            $coticmu = round($cmu*500);
            $coticmuemp = ($cmu*500);
        }else{
            $coticmu = 3000 + round(($cmu-6)*1000);
            $coticmuemp = 3000;
        }

        $cnps = round(($brut_cnps*6.3)/100);
        $cnpsemp = round(($brut_cnps*7.7)/100);
        $resultcmu =$coticmu;
        $resultcnps = $cnps;
        $resultimpricf = 0;

        $tauxact = 0;
        $accident = \App\Models\Company::where('id', \Auth::user()->company_id)->first();
        $act = $accident->taux_accident;
        //$prt = 0;
        $local = $employees->charge_expat;
        if($act=='0,03'){
            $tauxact= 75000*0.03;
            //$prt = 100*0.03;
        }else if($act=='0,02'){
            $tauxact= 75000*0.02;
            //$prt = 100*0.02;
        } else if($act=='0,04'){
            $tauxact= 75000*0.04;
            //$prt = 100*0.04;
        } else if($act=='0,05'){
            $tauxact= 75000*0.05;
           //$prt = 100*0.05;
        }

        $pf=0;
        $pf=((75000*5.75)/100);
        $tt_cnpsemp = $cnpsemp+$tauxact+((75000*5.75)/100)+$pf;

        //alert(tauxact);
        $tax1 = ($brut*1.2)/100;
        $tax2 = ($brut*11.5)/100;
        $tax3 = ($brut*1.6)/100;
        $tax4 = ($brut*0.4)/100;
        $tax5 = ($brut*1.2)/100;
        //tax4 = (brut*0.6)/100;
        $resultcmu = round($coticmu);
        $resultcnps = round($cnps);
        $resulttax1 = round($tax1);
        $resulttax2 = round($tax2);
        $resulttax3 = round($tax3);
        if($local == 'local'){
            $parpatronal = $tt_cnpsemp+$coticmuemp+$tax1+$tax3;//echo $local;
        }else{
            $parpatronal = $tt_cnpsemp+$coticmuemp+$resulttax1+$resulttax2+$resulttax3;//echo $local;
        }

        if($nbre_jours =='30'){
            if($brut >= 0 && $brut <= 75000){
                $tot = ($brut*0)/100;
                $resultimpricf = round($tot);
            }else if($brut > 75000 && $brut <= 240000){
                $mt1 = $brut-75000;
                $tot1 = (((75000*0)/100)+(($mt1*16)/100));
                $resultimpricf = round($tot1);
            }else if($brut > 240000 && $brut <= 800000){
                $mt2 = $brut-240000;
                $tot2 = (((75000*0)/100)+((165000*16)/100)+(($mt2*21)/100));
                $resultimpricf = round($tot2);
            }else if($brut > 800000 && $brut <= 2400000){
                $mt3 = $brut-800000;
                $tot3 = (((75000*0)/100)+((165000*16)/100)+((560000*21)/100)+(($mt3*24)/100));
                $resultimpricf = round($tot3);
            }else if($brut > 2400000 && $brut <= 8000000){
                $mt4 = $brut-2400000;
                $tot4 = (((75000*0)/100)+((165000*16)/100)+((560000*21)/100)+((1600000*24)/100)+(($mt4*28)/100));
                $resultimpricf = round($tot4);
            }else if($brut > 8000000){
                $mt5 = $brut-8000000;
                $tot5 = (((75000*0)/100)+((165000*16)/100)+((560000*21)/100)+((1600000*24)/100)+((5600000*28)/100)+(($mt5*32)/100));
                $resultimpricf = round($tot5);
            }
            //nombre de part en FCFA
            $nbre = $employees->parts;
            if($nbre==1){
                $resultricf = (0);
            }else if($nbre==1.5){
                $resultricf = 5500;
            }else if($nbre==2){
                $resultricf = 11000;
            }else if($nbre==2.5){
                $resultricf = 16500;
            }else if($nbre==3){
                $resultricf = 22000;
            }else if($nbre==3.5){
                $resultricf = 27500;
            }else if($nbre==4){
                $resultricf = 33000;
            }else if($nbre==4.5){
                $resultricf = 38500;
            }else if($nbre==5){
                $resultricf = 44000;
            }
            $retenue2 = $resultimpricf - $resultricf;
            if($retenue2>0){
                $impots = ($resultimpricf - $resultricf) + $resultcnps + $resultcmu;
            }else{
                $impots = $resultcnps + $resultcmu;
            }
        }elseif($nbre_jours =='0' && $brut > 0){
            if($brut >= 0 && $brut <= 75000){
                $tot = ($brut*0)/100;
                $resultimpricf = round($tot);
            }else if($brut > 75000 && $brut <= 240000){
                $mt1 = $brut-75000;
                $tot1 = (((75000*0)/100)+(($mt1*16)/100));
                $resultimpricf = round($tot1);
            }else if($brut > 240000 && $brut <= 800000){
                $mt2 = $brut-240000;
                $tot2 = (((75000*0)/100)+((165000*16)/100)+(($mt2*21)/100));
                $resultimpricf = round($tot2);
            }else if($brut > 800000 && $brut <= 2400000){
                $mt3 = $brut-800000;
                $tot3 = (((75000*0)/100)+((165000*16)/100)+((560000*21)/100)+(($mt3*24)/100));
                $resultimpricf = round($tot3);
            }else if($brut > 2400000 && $brut <= 8000000){
                $mt4 = $brut-2400000;
                $tot4 = (((75000*0)/100)+((165000*16)/100)+((560000*21)/100)+((1600000*24)/100)+(($mt4*28)/100));
                $resultimpricf = round($tot4);
            }else if($brut > 8000000){
                $mt5 = $brut-8000000;
                $tot5 = (((75000*0)/100)+((165000*16)/100)+((560000*21)/100)+((1600000*24)/100)+((5600000*28)/100)+(($mt5*32)/100));
                $resultimpricf = round($tot5);
            }
            //nombre de part en FCFA
            $nbre = $employees->parts;
            if($nbre==1){
                $resultricf = (0);
            }else if($nbre==1.5){
                $resultricf = 5500;
            }else if($nbre==2){
                $resultricf = 11000;
            }else if($nbre==2.5){
                $resultricf = 16500;
            }else if($nbre==3){
                $resultricf = 22000;
            }else if($nbre==3.5){
                $resultricf = 27500;
            }else if($nbre==4){
                $resultricf = 33000;
            }else if($nbre==4.5){
                $resultricf = 38500;
            }else if($nbre==5){
                $resultricf = 44000;
            }

            $retenue2 = $resultimpricf - $resultricf;

            if($retenue2>0){
                $impots = ($resultimpricf - $resultricf) + $resultcnps + $resultcmu;
            }else{
                $impots = $resultcnps + $resultcmu;
            }
        }else{
            $day_salary = $brut/30;
            if($day_salary >= 0 && $day_salary <= 2500){
                $tot = ($day_salary*0)/100;
                $resultimpricf = round($tot*$nbre_jours);
            }else if($day_salary > 2500 && $day_salary <= 8000){
                $mt1 = $day_salary-2500;
                $tot1 = (((2500*0)/100)+(($mt1*16)/100));
                $resultimpricf = round($tot1*$nbre_jours);
            }else if($day_salary > 8000 && $day_salary <= 26667){
                $mt2 = $day_salary-8000;
                $tot2 = (((2500*0)/100)+((5500*16)/100)+(($mt2*21)/100));
                $resultimpricf = round($tot2*$nbre_jours);
            }else if($day_salary > 26667 && $day_salary <= 80000){
                $mt3 = $day_salary-26667;
                $tot3 = (((2500*0)/100)+((5500*16)/100)+((18667*21)/100)+(($mt3*24)/100));
                $resultimpricf = round($tot3*$nbre_jours);
            }else if($day_salary > 80000 && $day_salary <= 266667){
                $mt4 = $day_salary-80000;
                $tot4 = (((2500*0)/100)+((5500*16)/100)+((18667*21)/100)+((53333*24)/100)+(($mt4*28)/100));
                $resultimpricf = round($tot4*$nbre_jours);
            }else if($day_salary > 266667){
                $mt5 = $day_salary-266667;
                $tot5 = (((2500*0)/100)+((5500*16)/100)+((18667*21)/100)+((53333*24)/100)+((186667*28)/100)+(($mt5*32)/100));
                $resultimpricf = round($tot5*$nbre_jours);
            }
            //nombre de part en FCFA
            $nbre = $employees->parts;
            if($nbre==1){
                $resultricf = (0*$nbre_jours);
            }else if($nbre==1.5){
                $resultricf = (183*$nbre_jours);
            }else if($nbre==2){
                $resultricf = (367*$nbre_jours);
            }else if($nbre==2.5){
                $resultricf = (550*$nbre_jours);
            }else if($nbre==3){
                $resultricf = (733*$nbre_jours);
            }else if($nbre==3.5){
                $resultricf = (917*$nbre_jours);
            }else if($nbre==4){
                $resultricf = (1100*$nbre_jours);
            }else if($nbre==4.5){
                $resultricf = (1283*$nbre_jours);
            }else if($nbre==5){
                $resultricf = (1467*$nbre_jours);
            }
            $retenue2 = $resultimpricf - $resultricf;
            if($retenue2>0){
                $impots = ($resultimpricf - $resultricf) + $resultcnps + $resultcmu;
            }else{
                $impots = $resultcnps + $resultcmu;
            }
        }

        //Net Salary Calculate
        $salarynet2 = ($brut_total-$impots);
        if($deduc=='1'){
            $net_salary = $salarynet2-$total_loan;
        }else{
            $net_salary = $salarynet2;
        }

        // Gestion des statuts Stagiaire, Apprenti, ou Prestataire
        if (in_array($employees->statut_emp, ['Stagiaire', 'Apprenti'])) {
            $parpatronal = 0;
        }
        return $parpatronal;
    }

    public function get_Imp_brut()
    {
        //impots
        $employees       = Employee::where('id', '=', $this->id)->first();
        $nbre_jours      = $employees->tax_payer_id;
        //Loan
        $loans      = \Modules\Loans\Models\Loan::where('employee_id', '=', $this->id)->get();
        $total_loan = 0;
        $deduc      = 0;
        foreach ($loans as $loan) {
            if ($loan->type == 'percentage') {
                $employee    = Employee::find($loan->employee_id);
                $total_loan  = $loan->amount * $employee->salary / 100   + $total_loan;
                $deduc       = $loan->deduc_loan;
            } else {
                $total_loan = $loan->amount + $total_loan;
                $deduc       = $loan->deduc_loan;
            }

        }

        $brut_total = $employees->get_brut_salary();
        $brut = $employees->get_salary_imposable();
        $brut_cnps = $employees->get_salary_social();
        //calculons les charges des employés
        $cmu = $employees->cmu;

        if($cmu < 7){
            $coticmu = round($cmu*500);
            $coticmuemp = ($cmu*500);
        }else{
            $coticmu = 3000 + round(($cmu-6)*1000);
            $coticmuemp = 3000;
        }

        $cnps = round(($brut_cnps*6.3)/100);
        //$tt_cnps = ($brut_cnps*6.3)/100;
        $resultcmu =$coticmu;
        $resultcnps = $cnps;
        $resultimpricf = 0;
        if($nbre_jours =='30'){
            if($brut >= 0 && $brut <= 75000){
                $tot = ($brut*0)/100;
                $resultimpricf = round($tot);
            }else if($brut > 75000 && $brut <= 240000){
                $mt1 = $brut-75000;
                $tot1 = (((75000*0)/100)+(($mt1*16)/100));
                $resultimpricf = round($tot1);
            }else if($brut > 240000 && $brut <= 800000){
                $mt2 = $brut-240000;
                $tot2 = (((75000*0)/100)+((165000*16)/100)+(($mt2*21)/100));
                $resultimpricf = round($tot2);
            }else if($brut > 800000 && $brut <= 2400000){
                $mt3 = $brut-800000;
                $tot3 = (((75000*0)/100)+((165000*16)/100)+((560000*21)/100)+(($mt3*24)/100));
                $resultimpricf = round($tot3);
            }else if($brut > 2400000 && $brut <= 8000000){
                $mt4 = $brut-2400000;
                $tot4 = (((75000*0)/100)+((165000*16)/100)+((560000*21)/100)+((1600000*24)/100)+(($mt4*28)/100));
                $resultimpricf = round($tot4);
            }else if($brut > 8000000){
                $mt5 = $brut-8000000;
                $tot5 = (((75000*0)/100)+((165000*16)/100)+((560000*21)/100)+((1600000*24)/100)+((5600000*28)/100)+(($mt5*32)/100));
                $resultimpricf = round($tot5);
            }
            //nombre de part en FCFA
            $nbre = $employees->parts;
            if($nbre==1){
                $resultricf = (0);
            }else if($nbre==1.5){
                $resultricf = 5500;
            }else if($nbre==2){
                $resultricf = 11000;
            }else if($nbre==2.5){
                $resultricf = 16500;
            }else if($nbre==3){
                $resultricf = 22000;
            }else if($nbre==3.5){
                $resultricf = 27500;
            }else if($nbre==4){
                $resultricf = 33000;
            }else if($nbre==4.5){
                $resultricf = 38500;
            }else if($nbre==5){
                $resultricf = 44000;
            }
            $retenue2 = $resultimpricf - $resultricf;
            if($retenue2>0){
                $impots = ($resultimpricf - $resultricf) + $resultcnps + $resultcmu;
            }else{
                $impots = $resultcnps + $resultcmu;
            }
        }elseif($nbre_jours =='0' && $brut > 0){
            if($brut >= 0 && $brut <= 75000){
                $tot = ($brut*0)/100;
                $resultimpricf = round($tot);
            }else if($brut > 75000 && $brut <= 240000){
                $mt1 = $brut-75000;
                $tot1 = (((75000*0)/100)+(($mt1*16)/100));
                $resultimpricf = round($tot1);
            }else if($brut > 240000 && $brut <= 800000){
                $mt2 = $brut-240000;
                $tot2 = (((75000*0)/100)+((165000*16)/100)+(($mt2*21)/100));
                $resultimpricf = round($tot2);
            }else if($brut > 800000 && $brut <= 2400000){
                $mt3 = $brut-800000;
                $tot3 = (((75000*0)/100)+((165000*16)/100)+((560000*21)/100)+(($mt3*24)/100));
                $resultimpricf = round($tot3);
            }else if($brut > 2400000 && $brut <= 8000000){
                $mt4 = $brut-2400000;
                $tot4 = (((75000*0)/100)+((165000*16)/100)+((560000*21)/100)+((1600000*24)/100)+(($mt4*28)/100));
                $resultimpricf = round($tot4);
            }else if($brut > 8000000){
                $mt5 = $brut-8000000;
                $tot5 = (((75000*0)/100)+((165000*16)/100)+((560000*21)/100)+((1600000*24)/100)+((5600000*28)/100)+(($mt5*32)/100));
                $resultimpricf = round($tot5);
            }
            //nombre de part en FCFA
            $nbre = $employees->parts;
            if($nbre==1){
                $resultricf = (0);
            }else if($nbre==1.5){
                $resultricf = 5500;
            }else if($nbre==2){
                $resultricf = 11000;
            }else if($nbre==2.5){
                $resultricf = 16500;
            }else if($nbre==3){
                $resultricf = 22000;
            }else if($nbre==3.5){
                $resultricf = 27500;
            }else if($nbre==4){
                $resultricf = 33000;
            }else if($nbre==4.5){
                $resultricf = 38500;
            }else if($nbre==5){
                $resultricf = 44000;
            }

            $retenue2 = $resultimpricf - $resultricf;

            if($retenue2>0){
                $impots = ($resultimpricf - $resultricf) + $resultcnps + $resultcmu;
            }else{
                $impots = $resultcnps + $resultcmu;
            }
        }else{
            $day_salary = $brut/30;
            if($day_salary >= 0 && $day_salary <= 2500){
                $tot = ($day_salary*0)/100;
                $resultimpricf = round($tot*$nbre_jours);
            }else if($day_salary > 2500 && $day_salary <= 8000){
                $mt1 = $day_salary-2500;
                $tot1 = (((2500*0)/100)+(($mt1*16)/100));
                $resultimpricf = round($tot1*$nbre_jours);
            }else if($day_salary > 8000 && $day_salary <= 26667){
                $mt2 = $day_salary-8000;
                $tot2 = (((2500*0)/100)+((5500*16)/100)+(($mt2*21)/100));
                $resultimpricf = round($tot2*$nbre_jours);
            }else if($day_salary > 26667 && $day_salary <= 80000){
                $mt3 = $day_salary-26667;
                $tot3 = (((2500*0)/100)+((5500*16)/100)+((18667*21)/100)+(($mt3*24)/100));
                $resultimpricf = round($tot3*$nbre_jours);
            }else if($day_salary > 80000 && $day_salary <= 266667){
                $mt4 = $day_salary-80000;
                $tot4 = (((2500*0)/100)+((5500*16)/100)+((18667*21)/100)+((53333*24)/100)+(($mt4*28)/100));
                $resultimpricf = round($tot4*$nbre_jours);
            }else if($day_salary > 266667){
                $mt5 = $day_salary-266667;
                $tot5 = (((2500*0)/100)+((5500*16)/100)+((18667*21)/100)+((53333*24)/100)+((186667*28)/100)+(($mt5*32)/100));
                $resultimpricf = round($tot5*$nbre_jours);
            }
            //nombre de part en FCFA
            $nbre = $employees->parts;
            if($nbre==1){
                $resultricf = (0*$nbre_jours);
            }else if($nbre==1.5){
                $resultricf = (183*$nbre_jours);
            }else if($nbre==2){
                $resultricf = (367*$nbre_jours);
            }else if($nbre==2.5){
                $resultricf = (550*$nbre_jours);
            }else if($nbre==3){
                $resultricf = (733*$nbre_jours);
            }else if($nbre==3.5){
                $resultricf = (917*$nbre_jours);
            }else if($nbre==4){
                $resultricf = (1100*$nbre_jours);
            }else if($nbre==4.5){
                $resultricf = (1283*$nbre_jours);
            }else if($nbre==5){
                $resultricf = (1467*$nbre_jours);
            }
            $retenue2 = $resultimpricf - $resultricf;
            if($retenue2>0){
                $impots = ($resultimpricf - $resultricf) + $resultcnps + $resultcmu;
            }else{
                $impots = $resultcnps + $resultcmu;
            }
        }

        //Net Salary Calculate
        $salarynet2 = ($brut_total-$impots);
        if($deduc=='1'){
            $net_salary = $salarynet2-$total_loan;
        }else{
            $net_salary = $salarynet2;
        }

        // Gestion des statuts Stagiaire, Apprenti, ou Prestataire
        if (in_array($employees->statut_emp, ['Stagiaire', 'Apprenti'])) {
            $resultimpricf = 0;
        }

        return $resultimpricf;
    }

    public function get_ricf()
    {
        //impots
        $employees       = Employee::where('id', '=', $this->id)->first();
        $nbre_jours      = $employees->tax_payer_id;
        //Loan
        $loans      = \Modules\Loans\Models\Loan::where('employee_id', '=', $this->id)->get();
        $total_loan = 0;
        $deduc      = 0;
        foreach ($loans as $loan) {
            if ($loan->type == 'percentage') {
                $employee    = Employee::find($loan->employee_id);
                $total_loan  = $loan->amount * $employee->salary / 100   + $total_loan;
                $deduc       = $loan->deduc_loan;
            } else {
                $total_loan = $loan->amount + $total_loan;
                $deduc       = $loan->deduc_loan;
            }

        }

        $brut_total = $employees->get_brut_salary();
        $brut = $employees->get_salary_imposable();
        $brut_cnps = $employees->get_salary_social();
        //calculons les charges des employés
        $cmu = $employees->cmu;

        if($cmu < 7){
            $coticmu = round($cmu*500);
            $coticmuemp = ($cmu*500);
        }else{
            $coticmu = 3000 + round(($cmu-6)*1000);
            $coticmuemp = 3000;
        }

        $cnps = round(($brut_cnps*6.3)/100);
        //$tt_cnps = ($brut_cnps*6.3)/100;
        $resultcmu =$coticmu;
        $resultcnps = $cnps;
        $resultimpricf = 0;
        if($nbre_jours =='30'){
            if($brut >= 0 && $brut <= 75000){
                $tot = ($brut*0)/100;
                $resultimpricf = round($tot);
            }else if($brut > 75000 && $brut <= 240000){
                $mt1 = $brut-75000;
                $tot1 = (((75000*0)/100)+(($mt1*16)/100));
                $resultimpricf = round($tot1);
            }else if($brut > 240000 && $brut <= 800000){
                $mt2 = $brut-240000;
                $tot2 = (((75000*0)/100)+((165000*16)/100)+(($mt2*21)/100));
                $resultimpricf = round($tot2);
            }else if($brut > 800000 && $brut <= 2400000){
                $mt3 = $brut-800000;
                $tot3 = (((75000*0)/100)+((165000*16)/100)+((560000*21)/100)+(($mt3*24)/100));
                $resultimpricf = round($tot3);
            }else if($brut > 2400000 && $brut <= 8000000){
                $mt4 = $brut-2400000;
                $tot4 = (((75000*0)/100)+((165000*16)/100)+((560000*21)/100)+((1600000*24)/100)+(($mt4*28)/100));
                $resultimpricf = round($tot4);
            }else if($brut > 8000000){
                $mt5 = $brut-8000000;
                $tot5 = (((75000*0)/100)+((165000*16)/100)+((560000*21)/100)+((1600000*24)/100)+((5600000*28)/100)+(($mt5*32)/100));
                $resultimpricf = round($tot5);
            }
            //nombre de part en FCFA
            $nbre = $employees->parts;
            if($nbre==1){
                $resultricf = (0);
            }else if($nbre==1.5){
                $resultricf = 5500;
            }else if($nbre==2){
                $resultricf = 11000;
            }else if($nbre==2.5){
                $resultricf = 16500;
            }else if($nbre==3){
                $resultricf = 22000;
            }else if($nbre==3.5){
                $resultricf = 27500;
            }else if($nbre==4){
                $resultricf = 33000;
            }else if($nbre==4.5){
                $resultricf = 38500;
            }else if($nbre==5){
                $resultricf = 44000;
            }
            $retenue2 = $resultimpricf - $resultricf;
            if($retenue2>0){
                $impots = ($resultimpricf - $resultricf) + $resultcnps + $resultcmu;
            }else{
                $impots = $resultcnps + $resultcmu;
            }
        }elseif($nbre_jours =='0' && $brut > 0){
            if($brut >= 0 && $brut <= 75000){
                $tot = ($brut*0)/100;
                $resultimpricf = round($tot);
            }else if($brut > 75000 && $brut <= 240000){
                $mt1 = $brut-75000;
                $tot1 = (((75000*0)/100)+(($mt1*16)/100));
                $resultimpricf = round($tot1);
            }else if($brut > 240000 && $brut <= 800000){
                $mt2 = $brut-240000;
                $tot2 = (((75000*0)/100)+((165000*16)/100)+(($mt2*21)/100));
                $resultimpricf = round($tot2);
            }else if($brut > 800000 && $brut <= 2400000){
                $mt3 = $brut-800000;
                $tot3 = (((75000*0)/100)+((165000*16)/100)+((560000*21)/100)+(($mt3*24)/100));
                $resultimpricf = round($tot3);
            }else if($brut > 2400000 && $brut <= 8000000){
                $mt4 = $brut-2400000;
                $tot4 = (((75000*0)/100)+((165000*16)/100)+((560000*21)/100)+((1600000*24)/100)+(($mt4*28)/100));
                $resultimpricf = round($tot4);
            }else if($brut > 8000000){
                $mt5 = $brut-8000000;
                $tot5 = (((75000*0)/100)+((165000*16)/100)+((560000*21)/100)+((1600000*24)/100)+((5600000*28)/100)+(($mt5*32)/100));
                $resultimpricf = round($tot5);
            }
            //nombre de part en FCFA
            $nbre = $employees->parts;
            if($nbre==1){
                $resultricf = (0);
            }else if($nbre==1.5){
                $resultricf = 5500;
            }else if($nbre==2){
                $resultricf = 11000;
            }else if($nbre==2.5){
                $resultricf = 16500;
            }else if($nbre==3){
                $resultricf = 22000;
            }else if($nbre==3.5){
                $resultricf = 27500;
            }else if($nbre==4){
                $resultricf = 33000;
            }else if($nbre==4.5){
                $resultricf = 38500;
            }else if($nbre==5){
                $resultricf = 44000;
            }

            $retenue2 = $resultimpricf - $resultricf;

            if($retenue2>0){
                $impots = ($resultimpricf - $resultricf) + $resultcnps + $resultcmu;
            }else{
                $impots = $resultcnps + $resultcmu;
            }
        }else{
            $day_salary = $brut/30;
            if($day_salary >= 0 && $day_salary <= 2500){
                $tot = ($day_salary*0)/100;
                $resultimpricf = round($tot*$nbre_jours);
            }else if($day_salary > 2500 && $day_salary <= 8000){
                $mt1 = $day_salary-2500;
                $tot1 = (((2500*0)/100)+(($mt1*16)/100));
                $resultimpricf = round($tot1*$nbre_jours);
            }else if($day_salary > 8000 && $day_salary <= 26667){
                $mt2 = $day_salary-8000;
                $tot2 = (((2500*0)/100)+((5500*16)/100)+(($mt2*21)/100));
                $resultimpricf = round($tot2*$nbre_jours);
            }else if($day_salary > 26667 && $day_salary <= 80000){
                $mt3 = $day_salary-26667;
                $tot3 = (((2500*0)/100)+((5500*16)/100)+((18667*21)/100)+(($mt3*24)/100));
                $resultimpricf = round($tot3*$nbre_jours);
            }else if($day_salary > 80000 && $day_salary <= 266667){
                $mt4 = $day_salary-80000;
                $tot4 = (((2500*0)/100)+((5500*16)/100)+((18667*21)/100)+((53333*24)/100)+(($mt4*28)/100));
                $resultimpricf = round($tot4*$nbre_jours);
            }else if($day_salary > 266667){
                $mt5 = $day_salary-266667;
                $tot5 = (((2500*0)/100)+((5500*16)/100)+((18667*21)/100)+((53333*24)/100)+((186667*28)/100)+(($mt5*32)/100));
                $resultimpricf = round($tot5*$nbre_jours);
            }
            //nombre de part en FCFA
            $nbre = $employees->parts;
            if($nbre==1){
                $resultricf = (0*$nbre_jours);
            }else if($nbre==1.5){
                $resultricf = (183*$nbre_jours);
            }else if($nbre==2){
                $resultricf = (367*$nbre_jours);
            }else if($nbre==2.5){
                $resultricf = (550*$nbre_jours);
            }else if($nbre==3){
                $resultricf = (733*$nbre_jours);
            }else if($nbre==3.5){
                $resultricf = (917*$nbre_jours);
            }else if($nbre==4){
                $resultricf = (1100*$nbre_jours);
            }else if($nbre==4.5){
                $resultricf = (1283*$nbre_jours);
            }else if($nbre==5){
                $resultricf = (1467*$nbre_jours);
            }
            $retenue2 = $resultimpricf - $resultricf;
            if($retenue2>0){
                $impots = ($resultimpricf - $resultricf) + $resultcnps + $resultcmu;
            }else{
                $impots = $resultcnps + $resultcmu;
            }
        }

        //Net Salary Calculate
        $salarynet2 = ($brut_total-$impots);
        if($deduc=='1'){
            $net_salary = $salarynet2-$total_loan;
        }else{
            $net_salary = $salarynet2;
        }
        return $resultricf;
    }

    public function get_cnps_sal()
    {
        //impots
        $employees       = Employee::where('id', '=', $this->id)->first();
        $nbre_jours      = $employees->tax_payer_id;
        //Loan
        $loans      = \Modules\Loans\Models\Loan::where('employee_id', '=', $this->id)->get();
        $total_loan = 0;
        $deduc      = 0;
        foreach ($loans as $loan) {
            if ($loan->type == 'percentage') {
                $employee    = Employee::find($loan->employee_id);
                $total_loan  = $loan->amount * $employee->salary / 100   + $total_loan;
                $deduc       = $loan->deduc_loan;
            } else {
                $total_loan = $loan->amount + $total_loan;
                $deduc       = $loan->deduc_loan;
            }

        }

        $brut_total = $employees->get_brut_salary();
        $brut = $employees->get_salary_imposable();
        $brut_cnps = $employees->get_salary_social();
        //calculons les charges des employés
        $cmu = $employees->cmu;

        if($cmu < 7){
            $coticmu = round($cmu*500);
            $coticmuemp = ($cmu*500);
        }else{
            $coticmu = 3000 + round(($cmu-6)*1000);
            $coticmuemp = 3000;
        }

        $cnps = round(($brut_cnps*6.3)/100);
        //$tt_cnps = ($brut_cnps*6.3)/100;
        $resultcmu =$coticmu;
        $resultcnps = $cnps;
        $resultimpricf = 0;
        if($nbre_jours =='30'){
            if($brut >= 0 && $brut <= 75000){
                $tot = ($brut*0)/100;
                $resultimpricf = round($tot);
            }else if($brut > 75000 && $brut <= 240000){
                $mt1 = $brut-75000;
                $tot1 = (((75000*0)/100)+(($mt1*16)/100));
                $resultimpricf = round($tot1);
            }else if($brut > 240000 && $brut <= 800000){
                $mt2 = $brut-240000;
                $tot2 = (((75000*0)/100)+((165000*16)/100)+(($mt2*21)/100));
                $resultimpricf = round($tot2);
            }else if($brut > 800000 && $brut <= 2400000){
                $mt3 = $brut-800000;
                $tot3 = (((75000*0)/100)+((165000*16)/100)+((560000*21)/100)+(($mt3*24)/100));
                $resultimpricf = round($tot3);
            }else if($brut > 2400000 && $brut <= 8000000){
                $mt4 = $brut-2400000;
                $tot4 = (((75000*0)/100)+((165000*16)/100)+((560000*21)/100)+((1600000*24)/100)+(($mt4*28)/100));
                $resultimpricf = round($tot4);
            }else if($brut > 8000000){
                $mt5 = $brut-8000000;
                $tot5 = (((75000*0)/100)+((165000*16)/100)+((560000*21)/100)+((1600000*24)/100)+((5600000*28)/100)+(($mt5*32)/100));
                $resultimpricf = round($tot5);
            }
            //nombre de part en FCFA
            $nbre = $employees->parts;
            if($nbre==1){
                $resultricf = (0);
            }else if($nbre==1.5){
                $resultricf = 5500;
            }else if($nbre==2){
                $resultricf = 11000;
            }else if($nbre==2.5){
                $resultricf = 16500;
            }else if($nbre==3){
                $resultricf = 22000;
            }else if($nbre==3.5){
                $resultricf = 27500;
            }else if($nbre==4){
                $resultricf = 33000;
            }else if($nbre==4.5){
                $resultricf = 38500;
            }else if($nbre==5){
                $resultricf = 44000;
            }
            $retenue2 = $resultimpricf - $resultricf;
            if($retenue2>0){
                $impots = ($resultimpricf - $resultricf) + $resultcnps + $resultcmu;
            }else{
                $impots = $resultcnps + $resultcmu;
            }
        }elseif($nbre_jours =='0' && $brut > 0){
            if($brut >= 0 && $brut <= 75000){
                $tot = ($brut*0)/100;
                $resultimpricf = round($tot);
            }else if($brut > 75000 && $brut <= 240000){
                $mt1 = $brut-75000;
                $tot1 = (((75000*0)/100)+(($mt1*16)/100));
                $resultimpricf = round($tot1);
            }else if($brut > 240000 && $brut <= 800000){
                $mt2 = $brut-240000;
                $tot2 = (((75000*0)/100)+((165000*16)/100)+(($mt2*21)/100));
                $resultimpricf = round($tot2);
            }else if($brut > 800000 && $brut <= 2400000){
                $mt3 = $brut-800000;
                $tot3 = (((75000*0)/100)+((165000*16)/100)+((560000*21)/100)+(($mt3*24)/100));
                $resultimpricf = round($tot3);
            }else if($brut > 2400000 && $brut <= 8000000){
                $mt4 = $brut-2400000;
                $tot4 = (((75000*0)/100)+((165000*16)/100)+((560000*21)/100)+((1600000*24)/100)+(($mt4*28)/100));
                $resultimpricf = round($tot4);
            }else if($brut > 8000000){
                $mt5 = $brut-8000000;
                $tot5 = (((75000*0)/100)+((165000*16)/100)+((560000*21)/100)+((1600000*24)/100)+((5600000*28)/100)+(($mt5*32)/100));
                $resultimpricf = round($tot5);
            }
            //nombre de part en FCFA
            $nbre = $employees->parts;
            if($nbre==1){
                $resultricf = (0);
            }else if($nbre==1.5){
                $resultricf = 5500;
            }else if($nbre==2){
                $resultricf = 11000;
            }else if($nbre==2.5){
                $resultricf = 16500;
            }else if($nbre==3){
                $resultricf = 22000;
            }else if($nbre==3.5){
                $resultricf = 27500;
            }else if($nbre==4){
                $resultricf = 33000;
            }else if($nbre==4.5){
                $resultricf = 38500;
            }else if($nbre==5){
                $resultricf = 44000;
            }

            $retenue2 = $resultimpricf - $resultricf;

            if($retenue2>0){
                $impots = ($resultimpricf - $resultricf) + $resultcnps + $resultcmu;
            }else{
                $impots = $resultcnps + $resultcmu;
            }
        }else{
            $day_salary = $brut/30;
            if($day_salary >= 0 && $day_salary <= 2500){
                $tot = ($day_salary*0)/100;
                $resultimpricf = round($tot*$nbre_jours);
            }else if($day_salary > 2500 && $day_salary <= 8000){
                $mt1 = $day_salary-2500;
                $tot1 = (((2500*0)/100)+(($mt1*16)/100));
                $resultimpricf = round($tot1*$nbre_jours);
            }else if($day_salary > 8000 && $day_salary <= 26667){
                $mt2 = $day_salary-8000;
                $tot2 = (((2500*0)/100)+((5500*16)/100)+(($mt2*21)/100));
                $resultimpricf = round($tot2*$nbre_jours);
            }else if($day_salary > 26667 && $day_salary <= 80000){
                $mt3 = $day_salary-26667;
                $tot3 = (((2500*0)/100)+((5500*16)/100)+((18667*21)/100)+(($mt3*24)/100));
                $resultimpricf = round($tot3*$nbre_jours);
            }else if($day_salary > 80000 && $day_salary <= 266667){
                $mt4 = $day_salary-80000;
                $tot4 = (((2500*0)/100)+((5500*16)/100)+((18667*21)/100)+((53333*24)/100)+(($mt4*28)/100));
                $resultimpricf = round($tot4*$nbre_jours);
            }else if($day_salary > 266667){
                $mt5 = $day_salary-266667;
                $tot5 = (((2500*0)/100)+((5500*16)/100)+((18667*21)/100)+((53333*24)/100)+((186667*28)/100)+(($mt5*32)/100));
                $resultimpricf = round($tot5*$nbre_jours);
            }
            //nombre de part en FCFA
            $nbre = $employees->parts;
            if($nbre==1){
                $resultricf = (0*$nbre_jours);
            }else if($nbre==1.5){
                $resultricf = (183*$nbre_jours);
            }else if($nbre==2){
                $resultricf = (367*$nbre_jours);
            }else if($nbre==2.5){
                $resultricf = (550*$nbre_jours);
            }else if($nbre==3){
                $resultricf = (733*$nbre_jours);
            }else if($nbre==3.5){
                $resultricf = (917*$nbre_jours);
            }else if($nbre==4){
                $resultricf = (1100*$nbre_jours);
            }else if($nbre==4.5){
                $resultricf = (1283*$nbre_jours);
            }else if($nbre==5){
                $resultricf = (1467*$nbre_jours);
            }
            $retenue2 = $resultimpricf - $resultricf;
            if($retenue2>0){
                $impots = ($resultimpricf - $resultricf) + $resultcnps + $resultcmu;
            }else{
                $impots = $resultcnps + $resultcmu;
            }
        }

        //Net Salary Calculate
        $salarynet2 = ($brut_total-$impots);
        if($deduc=='1'){
            $net_salary = $salarynet2-$total_loan;
        }else{
            $net_salary = $salarynet2;
        }

        // Gestion des statuts Stagiaire, Apprenti, ou Prestataire
        if (in_array($employees->statut_emp, ['Stagiaire', 'Apprenti'])) {
            $resultcnps = 0;
        }
        return $resultcnps;
    }

    public function get_imp_net()
    {
        //impots
        $employees       = Employee::where('id', '=', $this->id)->first();
        $nbre_jours      = $employees->tax_payer_id;
        //Loan
        $loans      = \Modules\Loans\Models\Loan::where('employee_id', '=', $this->id)->get();
        $total_loan = 0;
        $deduc      = 0;
        foreach ($loans as $loan) {
            if ($loan->type == 'percentage') {
                $employee    = Employee::find($loan->employee_id);
                $total_loan  = $loan->amount * $employee->salary / 100   + $total_loan;
                $deduc       = $loan->deduc_loan;
            } else {
                $total_loan = $loan->amount + $total_loan;
                $deduc       = $loan->deduc_loan;
            }

        }

        $brut_total = $employees->get_brut_salary();
        $brut = $employees->get_salary_imposable();
        $brut_cnps = $employees->get_salary_social();
        //calculons les charges des employés
        $cmu = $employees->cmu;

        if($cmu < 7){
            $coticmu = round($cmu*500);
            $coticmuemp = ($cmu*500);
        }else{
            $coticmu = 3000 + round(($cmu-6)*1000);
            $coticmuemp = 3000;
        }

        $cnps = round(($brut_cnps*6.3)/100);
        //$tt_cnps = ($brut_cnps*6.3)/100;
        $resultcmu =$coticmu;
        $resultcnps = $cnps;
        $resultimpricf = 0;
        if($nbre_jours =='30'){
            if($brut >= 0 && $brut <= 75000){
                $tot = ($brut*0)/100;
                $resultimpricf = round($tot);
            }else if($brut > 75000 && $brut <= 240000){
                $mt1 = $brut-75000;
                $tot1 = (((75000*0)/100)+(($mt1*16)/100));
                $resultimpricf = round($tot1);
            }else if($brut > 240000 && $brut <= 800000){
                $mt2 = $brut-240000;
                $tot2 = (((75000*0)/100)+((165000*16)/100)+(($mt2*21)/100));
                $resultimpricf = round($tot2);
            }else if($brut > 800000 && $brut <= 2400000){
                $mt3 = $brut-800000;
                $tot3 = (((75000*0)/100)+((165000*16)/100)+((560000*21)/100)+(($mt3*24)/100));
                $resultimpricf = round($tot3);
            }else if($brut > 2400000 && $brut <= 8000000){
                $mt4 = $brut-2400000;
                $tot4 = (((75000*0)/100)+((165000*16)/100)+((560000*21)/100)+((1600000*24)/100)+(($mt4*28)/100));
                $resultimpricf = round($tot4);
            }else if($brut > 8000000){
                $mt5 = $brut-8000000;
                $tot5 = (((75000*0)/100)+((165000*16)/100)+((560000*21)/100)+((1600000*24)/100)+((5600000*28)/100)+(($mt5*32)/100));
                $resultimpricf = round($tot5);
            }
            //nombre de part en FCFA
            $nbre = $employees->parts;
            if($nbre==1){
                $resultricf = (0);
            }else if($nbre==1.5){
                $resultricf = 5500;
            }else if($nbre==2){
                $resultricf = 11000;
            }else if($nbre==2.5){
                $resultricf = 16500;
            }else if($nbre==3){
                $resultricf = 22000;
            }else if($nbre==3.5){
                $resultricf = 27500;
            }else if($nbre==4){
                $resultricf = 33000;
            }else if($nbre==4.5){
                $resultricf = 38500;
            }else if($nbre==5){
                $resultricf = 44000;
            }
            $retenue = 0;
            $retenue2 = $resultimpricf - $resultricf;

            if($retenue2>0){
                $impots = $retenue2;
            }else{
                $impots = 0;

            }
        }elseif($nbre_jours =='0' && $brut > 0){
            if($brut >= 0 && $brut <= 75000){
                $tot = ($brut*0)/100;
                $resultimpricf = round($tot);
            }else if($brut > 75000 && $brut <= 240000){
                $mt1 = $brut-75000;
                $tot1 = (((75000*0)/100)+(($mt1*16)/100));
                $resultimpricf = round($tot1);
            }else if($brut > 240000 && $brut <= 800000){
                $mt2 = $brut-240000;
                $tot2 = (((75000*0)/100)+((165000*16)/100)+(($mt2*21)/100));
                $resultimpricf = round($tot2);
            }else if($brut > 800000 && $brut <= 2400000){
                $mt3 = $brut-800000;
                $tot3 = (((75000*0)/100)+((165000*16)/100)+((560000*21)/100)+(($mt3*24)/100));
                $resultimpricf = round($tot3);
            }else if($brut > 2400000 && $brut <= 8000000){
                $mt4 = $brut-2400000;
                $tot4 = (((75000*0)/100)+((165000*16)/100)+((560000*21)/100)+((1600000*24)/100)+(($mt4*28)/100));
                $resultimpricf = round($tot4);
            }else if($brut > 8000000){
                $mt5 = $brut-8000000;
                $tot5 = (((75000*0)/100)+((165000*16)/100)+((560000*21)/100)+((1600000*24)/100)+((5600000*28)/100)+(($mt5*32)/100));
                $resultimpricf = round($tot5);
            }
            //nombre de part en FCFA
            $nbre = $employees->parts;
            if($nbre==1){
                $resultricf = (0);
            }else if($nbre==1.5){
                $resultricf = 5500;
            }else if($nbre==2){
                $resultricf = 11000;
            }else if($nbre==2.5){
                $resultricf = 16500;
            }else if($nbre==3){
                $resultricf = 22000;
            }else if($nbre==3.5){
                $resultricf = 27500;
            }else if($nbre==4){
                $resultricf = 33000;
            }else if($nbre==4.5){
                $resultricf = 38500;
            }else if($nbre==5){
                $resultricf = 44000;
            }

            $retenue2 = $resultimpricf - $resultricf;

            if($retenue2>0){
                $impots = ($resultimpricf - $resultricf) + $resultcnps + $resultcmu;
            }else{
                $impots = $resultcnps + $resultcmu;
            }
        }else{
            $day_salary = $brut/30;
            if($day_salary >= 0 && $day_salary <= 2500){
                $tot = ($day_salary*0)/100;
                $resultimpricf = round($tot*$nbre_jours);
            }else if($day_salary > 2500 && $day_salary <= 8000){
                $mt1 = $day_salary-2500;
                $tot1 = (((2500*0)/100)+(($mt1*16)/100));
                $resultimpricf = round($tot1*$nbre_jours);
            }else if($day_salary > 8000 && $day_salary <= 26667){
                $mt2 = $day_salary-8000;
                $tot2 = (((2500*0)/100)+((5500*16)/100)+(($mt2*21)/100));
                $resultimpricf = round($tot2*$nbre_jours);
            }else if($day_salary > 26667 && $day_salary <= 80000){
                $mt3 = $day_salary-26667;
                $tot3 = (((2500*0)/100)+((5500*16)/100)+((18667*21)/100)+(($mt3*24)/100));
                $resultimpricf = round($tot3*$nbre_jours);
            }else if($day_salary > 80000 && $day_salary <= 266667){
                $mt4 = $day_salary-80000;
                $tot4 = (((2500*0)/100)+((5500*16)/100)+((18667*21)/100)+((53333*24)/100)+(($mt4*28)/100));
                $resultimpricf = round($tot4*$nbre_jours);
            }else if($day_salary > 266667){
                $mt5 = $day_salary-266667;
                $tot5 = (((2500*0)/100)+((5500*16)/100)+((18667*21)/100)+((53333*24)/100)+((186667*28)/100)+(($mt5*32)/100));
                $resultimpricf = round($tot5*$nbre_jours);
            }
            //nombre de part en FCFA
            $nbre = $employees->parts;
            if($nbre==1){
                $resultricf = (0*$nbre_jours);
            }else if($nbre==1.5){
                $resultricf = (183*$nbre_jours);
            }else if($nbre==2){
                $resultricf = (367*$nbre_jours);
            }else if($nbre==2.5){
                $resultricf = (550*$nbre_jours);
            }else if($nbre==3){
                $resultricf = (733*$nbre_jours);
            }else if($nbre==3.5){
                $resultricf = (917*$nbre_jours);
            }else if($nbre==4){
                $resultricf = (1100*$nbre_jours);
            }else if($nbre==4.5){
                $resultricf = (1283*$nbre_jours);
            }else if($nbre==5){
                $resultricf = (1467*$nbre_jours);
            }

            $retenue = 0;
            $retenue2 = $resultimpricf - $resultricf;

            if($retenue2>0){
                $impots = $retenue2;
            }else{
                $impots = 0;

            }
        }

        // Gestion des statuts Stagiaire, Apprenti, ou Prestataire
        if (in_array($employees->statut_emp, ['Stagiaire', 'Apprenti'])) {
            $impots = 0;
        }

        return $impots;
    }

    public function get_cnps_emp()
    {
        //impots
        $employees       = Employee::where('id', '=', $this->id)->first();
        $nbre_jours      = $employees->tax_payer_id;
        //Loan
        $loans      = \Modules\Loans\Models\Loan::where('employee_id', '=', $this->id)->get();
        $total_loan = 0;
        $deduc      = 0;
        foreach ($loans as $loan) {
            if ($loan->type == 'percentage') {
                $employee    = Employee::find($loan->employee_id);
                $total_loan  = $loan->amount * $employee->salary / 100   + $total_loan;
                $deduc       = $loan->deduc_loan;
            } else {
                $total_loan = $loan->amount + $total_loan;
                $deduc       = $loan->deduc_loan;
            }

        }

        $brut_total = $employees->get_brut_salary();
        $brut = $employees->get_salary_imposable();
        $brut_cnps = $employees->get_salary_social();
        //calculons les charges des employés
        $cmu = $employees->cmu;

        if($cmu < 7){
            $coticmu = round($cmu*500);
            $coticmuemp = ($cmu*500);
        }else{
            $coticmu = 3000 + round(($cmu-6)*1000);
            $coticmuemp = 3000;
        }

        $cnps = round(($brut_cnps*6.3)/100);
        $cnpsemp = round(($brut_cnps*7.7)/100);
        $resultcmu =$coticmu;
        $resultcnps = $cnps;
        $resultimpricf = 0;
        if($nbre_jours =='30'){
            if($brut >= 0 && $brut <= 75000){
                $tot = ($brut*0)/100;
                $resultimpricf = round($tot);
            }else if($brut > 75000 && $brut <= 240000){
                $mt1 = $brut-75000;
                $tot1 = (((75000*0)/100)+(($mt1*16)/100));
                $resultimpricf = round($tot1);
            }else if($brut > 240000 && $brut <= 800000){
                $mt2 = $brut-240000;
                $tot2 = (((75000*0)/100)+((165000*16)/100)+(($mt2*21)/100));
                $resultimpricf = round($tot2);
            }else if($brut > 800000 && $brut <= 2400000){
                $mt3 = $brut-800000;
                $tot3 = (((75000*0)/100)+((165000*16)/100)+((560000*21)/100)+(($mt3*24)/100));
                $resultimpricf = round($tot3);
            }else if($brut > 2400000 && $brut <= 8000000){
                $mt4 = $brut-2400000;
                $tot4 = (((75000*0)/100)+((165000*16)/100)+((560000*21)/100)+((1600000*24)/100)+(($mt4*28)/100));
                $resultimpricf = round($tot4);
            }else if($brut > 8000000){
                $mt5 = $brut-8000000;
                $tot5 = (((75000*0)/100)+((165000*16)/100)+((560000*21)/100)+((1600000*24)/100)+((5600000*28)/100)+(($mt5*32)/100));
                $resultimpricf = round($tot5);
            }
            //nombre de part en FCFA
            $nbre = $employees->parts;
            if($nbre==1){
                $resultricf = (0);
            }else if($nbre==1.5){
                $resultricf = 5500;
            }else if($nbre==2){
                $resultricf = 11000;
            }else if($nbre==2.5){
                $resultricf = 16500;
            }else if($nbre==3){
                $resultricf = 22000;
            }else if($nbre==3.5){
                $resultricf = 27500;
            }else if($nbre==4){
                $resultricf = 33000;
            }else if($nbre==4.5){
                $resultricf = 38500;
            }else if($nbre==5){
                $resultricf = 44000;
            }
            $retenue2 = $resultimpricf - $resultricf;
            if($retenue2>0){
                $impots = ($resultimpricf - $resultricf) + $resultcnps + $resultcmu;
            }else{
                $impots = $resultcnps + $resultcmu;
            }
        }elseif($nbre_jours =='0' && $brut > 0){
            if($brut >= 0 && $brut <= 75000){
                $tot = ($brut*0)/100;
                $resultimpricf = round($tot);
            }else if($brut > 75000 && $brut <= 240000){
                $mt1 = $brut-75000;
                $tot1 = (((75000*0)/100)+(($mt1*16)/100));
                $resultimpricf = round($tot1);
            }else if($brut > 240000 && $brut <= 800000){
                $mt2 = $brut-240000;
                $tot2 = (((75000*0)/100)+((165000*16)/100)+(($mt2*21)/100));
                $resultimpricf = round($tot2);
            }else if($brut > 800000 && $brut <= 2400000){
                $mt3 = $brut-800000;
                $tot3 = (((75000*0)/100)+((165000*16)/100)+((560000*21)/100)+(($mt3*24)/100));
                $resultimpricf = round($tot3);
            }else if($brut > 2400000 && $brut <= 8000000){
                $mt4 = $brut-2400000;
                $tot4 = (((75000*0)/100)+((165000*16)/100)+((560000*21)/100)+((1600000*24)/100)+(($mt4*28)/100));
                $resultimpricf = round($tot4);
            }else if($brut > 8000000){
                $mt5 = $brut-8000000;
                $tot5 = (((75000*0)/100)+((165000*16)/100)+((560000*21)/100)+((1600000*24)/100)+((5600000*28)/100)+(($mt5*32)/100));
                $resultimpricf = round($tot5);
            }
            //nombre de part en FCFA
            $nbre = $employees->parts;
            if($nbre==1){
                $resultricf = (0);
            }else if($nbre==1.5){
                $resultricf = 5500;
            }else if($nbre==2){
                $resultricf = 11000;
            }else if($nbre==2.5){
                $resultricf = 16500;
            }else if($nbre==3){
                $resultricf = 22000;
            }else if($nbre==3.5){
                $resultricf = 27500;
            }else if($nbre==4){
                $resultricf = 33000;
            }else if($nbre==4.5){
                $resultricf = 38500;
            }else if($nbre==5){
                $resultricf = 44000;
            }

            $retenue2 = $resultimpricf - $resultricf;

            if($retenue2>0){
                $impots = ($resultimpricf - $resultricf) + $resultcnps + $resultcmu;
            }else{
                $impots = $resultcnps + $resultcmu;
            }
        }else{
            $day_salary = $brut/30;
            if($day_salary >= 0 && $day_salary <= 2500){
                $tot = ($day_salary*0)/100;
                $resultimpricf = round($tot*$nbre_jours);
            }else if($day_salary > 2500 && $day_salary <= 8000){
                $mt1 = $day_salary-2500;
                $tot1 = (((2500*0)/100)+(($mt1*16)/100));
                $resultimpricf = round($tot1*$nbre_jours);
            }else if($day_salary > 8000 && $day_salary <= 26667){
                $mt2 = $day_salary-8000;
                $tot2 = (((2500*0)/100)+((5500*16)/100)+(($mt2*21)/100));
                $resultimpricf = round($tot2*$nbre_jours);
            }else if($day_salary > 26667 && $day_salary <= 80000){
                $mt3 = $day_salary-26667;
                $tot3 = (((2500*0)/100)+((5500*16)/100)+((18667*21)/100)+(($mt3*24)/100));
                $resultimpricf = round($tot3*$nbre_jours);
            }else if($day_salary > 80000 && $day_salary <= 266667){
                $mt4 = $day_salary-80000;
                $tot4 = (((2500*0)/100)+((5500*16)/100)+((18667*21)/100)+((53333*24)/100)+(($mt4*28)/100));
                $resultimpricf = round($tot4*$nbre_jours);
            }else if($day_salary > 266667){
                $mt5 = $day_salary-266667;
                $tot5 = (((2500*0)/100)+((5500*16)/100)+((18667*21)/100)+((53333*24)/100)+((186667*28)/100)+(($mt5*32)/100));
                $resultimpricf = round($tot5*$nbre_jours);
            }
            //nombre de part en FCFA
            $nbre = $employees->parts;
            if($nbre==1){
                $resultricf = (0*$nbre_jours);
            }else if($nbre==1.5){
                $resultricf = (183*$nbre_jours);
            }else if($nbre==2){
                $resultricf = (367*$nbre_jours);
            }else if($nbre==2.5){
                $resultricf = (550*$nbre_jours);
            }else if($nbre==3){
                $resultricf = (733*$nbre_jours);
            }else if($nbre==3.5){
                $resultricf = (917*$nbre_jours);
            }else if($nbre==4){
                $resultricf = (1100*$nbre_jours);
            }else if($nbre==4.5){
                $resultricf = (1283*$nbre_jours);
            }else if($nbre==5){
                $resultricf = (1467*$nbre_jours);
            }
            $retenue2 = $resultimpricf - $resultricf;
            if($retenue2>0){
                $impots = ($resultimpricf - $resultricf) + $resultcnps + $resultcmu;
            }else{
                $impots = $resultcnps + $resultcmu;
            }
        }

        //Net Salary Calculate
        $salarynet2 = ($brut_total-$impots);
        if($deduc=='1'){
            $net_salary = $salarynet2-$total_loan;
        }else{
            $net_salary = $salarynet2;
        }

        // Gestion des statuts Stagiaire, Apprenti, ou Prestataire
        if (in_array($employees->statut_emp, ['Stagiaire', 'Apprenti'])) {
            $cnpsemp = 0;
        }
        return $cnpsemp;
    }

    public function get_cmu_sal()
    {
        //impots
        $employees       = Employee::where('id', '=', $this->id)->first();
        $nbre_jours      = $employees->tax_payer_id;
        //Loan
        $loans      = \Modules\Loans\Models\Loan::where('employee_id', '=', $this->id)->get();
        $total_loan = 0;
        $deduc      = 0;
        foreach ($loans as $loan) {
            if ($loan->type == 'percentage') {
                $employee    = Employee::find($loan->employee_id);
                $total_loan  = $loan->amount * $employee->salary / 100   + $total_loan;
                $deduc       = $loan->deduc_loan;
            } else {
                $total_loan = $loan->amount + $total_loan;
                $deduc       = $loan->deduc_loan;
            }

        }

        $brut_total = $employees->get_brut_salary();
        $brut = $employees->get_salary_imposable();
        $brut_cnps = $employees->get_salary_social();
        //calculons les charges des employés
        $cmu = $employees->cmu;

        if($cmu < 7){
            if($nbre_jours <= 0 ){
                $coticmu = 0;
            }else{
                $coticmu = round($cmu*500);
            }
            $coticmuemp = ($cmu*500);
        }else{
            if($nbre_jours <= 0 ){
                $coticmu = 0;
            }else{
                $coticmu = 3000 + round(($cmu-6)*1000);
            }
            $coticmuemp = 3000;
        }

        $cnps = round(($brut_cnps*6.3)/100);
        //$tt_cnps = ($brut_cnps*6.3)/100;
        $resultcmu =$coticmu;
        $resultcnps = $cnps;
        $resultimpricf = 0;
        if($nbre_jours =='30'){
            if($brut >= 0 && $brut <= 75000){
                $tot = ($brut*0)/100;
                $resultimpricf = round($tot);
            }else if($brut > 75000 && $brut <= 240000){
                $mt1 = $brut-75000;
                $tot1 = (((75000*0)/100)+(($mt1*16)/100));
                $resultimpricf = round($tot1);
            }else if($brut > 240000 && $brut <= 800000){
                $mt2 = $brut-240000;
                $tot2 = (((75000*0)/100)+((165000*16)/100)+(($mt2*21)/100));
                $resultimpricf = round($tot2);
            }else if($brut > 800000 && $brut <= 2400000){
                $mt3 = $brut-800000;
                $tot3 = (((75000*0)/100)+((165000*16)/100)+((560000*21)/100)+(($mt3*24)/100));
                $resultimpricf = round($tot3);
            }else if($brut > 2400000 && $brut <= 8000000){
                $mt4 = $brut-2400000;
                $tot4 = (((75000*0)/100)+((165000*16)/100)+((560000*21)/100)+((1600000*24)/100)+(($mt4*28)/100));
                $resultimpricf = round($tot4);
            }else if($brut > 8000000){
                $mt5 = $brut-8000000;
                $tot5 = (((75000*0)/100)+((165000*16)/100)+((560000*21)/100)+((1600000*24)/100)+((5600000*28)/100)+(($mt5*32)/100));
                $resultimpricf = round($tot5);
            }
            //nombre de part en FCFA
            $nbre = $employees->parts;
            if($nbre==1){
                $resultricf = (0);
            }else if($nbre==1.5){
                $resultricf = 5500;
            }else if($nbre==2){
                $resultricf = 11000;
            }else if($nbre==2.5){
                $resultricf = 16500;
            }else if($nbre==3){
                $resultricf = 22000;
            }else if($nbre==3.5){
                $resultricf = 27500;
            }else if($nbre==4){
                $resultricf = 33000;
            }else if($nbre==4.5){
                $resultricf = 38500;
            }else if($nbre==5){
                $resultricf = 44000;
            }
            $retenue2 = $resultimpricf - $resultricf;
            if($retenue2>0){
                $impots = ($resultimpricf - $resultricf) + $resultcnps + $resultcmu;
            }else{
                $impots = $resultcnps + $resultcmu;
            }
        }elseif($nbre_jours =='0' && $brut > 0){
            if($brut >= 0 && $brut <= 75000){
                $tot = ($brut*0)/100;
                $resultimpricf = round($tot);
            }else if($brut > 75000 && $brut <= 240000){
                $mt1 = $brut-75000;
                $tot1 = (((75000*0)/100)+(($mt1*16)/100));
                $resultimpricf = round($tot1);
            }else if($brut > 240000 && $brut <= 800000){
                $mt2 = $brut-240000;
                $tot2 = (((75000*0)/100)+((165000*16)/100)+(($mt2*21)/100));
                $resultimpricf = round($tot2);
            }else if($brut > 800000 && $brut <= 2400000){
                $mt3 = $brut-800000;
                $tot3 = (((75000*0)/100)+((165000*16)/100)+((560000*21)/100)+(($mt3*24)/100));
                $resultimpricf = round($tot3);
            }else if($brut > 2400000 && $brut <= 8000000){
                $mt4 = $brut-2400000;
                $tot4 = (((75000*0)/100)+((165000*16)/100)+((560000*21)/100)+((1600000*24)/100)+(($mt4*28)/100));
                $resultimpricf = round($tot4);
            }else if($brut > 8000000){
                $mt5 = $brut-8000000;
                $tot5 = (((75000*0)/100)+((165000*16)/100)+((560000*21)/100)+((1600000*24)/100)+((5600000*28)/100)+(($mt5*32)/100));
                $resultimpricf = round($tot5);
            }
            //nombre de part en FCFA
            $nbre = $employees->parts;
            if($nbre==1){
                $resultricf = (0);
            }else if($nbre==1.5){
                $resultricf = 5500;
            }else if($nbre==2){
                $resultricf = 11000;
            }else if($nbre==2.5){
                $resultricf = 16500;
            }else if($nbre==3){
                $resultricf = 22000;
            }else if($nbre==3.5){
                $resultricf = 27500;
            }else if($nbre==4){
                $resultricf = 33000;
            }else if($nbre==4.5){
                $resultricf = 38500;
            }else if($nbre==5){
                $resultricf = 44000;
            }

            $retenue2 = $resultimpricf - $resultricf;

            if($retenue2>0){
                $impots = ($resultimpricf - $resultricf) + $resultcnps + $resultcmu;
            }else{
                $impots = $resultcnps + $resultcmu;
            }
        }else{
            $day_salary = $brut/30;
            if($day_salary >= 0 && $day_salary <= 2500){
                $tot = ($day_salary*0)/100;
                $resultimpricf = round($tot*$nbre_jours);
            }else if($day_salary > 2500 && $day_salary <= 8000){
                $mt1 = $day_salary-2500;
                $tot1 = (((2500*0)/100)+(($mt1*16)/100));
                $resultimpricf = round($tot1*$nbre_jours);
            }else if($day_salary > 8000 && $day_salary <= 26667){
                $mt2 = $day_salary-8000;
                $tot2 = (((2500*0)/100)+((5500*16)/100)+(($mt2*21)/100));
                $resultimpricf = round($tot2*$nbre_jours);
            }else if($day_salary > 26667 && $day_salary <= 80000){
                $mt3 = $day_salary-26667;
                $tot3 = (((2500*0)/100)+((5500*16)/100)+((18667*21)/100)+(($mt3*24)/100));
                $resultimpricf = round($tot3*$nbre_jours);
            }else if($day_salary > 80000 && $day_salary <= 266667){
                $mt4 = $day_salary-80000;
                $tot4 = (((2500*0)/100)+((5500*16)/100)+((18667*21)/100)+((53333*24)/100)+(($mt4*28)/100));
                $resultimpricf = round($tot4*$nbre_jours);
            }else if($day_salary > 266667){
                $mt5 = $day_salary-266667;
                $tot5 = (((2500*0)/100)+((5500*16)/100)+((18667*21)/100)+((53333*24)/100)+((186667*28)/100)+(($mt5*32)/100));
                $resultimpricf = round($tot5*$nbre_jours);
            }
            //nombre de part en FCFA
            $nbre = $employees->parts;
            if($nbre==1){
                $resultricf = (0*$nbre_jours);
            }else if($nbre==1.5){
                $resultricf = (183*$nbre_jours);
            }else if($nbre==2){
                $resultricf = (367*$nbre_jours);
            }else if($nbre==2.5){
                $resultricf = (550*$nbre_jours);
            }else if($nbre==3){
                $resultricf = (733*$nbre_jours);
            }else if($nbre==3.5){
                $resultricf = (917*$nbre_jours);
            }else if($nbre==4){
                $resultricf = (1100*$nbre_jours);
            }else if($nbre==4.5){
                $resultricf = (1283*$nbre_jours);
            }else if($nbre==5){
                $resultricf = (1467*$nbre_jours);
            }
            $retenue2 = $resultimpricf - $resultricf;
            if($retenue2>0){
                $impots = ($resultimpricf - $resultricf) + $resultcnps + $resultcmu;
            }else{
                $impots = $resultcnps + $resultcmu;
            }
        }

        //Net Salary Calculate
        $salarynet2 = ($brut_total-$impots);
        if($deduc=='1'){
            $net_salary = $salarynet2-$total_loan;
        }else{
            $net_salary = $salarynet2;
        }

        // Gestion des statuts Stagiaire, Apprenti, ou Prestataire
        if (in_array($employees->statut_emp, ['Stagiaire', 'Apprenti'])) {
            $coticmu = 0;
        }
        return $coticmu;
    }

    public function get_cmu_emp()
    {
        //impots
        $employees       = Employee::where('id', '=', $this->id)->first();
        $nbre_jours      = $employees->tax_payer_id;
        //Loan
        $loans      = \Modules\Loans\Models\Loan::where('employee_id', '=', $this->id)->get();
        $total_loan = 0;
        $deduc      = 0;
        foreach ($loans as $loan) {
            if ($loan->type == 'percentage') {
                $employee    = Employee::find($loan->employee_id);
                $total_loan  = $loan->amount * $employee->salary / 100   + $total_loan;
                $deduc       = $loan->deduc_loan;
            } else {
                $total_loan = $loan->amount + $total_loan;
                $deduc       = $loan->deduc_loan;
            }

        }

        $brut_total = $employees->get_brut_salary();
        $brut = $employees->get_salary_imposable();
        $brut_cnps = $employees->get_salary_social();
        //calculons les charges des employés
        $cmu = $employees->cmu;

        if($cmu < 7){
            if($nbre_jours <= 0 ){
                $coticmu = 0;
                $coticmuemp = 0;
            }else{
                $coticmu = round($cmu*500);
                $coticmuemp = ($cmu*500);
            }
        }else{
            if($nbre_jours <= 0 ){
                $coticmu = 0;
                $coticmuemp = 0;
            }else{
                $coticmu = 3000 + round(($cmu-6)*1000);
                $coticmuemp = 3000;
            }
        }
        $cnps = round(($brut_cnps*6.3)/100);
        //$tt_cnps = ($brut_cnps*6.3)/100;
        $resultcmu =$coticmu;
        $resultcnps = $cnps;
        $resultimpricf = 0;
        if($nbre_jours =='30'){
            if($brut >= 0 && $brut <= 75000){
                $tot = ($brut*0)/100;
                $resultimpricf = round($tot);
            }else if($brut > 75000 && $brut <= 240000){
                $mt1 = $brut-75000;
                $tot1 = (((75000*0)/100)+(($mt1*16)/100));
                $resultimpricf = round($tot1);
            }else if($brut > 240000 && $brut <= 800000){
                $mt2 = $brut-240000;
                $tot2 = (((75000*0)/100)+((165000*16)/100)+(($mt2*21)/100));
                $resultimpricf = round($tot2);
            }else if($brut > 800000 && $brut <= 2400000){
                $mt3 = $brut-800000;
                $tot3 = (((75000*0)/100)+((165000*16)/100)+((560000*21)/100)+(($mt3*24)/100));
                $resultimpricf = round($tot3);
            }else if($brut > 2400000 && $brut <= 8000000){
                $mt4 = $brut-2400000;
                $tot4 = (((75000*0)/100)+((165000*16)/100)+((560000*21)/100)+((1600000*24)/100)+(($mt4*28)/100));
                $resultimpricf = round($tot4);
            }else if($brut > 8000000){
                $mt5 = $brut-8000000;
                $tot5 = (((75000*0)/100)+((165000*16)/100)+((560000*21)/100)+((1600000*24)/100)+((5600000*28)/100)+(($mt5*32)/100));
                $resultimpricf = round($tot5);
            }
            //nombre de part en FCFA
            $nbre = $employees->parts;
            if($nbre==1){
                $resultricf = (0);
            }else if($nbre==1.5){
                $resultricf = 5500;
            }else if($nbre==2){
                $resultricf = 11000;
            }else if($nbre==2.5){
                $resultricf = 16500;
            }else if($nbre==3){
                $resultricf = 22000;
            }else if($nbre==3.5){
                $resultricf = 27500;
            }else if($nbre==4){
                $resultricf = 33000;
            }else if($nbre==4.5){
                $resultricf = 38500;
            }else if($nbre==5){
                $resultricf = 44000;
            }
            $retenue2 = $resultimpricf - $resultricf;
            if($retenue2>0){
                $impots = ($resultimpricf - $resultricf) + $resultcnps + $resultcmu;
            }else{
                $impots = $resultcnps + $resultcmu;
            }
        }else{
            $day_salary = $brut/30;
            if($day_salary >= 0 && $day_salary <= 2500){
                $tot = ($day_salary*0)/100;
                $resultimpricf = round($tot*$nbre_jours);
            }else if($day_salary > 2500 && $day_salary <= 8000){
                $mt1 = $day_salary-2500;
                $tot1 = (((2500*0)/100)+(($mt1*16)/100));
                $resultimpricf = round($tot1*$nbre_jours);
            }else if($day_salary > 8000 && $day_salary <= 26667){
                $mt2 = $day_salary-8000;
                $tot2 = (((2500*0)/100)+((5500*16)/100)+(($mt2*21)/100));
                $resultimpricf = round($tot2*$nbre_jours);
            }else if($day_salary > 26667 && $day_salary <= 80000){
                $mt3 = $day_salary-26667;
                $tot3 = (((2500*0)/100)+((5500*16)/100)+((18667*21)/100)+(($mt3*24)/100));
                $resultimpricf = round($tot3*$nbre_jours);
            }else if($day_salary > 80000 && $day_salary <= 266667){
                $mt4 = $day_salary-80000;
                $tot4 = (((2500*0)/100)+((5500*16)/100)+((18667*21)/100)+((53333*24)/100)+(($mt4*28)/100));
                $resultimpricf = round($tot4*$nbre_jours);
            }else if($day_salary > 266667){
                $mt5 = $day_salary-266667;
                $tot5 = (((2500*0)/100)+((5500*16)/100)+((18667*21)/100)+((53333*24)/100)+((186667*28)/100)+(($mt5*32)/100));
                $resultimpricf = round($tot5*$nbre_jours);
            }
            //nombre de part en FCFA
            $nbre = $employees->parts;
            if($nbre==1){
                $resultricf = (0*$nbre_jours);
            }else if($nbre==1.5){
                $resultricf = (183*$nbre_jours);
            }else if($nbre==2){
                $resultricf = (367*$nbre_jours);
            }else if($nbre==2.5){
                $resultricf = (550*$nbre_jours);
            }else if($nbre==3){
                $resultricf = (733*$nbre_jours);
            }else if($nbre==3.5){
                $resultricf = (917*$nbre_jours);
            }else if($nbre==4){
                $resultricf = (1100*$nbre_jours);
            }else if($nbre==4.5){
                $resultricf = (1283*$nbre_jours);
            }else if($nbre==5){
                $resultricf = (1467*$nbre_jours);
            }
            $retenue2 = $resultimpricf - $resultricf;
            if($retenue2>0){
                $impots = ($resultimpricf - $resultricf) + $resultcnps + $resultcmu;
            }else{
                $impots = $resultcnps + $resultcmu;
            }
        }

        //Net Salary Calculate
        $salarynet2 = ($brut_total-$impots);
        if($deduc=='1'){
            $net_salary = $salarynet2-$total_loan;
        }else{
            $net_salary = $salarynet2;
        }

        // Gestion des statuts Stagiaire, Apprenti, ou Prestataire
        if (in_array($employees->statut_emp, ['Stagiaire', 'Apprenti'])) {
            $coticmuemp = 0;
        }
        return $coticmuemp;
    }

    public function get_ce_emp()
    {
        //impots
        $employees       = Employee::where('id', '=', $this->id)->first();
        //$nbre_jours      = $employees->tax_payer_id;
        //Loan
        $loans      = \Modules\Loans\Models\Loan::where('employee_id', '=', $this->id)->get();
        $total_loan = 0;
        $deduc      = 0;
        foreach ($loans as $loan) {
            if ($loan->type == 'percentage') {
                $employee    = Employee::find($loan->employee_id);
                $total_loan  = $loan->amount * $employee->salary / 100   + $total_loan;
                $deduc       = $loan->deduc_loan;
            } else {
                $total_loan = $loan->amount + $total_loan;
                $deduc       = $loan->deduc_loan;
            }

        }

        $brut_total = $employees->get_brut_salary();
        $brut = $employees->get_salary_imposable();
        $brut_cnps = $employees->get_salary_social();
        //calculons les charges des employés
        $cmu = $employees->cmu;

        if($cmu < 7){
            $coticmu = round($cmu*500);
            $coticmuemp = ($cmu*500);
        }else{
            $coticmu = 3000 + round(($cmu-6)*1000);
            $coticmuemp = 3000;
        }

        $cnps = round(($brut_cnps*6.3)/100);
        $cnpsemp = round(($brut_cnps*7.7)/100);
        $resultcmu =$coticmu;
        $resultcnps = $cnps;
        $resultimpricf = 0;

        $tauxact = 0;
        $accident = \App\Models\Company::where('id', \Auth::user()->company_id)->first();
        $act = $accident->taux_accident;
        //$prt = 0;
        $local = $employees->charge_expat;
        if($act=='0,03'){
            $tauxact= 75000*0.03;
            //$prt = 100*0.03;
        }else if($act=='0,02'){
            $tauxact= 75000*0.02;
            //$prt = 100*0.02;
        } else if($act=='0,04'){
            $tauxact= 75000*0.04;
            //$prt = 100*0.04;
        } else if($act=='0,05'){
            $tauxact= 75000*0.05;
           //$prt = 100*0.05;
        }

        $pf=0;
        $pf=((75000*5.75)/100);
        $tt_cnpsemp = $cnpsemp+$tauxact+((75000*5.75)/100)+$pf;

        //alert(tauxact);
        $tax1 = ($brut*1.2)/100;
        $tax2 = ($brut*11.5)/100;
        $tax3 = ($brut*1.6)/100;
        $tax4 = ($brut*0.4)/100;
        $tax5 = ($brut*1.2)/100;
        //tax4 = (brut*0.6)/100;
        $resultcmu = round($coticmu);
        $resultcnps = round($cnps);
        $resulttax1 = round($tax1);
        $resulttax2 = round($tax2);
        $resulttax3 = round($tax3);
        if($local == 'local'){
            $parpatronal = $tt_cnpsemp+$coticmuemp+$tax1+$tax3;//echo $local;
        }else{
            $parpatronal = $tt_cnpsemp+$coticmuemp+$resulttax1+$resulttax2+$resulttax3;//echo $local;
        }



       // Gestion des statuts Stagiaire, Apprenti, ou Prestataire
        if (in_array($employees->statut_emp, ['Stagiaire', 'Apprenti'])) {
            $resulttax1 = 0;
        }

        return $resulttax1;
    }

    public function get_ce_exp_emp()
    {
        //impots
        $employees       = Employee::where('id', '=', $this->id)->first();
        $nbre_jours      = $employees->tax_payer_id;
        //Loan
        $loans      = \Modules\Loans\Models\Loan::where('employee_id', '=', $this->id)->get();
        $total_loan = 0;
        $deduc      = 0;
        foreach ($loans as $loan) {
            if ($loan->type == 'percentage') {
                $employee    = Employee::find($loan->employee_id);
                $total_loan  = $loan->amount * $employee->salary / 100   + $total_loan;
                $deduc       = $loan->deduc_loan;
            } else {
                $total_loan = $loan->amount + $total_loan;
                $deduc       = $loan->deduc_loan;
            }

        }

        $brut_total = $employees->get_brut_salary();
        $brut = $employees->get_salary_imposable();
        $brut_cnps = $employees->get_salary_social();
        //calculons les charges des employés
        $cmu = $employees->cmu;

        if($cmu < 7){
            $coticmu = round($cmu*500);
            $coticmuemp = ($cmu*500);
        }else{
            $coticmu = 3000 + round(($cmu-6)*1000);
            $coticmuemp = 3000;
        }

        $cnps = round(($brut_cnps*6.3)/100);
        $cnpsemp = round(($brut_cnps*7.7)/100);
        $resultcmu =$coticmu;
        $resultcnps = $cnps;
        $resultimpricf = 0;

        $tauxact = 0;
        $accident = \App\Models\Company::where('id', \Auth::user()->company_id)->first();
        $act = $accident->taux_accident;
        //$prt = 0;
        $local = $employees->charge_expat;
        if($act=='0,03'){
            $tauxact= 75000*0.03;
            //$prt = 100*0.03;
        }else if($act=='0,02'){
            $tauxact= 75000*0.02;
            //$prt = 100*0.02;
        } else if($act=='0,04'){
            $tauxact= 75000*0.04;
            //$prt = 100*0.04;
        } else if($act=='0,05'){
            $tauxact= 75000*0.05;
           //$prt = 100*0.05;
        }

        $pf=0;
        $pf=((75000*5.75)/100);
        $tt_cnpsemp = $cnpsemp+$tauxact+((75000*5.75)/100)+$pf;

        //alert(tauxact);
        $tax1 = ($brut*1.2)/100;
        $tax2 = ($brut*11.5)/100;
        $tax3 = ($brut*1.6)/100;
        $tax4 = ($brut*0.4)/100;
        $tax5 = ($brut*1.2)/100;
        //tax4 = (brut*0.6)/100;
        $resultcmu = round($coticmu);
        $resultcnps = round($cnps);
        $resulttax1 = round($tax1);
        $resulttax2 = round($tax2);
        $resulttax3 = round($tax3);
        if($local == 'local'){
            $parpatronal = $tt_cnpsemp+$coticmuemp+$tax1+$tax3;//echo $local;
            $resultexpat=0;
        }else{
            $parpatronal = $tt_cnpsemp+$coticmuemp+$resulttax1+$resulttax2+$resulttax3;//echo $local;
            $resultexpat=$resulttax2;
        }

       // Gestion des statuts Stagiaire, Apprenti, ou Prestataire
        if (in_array($employees->statut_emp, ['Stagiaire', 'Apprenti'])) {
            $resultexpat = 0;
        }

        return $resultexpat;
    }

    public function get_taxe_appr()
    {
        //impots
        $employees       = Employee::where('id', '=', $this->id)->first();
        $nbre_jours      = $employees->tax_payer_id;
        //Loan
        $loans      = \Modules\Loans\Models\Loan::where('employee_id', '=', $this->id)->get();
        $total_loan = 0;
        $deduc      = 0;
        foreach ($loans as $loan) {
            if ($loan->type == 'percentage') {
                $employee    = Employee::find($loan->employee_id);
                $total_loan  = $loan->amount * $employee->salary / 100   + $total_loan;
                $deduc       = $loan->deduc_loan;
            } else {
                $total_loan = $loan->amount + $total_loan;
                $deduc       = $loan->deduc_loan;
            }

        }

        $brut_total = $employees->get_brut_salary();
        $brut = $employees->get_salary_imposable();
        $brut_cnps = $employees->get_salary_social();
        //calculons les charges des employés
        $cmu = $employees->cmu;

        if($cmu < 7){
            $coticmu = round($cmu*500);
            $coticmuemp = ($cmu*500);
        }else{
            $coticmu = 3000 + round(($cmu-6)*1000);
            $coticmuemp = 3000;
        }

        $cnps = round(($brut_cnps*6.3)/100);
        $cnpsemp = round(($brut_cnps*7.7)/100);
        $resultcmu =$coticmu;
        $resultcnps = $cnps;
        $resultimpricf = 0;

        $tauxact = 0;
        $accident = \App\Models\Company::where('id', \Auth::user()->company_id)->first();
        $act = $accident->taux_accident;
        //$prt = 0;
        $local = $employees->charge_expat;
        if($act=='0,03'){
            $tauxact= 75000*0.03;
            //$prt = 100*0.03;
        }else if($act=='0,02'){
            $tauxact= 75000*0.02;
            //$prt = 100*0.02;
        } else if($act=='0,04'){
            $tauxact= 75000*0.04;
            //$prt = 100*0.04;
        } else if($act=='0,05'){
            $tauxact= 75000*0.05;
           //$prt = 100*0.05;
        }

        $pf=0;
        $pf=((75000*5.75)/100);
        $tt_cnpsemp = $cnpsemp+$tauxact+((75000*5.75)/100)+$pf;

        //alert(tauxact);
        $tax1 = ($brut*1.2)/100;
        $tax2 = ($brut*11.5)/100;
        $tax3 = ($brut*1.6)/100;
        $tax4 = ($brut*0.4)/100;
        $tax5 = ($brut*1.2)/100;
        //tax4 = (brut*0.6)/100;
        $resultcmu = round($coticmu);
        $resultcnps = round($cnps);
        $resulttax1 = round($tax1);
        $resulttax2 = round($tax2);
        $resulttax3 = round($tax3);
        if($local == 'local'){
            $parpatronal = $tt_cnpsemp+$coticmuemp+$tax1+$tax3;//echo $local;
            $resultexpat=0;
        }else{
            $parpatronal = $tt_cnpsemp+$coticmuemp+$resulttax1+$resulttax2+$resulttax3;//echo $local;
            $resultexpat=$resulttax2;
        }

       // Gestion des statuts Stagiaire, Apprenti, ou Prestataire
        if (in_array($employees->statut_emp, ['Stagiaire', 'Apprenti'])) {
            $tax4 = 0;
        }

        return $tax4;
    }

    public function get_taxe_fpc()
    {
        //impots
        $employees       = Employee::where('id', '=', $this->id)->first();
        $nbre_jours      = $employees->tax_payer_id;
        //Loan
        $loans      = \Modules\Loans\Models\Loan::where('employee_id', '=', $this->id)->get();
        $total_loan = 0;
        $deduc      = 0;
        foreach ($loans as $loan) {
            if ($loan->type == 'percentage') {
                $employee    = Employee::find($loan->employee_id);
                $total_loan  = $loan->amount * $employee->salary / 100   + $total_loan;
                $deduc       = $loan->deduc_loan;
            } else {
                $total_loan = $loan->amount + $total_loan;
                $deduc       = $loan->deduc_loan;
            }

        }

        $brut_total = $employees->get_brut_salary();
        $brut = $employees->get_salary_imposable();
        $brut_cnps = $employees->get_salary_social();
        //calculons les charges des employés
        $cmu = $employees->cmu;

        if($cmu < 7){
            $coticmu = round($cmu*500);
            $coticmuemp = ($cmu*500);
        }else{
            $coticmu = 3000 + round(($cmu-6)*1000);
            $coticmuemp = 3000;
        }

        $cnps = round(($brut_cnps*6.3)/100);
        $cnpsemp = round(($brut_cnps*7.7)/100);
        $resultcmu =$coticmu;
        $resultcnps = $cnps;
        $resultimpricf = 0;

        $tauxact = 0;
        $accident = \App\Models\Company::where('id', \Auth::user()->company_id)->first();
        $act = $accident->taux_accident;
        //$prt = 0;
        $local = $employees->charge_expat;
        if($act=='0,03'){
            $tauxact= 75000*0.03;
            //$prt = 100*0.03;
        }else if($act=='0,02'){
            $tauxact= 75000*0.02;
            //$prt = 100*0.02;
        } else if($act=='0,04'){
            $tauxact= 75000*0.04;
            //$prt = 100*0.04;
        } else if($act=='0,05'){
            $tauxact= 75000*0.05;
           //$prt = 100*0.05;
        }

        $pf=0;
        $pf=((75000*5.75)/100);
        $tt_cnpsemp = $cnpsemp+$tauxact+((75000*5.75)/100)+$pf;

        //alert(tauxact);
        $tax1 = ($brut*1.2)/100;
        $tax2 = ($brut*11.5)/100;
        $tax3 = ($brut*1.6)/100;
        $tax4 = ($brut*0.4)/100;
        $tax5 = ($brut*1.2)/100;
        //tax4 = (brut*0.6)/100;
        $resultcmu = round($coticmu);
        $resultcnps = round($cnps);
        $resulttax1 = round($tax1);
        $resulttax2 = round($tax2);
        $resulttax3 = round($tax3);
        if($local == 'local'){
            $parpatronal = $tt_cnpsemp+$coticmuemp+$tax1+$tax3;//echo $local;
            $resultexpat=0;
        }else{
            $parpatronal = $tt_cnpsemp+$coticmuemp+$resulttax1+$resulttax2+$resulttax3;//echo $local;
            $resultexpat=$resulttax2;
        }

       // Gestion des statuts Stagiaire, Apprenti, ou Prestataire
        if (in_array($employees->statut_emp, ['Stagiaire', 'Apprenti'])) {
            $tax5 = 0;
        }

        return $tax5;
    }

    public function get_acc_trav()
    {
        //impots
        $employees       = Employee::where('id', '=', $this->id)->first();
        $nbre_jours      = $employees->tax_payer_id;
        //Loan
        $loans      = \Modules\Loans\Models\Loan::where('employee_id', '=', $this->id)->get();
        $total_loan = 0;
        $deduc      = 0;
        foreach ($loans as $loan) {
            if ($loan->type == 'percentage') {
                $employee    = Employee::find($loan->employee_id);
                $total_loan  = $loan->amount * $employee->salary / 100   + $total_loan;
                $deduc       = $loan->deduc_loan;
            } else {
                $total_loan = $loan->amount + $total_loan;
                $deduc       = $loan->deduc_loan;
            }

        }

        $brut_total = $employees->get_brut_salary();
        $brut = $employees->get_salary_imposable();
        $brut_cnps = $employees->get_salary_social();
        //calculons les charges des employés
        $cmu = $employees->cmu;

        if($cmu < 7){
            $coticmu = round($cmu*500);
            $coticmuemp = ($cmu*500);
        }else{
            $coticmu = 3000 + round(($cmu-6)*1000);
            $coticmuemp = 3000;
        }

        $cnps = round(($brut_cnps*6.3)/100);
        $cnpsemp = round(($brut_cnps*7.7)/100);
        $resultcmu =$coticmu;
        $resultcnps = $cnps;
        $resultimpricf = 0;

        $tauxact = 0;
        $accident = \App\Models\Company::where('id', \Auth::user()->company_id)->first();
        $act = $accident->taux_accident;
        //$prt = 0;
        $local = $employees->charge_expat;
        if($act=='0,03'){
            $tauxact= 75000*0.03;
            //$prt = 100*0.03;
        }else if($act=='0,02'){
            $tauxact= 75000*0.02;
            //$prt = 100*0.02;
        } else if($act=='0,04'){
            $tauxact= 75000*0.04;
            //$prt = 100*0.04;
        } else if($act=='0,05'){
            $tauxact= 75000*0.05;
           //$prt = 100*0.05;
        }

        $pf=0;
        $pf=((75000*5.75)/100);
        $tt_cnpsemp = $cnpsemp+$tauxact+((75000*5.75)/100)+$pf;

        //alert(tauxact);
        $tax1 = ($brut*1.2)/100;
        $tax2 = ($brut*11.5)/100;
        $tax3 = ($brut*1.6)/100;
        $tax4 = ($brut*0.4)/100;
        $tax5 = ($brut*1.2)/100;
        //tax4 = (brut*0.6)/100;
        $resultcmu = round($coticmu);
        $resultcnps = round($cnps);
        $resulttax1 = round($tax1);
        $resulttax2 = round($tax2);
        $resulttax3 = round($tax3);
        if($local == 'local'){
            $parpatronal = $tt_cnpsemp+$coticmuemp+$tax1+$tax3;//echo $local;
            $resultexpat=0;
        }else{
            $parpatronal = $tt_cnpsemp+$coticmuemp+$resulttax1+$resulttax2+$resulttax3;//echo $local;
            $resultexpat=$resulttax2;
        }

       // Gestion des statuts Stagiaire, Apprenti, ou Prestataire
        if (in_array($employees->statut_emp, ['Stagiaire', 'Apprenti'])) {
            $tauxact = 0;
        }

        return $tauxact;
    }

    public function get_pf_emp()
    {
        //impots
        $employees       = Employee::where('id', '=', $this->id)->first();
        $nbre_jours      = $employees->tax_payer_id;
        //Loan
        $loans      = \Modules\Loans\Models\Loan::where('employee_id', '=', $this->id)->get();
        $total_loan = 0;
        $deduc      = 0;
        foreach ($loans as $loan) {
            if ($loan->type == 'percentage') {
                $employee    = Employee::find($loan->employee_id);
                $total_loan  = $loan->amount * $employee->salary / 100   + $total_loan;
                $deduc       = $loan->deduc_loan;
            } else {
                $total_loan = $loan->amount + $total_loan;
                $deduc       = $loan->deduc_loan;
            }

        }

        $brut_total = $employees->get_brut_salary();
        $brut = $employees->get_salary_imposable();
        $brut_cnps = $employees->get_salary_social();
        //calculons les charges des employés
        $cmu = $employees->cmu;

        if($cmu < 7){
            $coticmu = round($cmu*500);
            $coticmuemp = ($cmu*500);
        }else{
            $coticmu = 3000 + round(($cmu-6)*1000);
            $coticmuemp = 3000;
        }

        $cnps = round(($brut_cnps*6.3)/100);
        $cnpsemp = round(($brut_cnps*7.7)/100);
        $resultcmu =$coticmu;
        $resultcnps = $cnps;
        $resultimpricf = 0;

        $tauxact = 0;
        $accident = \App\Models\Company::where('id', \Auth::user()->company_id)->first();
        $act = $accident->taux_accident;
        //$prt = 0;
        $local = $employees->charge_expat;
        if($act=='0,03'){
            $tauxact= 75000*0.03;
            //$prt = 100*0.03;
        }else if($act=='0,02'){
            $tauxact= 75000*0.02;
            //$prt = 100*0.02;
        } else if($act=='0,04'){
            $tauxact= 75000*0.04;
            //$prt = 100*0.04;
        } else if($act=='0,05'){
            $tauxact= 75000*0.05;
           //$prt = 100*0.05;
        }

        $pf=0;
        $pf=((75000*5.75)/100);
        $tt_cnpsemp = $cnpsemp+$tauxact+((75000*5.75)/100)+$pf;

        //alert(tauxact);
        $tax1 = ($brut*1.2)/100;
        $tax2 = ($brut*11.5)/100;
        $tax3 = ($brut*1.6)/100;
        $tax4 = ($brut*0.4)/100;
        $tax5 = ($brut*1.2)/100;
        //tax4 = (brut*0.6)/100;
        $resultcmu = round($coticmu);
        $resultcnps = round($cnps);
        $resulttax1 = round($tax1);
        $resulttax2 = round($tax2);
        $resulttax3 = round($tax3);
        if($local == 'local'){
            $parpatronal = $tt_cnpsemp+$coticmuemp+$tax1+$tax3;//echo $local;
            $resultexpat=0;
        }else{
            $parpatronal = $tt_cnpsemp+$coticmuemp+$resulttax1+$resulttax2+$resulttax3;//echo $local;
            $resultexpat=$resulttax2;
        }

       // Gestion des statuts Stagiaire, Apprenti, ou Prestataire
        if (in_array($employees->statut_emp, ['Stagiaire', 'Apprenti'])) {
            $pf = 0;
        }
        return $pf;
    }

    public function get_over_times(){

            //Overtime
            $over_times      = \Modules\Time\Models\Overtime::where('employee_id', '=', $this->id)->where('statut', '=', 1)->where('paid', '=', 0)->get();

            $total_over_time = 0;
            foreach ($over_times as $over_time) {
                $amount          = $over_time->montant;
                $total_over_time = $amount + $total_over_time;
            }

        return $total_over_time;
    }

	public function get_loan() {
        $employee = Employee::where('id', '=', $this->id)->first();

        if ($employee) { // Vérifie si l'employé existe
            $loans = \Modules\Loans\Models\Loan::where('employee_id', '=', $employee->id)->where('statut', '=', 1)->get();

            if ($loans->isNotEmpty()) { // Vérifie s'il existe des prêts
                $totalAmount = 0;

                foreach ($loans as $loan) {
                    $deduc = LoanRetenue::where('loan_id', '=', $loan->id)
                                        ->where('solde_retenue', '!=', 0)
                                        ->first();

                    if ($deduc) { // Vérifie si la retenue de prêt existe
                        $totalAmount += $deduc->solde_retenue;
                    } else {
                        $totalAmount += $loan->amount; // Ajoute le montant du prêt s'il n'y a pas de retenue
                    }
                }

                return $totalAmount; // Retourne le montant total des prêts et des soldes de retenue
            }
        }

        return 0; // Retourne 0 si aucune information sur le prêt n'est trouvée
    }

    public function get_loan_retenue() {
        $employee = Employee::find($this->id); // Utilise find pour une recherche plus simple

        if ($employee) { // Vérifie si l'employé existe
            // Vérifie si des prêts actifs existent pour l'employé sans retenue
            $totalDeduction = \Modules\Loans\Models\Loan::where('employee_id', $employee->id)
                ->where('statut', 1) // Prêts en cours
                ->whereNotNull('month_paie') // Vérifie que month_paie n'existe pas
                ->sum('amount_deduc'); // Calcule directement le total des déductions

            return $totalDeduction; // Retourne le montant total des déductions
        }

        return 0; // Retourne 0 si aucune information sur le prêt n'est trouvée
    }

    public function get_retenue_loan() {
        $employee = Employee::where('id', '=', $this->id)->first();

        if ($employee) { // Vérifie si l'employé existe
            $loans = \Modules\Loans\Models\Loan::where('employee_id', '=', $employee->id)->where('statut', '=', 1)->get();

            if ($loans->isNotEmpty()) { // Vérifie s'il existe des prêts
                $totalDeduction = 0;

                foreach ($loans as $loan) {

                        $totalDeduction += $loan->amount_deduc; // Ajoute le montant de la déduction du prêt s'il n'y a pas de retenue
                }

                return $totalDeduction; // Retourne le montant total des déductions
            }
        }

        return 0; // Retourne 0 si aucune information sur le prêt n'est trouvée
    }

	public function get_jours_work(){

		$employees  = Employee::where('id', '=', $this->id)->first();

        $jours_work = $employees->tax_payer_id;

		return $jours_work;
    }

    public function get_allo_conge()
    {
        $employees = Employee::where('id', '=', $this->id)->first();

        $leaves = \Modules\Leaves\Models\Leave::where('company_id', \Auth::user()->company_id)
            ->where('leave_type_id', '1')
            ->where('status', 'Approuvé')
            ->where('leave_statut', '2')
            ->where('employee_id', $employees->id)
            ->first();

        if($leaves){
            $allocationCongé = $leaves->amount_leave;
        }else{
           $allocationCongé = 0;
        }

        return $allocationCongé;
    }

    public function get_right()
    {
        $employees = Employee::find($this->id);
        $terminations = \Modules\Ruptures\Models\Rupture::where('employee_id', '=', $employees->id)->where('statut', '=', 1)->where('traiter', '=', 0)->first();
        if($terminations){
            $totalright  = ($terminations->indem_comp + $terminations->indem_comp_cong + $terminations->imdem_prea + $terminations->indem_licence + $terminations->aggravation + $terminations->dom_inter)-($terminations->amount_cnps + $terminations->amount_its + $terminations->amount_loan);
            return $totalright;
        }else{
            return 0;
        }
    }

    public function get_avantage_bareme()
    {
        $employees = Employee::find($this->id);
        $avtg_bareme = 0;
        $somme_montant_bare = \Modules\NatureAvantage\Models\Avantage::where('company_id', \Auth::user()->company_id)->where('employee_Id', $employees->id)->where('type_avantage', 1)->where('is_active', 1)->sum('amount');

        if($somme_montant_bare){
            $avtg_bareme  = $somme_montant_bare;
            return $avtg_bareme;
        }else{
            return 0;
        }
    }
    public function get_avantage_reel()
    {
        $employees = Employee::find($this->id);
        $avtg_reat = 0;
        $somme_montant_reel1 = \Modules\NatureAvantage\Models\Avantage::where('company_id', \Auth::user()->company_id)->where('employee_Id', $employees->id)->where('type_avantage', '=', 1)->where('is_active', 1)->sum('montant_reel');

        if($somme_montant_reel1){
            $avtg_reat = $somme_montant_reel1;
            return $avtg_reat;
        }else{
            return 0;
        }
    }

    public function get_avantage_reel2()
    {
        $employees = Employee::find($this->id);
        $avtg_reat = 0;
        $somme_montant_reel = \Modules\NatureAvantage\Models\Avantage::where('company_id', \Auth::user()->company_id)->where('employee_Id', $employees->id)->where('type_avantage', 2)->where('is_active', 1)->sum('montant_reel');

        if($somme_montant_reel){
            $avtg_reat += $somme_montant_reel;
            return $avtg_reat;
        }else{
            return 0;
        }
    }

    public function get_brut_salary_base_sup()
    {
        //impots
        $employees       = Employee::where('id', '=', $this->id)->first();
        $nbre_jours      = $employees->tax_payer_id;
        if($employees->tax_payer_id =='30'){
            $base_salary     = $employees->salary;
        }else{
            $base_salary     = $employees->branch_location;
        }

        //allowances
        $allowances      = \App\Models\Allowance::where('employee_id', '=', $this->id)->get();
        $total_allowance = 0;
        if($employees->tax_payer_id =='30'){
            foreach ($allowances as $allowance) {
                if ((strpos($allowance->trait_fisc, '10% - Art 116-1') === 0) || $allowance->allowance_option == '1' || $allowance->base_heures == '1') {
                    $total_allowance =  $total_allowance + $allowance->amount;
                }
            }
        }else{
            foreach ($allowances as $allowance) {
                if ((strpos($allowance->trait_fisc, '10% - Art 116-1') === 0) || $allowance->allowance_option == '1' || $allowance->base_heures == '1') {
                    $total_allowance =  $total_allowance + (($allowance->amount/30)*$nbre_jours);
                }
            }
        }


        //Overtime
        $over_times      = \Modules\Time\Models\Overtime::where('employee_id', '=', $this->id)->where('statut', '=', 1)->where('paid', '=', 0)->get();

        $total_over_time = 0;
        foreach ($over_times as $over_time) {
            $amount          = $over_time->montant;
            $total_over_time = $amount + $total_over_time;
        }

        //avatnage en nature
        $avantages            = \Modules\NatureAvantage\Models\Avantage::where('employee_Id', '=', $this->id)->get();
        $total_avantages_real      = 0;
        foreach ($avantages as $avantage) {
            $total_avantages_real = $total_avantages_real + $avantage->montant_reel;
        }

        //Brut Salary Calculate

        $salary_brut_total = ($base_salary + $total_allowance + $total_over_time + $total_avantages_real);

        return $salary_brut_total;
    }

    public function get_Adress_Emp()
    {
        $employees       = Employee::where('id', '=', $this->id)->first();

        $address = $employees->address;

		return $address;
    }

    public function get_Situation()
    {
        $employees       = Employee::where('id', '=', $this->id)->first();

        if($employees->martalstatu_id == '1'){
            $situation = 'Célibataire';
        }else if($employees->martalstatu_id == '2'){
            $situation = 'Marié(e)';
        }else if($employees->martalstatu_id == '3'){
            $situation = 'Divorcé(e)';
        }else if($employees->martalstatu_id == '4'){
            $situation = 'Veuf(ve)';
        }

		return $situation;
    }

    public function get_Enfants()
    {
        $employees       = Employee::where('id', '=', $this->id)->first();

        $enfant = $employees->enfant;

		return $enfant;
    }

    public function get_Num_Cnps()
    {
        $employees       = Employee::where('id', '=', $this->id)->first();

        $num_cnps = $employees->num_cnps;

		return $num_cnps;
    }

    public function get_Anciennete()
    {
        $employees       = Employee::where('id', '=', $this->id)->first();

        $date_embauche = new DateTime($employees->company_doj);
        $date_actuelle = new DateTime(date('Y-m-d'));

        $difference = $date_embauche->diff($date_actuelle);
        $date_pa = $difference->format('%y');
        $date_m  = $difference->format('%m');

        $anciennete = $date_pa.' an(s) et '.$date_m.' mois';

		return $anciennete;
    }

    public function get_Categorie()
    {
        $employees = Employee::where('id', '=', $this->id)->first();
        $categorie = JobCategory::where('id_secteur', $employees->secteur_id)->get();
        $postevalue = $employees->sous_categorie;
        $valueposte = '';
        foreach ($categorie as $poste){
            if ($employees->categorie == $poste->id){
                    $valueposte = $poste->title;
                break;
            }
        }
        $categories = $postevalue.' / '.$valueposte;

        return $categories;
    }

    public function get_Emploi()
    {
        $employees = Employee::where('id', '=', $this->id)->first();
        $emploi = !empty(\Auth::user()->getDesignation($employees->designation_id)) ? \Auth::user()->getDesignation($employees->designation_id)->name : '-' ;

        return $emploi;
    }

    public function get_Telephone()
    {
        $employees       = Employee::where('id', '=', $this->id)->first();

        $phone = $employees->phone.' / '.$employees->email;

		return $phone;
    }

    public function get_Nombre_parts()
    {
        $employees       = Employee::where('id', '=', $this->id)->first();

        $parts = $employees->parts;

		return $parts;
    }

    public function get_Nom_Etp()
    {
        $employees       = Employee::where('id', '=', $this->id)->first();

        $nom_etp = \Utility::getValByName('company_name');

        return $nom_etp;
    }

    public function get_Adresse_Etp()
    {
        $employees       = Employee::where('id', '=', $this->id)->first();

        $adresse_etp = \Utility::getValByName('company_city').', '.\Utility::getValByName('company_address');

        return $adresse_etp;
    }

    public function get_Telephone_Etp()
    {
        $employees = Employee::where('id', '=', $this->id)->first();

        $phone_etp = \Utility::getValByName('company_telephone');

        return $phone_etp;
    }

    public function get_Boite_postale()
    {
        $employees = Employee::where('id', '=', $this->id)->first();

        $btp_etp = \Utility::getValByName('company_zipcode');

        return $btp_etp;
    }

    public function get_Salary_base()
    {
        $employees       = Employee::where('id', '=', $this->id)->first();

        if($employees->tax_payer_id =='30'){
            $base_salary     = $employees->salary;
        }else{
            $base_salary     = $employees->branch_location;
        }

		return $base_salary;
    }

    public function get_brut_salary_base_leave()
    {
        //impots
        $employees       = Employee::where('id', '=', $this->id)->first();
        $nbre_jours      = $employees->tax_payer_id;
        if($employees->tax_payer_id =='30'){
            $base_salary     = $employees->salary;
        }else{
            $base_salary     = $employees->branch_location;
        }

        //allowances
        $allowances      = \App\Models\Allowance::where('employee_id', '=', $this->id)->get();
        $total_allowance = 0;
        if($employees->tax_payer_id =='30'){
            foreach ($allowances as $allowance) {
                if ((strpos($allowance->trait_fisc, '10% - Art 116-1') === 0) || $allowance->allowance_option == '1' || $allowance->base_heures == '1') {
                    $total_allowance =  $total_allowance + $allowance->amount;
                }
            }
        }else{
            foreach ($allowances as $allowance) {
                if ((strpos($allowance->trait_fisc, '10% - Art 116-1') === 0) || $allowance->allowance_option == '1' || $allowance->base_heures == '1') {
                    $total_allowance =  $total_allowance + (($allowance->amount/30)*$nbre_jours);
                }
            }
        }


        //Overtime
        $over_times      = \Modules\Time\Models\Overtime::where('employee_id', '=', $this->id)->where('statut', '=', 1)->where('paid', '=', 0)->get();

        $total_over_time = 0;
        foreach ($over_times as $over_time) {
            $amount          = $over_time->montant;
            $total_over_time = $amount + $total_over_time;
        }

        //avatnage en nature
        $avantages            = \Modules\NatureAvantage\Models\Avantage::where('employee_Id', '=', $this->id)->get();
        $total_avantages_real      = 0;
        foreach ($avantages as $avantage) {
            $total_avantages_real = $total_avantages_real + $avantage->montant_reel;
        }

        //Brut Salary Calculate

        $salary_brut_total = ($base_salary + $total_allowance + $total_over_time + $total_avantages_real);

        return $salary_brut_total;
    }

    public function get_contrat(){
        $employees       = Employee::where('id', '=', $this->id)->first();

    }

    public function get_Autre_retenue()
    {
        // Récupérer l'employé directement
        $employee = Employee::find($this->id);

        // Vérifie si l'employé existe et calcule la somme des montants
        return $employee ? \Modules\PaieSalaries\Models\Retenue::where('employee_id', $employee->id)->where('type_retenue_id','!=',3)->sum('amount') : 0;
    }

    public function get_Autre_retenue_type()
    {
        // Récupérer l'employé directement
        $employee = Employee::find($this->id);

        // Vérifie si l'employé existe et calcule la somme des montants
        return $employee ? \Modules\PaieSalaries\Models\Retenue::where('employee_id', $employee->id)->where('type_retenue_id', 3)->sum('amount') : 0;
    }

    public function pointages()
    {
        return $this->hasMany(Pointeuse::class, 'emp_id');
    }

    // Ajout de la relation pointeuses
    public function pointeuses()
    {
        // Remplacez 'Pointeuse' par le nom correct du modèle si différent
        return $this->hasMany(\App\Models\Pointeuse::class, 'employee_id', 'id');
    }
}
