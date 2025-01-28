<?php
// Alumnae data array
$alumnae = [
    [
        "name" => "Nisha Uttawani",
        "batch" => 2012,
        "branch" => "IT",
        "designation" => "Software Engineer at XYZ",
        "linkedin" => "https://www.linkedin.com/in/nishauttawani",
        "image" => "image1.jpg"
    ],
    [
        "name" => "Varsha Ranjan",
        "batch" => 2011,
        "branch" => "ECE",
        "designation" => "Program Analyst at Cognizant",
        "linkedin" => "https://www.linkedin.com/in/varsharanjan",
        "image" => "image1.jpg"
    ],
    [
        "name" => "Pooja Vastri",
        "batch" => 2009,
        "branch" => "IT",
        "designation" => "Solution Head at Infosys",
        "linkedin" => "https://www.linkedin.com/in/poojavastri",
        "image" => "image1.jpg"
    ],
    [
        "name" => "Jaya Chanchalani",
        "batch" => 2009,
        "branch" => "EE",
        "designation" => "Vertical Head at Padmapat Engineers",
        "linkedin" => "https://www.linkedin.com/in/jayachanchalani",
        "image" => "image1.jpg"
    ],
    [
        "name" => "Chitra Rao",
        "batch" => 2009,
        "branch" => "ECE",
        "designation" => "Assistant Manager",
        "linkedin" => "https://www.linkedin.com/in/chitrarao",
        "image" => "image1.jpg"
    ],
    [
        "name" => "Jaya Tiwari",
        "batch" => 2009,
        "branch" => "ECE",
        "designation" => "Banker at Bank of Baroda",
        "linkedin" => "https://www.linkedin.com/in/jayatiwari",
        "image" => "image1.jpg"
    ],
    [
        "name" => "Ruby Sehra",
        "batch" => 2009,
        "branch" => "EEE",
        "designation" => "Technical Assistant at XYZ",
        "linkedin" => "https://www.linkedin.com/in/rubysehra",
        "image" => "image1.jpg"
    ],
    [
        "name" => "Swati Sethi",
        "batch" => 2008,
        "branch" => "EEE",
        "designation" => "Rajasthan Subordinate Services",
        "linkedin" => "https://www.linkedin.com/in/swatisethi",
        "image" => "image1.jpg"
    ],
    [
        "name" => "John Doe",
        "batch" => 2007,
        "branch" => "CSE",
        "designation" => "Senior UX Designer at ABC Corp",
        "linkedin" => "https://www.linkedin.com/in/johndoe",
        "image" => "image1.jpg"
    ],
    [
        "name" => "Jane Smith",
        "batch" => 2010,
        "branch" => "MCA",
        "designation" => "Creative Director at XYZ Ltd",
        "linkedin" => "https://www.linkedin.com/in/janesmith",
        "image" => "image1.jpg"
    ],
    [
        "name" => "Michael Brown",
        "batch" => 2014,
        "branch" => "IT",
        "designation" => "Product Designer at DEF Inc",
        "linkedin" => "https://www.linkedin.com/in/michaelbrown",
        "image" => "image1.jpg"
    ],
    [
        "name" => "John Doe",
        "batch" => 2012,
        "branch" => "ECE",
        "designation" => "Senior UX Designer at ABC Corp",
        "linkedin" => "https://www.linkedin.com/in/johndoe",
        "image" => "image1.jpg"
    ],
    [
        "name" => "Jane Smith",
        "batch" => 2016,
        "branch" => "EE",
        "designation" => "Creative Director at XYZ Ltd",
        "linkedin" => "https://www.linkedin.com/in/janesmith",
        "image" => "image1.jpg"
    ]
];

