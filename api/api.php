<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');
header('Content-Type: application/json');


$dbhost = 'snuffleupagus.db.elephantsql.com';   
$dbname = 'tzxggase';      
$dbuser = 'tzxggase';  
$dbpass = 'a_av9o_b0fCmXS9k90PsYWAuRmYGMqNm';



if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    
    if (isset($_GET['birthdate']) && preg_match('/^\d{2}\/\d{2}\/\d{4}$/', $_GET['birthdate'])) {
        $inputDate = $_GET['birthdate'];
        
        
        $birthdateDate = date_create_from_format('d/m/Y', $inputDate);
        
        if ($birthdateDate !== false) {
        
            $birthdate = $birthdateDate->format('Y-m-d');
            
            
            $ageData = calculateAge($birthdate);

            
            
        } else {
            
            $response = [
                'error' => 'Invalid date format. Please use DD/MM/YYYY format.',
            ];

            echo json_encode($response);
        }
    } else {
   
        $response = [
            'error' => 'Invalid or missing birthdate parameter. Use DD/MM/YYYY format.',
        ];

        echo json_encode($response);
    }
}



function digitsIterative($nonneg)
{
    $digits = [];
    while ($nonneg) {
        $digits[] = $nonneg % 10;
        $nonneg = (int)($nonneg / 10);
    }
    return array_reverse($digits) ?: [0];
}


function calculateA($a)
{
    while ($a >= 22) {
        $digits = digitsIterative($a);
        $a = $digits[0] + $digits[1];
    }
    return $a;
}


function calculateC($c)
{
    $yearDigits = digitsIterative($c);
    $sumC = array_sum($yearDigits);

    while ($sumC >= 22) {
        $digits = digitsIterative($sumC);
        $sumC = $digits[0] + $digits[1];
    }

    return $sumC;
}


