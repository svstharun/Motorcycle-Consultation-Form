<?php
// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect form data
    $purchase_plan = $_POST['purchase_plan'] ?? 'Not specified';
    $category = $_POST['category'] ?? 'Not specified';
    $purpose = $_POST['purpose'] ?? 'Not specified';
    $budget = $_POST['budget'] ?? 'Not specified';
    $payment_method = $_POST['payment_method'] ?? 'Not specified';
    $seat_height = $_POST['seat_height'] ?? 'Not specified';
    $ground_clearance = $_POST['ground_clearance'] ?? 'Not specified';
    $engine_size = $_POST['engine_size'] ?? 'Not specified';
    $safety_features = $_POST['safety_features'] ?? [];
    $electric = $_POST['electric'] ?? 'no';
    $offers = $_POST['offers'] ?? 'Not specified';
    $quotation = $_POST['quotation'] ?? 'no';

    // Process the data to generate a recommendation
    $recommendation = "";

    // Basic recommendation logic based on budget and category
    if ($category === 'entry') {
        if ($budget === '1l_1.25l') {
            $recommendation = "Recommended: Hero Splendor Plus or Honda Shine.";
        } elseif ($budget === '1l_1.50l') {
            $recommendation = "Recommended: Bajaj Pulsar 125 or TVS Raider.";
        } else {
            $recommendation = "Recommended: Yamaha FZ-S FI or Honda Unicorn.";
        }
    } elseif ($category === 'commuter') {
        $recommendation = "Recommended: Honda Activa or Suzuki Access.";
    } elseif ($category === 'urban') {
        $recommendation = "Recommended: KTM Duke 200 or Yamaha MT-15.";
    } elseif ($category === 'performance') {
        $recommendation = "Recommended: Royal Enfield Interceptor 650 or Kawasaki Ninja 300.";
    }

    // Add information for electric motorcycles
    if ($electric === 'yes') {
        $recommendation .= "\nYou might also consider electric motorcycles like the Revolt RV400 or Ola S1.";
    }

    // Quotation logic
    $quotation_text = ($quotation === 'yes') ? "A detailed quotation will be provided by the dealer." : "No quotation requested.";

    // Prepare safety feature string
    $safety_feature_list = empty($safety_features) ? "None" : implode(', ', $safety_features);

    // Display the result
    echo "<h1>Motorcycle Purchase Consultation Summary</h1>";
    echo "<p><strong>Purchase Plan:</strong> $purchase_plan</p>";
    echo "<p><strong>Category:</strong> $category</p>";
    echo "<p><strong>Purpose:</strong> $purpose</p>";
    echo "<p><strong>Budget:</strong> $budget</p>";
    echo "<p><strong>Payment Method:</strong> $payment_method</p>";
    echo "<p><strong>Seat Height:</strong> $seat_height cm</p>";
    echo "<p><strong>Ground Clearance:</strong> $ground_clearance cm</p>";
    echo "<p><strong>Engine Size:</strong> $engine_size</p>";
    echo "<p><strong>Safety Features:</strong> $safety_feature_list</p>";
    echo "<p><strong>Interested in Electric Motorcycles:</strong> " . ucfirst($electric) . "</p>";
    echo "<p><strong>Offers:</strong> $offers</p>";
    echo "<p><strong>Recommendation:</strong> $recommendation</p>";
    echo "<p><strong>Quotation:</strong> $quotation_text</p>";
} else {
    echo "<h1>Error</h1><p>Invalid request method. Please submit the form correctly.</p>";
}
?>
