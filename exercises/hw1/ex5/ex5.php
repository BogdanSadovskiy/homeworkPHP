<?php
$processors = [
    ["name" => "Intel Core i7", "color" => "#FF6347"],
    ["name" => "AMD Ryzen 7", "color" => "#4682B4"],
];

$motherboards = [
    ["name" => "Asus ROG Strix", "color" => "#32CD32"],
    ["name" => "MSI B450M", "color" => "#FFD700"],
];

$rams = [
    ["name" => "Corsair Vengeance", "color" => "#FF4500"],
    ["name" => "G.Skill Ripjaws", "color" => "#FF69B4"],
];

$hdds = [
    ["name" => "Seagate Barracuda", "color" => "#00CED1"],
    ["name" => "WD Blue", "color" => "#6A5ACD"],
];

$powerSupplies = [
    ["name" => "Corsair 650W", "color" => "#FFDAB9"],
    ["name" => "EVGA 600W", "color" => "#A9A9A9"],
];

function showCombinations($processors, $motherboards, $rams, $hdds, $powerSupplies)
{
    $combinations = [];

    foreach ($processors as $processor) {
        foreach ($motherboards as $motherboard) {
            foreach ($rams as $ram) {
                foreach ($hdds as $hdd) {
                    foreach ($powerSupplies as $powerSupply) {
                        $combinations[] = [
                            'processor' => $processor,
                            'motherboard' => $motherboard,
                            'ram' => $ram,
                            'hdd' => $hdd,
                            'powerSupply' => $powerSupply,
                        ];
                    }
                }
            }
        }
    }

    return $combinations;
}

$showCombinations = isset($_POST['showCombinations']);
$combinations = $showCombinations ? showCombinations($processors, $motherboards, $rams, $hdds, $powerSupplies) : [];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PC Combinations</title>
    <link rel="stylesheet" href="../../../common.css">
    <link rel="stylesheet" href="ex5.css">
</head>

<body>
    <div class="container">
        <h1>PC Component Combinations</h1>

        <h2>Components:</h2>
        <div class="components-container">
            <div class="component-card">
                <h3>Processors</h3>
                <div class="component-block" style="background-color: #FF6347;">Intel Core i7</div>
                <div class="component-block" style="background-color: #4682B4;">AMD Ryzen 7</div>
            </div>

            <div class="component-card">
                <h3>Motherboards</h3>
                <div class="component-block" style="background-color: #32CD32;">Asus ROG Strix</div>
                <div class="component-block" style="background-color: #FFD700;">MSI B450M</div>
            </div>

            <div class="component-card">
                <h3>RAM</h3>
                <div class="component-block" style="background-color: #FF4500;">Corsair Vengeance</div>
                <div class="component-block" style="background-color: #FF69B4;">G.Skill Ripjaws</div>
            </div>

            <div class="component-card">
                <h3>HDDs</h3>
                <div class="component-block" style="background-color: #00CED1;">Seagate Barracuda</div>
                <div class="component-block" style="background-color: #6A5ACD;">WD Blue</div>
            </div>

            <div class="component-card">
                <h3>Power Supplies</h3>
                <div class="component-block" style="background-color: #FFDAB9;">Corsair 650W</div>
                <div class="component-block" style="background-color: #A9A9A9;">EVGA 600W</div>
            </div>
        </div>

        <form method="post">
            <button type="submit" name="showCombinations">Show Combinations</button>
        </form>

        <div id="combinationsOutput">
            <?php if ($showCombinations): ?>
                <h2>Combinations:</h2>
                <div class="combinations-container">
                    <?php foreach ($combinations as $index => $combination): ?>
                        <div class="combination-block" style="background-color: aquamarine">
                            <h3>Combination <?php echo $index + 1; ?></h3>
                            <div style="background-color: <?php echo $combination['processor']['color']; ?>">
                                Processor: <?php echo $combination['processor']['name']; ?>
                            </div>
                            <div style="background-color: <?php echo $combination['motherboard']['color']; ?>">
                                Motherboard: <?php echo $combination['motherboard']['name']; ?>
                            </div>
                            <div style="background-color: <?php echo $combination['ram']['color']; ?>">
                                RAM: <?php echo $combination['ram']['name']; ?>
                            </div>
                            <div style="background-color: <?php echo $combination['hdd']['color']; ?>">
                                HDD: <?php echo $combination['hdd']['name']; ?>
                            </div>
                            <div style="background-color: <?php echo $combination['powerSupply']['color']; ?>">
                                Power Supply: <?php echo $combination['powerSupply']['name']; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>

        <a href="../../homework.php" class="back-link">Back</a>


    </div>



</body>

</html>