function calculateAge($birthdate)
{
    $currentDate = new DateTime('now');
    $birthdateDate = new DateTime($birthdate);

    
    $age = $currentDate->diff($birthdateDate)->y;

    $a = intval(calculateA($birthdateDate->format('d')));
    $b = intval(calculateA($birthdateDate->format('m')));
    $c = calculateC($birthdateDate->format('Y'));
    $e = $a + $b + $c;
    
    while ($e >= 22) {
        $digits = digitsIterative($e);
        $e = $digits[0] + $digits[1];
    }
    $center = $a + $b + $c + $e;

    while ($center >= 22) {
        $digits = digitsIterative($center);
        $center = $digits[0] + $digits[1];
    }

    $roundIfGreaterThan22 = function ($sum) {
        while ($sum >    22) {
            $digits = digitsIterative($sum);
            $sum = $digits[0] + $digits[1];
        }
        return $sum;
    };
    $roundIfGreaterThan9 = function ($sum) {
        while ($sum >= 22) {
            $digits = digitsIterative($sum);
            $sum = $digits[0] + $digits[1];
        }
        return $sum;
    };

    $c_1 = $roundIfGreaterThan22($a + $b);
    $c_2 = $roundIfGreaterThan22($b + $c);
    $c_3 = $roundIfGreaterThan22($c + $e);
    $c_4 = $roundIfGreaterThan22($e + $a);
    $c_1_3 = $roundIfGreaterThan22($c_1 + $center);
    $c_2_3 = $roundIfGreaterThan22($c_2 + $center);
    $c_3_3 = $roundIfGreaterThan22($c_3 + $center);
    $c_4_3 = $roundIfGreaterThan22($c_4 + $center);
    $c_1_2 = $roundIfGreaterThan22($c_1 + $c_1_3);
    $c_2_2 = $roundIfGreaterThan22($c_2 + $c_2_3);
    $c_3_2 = $roundIfGreaterThan22($c_3 + $c_3_3);
    $c_4_2 = $roundIfGreaterThan22($c_4 + $c_4_3);
    $a_3 = $roundIfGreaterThan22($a + $center);
    $b_3 = $roundIfGreaterThan22($b + $center);
    $year_3 = $roundIfGreaterThan22($c + $center);
    $e_3 = $roundIfGreaterThan22($e + $center);
    $a_2 = $roundIfGreaterThan22($a + $a_3);
    $b_2 = $roundIfGreaterThan22($b + $b_3);
    $year_2 = $roundIfGreaterThan22($c + $year_3);
    $e_2 = $roundIfGreaterThan22($e + $e_3);
    $a_b_3 = $roundIfGreaterThan22($a_3 + $b_3);
    $r_1 = $roundIfGreaterThan22($a_3 + $center);
    $r_2 = $roundIfGreaterThan22($b_3 + $center);
    $center_1 = $roundIfGreaterThan22($center + $center);
    $center_2 = $roundIfGreaterThan22($center + $c);
    $r_3 = $roundIfGreaterThan22($e_3 + $year_3);
    $love = $roundIfGreaterThan22($r_3 + $e_3);
    $money = $roundIfGreaterThan22($r_3 + $year_3);
    $sky = $roundIfGreaterThan22($b + $e);
    $earth = $roundIfGreaterThan22($a + $c);
    $sum = $roundIfGreaterThan22($sky + $earth);
    $men = $roundIfGreaterThan22($c_1 + $c_3);
    $women = $roundIfGreaterThan22($c_2 + $c_4);
    $sum_2 = $roundIfGreaterThan22($men + $women);
    $sum_3 = $roundIfGreaterThan22($sum + $sum_2);
    
    $planet = $roundIfGreaterThan22($sum+$sum_2+$sum_3);
    $round9_1 = $roundIfGreaterThan9($sky+$earth+$sum);
    $round9_2 = $roundIfGreaterThan9($men+$women+$sum_2+$sum_3);

    $round9_a = $roundIfGreaterThan9($a+$a_2+$a_3);
    $round9_c_1 = $roundIfGreaterThan9($c_1+$c_1_3+$c_1_2);
    $round9_b = $roundIfGreaterThan9($b+$b_2+$b_3);
    $round9_c_2 = $roundIfGreaterThan9($c_2+$c_2_3+$c_2_2);
    $round9_year = $roundIfGreaterThan9($c+$year_2+$year_3);
    $round9_c_3 = $roundIfGreaterThan9($c_3+$c_3_3+$c_3_2);
    $round9_e = $roundIfGreaterThan9($e+$e_2+$e_3);
    $round9_c_4 = $roundIfGreaterThan9($c_4+$c_4_3+$c_4_2); 

    $sum_ab = $roundIfGreaterThan22($a+$b);
    $sum_ab_2 = $roundIfGreaterThan22($a_2+$b_2);
    $sum_ab_3 = $roundIfGreaterThan22($a_3+$b_3);
    $sum_r_r = $roundIfGreaterThan22($r_1+$r_2);
    $sum_center = $roundIfGreaterThan22($center+$center);
    $sum_e_year = $roundIfGreaterThan22($e_3+$year_3);
    $sum_e_c = $roundIfGreaterThan22($e+$c);
    $sum_f = $roundIfGreaterThan22($a+$a_2+$a_3+$r_1+$center+$year_3+$c);
    $sum_e = $roundIfGreaterThan22($b+$b_2+$b_3+$r_2+$center+$e_3+$e);
    $sum_emj = $roundIfGreaterThan22($sum_ab+$sum_ab_2+$sum_ab_3+$sum_r_r+$sum_center+$sum_e_year+$sum_e_c);

    $ark_1 = $roundIfGreaterThan22($c_1 + $a);
    $ark_2 = $roundIfGreaterThan22($ark_1 + $a);
    $ark_3 = $roundIfGreaterThan22($ark_2 + $a);
    $ark_4 = $roundIfGreaterThan22($ark_1 + $ark_2);
    $ark_5 = $roundIfGreaterThan22($ark_1 + $c_1);
    $ark_6 = $roundIfGreaterThan22($ark_1 + $ark_5);
    $ark_7 = $roundIfGreaterThan22($ark_5 + $c_1);

    $ark_1_1 = $roundIfGreaterThan22($c_1+$b);
    $ark_1_2 = $roundIfGreaterThan22($c_1+$ark_1_1);
    $ark_1_3 = $roundIfGreaterThan22($c_1+$ark_1_2);
    $ark_1_4 = $roundIfGreaterThan22($ark_1_1+$ark_1_2);
    $ark_1_5 = $roundIfGreaterThan22($ark_1_1+$b);
    $ark_1_6 = $roundIfGreaterThan22($ark_1_1+$ark_1_5);
    $ark_1_7 = $roundIfGreaterThan22($ark_1_5+$b);

    $ark_2_1 = $roundIfGreaterThan22($c_2+$b);
    $ark_2_2 = $roundIfGreaterThan22($b+$ark_2_1);
    $ark_2_3 = $roundIfGreaterThan22($b+$ark_2_2);
    $ark_2_4 = $roundIfGreaterThan22($ark_2_1+$ark_2_2);
    $ark_2_5 = $roundIfGreaterThan22($ark_2_1+$c_2);
    $ark_2_6 = $roundIfGreaterThan22($ark_2_1+$ark_2_5);
    $ark_2_7 = $roundIfGreaterThan22($ark_2_5+$c_2);

    $ark_3_1 = $roundIfGreaterThan22($c_2+$c);
    $ark_3_2 = $roundIfGreaterThan22($c_2+$ark_3_1);
    $ark_3_3 = $roundIfGreaterThan22($c_2+$ark_3_2);
    $ark_3_4 = $roundIfGreaterThan22($ark_3_1+$ark_3_2);
    $ark_3_5 = $roundIfGreaterThan22($ark_3_1+$c);
    $ark_3_6 = $roundIfGreaterThan22($ark_3_1+$ark_3_5);
    $ark_3_7 = $roundIfGreaterThan22($ark_3_5+$c);

    $ark_4_1 = $roundIfGreaterThan22($c_3+$c);
    $ark_4_2 = $roundIfGreaterThan22($c+$ark_4_1);
    $ark_4_3 = $roundIfGreaterThan22($c+$ark_4_2);
    $ark_4_4 = $roundIfGreaterThan22($ark_4_1+$ark_4_2);
    $ark_4_5 = $roundIfGreaterThan22($ark_4_1+$c_3);
    $ark_4_6 = $roundIfGreaterThan22($ark_4_1+$ark_4_5);
    $ark_4_7 = $roundIfGreaterThan22($ark_4_5+$c_3);

    $ark_5_1 = $roundIfGreaterThan22($c_3+$e);
    $ark_5_2 = $roundIfGreaterThan22($c_3+$ark_5_1);
    $ark_5_3 = $roundIfGreaterThan22($c_3+$ark_5_2);
    $ark_5_4 = $roundIfGreaterThan22($ark_5_1+$ark_5_2);
    $ark_5_5 = $roundIfGreaterThan22($ark_5_1+$e);
    $ark_5_6 = $roundIfGreaterThan22($ark_5_1+$ark_5_5);
    $ark_5_7 = $roundIfGreaterThan22($ark_5_5+$e);
    
    $ark_6_1 = $roundIfGreaterThan22($c_4+$e);
    $ark_6_2 = $roundIfGreaterThan22($e+$ark_6_1);
    $ark_6_3 = $roundIfGreaterThan22($e+$ark_6_2);
    $ark_6_4 = $roundIfGreaterThan22($ark_6_1+$ark_6_2);
    $ark_6_5 = $roundIfGreaterThan22($ark_6_1+$c_4);
    $ark_6_6 = $roundIfGreaterThan22($ark_6_1+$ark_6_5);
    $ark_6_7 = $roundIfGreaterThan22($ark_6_5+$c_4);

    $ark_7_1 = $roundIfGreaterThan22($c_4+$a);
    $ark_7_2 = $roundIfGreaterThan22($c_4+$ark_7_1);
    $ark_7_3 = $roundIfGreaterThan22($c_4+$ark_7_2);
    $ark_7_4 = $roundIfGreaterThan22($ark_7_1+$ark_7_2);
    $ark_7_5 = $roundIfGreaterThan22($ark_7_1+$a);
    $ark_7_6 = $roundIfGreaterThan22($ark_7_1+$ark_7_5);
    $ark_7_7 = $roundIfGreaterThan22($ark_7_5+$a);

    global $comb_1, $comb_2, $comb_3, $comb_4, $comb_5, $comb_6, $comb_7,
    $comb_1_1,$comb_1_2,$comb_1_3,$comb_1_4,$comb_1_5,$comb_1_6,$comb_1_7,
    $comb_2_1,$comb_2_2,$comb_2_3,$comb_2_4,$comb_2_5,$comb_2_6,$comb_2_7,
    $comb_3_1,$comb_3_2,$comb_3_3,$comb_3_4,$comb_3_5,$comb_3_6,$comb_3_7,
    $comb_4_1,$comb_4_2,$comb_4_3,$comb_4_4,$comb_4_5,$comb_4_6,$comb_4_7,
    $comb_5_1,$comb_5_2,$comb_5_3,$comb_5_4,$comb_5_5,$comb_5_6,$comb_5_7,
    $comb_6_1,$comb_6_2,$comb_6_3,$comb_6_4,$comb_6_5,$comb_6_6,$comb_6_7,
    $comb_7_1,$comb_7_2,$comb_7_3,$comb_7_4,$comb_7_5,$comb_7_6,$comb_7_7,
    $comb_8_1, $comb_8_2, $comb_8_3, $comb_8_4, $comb_8_5, $comb_8_6, $comb_8_7, $comb_8_8;

    $comb_1 = "$ark_3-$ark_4_3-" . $roundIfGreaterThan22($ark_3 + $ark_4_3);
    $comb_2 = "$ark_2-$ark_4_2-".$roundIfGreaterThan22($ark_2 + $ark_4_2);
    $comb_3 =  "$ark_4-$ark_4_4-" . $roundIfGreaterThan22($ark_4 + $ark_4_4);
    $comb_4 = "$ark_1-$ark_4_1-" . $roundIfGreaterThan22($ark_1 + $ark_4_1);
    $comb_5 = "$ark_6-$ark_4_6-".$roundIfGreaterThan22($ark_6 + $ark_4_6);
    $comb_6 = "$ark_5-$ark_4_5-" . $roundIfGreaterThan22($ark_5 + $ark_4_5);
    $comb_7 = "$ark_7-$ark_4_7-" . $roundIfGreaterThan22($ark_7 + $ark_4_7);

    $comb_1_1 = "$ark_1_1-$ark_5_1-" . $roundIfGreaterThan22($ark_1_1 + $ark_5_1);
    $comb_1_2 = "$ark_1_2-$ark_5_2-" . $roundIfGreaterThan22($ark_1_2+$ark_5_2);
    $comb_1_3 = "$ark_1_3-$ark_5_3-". $roundIfGreaterThan22($ark_1_3+$ark_5_3);
    $comb_1_4 = "$ark_1_4-$ark_5_4-" .$roundIfGreaterThan22($ark_1_4+$ark_5_4);
    $comb_1_5 = "$ark_1_6-$ark_5_6-" .$roundIfGreaterThan22($ark_1_6+$ark_5_6);
    $comb_1_6 = "$ark_1_5-$ark_5_5-". $roundIfGreaterThan22($ark_1_5+$ark_5_5);
    $comb_1_7 = "$ark_1_7-$ark_5_7-". $roundIfGreaterThan22($ark_1_7+$ark_5_7);

    $comb_2_1 = "$ark_2_1-$ark_6_1-" .$roundIfGreaterThan22($ark_2_1+$ark_6_1);
    $comb_2_2 = "$ark_2_2-$ark_6_2-" .$roundIfGreaterThan22($ark_2_2+$ark_6_2);
    $comb_2_3 = "$ark_2_3-$ark_6_3-" .$roundIfGreaterThan22($ark_2_3+$ark_6_3);
    $comb_2_4 = "$ark_2_4-$ark_6_4-". $roundIfGreaterThan22($ark_2_4+$ark_6_4);
    $comb_2_5 = "$ark_2_6-$ark_6_6-".$roundIfGreaterThan22($ark_2_6+$ark_6_6);
    $comb_2_6 = "$ark_2_5-$ark_6_5-".$roundIfGreaterThan22($ark_2_5+$ark_6_5);
    $comb_2_7 = "$ark_2_7-$ark_6_7-". $roundIfGreaterThan22($ark_2_7+$ark_6_7);

    $comb_3_1 = "$ark_3_1-$ark_7_1-" .$roundIfGreaterThan22($ark_3_1+$ark_7_1);
    $comb_3_2 = "$ark_3_2-$ark_7_2-" .$roundIfGreaterThan22($ark_3_2+$ark_7_2);
    $comb_3_3 = "$ark_3_3-$ark_7_3-" .$roundIfGreaterThan22($ark_3_3+$ark_7_3);
    $comb_3_4 = "$ark_3_4-$ark_7_4-". $roundIfGreaterThan22($ark_3_4+$ark_7_4);
    $comb_3_5 = "$ark_3_6-$ark_7_6-".$roundIfGreaterThan22($ark_3_6+$ark_7_6);
    $comb_3_6 = "$ark_3_5-$ark_7_5-".$roundIfGreaterThan22($ark_3_5+$ark_7_5);
    $comb_3_7 = "$ark_3_7-$ark_7_7-". $roundIfGreaterThan22($ark_3_7+$ark_7_7);

    $comb_4_1 = "$ark_4_1-$ark_1-" .$roundIfGreaterThan22($ark_4_1+$ark_1);
    $comb_4_2 = "$ark_4_2-$ark_2-" .$roundIfGreaterThan22($ark_4_2+$ark_2);
    $comb_4_3 = "$ark_4_3-$ark_3-" .$roundIfGreaterThan22($ark_4_3+$ark_3);
    $comb_4_4 = "$ark_4_4-$ark_4-". $roundIfGreaterThan22($ark_4_4+$ark_4);
    $comb_4_5 = "$ark_4_6-$ark_6-".$roundIfGreaterThan22($ark_4_6+$ark_6);
    $comb_4_6 = "$ark_4_5-$ark_5-".$roundIfGreaterThan22($ark_4_5+$ark_5);
    $comb_4_7 = "$ark_4_7-$ark_7-". $roundIfGreaterThan22($ark_4_7+$ark_7);

    $comb_5_1 = "$ark_5_1-$ark_1_1-" .$roundIfGreaterThan22($ark_5_1+$ark_1_1);
    $comb_5_2 = "$ark_5_2-$ark_1_2-" .$roundIfGreaterThan22($ark_5_2+$ark_1_2);
    $comb_5_3 = "$ark_5_3-$ark_1_3-" .$roundIfGreaterThan22($ark_5_3+$ark_1_3);
    $comb_5_4 = "$ark_5_4-$ark_1_4-". $roundIfGreaterThan22($ark_5_4+$ark_1_4);
    $comb_5_5 = "$ark_5_6-$ark_1_6-".$roundIfGreaterThan22($ark_5_6+$ark_1_6);
    $comb_5_6 = "$ark_5_5-$ark_1_5-".$roundIfGreaterThan22($ark_5_5+$ark_1_5);
    $comb_5_7 = "$ark_5_7-$ark_1_7-". $roundIfGreaterThan22($ark_5_7+$ark_1_7);

    $comb_6_1 = "$ark_6_1-$ark_2_1-" .$roundIfGreaterThan22($ark_6_1+$ark_2_1);
    $comb_6_2 = "$ark_6_2-$ark_2_2-" .$roundIfGreaterThan22($ark_6_2+$ark_2_2);
    $comb_6_3 = "$ark_6_3-$ark_2_3-" .$roundIfGreaterThan22($ark_6_3+$ark_2_3);
    $comb_6_4 = "$ark_6_4-$ark_2_4-". $roundIfGreaterThan22($ark_6_4+$ark_2_4);
    $comb_6_5 = "$ark_6_6-$ark_2_6-".$roundIfGreaterThan22($ark_6_6+$ark_2_6);
    $comb_6_6 = "$ark_6_5-$ark_2_5-".$roundIfGreaterThan22($ark_6_5+$ark_2_5);
    $comb_6_7 = "$ark_6_7-$ark_2_7-". $roundIfGreaterThan22($ark_6_7+$ark_2_7);

    $comb_7_1 = "$ark_7_1-$ark_3_1-" .$roundIfGreaterThan22($ark_7_1+$ark_3_1);
    $comb_7_2 = "$ark_7_2-$ark_3_2-" .$roundIfGreaterThan22($ark_7_2+$ark_3_2);
    $comb_7_3 = "$ark_7_3-$ark_3_3-" .$roundIfGreaterThan22($ark_7_3+$ark_3_3);
    $comb_7_4 = "$ark_7_4-$ark_3_4-". $roundIfGreaterThan22($ark_7_4+$ark_3_4);
    $comb_7_5 = "$ark_7_6-$ark_3_6-".$roundIfGreaterThan22($ark_7_6+$ark_3_6);
    $comb_7_6 = "$ark_7_5-$ark_3_5-".$roundIfGreaterThan22($ark_7_5+$ark_3_5);
    $comb_7_7 = "$ark_7_7-$ark_3_7-". $roundIfGreaterThan22($ark_7_7+$ark_3_7);


    $comb_8_1 = "$a-$c-" . $roundIfGreaterThan22($a+$c);
    $comb_8_2 = "$c_1-$c_3-" . $roundIfGreaterThan22($c_1+$c_3);
    $comb_8_3 = "$b-$e-" . $roundIfGreaterThan22($b+$e);
    $comb_8_4 = "$c_2-$c_4-" . $roundIfGreaterThan22($c_2+$c_4);
    $comb_8_5 = "$c-$a-" . $roundIfGreaterThan22($a+$c);
    $comb_8_6 = "$c_3-$c_1-" . $roundIfGreaterThan22($c_1+$c_3);
    $comb_8_7 = "$e-$b-" . $roundIfGreaterThan22($b+$e);
    $comb_8_8 = "$c_4-$c_2-" . $roundIfGreaterThan22($c_2+$c_4);




    return [
        'birthdate'=>$birthdate,
        'age' => $age,
        'a' => $a,
        'b' => $b,
        'c' => $c,
        'e' => $e,
        'center' => $center,
        'c_1' => $c_1,
        'c_2' => $c_2,
        'c_3' => $c_3,
        'c_4' => $c_4,
        'c_1_3' => $c_1_3,
        'c_2_3' => $c_2_3,
        'c_3_3' => $c_3_3,
        'c_4_3' => $c_4_3,
        'c_1_2' => $c_1_2,
        'c_2_2' => $c_2_2,
        'c_3_2' => $c_3_2,
        'c_4_2' => $c_4_2,
        'a_3' => $a_3,
        'b_3' => $b_3,
        'year_3' => $year_3,
        'e_3' => $e_3,
        'a_2' => $a_2,
        'b_2' => $b_2,
        'year_2' => $year_2,
        'e_2' => $e_2,
        'a_b_3' => $a_b_3,
        'r_1' => $r_1,
        'r_2' => $r_2,
        'r_3' => $r_3,
        'center_1' => $center_1,
        'center_2' => $center_2,
        'love' => $love,
        'money' => $money,
        'sky' => $sky,
        'earth' => $earth,
        'sum' => $sum,
        'men' => $men,
        'women' => $women,
        'sum_2' => $sum_2,
        'sum_3' => $sum_3,
        'month' => $birthdateDate->format('n'),
        'sum_ab' => $sum_ab,
        'sum_ab_2' => $sum_ab_2,
        'sum_ab_3' => $sum_ab_3,
        'sum_r_r' => $sum_r_r,
        'sum_center' => $sum_center,
        'sum_e_year' => $sum_e_year,
        'sum_e_c' => $sum_e_c,
        'sum_f' => $sum_f,
        'sum_e' => $sum_e,
        'sum_emj' => $sum_emj,
        'planet'=>$planet,
        'round9_1' => $round9_1,
        'round9_2' => $round9_2,
        'round9_a'=> $round9_a,
        'round9_c_1'=> $round9_c_1,
        'round9_b' => $round9_b,
        'round9_c_2' => $round9_c_2,
        'round9_year' => $round9_year,
        'round9_c_3' => $round9_c_3,
        'round9_e' => $round9_e,
        'round9_c_4' => $round9_c_4,
        'ark_1' => $ark_1,
        'ark_2' => $ark_2,
        'ark_3' => $ark_3,
        'ark_4' => $ark_4,
        'ark_5' => $ark_5,
        'ark_6' => $ark_6,
        'ark_7' => $ark_7,
        'ark_1_1'=> $ark_1_1,
        'ark_1_2'=> $ark_1_2,
        'ark_1_3'=> $ark_1_3,
        'ark_1_4'=> $ark_1_4,
        'ark_1_5'=> $ark_1_5,
        'ark_1_6'=> $ark_1_6,
        'ark_1_7'=> $ark_1_7,
        'ark_2_1'=>$ark_2_1,
        'ark_2_2'=>$ark_2_2,
        'ark_2_3'=>$ark_2_3,
        'ark_2_4'=>$ark_2_4,
        'ark_2_5'=>$ark_2_5,
        'ark_2_6'=>$ark_2_6,
        'ark_2_7'=>$ark_2_7,
        'ark_3_1'=>$ark_3_1,
        'ark_3_2'=>$ark_3_2,
        'ark_3_3'=>$ark_3_3,
        'ark_3_4'=>$ark_3_4,
        'ark_3_5'=>$ark_3_5,
        'ark_3_6'=>$ark_3_6,
        'ark_3_7'=>$ark_3_7,
        'ark_4_1'=>$ark_4_1,
        'ark_4_2'=>$ark_4_2,
        'ark_4_3'=>$ark_4_3,
        'ark_4_4'=>$ark_4_4,
        'ark_4_5'=>$ark_4_5,
        'ark_4_6'=>$ark_4_6,
        'ark_4_7'=>$ark_4_7,
        'ark_5_1'=>$ark_5_1,
        'ark_5_2'=>$ark_5_2,
        'ark_5_3'=>$ark_5_3,
        'ark_5_4'=>$ark_5_4,
        'ark_5_5'=>$ark_5_5,
        'ark_5_6'=>$ark_5_6,
        'ark_5_7'=>$ark_5_7,
        'ark_6_1'=>$ark_6_1,
        'ark_6_2'=>$ark_6_2,
        'ark_6_3'=>$ark_6_3,
        'ark_6_4'=>$ark_6_4,
        'ark_6_5'=>$ark_6_5,
        'ark_6_6'=>$ark_6_6,
        'ark_6_7'=>$ark_6_7,
        'ark_7_1'=>$ark_7_1,
        'ark_7_2'=>$ark_7_2,
        'ark_7_3'=>$ark_7_3,
        'ark_7_4'=>$ark_7_4,
        'ark_7_5'=>$ark_7_5,
        'ark_7_6'=>$ark_7_6,
        'ark_7_7'=>$ark_7_7,
        'comb_1'=>$comb_1,
        'comb_2'=>$comb_2,
        'comb_3'=>$comb_3,
        'comb_4'=>$comb_4,
        'comb_5'=>$comb_5,
        'comb_6' => $comb_6,
        'comb_7' => $comb_7,
        'comb_1_1' => $comb_1_1,
        'comb_1_2' => $comb_1_2,
        'comb_1_3'=>$comb_1_3,
        'comb_1_4'=>$comb_1_4,
        'comb_1_5'=>$comb_1_5,
        'comb_1_6'=>$comb_1_6,
        'comb_1_7'=>$comb_1_7,
        'comb_2_1'=>$comb_2_1,
        'comb_2_2'=>$comb_2_2,
        'comb_2_3'=>$comb_2_3,
        'comb_2_4'=>$comb_2_4,
        'comb_2_5'=>$comb_2_5,
        'comb_2_6'=>$comb_2_6,
        'comb_2_7'=>$comb_2_7,
        'comb_3_1'=>$comb_3_1,
        'comb_3_2'=>$comb_3_2,
        'comb_3_3'=>$comb_3_3,
        'comb_3_4'=>$comb_3_4,
        'comb_3_5'=>$comb_3_5,
        'comb_3_6'=>$comb_3_6,
        'comb_3_7'=>$comb_3_7,
        'comb_4_1'=>$comb_4_1,
        'comb_4_2' => $comb_4_2,
        'comb_4_3'=>$comb_4_3,
        'comb_4_4'=>$comb_4_4,
        'comb_4_5'=>$comb_4_5,
        'comb_4_6'=>$comb_4_6,
        'comb_4_7'=>$comb_4_7,
        'comb_5_1'=>$comb_5_1,
        'comb_5_2'=> $comb_5_2,
        'comb_5_3' => $comb_5_3,
        'comb_5_4' => $comb_5_4,
        'comb_5_5' => $comb_5_5,
        'comb_5_6' => $comb_5_6,
        'comb_5_7' => $comb_5_7,
        'comb_6_1'=>$comb_6_1,
        'comb_6_2'=> $comb_6_2,
        'comb_6_3'=>$comb_6_3,
        'comb_6_4'=>$comb_6_4,
        'comb_6_5'=>$comb_6_5,
        'comb_6_6'=>$comb_6_6,
        'comb_6_7'=>$comb_6_7,
        'comb_7_1'=>$comb_7_1,
        'comb_7_2'=> $comb_7_2,
        'comb_7_3'=>$comb_7_3,
        'comb_7_4'=>$comb_7_4,
        'comb_7_5'=>$comb_7_5,
        'comb_7_6'=>$comb_7_6,
        'comb_7_7'=>$comb_7_7,
        'comb_8_1'=>$comb_8_1,
        'comb_8_2'=>$comb_8_2,
        'comb_8_3'=>$comb_8_3,
        'comb_8_4'=>$comb_8_4,
        'comb_8_5'=>$comb_8_5,
        'comb_8_6'=>$comb_8_6,
        'comb_8_7'=>$comb_8_7,
        'comb_8_8'=>$comb_8_8,
    ];
} 
try {
    $pdo = new PDO("pgsql:host=$dbhost;dbname=$dbname;user=$dbuser;password=$dbpass");

    // Calculate age-related variables
    $calculatedVariables = calculateAge($birthdate);

    // Define variables
    $variables = [
        'A' => [$calculatedVariables['a'], $calculatedVariables['a_2'], $calculatedVariables['a_3']],
        'B' => [$calculatedVariables['b'], $calculatedVariables['b_2'], $calculatedVariables['b_3']],
        'YEAR' => [$calculatedVariables['c'], $calculatedVariables['year_2'], $calculatedVariables['year_3']],
        'C_1' => [$calculatedVariables['c_1'], $calculatedVariables['c_1_2'], $calculatedVariables['c_1_3']],
        'C_2' => [$calculatedVariables['c_2'], $calculatedVariables['c_2_2'], $calculatedVariables['c_2_3']],
        'C_3' => [$calculatedVariables['c_3'], $calculatedVariables['c_3_2'], $calculatedVariables['c_3_3']],
        'C_4' => [$calculatedVariables['c_4'], $calculatedVariables['c_4_2'], $calculatedVariables['c_4_3']],
        'R_1' => [$calculatedVariables['r_3'], $calculatedVariables['e_3'], $calculatedVariables['love']],
        'R_2' => [$calculatedVariables['r_3'], $calculatedVariables['year_3'], $calculatedVariables['money']],
        'TAIL' => [$calculatedVariables['e'], $calculatedVariables['e_2'], $calculatedVariables['e_3']],
    ];

    // Retrieve program data
    $queryValues = "SELECT val_1, val_2, val_3, title FROM programs";
    $stmtValues = $pdo->prepare($queryValues);
    $stmtValues->execute();

    // Initialize variables to store responses
    $response_1 = [];
    $response_2 = [];

    // Search for variable combinations
    while ($row = $stmtValues->fetch(PDO::FETCH_ASSOC)) {
        $dbVar_1 = $row['val_1'];
        $dbVar_2 = $row['val_2'];
        $dbVar_3 = $row['val_3'];
        $combinationName = $row['title'];

        // Check if variable combinations match in $variables
        foreach ($variables as $varName => $varValues) {
            $permutations = generatePermutations($varValues);

            if (permutationMatchesDatabase($permutations, [$dbVar_1, $dbVar_2, $dbVar_3])) {
                $response_1[$varName] = $combinationName;
            }
        }

        // Search for variable combinations in $combinations
        $combinations = [
            $comb_1, $comb_2, $comb_3, $comb_4, $comb_5, $comb_6, $comb_7,
            $comb_2_1, $comb_2_2, $comb_2_3, $comb_2_4, $comb_2_5, $comb_2_6, $comb_2_7,
            $comb_3_1, $comb_3_2, $comb_3_3, $comb_3_4, $comb_3_5, $comb_3_6, $comb_3_7,
            $comb_4_1, $comb_4_2, $comb_4_3, $comb_4_4, $comb_4_5, $comb_4_6, $comb_4_7,
            $comb_5_1, $comb_5_2, $comb_5_3, $comb_5_4, $comb_5_5, $comb_5_6, $comb_5_7,
            $comb_6_1, $comb_6_2, $comb_6_3, $comb_6_4, $comb_6_5, $comb_6_6, $comb_6_7,
            $comb_7_1, $comb_7_2, $comb_7_3, $comb_7_4, $comb_7_5, $comb_7_6, $comb_7_7,
            $comb_8_1, $comb_8_2, $comb_8_3, $comb_8_4, $comb_8_5, $comb_8_6, $comb_8_7, $comb_8_8,
        ];

        foreach ($combinations as $combination) {
            $parts = explode('-', $combination);
            $p_1 = $parts[0];
            $p_2 = $parts[1];
            $p_3 = $parts[2];

            $permutations = generatePermutations_circle($p_1, $p_2, $p_3);

            if (permutationMatchesDatabase($permutations, [$dbVar_1, $dbVar_2, $dbVar_3])) {
                $response_2[$combination] = $combinationName;
                break; // No need to check other permutations once a match is found.
            }
        }
    }

    // Handle variables not found in the database
    $notFoundVariables = array_diff(array_keys($variables), array_keys($response_1));
    foreach ($notFoundVariables as $varName) {
        $response_1[$varName] = "Combination not found";
    }
    
} catch (PDOException $e) {
    echo 'Database Connection Error: ' . $e->getMessage();
}

