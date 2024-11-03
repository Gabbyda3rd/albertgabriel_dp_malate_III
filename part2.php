<?php
session_start();

// Initialize Stack and Queue arrays in session
if (!isset($_SESSION['stack'])) {
    $_SESSION['stack'] = [];
}
if (!isset($_SESSION['queue'])) {
    $_SESSION['queue'] = [];
}
echo"1. Generate a random character from a -k<br>
○ Create a 4 x 5 table<br>
○ Display all the random characters inside the table<br>
○ Highlight all the character that belongs to the even column.<br>";

// Function to generate a random character between 'a' and 'k'
function getRandomCharacter() {
    $characters = range('a', 'k'); // Create an array from 'a' to 'k'
    return $characters[array_rand($characters)]; // Select a random character
}

// Create a 4 x 5 table
$table = [];
for ($i = 0; $i < 4; $i++) {
    $row = [];
    for ($j = 0; $j < 5; $j++) {
        $row[] = getRandomCharacter(); // Populate the table with random characters
    }
    $table[] = $row;
}

// Display the table
echo "<table border='1' style='border-collapse: collapse;'>";
foreach ($table as $rowIndex => $row) {
    echo "<tr>";
    foreach ($row as $colIndex => $char) {
        // Highlight even columns (0-indexed: 0, 2, 4)
        if ($colIndex % 2 == 0) {
            echo "<td style='background-color: yellow;'>$char</td>";
        } else {
            echo "<td>$char</td>";
        }
    }
    echo "</tr>";
}
echo "</table>";




// 2. Generate a 4x4 grid with unique random numbers
echo"2.Manipulation of multidimensional array<br>
○ Create a 4x4 table <br>
○ Generate a random number from 1 - 100<br>
○ The number generated should always be unique<br>
○ Sum up the number per column and row";
$uniqueNumbers = [];
while (count($uniqueNumbers) < 16) {
    $randomNum = rand(1, 100);
    if (!in_array($randomNum, $uniqueNumbers)) {
        $uniqueNumbers[] = $randomNum;
    }
}

$numberGrid = array_chunk($uniqueNumbers, 4);

