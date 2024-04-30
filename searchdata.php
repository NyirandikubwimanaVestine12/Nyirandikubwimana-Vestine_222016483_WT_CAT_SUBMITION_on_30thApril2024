<?php 
 include "dbconnection.php";
// Check if the 'query' GET parameter is set
if (isset($_GET['searching']) && !empty($_GET['searching'])) {
    // Call file that contain database connection
  

    // Sanitize input to prevent SQL injection
    $searching = $connection->real_escape_string($_GET['searching']);

    // Queries for different tables
    $queries = [
        'bank' => "SELECT bank_name FROM bank WHERE bank_name LIKE '%$searching%'",
        'customerorders' => "SELECT order_id FROM customerorders WHERE order_id LIKE '%$searching%'",
        'transaction' => "SELECT transaction_name  FROM transaction WHERE transaction_name LIKE '%$searching%'",
        'product' => "SELECT  productname FROM product WHERE productname LIKE '%$searching%'",
        'user' => "SELECT user_id FROM user WHERE user_id LIKE '%$searching%'",
        'supplier' => "SELECT supplyname FROM supplier WHERE supplyname LIKE '%$searching%'",
        'messages' => "SELECT id FROM messages WHERE id LIKE '%$searching%'"
    ];

    // Output search results
    echo "<h2><i>Search Results:</font></i>";
    foreach ($queries as $table => $sql) {
        $result = $connection->query($sql);
        echo "<h3>Table of $table:</h3>";
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<p>" . $row[array_keys($row)[0]] . "</p>"; // Dynamic field extraction from result
            }
        } else {
            echo "<p>No results found in $table matching the search term: '$searching'</p>";
        }
    }

    // Close the connection
    $connection->close();
} else {
    echo "<p>No search term was provided.</p>";
}
?>