//$combinedData = array_merge($ageData, $response_1, $response_2);
header('Content-Type: application/json');
echo json_encode($ageData, JSON_UNESCAPED_UNICODE);
// echo json_encode($response_1, JSON_UNESCAPED_UNICODE);
// echo json_encode($response_2, JSON_UNESCAPED_UNICODE);
// try {

//  $pdo = new PDO("pgsql:host=$dbhost;dbname=$dbname;user=$dbuser;password=$dbpass");


//     $calculatedVariables = calculateAge($birthdate);


//     $variables = [
//         'A' => [$calculatedVariables['a'], $calculatedVariables['a_2'], $calculatedVariables['a_3']],
//         'B' => [$calculatedVariables['b'], $calculatedVariables['b_2'], $calculatedVariables['b_3']],
//         'YEAR' => [$calculatedVariables['c'], $calculatedVariables['year_2'], $calculatedVariables['year_3']],
//         'C_1' => [$calculatedVariables['c_1'], $calculatedVariables['c_1_2'], $calculatedVariables['c_1_3']],
//         'C_2' => [$calculatedVariables['c_2'], $calculatedVariables['c_2_2'], $calculatedVariables['c_2_3']],
//         'C_3' => [$calculatedVariables['c_3'], $calculatedVariables['c_3_2'], $calculatedVariables['c_3_3']],
//         'C_4' => [$calculatedVariables['c_4'], $calculatedVariables['c_4_2'], $calculatedVariables['c_4_3']],
//         'R_1' => [$calculatedVariables['r_3'], $calculatedVariables['e_3'], $calculatedVariables['love']],
//         'R_2' => [$calculatedVariables['r_3'], $calculatedVariables['year_3'], $calculatedVariables['money']],
//         'TAIL' => [$calculatedVariables['e'], $calculatedVariables['e_2'], $calculatedVariables['e_3']],
//     ];

    
//     $queryValues = "SELECT val_1, val_2, val_3, title FROM programs";
//     $stmtValues = $pdo->prepare($queryValues);
//     $stmtValues->execute();

