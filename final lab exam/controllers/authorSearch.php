<?php
require_once('../model/authorModel.php');

if (isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
    $authors = searchAuthors($keyword);
    
    if (count($authors) > 0) {
        foreach ($authors as $author) {
            echo "<tr>
                    <td>" . htmlspecialchars($author['author_name']) . "</td>
                    <td>" . htmlspecialchars($author['contact_no']) . "</td>
                    <td>" . htmlspecialchars($author['username']) . "</td>
                    <td>
                        <a href='../view/editAuthor.php?id=" . $author['id'] . "'>Edit</a> | 
                        <a href='../controller/deleteAuthor.php?id=" . $author['id'] . "' onclick='return confirm(\"Are you sure you want to delete this author?\")'>Delete</a>
                    </td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='4'>No authors found.</td></tr>";
    }
}
?>