// Calculate row and column sums for numberGrid
$rowSums = array_map('array_sum', $numberGrid);
$colSums = [];
foreach (array_keys($numberGrid[0]) as $colIndex) {
    $colSum = 0;
    foreach ($numberGrid as $row) {
        $colSum += $row[$colIndex];
    }
    $colSums[] = $colSum;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stack, Queue, Grid, and Bubble Sort Operations</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        
        h2 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            margin: 20px 0;
            border-collapse: collapse;
        }
        
        table, td, th {
            border: 1px solid #ccc;
            text-align: center;
            padding: 10px;
        }
        
        td {
            background-color: #e8f0fe;
            font-weight: bold;
        }

        .form-container {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }

        input[type="number"] {
            width: calc(100% - 20px);
            padding: 10px;
            font-size: 14px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        button {
            padding: 10px 20px;
            font-size: 14px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        ul li {
            background-color: #f4f4f9;
            padding: 10px;
            border: 1px solid #ccc;
            margin-bottom: 5px;
            border-radius: 5px;
            text-align: center;
        }

        .result {
            margin-top: 10px;
            padding: 10px;
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
            text-align: center;
        }

        .grid-container {
            margin: 20px 0;
        }

        .back-link {
            display: inline-block;
            padding: 10px 15px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
            transition: background-color 0.3s;
        }

        .back-link:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<h2>Generated 4x4 Number Grid:</h2>
<table>
    <?php foreach ($numberGrid as $row): ?>
        <tr>
            <?php foreach ($row as $cell): ?>
                <td><?= $cell ?></td>
            <?php endforeach; ?>
        </tr>
    <?php endforeach; ?>
    <tr>
        <td>Row Sums:</td>
        <?php foreach ($rowSums as $sum): ?>
            <td><?= $sum ?></td>
        <?php endforeach; ?>
    </tr>
    <tr>
        <td>Column Sums:</td>
        <?php foreach ($colSums as $sum): ?>
            <td><?= $sum ?></td>
        <?php endforeach; ?>
    </tr>
</table>

<!-- Stack Operations -->
<?php
echo"3. Create a stack of integers using arrays( First in last out )<br>

● create input fields and push a button to insert a new value<br>
● Create a pop button to remove the top value<br>
● Always display the existing stack content<br>
● Do not use pre-defined PHP array functions like array_pop<br><br>";
$poppedValue = null;

if (isset($_POST['action']) && $_POST['action'] === 'stack') {
    if (isset($_POST['stackPush']) && !empty($_POST['stackValue'])) {
        $_SESSION['stack'][] = $_POST['stackValue'];
    } elseif (isset($_POST['stackPop']) && !empty($_SESSION['stack'])) {
        $poppedValue = array_pop($_SESSION['stack']);
    }
}
?>

<form action="" method="post" class="form-container">
    <input type="hidden" name="action" value="stack">
    <input type="number" name="stackValue" placeholder="Insert value" id="stackValue">
    <button type="submit" name="stackPush" onclick="document.getElementById('stackValue').required = true;">Push</button>
    <button type="submit" name="stackPop" onclick="document.getElementById('stackValue').required = false;">Pop</button>
</form>

<h2>Stack Content:</h2>
<ul>
    <?php foreach ($_SESSION['stack'] as $value): ?>
        <li><?= $value ?></li>
    <?php endforeach; ?>
</ul>

<?php if (isset($poppedValue)): ?>
    <div class="result">Popped value: <?= $poppedValue ?></div>
<?php endif; ?>


<!-- Queue Operations -->
<?php
echo"4. Create a queue of integers using arrays (first in first out )<br>

● create input fields and push a button to insert a new value<br>
● Create a pop button to remove the old value<br>
● Always display the existing queue content<br>
● Do not use pre-defined PHP array function like array_pop<br><br>";
$dequeuedValue = null;

if (isset($_POST['action']) && $_POST['action'] === 'queue') {
    if (isset($_POST['queueEnqueue']) && !empty($_POST['queueValue'])) {
        $_SESSION['queue'][] = $_POST['queueValue'];
    } elseif (isset($_POST['queueDequeue']) && !empty($_SESSION['queue'])) {
        $dequeuedValue = array_shift($_SESSION['queue']);
    }
}
?>

<form action="" method="post" class="form-container">
    <input type="hidden" name="action" value="queue">
    <input type="number" name="queueValue" placeholder="Insert value" id="queueValue">
    <button name="queueEnqueue" onclick="document.getElementById('queueValue').required = true;">Enqueue</button>
    <button name="queueDequeue" onclick="document.getElementById('queueValue').required = false;">Dequeue</button>
</form>

<h2>Queue Content:</h2>
<ul>
    <?php foreach ($_SESSION['queue'] as $value): ?>
        <li><?= $value ?></li>
    <?php endforeach; ?>
</ul>

<?php if (isset($dequeuedValue)): ?>
    <div class="result">Dequeued value: <?= $dequeuedValue ?></div>
<?php endif; ?>


<!-- Custom Grid Generation -->
<?php
echo"5. Using a PHP POST method, ask the user to input 2 numbers<br>
● Create a Grid using 2 inputs as the length and width.<br>
● Insert random CONSONANT letters into the grid<br>
● Display the grid in table<br><br>";
$randomConsonantGrid = [];
if (isset($_POST['action']) && $_POST['action'] === 'generateGrid') {
    $gridLength = $_POST['gridLength'];
    $gridWidth = $_POST['gridWidth'];

    $consonants = 'BCDFGHJKLMNPQRSTVWXYZ';
    for ($i = 0; $i < $gridLength; $i++) {
        $row = [];
        for ($j = 0; $j < $gridWidth; $j++) {
            $row[] = $consonants[rand(0, strlen($consonants) - 1)];
        }
        $randomConsonantGrid[] = $row;
    }
}
?>

<form action="" method="post" class="form-container">
    <input type="hidden" name="action" value="generateGrid">
    <input type="number" name="gridLength" placeholder="Grid Length" required>
    <input type="number" name="gridWidth" placeholder="Grid Width" required>
    <button name="generateGridButton">Generate Grid</button>
</form>

<?php if (!empty($randomConsonantGrid)): ?>
<h2>Generated Consonant Grid:</h2>
<table>
    <?php foreach ($randomConsonantGrid as $row): ?>
        <tr>
            <?php foreach ($row as $cell): ?>
                <td><?= $cell ?></td>
            <?php endforeach; ?>
        </tr>
    <?php endforeach; ?>
</table>
<?php endif; ?>


<!-- Bubble Sort Operation -->
<?php
echo"6. Fix the code function to output the correct result. Explain your answer<br>";
echo "The logic in swapping is incorrect, so it needs to be adjusted to avoid overwriting values during the swap. 

In the original code, the swapping process mistakenly assigns the same value to both positions during the swap. This results in the original value of one element being lost, which prevents the function from sorting correctly.

To fix this, we should temporarily store the value of the first element before swapping it with the second. Then, we can place the stored value in the second position. This corrected approach ensures that both elements are properly swapped without losing any values, allowing the bubble sort algorithm to function as intended.
and we added return lists; so the function returns the sorted array.";

function bubbleSort($list) {
    $length = count($list);
    for ($i = 0; $i < $length - 1; $i++) {
        for ($j = 0; $j < $length - $i - 1; $j++) {
            if ($list[$j] > $list[$j + 1]) {
                $temp = $list[$j];
                $list[$j] = $list[$j + 1];
                $list[$j + 1] = $temp;
            }
        }
    }
    return $list;
}

// Example usage
$sampleArray = [34, 7, 23, 32, 5, 62];
$sortedArray = bubbleSort($sampleArray);
?>

<h2>Bubble Sort Result:</h2>
<p>Original Array: <?= implode(', ', $sampleArray) ?></p>
<p>Sorted Array: <?= implode(', ', $sortedArray) ?></p>



<div style="margin-top: 20px;">
    <a href="index.php" class="back-link">Back to Home</a>
</div>

</body>
</html>