//     $foundVariables = [];
//     while ($row = $stmtValues->fetch(PDO::FETCH_ASSOC)) {
//         $val_1 = $row['val_1'];
//         $val_2 = $row['val_2'];
//         $val_3 = $row['val_3'];
//         $combinationName = $row['title'];

//         foreach ($variables as $varName => $varValues) {
//             $permutations = generatePermutations($varValues);

//             if (permutationMatchesDatabase($permutations, [$val_1, $val_2, $val_3])) {
//                 $foundVariables[] = $varName;
//                 $response_1[$varName] = $combinationName;
//             }
//         }
//     }

//     $notFoundVariables = array_diff(array_keys($variables), $foundVariables);
//     foreach ($notFoundVariables as $varName) {
//         $response_1[$varName] = "Combination not found";
//     }


    
// } catch (PDOException $e) {
//     echo 'Database Connection Error: ' . $e->getMessage();
// }


// try {
//     $response_2 = [];
//     $queryValues = "SELECT val_1, val_2, val_3, title FROM programs";
//     $stmtValues = $pdo->prepare($queryValues);
//     $stmtValues->execute();
//     $combinations = [
//         $comb_1, $comb_2, $comb_3, $comb_4, $comb_5, $comb_6, $comb_7,
//         $comb_2_1, $comb_2_2, $comb_2_3, $comb_2_4, $comb_2_5, $comb_2_6, $comb_2_7,
//         $comb_3_1, $comb_3_2, $comb_3_3, $comb_3_4, $comb_3_5, $comb_3_6, $comb_3_7,
//         $comb_4_1, $comb_4_2, $comb_4_3, $comb_4_4, $comb_4_5, $comb_4_6, $comb_4_7,
//         $comb_5_1, $comb_5_2, $comb_5_3, $comb_5_4, $comb_5_5, $comb_5_6, $comb_5_7,
//         $comb_6_1, $comb_6_2, $comb_6_3, $comb_6_4, $comb_6_5, $comb_6_6, $comb_6_7,
//         $comb_7_1, $comb_7_2, $comb_7_3, $comb_7_4, $comb_7_5, $comb_7_6, $comb_7_7,
//         $comb_8_1, $comb_8_2, $comb_8_3, $comb_8_4, $comb_8_5, $comb_8_6, $comb_8_7, $comb_8_8,
//     ];