// Function to generate CSV
if (isset($_GET['download'])) {
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="alumnae_sheet.csv"');
    $output = fopen('php://output', 'w');
    fputcsv($output, ['Name', 'Batch', 'Branch', 'Designation', 'LinkedIn']);
    foreach ($alumnae as $alumna) {
        fputcsv($output, [$alumna['name'], $alumna['batch'], $alumna['branch'], $alumna['designation'], $alumna['linkedin']]);
    }
    fclose($output);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Precious Alumnae Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: rgba(67, 76, 180, 0.29);
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: rgb(10, 19, 122);
            color: white;
            padding: 15px 20px;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        header h1 {
            margin: 0;
        }

        .search-bar {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .search-bar input {
            padding: 5px 10px;
            font-size: 14px;
            border-radius: 5px;
            border: 1px solid #ccc;
            width: 200px;
        }

        .search-bar .filter-btn {
            background-color: white;
            color: rgb(91, 93, 203);
            padding: 5px 10px;
            border: 1px solid rgb(91, 93, 203);
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
        }

        .filter-popup {
            display: none;
            position: absolute;
            top: 60px;
            right: 20px;
            background: white;
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .filter-popup select {
            display: block;
            margin: 10px 0;
            padding: 5px;
            font-size: 14px;
            width: 150px;
        }

        .alumnae-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding: 20px;
            gap: 20px;
        }

        .alumna {
            background: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 250px;
        }

        .alumna .picture {
            background: rgb(3, 25, 79);
            border-radius: 1px;
            width: 250px;
            height: 150px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .alumna img {
            width: 140px;
            height: 130px;
            border-radius: 50%;
            object-fit: cover;
        }

        .info {
            text-align: center;
            padding: 10px 0;
        }

        .info h2 {
            font-size: 18px;
            margin: 0 0 5px;
            color: #333;
        }

        .info p {
            margin: 5px 0;
            color: #555;
        }

        .info a {
            color: rgb(91, 93, 203);
            text-decoration: none;
        }

        .info a:hover {
            text-decoration: underline;
        }
    </style>
    <script>
        function toggleFilterPopup() {
            const popup = document.getElementById('filterPopup');
            popup.style.display = popup.style.display === 'block' ? 'none' : 'block';
        }

        function filterAlumnae() {
            const nameFilter = document.getElementById('searchName').value.toLowerCase();
            const batchFilter = document.getElementById('filterBatch').value;
            const branchFilter = document.getElementById('filterBranch').value;

            const alumnaeCards = document.querySelectorAll('.alumna');
            alumnaeCards.forEach(card => {
                const name = card.getAttribute('data-name').toLowerCase();
                const batch = card.getAttribute('data-batch');
                const branch = card.getAttribute('data-branch');

                const matchesName = name.includes(nameFilter);
                const matchesBatch = !batchFilter || batch === batchFilter;
                const matchesBranch = !branchFilter || branch === branchFilter;

                card.style.display = matchesName && matchesBatch && matchesBranch ? 'block' : 'none';
            });
        }
    </script>
</head>

<body>
    <header>
        <h1>Precious Alumnae</h1>
        <div class="search-bar">
            <input type="text" id="searchName" placeholder="Search by Name" onkeyup="filterAlumnae()">
            <button class="filter-btn" onclick="toggleFilterPopup()">
                <img src="filter_icon.jpg" width="12">
            </button>
            <!-- Download button -->
            <a href="https://1drv.ms/x/c/a47fdb18a22f8606/Ea__Q5AIXXZHka8dnLGtSYEB21CRShRO3y8QuztLTtlFqg?e=EUcUP2" class="filter-btn" title="Download Alumnae Sheet">
                <img src="download_button.jpg" width="15" alt="Download Icon">
            </a>
        </div>
    </header>

    <div class="filter-popup" id="filterPopup">
        <select id="filterBatch" onchange="filterAlumnae()">
            <option value="">Select Year</option>
            <?php for ($year = 2007; $year <= 2025; $year++) { ?>
                <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
            <?php } ?>
        </select>
        <select id="filterBranch" onchange="filterAlumnae()">
            <option value="">Select Branch</option>
            <option value="CSE">CSE</option>
            <option value="IT">IT</option>
            <option value="AIML">AIML</option>
            <option value="EEE">EEE</option>
            <option value="EE">EE</option>
            <option value="ECE">ECE</option>
            <option value="ME">ME</option>
            <option value="MCA">MCA</option>
        </select>
    </div>

    <div class="alumnae-container">
        <?php
        foreach ($alumnae as $alumna) {
            echo "
            <div class='alumna' data-name='{$alumna['name']}' data-batch='{$alumna['batch']}' data-branch='{$alumna['branch']}'>
                <div class='picture'>
                    <img src='{$alumna['image']}' alt='{$alumna['name']}'>
                </div>
                <div class='info'>
                    <h2>{$alumna['name']}</h2>
                    <p><strong>{$alumna['designation']}</strong></p>
                    <p><strong>Batch:</strong> {$alumna['batch']}</p>
                    <p><strong>Branch:</strong> {$alumna['branch']}</p>
                    <a href='{$alumna['linkedin']}' target='_blank'>LinkedIn Profile</a>
                </div>
            </div>
            ";
        }
        ?>
    </div>
</body>

</html>