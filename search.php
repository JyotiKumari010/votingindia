<?php
include 'connection.php';

$query = isset($_GET['q']) ? $_GET['q'] : '';
$query = $conn->real_escape_string($query);

$sql = "SELECT * FROM pages WHERE content LIKE '%$query%' OR title LIKE '%$query%'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<h2>" . $row["title"] . "</h2>";
        echo "<p>" . str_ireplace($query, "<span style='background-color: yellow; font-weight: bold;'>$query</span>", $row["content"]) . "</p>";
        echo "<hr>";
    }
} else {
    echo "<p style='color: red; text-align: center; font-weight: bold;'>No Data Found</p>";
}

$conn->close();
?>
<script>
document.getElementById("search-bar").addEventListener("keypress", function(event) {
    if (event.key === "Enter") { // جب یوزر "Enter" دبائے
        let query = this.value;
        if (query !== "") {
            window.location.href = "search.php?q=" + encodeURIComponent(query);
        }
    }
});
</script>