//     foreach ($combinations as $combination) {
//         $parts = explode('-', $combination);
//         $p_1 = $parts[0];
//         $p_2 = $parts[1];
//         $p_3 = $parts[2];
        
//         $permutations = generatePermutations_circle($p_1,$p_2,$p_3);
//         $stmtValues->execute();
        

//         while ($row = $stmtValues->fetch(PDO::FETCH_ASSOC)) {
//             $dbVar_1 = $row['val_1'];
//             $dbVar_2 = $row['val_2'];
//             $dbVar_3 = $row['val_3'];
//             $combinationName = $row['title'];
        
//             if (permutationMatchesDatabase($permutations,[$dbVar_1, $dbVar_2, $dbVar_3])) {
//                 $response_2[$combination] = $combinationName;
//             }
//         }

//         if (empty($response_2[$combination])) {
//             $response_2[$combination] = "Combination not found";
//         }
//     }
// } catch (PDOException $e) {  
//     echo 'Database Connection Error: ' . $e->getMessage();
// }

function generatePermutations($varValues) {
    $permutations = [
        [$varValues[0], $varValues[1], $varValues[2]],
        [$varValues[0], $varValues[2], $varValues[1]],
        [$varValues[1], $varValues[0], $varValues[2]],
        [$varValues[1], $varValues[2], $varValues[0]],
        [$varValues[2], $varValues[0], $varValues[1]],
        [$varValues[2], $varValues[1], $varValues[0]],
    ];
    
    return $permutations;
}

function permutationMatchesDatabase($permutations, $dbValues) {
    foreach ($permutations as $permutation) {
        if ($permutation == $dbValues) {
            return true;
        }
    }
    return false;
}

function generatePermutations_circle($var_1, $var_2, $var_3) {
    $permutations = [
        [$var_1, $var_2, $var_3],
        [$var_1, $var_3, $var_2],
        [$var_2, $var_1, $var_3],
        [$var_2, $var_3, $var_1],
        [$var_3, $var_1, $var_2],
        [$var_3, $var_2, $var_1],
    ];
    return $permutations;
}

// $combinedData = array_merge($ageData, $response_1,$response_2);
//     header('Content-Type: application/json');
//    echo json_encode($combinedData, JSON_UNESCAPED_UNICODE);