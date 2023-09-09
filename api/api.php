<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');
header('Content-Type: application/json');


$dbhost = 'localhost';   
$dbname = 'programs';      
$dbuser = 'postgres';  
$dbpass = '14490234A';



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
        while ($sum >= 22) {
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
    ];
}   
try {
    
    $pdo = new PDO("pgsql:host=$dbhost;dbname=$dbname;user=$dbuser;password=$dbpass");

    
    $calculatedVariables = calculateAge($birthdate);

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

    $queryValues = "SELECT val_1, val_2, val_3, title FROM programs";
    $stmtValues = $pdo->prepare($queryValues);
    $stmtValues->execute();

    $foundVariables = []; 

    

    while ($row = $stmtValues->fetch(PDO::FETCH_ASSOC)) {
        $val_1 = $row['val_1'];
        $val_2 = $row['val_2'];
        $val_3 = $row['val_3'];
        $combinationName = $row['title'];

        $response_1 = []; 

while ($row = $stmtValues->fetch(PDO::FETCH_ASSOC)) {
    $val_1 = $row['val_1'];
    $val_2 = $row['val_2'];
    $val_3 = $row['val_3'];
    $combinationName = $row['title'];

    foreach ($variables as $varName => $varValues) {
        $permutations = [
            [$varValues[0], $varValues[1], $varValues[2]],
            [$varValues[0], $varValues[2], $varValues[1]],
            [$varValues[1], $varValues[0], $varValues[2]],
            [$varValues[1], $varValues[2], $varValues[0]],
            [$varValues[2], $varValues[0], $varValues[1]],
            [$varValues[2], $varValues[1], $varValues[0]],
        ];

        foreach ($permutations as $permutation) {
            if ($permutation == [$val_1, $val_2, $val_3]) {
                $foundVariables[] = $varName;
                $response_1[$varName] = $combinationName; 
                break;
            }
        }
    }
}

$notFoundVariables = array_diff(array_keys($variables), $foundVariables);
foreach ($notFoundVariables as $varName) {
    $response_1[$varName] = "Combination not found"; 
}



$combinedData = array_merge($ageData, $response_1);
header('Content-Type: application/json'); // Use application/json content type
echo json_encode($combinedData, JSON_UNESCAPED_UNICODE);
    }
}catch (PDOException $e) {
    
    echo 'Database Connection Error: ' . $e->getMessage();
}










