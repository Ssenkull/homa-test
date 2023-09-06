<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Handle GET requests
    
    // Check if the 'birthdate' parameter is set and matches the 'DD/MM/YYYY' format
    if (isset($_GET['birthdate']) && preg_match('/^\d{2}\/\d{2}\/\d{4}$/', $_GET['birthdate'])) {
        $inputDate = $_GET['birthdate'];
        
        // Parse the input date in 'DD/MM/YYYY' format
        $birthdateDate = date_create_from_format('d/m/Y', $inputDate);
        
        if ($birthdateDate !== false) {
            // Convert the date to 'YYYY-MM-DD' format
            $birthdate = $birthdateDate->format('Y-m-d');
            
            // Calculate age based on the provided birthdate
            $ageData = calculateAge($birthdate);

            // Return the age data as JSON
            echo json_encode($ageData);
        } else {
            // Invalid date format
            $response = [
                'error' => 'Invalid date format. Please use DD/MM/YYYY format.',
            ];

            echo json_encode($response);
        }
    } else {
        // Invalid or missing birthdate parameter
        $response = [
            'error' => 'Invalid or missing birthdate parameter. Use DD/MM/YYYY format.',
        ];

        echo json_encode($response);
    }
}


// Function to extract digits from a non-negative number
function digitsIterative($nonneg)
{
    $digits = [];
    while ($nonneg) {
        $digits[] = $nonneg % 10;
        $nonneg = (int)($nonneg / 10);
    }
    return array_reverse($digits) ?: [0];
}

// Function to calculate 'a' value
function calculateA($a)
{
    while ($a >= 22) {
        $digits = digitsIterative($a);
        $a = $digits[0] + $digits[1];
    }
    return $a;
}

// Function to calculate 'c' value
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

// Function to calculate age and related values
function calculateAge($birthdate)
{
    $currentDate = new DateTime('now');
    $birthdateDate = new DateTime($birthdate);

    // Calculate age based on the difference between birthdate and current date
    $age = $currentDate->diff($birthdateDate)->y;

    $a = calculateA($birthdateDate->format('d'));
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
    ];
}
?>