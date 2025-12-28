<?php
include("../dboperation.php");
$obj = new dboperation();

if (isset($_POST['status']) && $_POST['status'] != "") {
    $status = $_POST['status'];

    $sql = "SELECT c.name, c.address, w.ward_name, ca.category_name, 
                   s.subcategory_name, r.item_quantity, r.request_date, r.status,
                   r.request_id, c.ward_id 
            FROM tbl_customer c
            INNER JOIN tbl_request r ON c.customer_id = r.customer_id
            INNER JOIN tbl_ward w ON c.ward_id = w.ward_id
            INNER JOIN tbl_category ca ON r.category_id = ca.category_id
            INNER JOIN tbl_subcategory s ON r.subcategory_id = s.subcategory_id
            WHERE r.status = '$status'";
    
    $result = $obj->executequery($sql);
    $i = 1;

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>
                    <td>{$i}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['address']}</td>
                    <td>{$row['ward_name']}</td>
                    <td>{$row['category_name']}</td>
                    <td>{$row['subcategory_name']}</td>
                    <td>{$row['item_quantity']}</td>
                    <td>{$row['request_date']}</td>";

            echo "<td>";
            if ($row['status'] == 'pending') {
                echo "<a href='request_action.php?request_id={$row['request_id']}&ward_id={$row['ward_id']}' 
                         class='btn btn-warning btn-sm'
                         onclick=\"return confirm('Do you want to assign collector?');\">
                         Pending (Assign)
                      </a>";
            } elseif ($row['status'] == 'Assigned') {
                echo "<span class='btn btn-primary btn-sm disabled'>Assigned</span>";
            } elseif ($row['status'] == 'Collected') {
                echo "<span class='btn btn-success btn-sm disabled'>Collected</span>";
            } else {
                echo "<span class='btn btn-secondary btn-sm disabled'>{$row['status']}</span>";
            }
            echo "</td>";

            echo "</tr>";
            $i++;
        }
    } else {
        echo "<tr><td colspan='9' class='text-center text-danger'>No requests found for this status!</td></tr>";
    }
} else {
    echo "<tr><td colspan'9' class='text-center text-muted'>Please select a valid status.</td></tr>";
}
?>