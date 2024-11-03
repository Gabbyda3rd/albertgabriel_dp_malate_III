<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pattern Display</title>
    <style>
        /* General styling for the patterns */
        body {
            background-color: #f0f4f8; /* Light blue-gray background */
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            min-height: 100vh; /* Center content vertically */
            margin: 0;
            padding: 20px;
            color: #333; /* Darker text for better readability */
        }
        .pattern {
            text-align: left; /* Keep text alignment to the left for pattern structure */
            line-height: 1.5;
            font-size: 16px;
            white-space: pre; /* Preserves spaces and line breaks */
            background: #ffffff; /* White background for the pattern section */
            border: 1px solid #d1d1d1; /* Light gray border */
            border-radius: 8px; /* Rounded corners */
            padding: 20px; /* Padding around the content */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
            width: 90%; /* Responsive width */
            max-width: 600px; /* Max width for larger screens */
            margin: auto; /* Center the pattern box horizontally */
        }
        .highlight {
            color: blue; /* Highlighted text color */
            font-weight: bold; /* Bold font for highlighted text */
            font-size: 18px; /* Larger font size for emphasis */
        }
        /* Button Styling */
        .button {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 20px; /* Adds some space above the button */
            color: #fff;
            background-color: #4CAF50; /* Green background */
            border: none;
            border-radius: 5px;
            text-decoration: none; /* Removes underline */
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .button:hover {
            background-color: #45a049; /* Darker green on hover */
        }
    </style>
</head>
<body>
<div class="pattern">

<?php
$rows = 4; // Size of the diamond, the number of rows for the top half

// Number 1
echo "<div class='highlight'>1. Create the given pattern</div>";
for ($i = 1; $i <= $rows; $i++) {
    for ($k = $rows; $k > $i; $k--) {
        echo "&nbsp;&nbsp;";
    }
    echo "*";
    for ($j = 1; $j < 2 * ($i - 1); $j++) {
        echo "&nbsp;&nbsp;";
    }
    if ($i != 1) {
        echo "*";
    }
    echo "<br>";
}

for ($i = $rows - 1; $i >= 1; $i--) {
    for ($k = $rows; $k > $i; $k--) {
        echo "&nbsp;&nbsp;";
    }
    echo "*";
    for ($j = 1; $j < 2 * ($i - 1); $j++) {
        echo "&nbsp;&nbsp;";
    }
    if ($i != 1) {
        echo "*";
    }
    echo "<br>";
}

for ($i = 2; $i <= $rows; $i++) {
    for ($k = $rows; $k > $i; $k--) {
        echo "&nbsp;&nbsp;";
    }
    echo "*";
    for ($j = 1; $j < 2 * ($i - 1); $j++) {
        echo "&nbsp;&nbsp;";
    }
    if ($i != 1) {
        echo "*";
    }
    echo "<br>";
}

for ($i = $rows - 1; $i >= 1; $i--) {
    for ($k = $rows; $k > $i; $k--) {
        echo "&nbsp;&nbsp;";
    }
    echo "*";
    for ($j = 1; $j < 2 * ($i - 1); $j++) {
        echo "&nbsp;&nbsp;";
    }
    if ($i != 1) {
        echo "*";
    }
    echo "<br>";
}

echo "<br>";

// Number 2
echo "<div class='highlight'>2. Create the given pattern (X)</div>";
$size = 9; // Size of the X pattern
$mid = intdiv($size, 2);
for ($i = 0; $i < $size; $i++) {
    for ($j = 0; $j < $size; $j++) {
        if ($j == $i || $j == ($size - $i - 1)) {
            if ($i == 0 || $i == $size - 1) {
                echo "<span class='highlight'>5</span>";
            } elseif ($i == $mid) {
                echo "<span class='highlight'>1</span>";
            } elseif ($i == 2 || $i == $size - 3) {
                echo "<span class='highlight'>3</span>";
            } else {
                echo "*";
            }
        } else {
            echo "&nbsp;";
        }
    }
    echo "<br>";
}

echo "<br>";

// Number 3
echo "<div class='highlight'>3. Create the given pattern</div>";
$num = 5;
for ($a = 1; $a <= $num; $a++) {
    for ($b = 1; $b <= $a; $b++) {
        echo $a * $b . " ";
    }
    echo "<br>";
}
for ($a = $num - 1; $a >= 1; $a--) {
    for ($b = 1; $b <= $a; $b++) {
        echo $a * $b . " ";
    }
    echo "<br>";
}

echo "<br>";

// Number 4
echo "<div class='highlight'>4. Create the given pattern</div>";
$rows2 = 6;
for ($x = 1; $x <= $rows2; $x++) {
    $value = $x;
    echo $value . " ";
    for ($y = 1; $y < 5; $y++) {
        $value *= ($x + 1);
        echo $value . " ";
    }
    echo "<br>";
}
?>

<!-- Back to Home Button -->
<div style="margin-top: 20px;">
    <a href="index.php" style="padding: 10px 15px; background-color: #007BFF; color: white; border: none; border-radius: 4px; text-decoration: none; cursor: pointer;">Back to Home</a>
</div>
</div>
</body>
</html>
