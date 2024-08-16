<?php
            if (!isset($_POST['search_button']) || empty(trim($_POST['search_input']))) {
                echo ""; // Clear the search_container
            } 
            else if (isset($_POST['search_button']) && !empty(trim($_POST['search_input']))) {
                $search = trim($_POST['search_input']);
                $search = strtolower($search);
                $search = "%$search%"; // Add wildcards for partial matches

                // Prepared statement to prevent SQL injection
                $sql = "SELECT * FROM `pet_products` WHERE LOWER(product_title) LIKE ? OR LOWER(product_type) LIKE ? OR LOWER(product_quantity) LIKE ? OR LOWER(product_description) LIKE ?";
                $stmt = $con->prepare($sql);
                $stmt->bind_param('ssss', $search, $search, $search, $search);
                $stmt->execute();
                $result = $stmt->get_result();
                echo "
                <h2 class='text-center text-pri' > Search </h2>";
                if ($result->num_rows > 0) {
                    echo "
                    
                    <div class='products d-flex flex-wrap justify-content-center' >";
                    product_display($result);
                    echo '
                    <hr class=" bg-sec text-sec">
                    <hr class=" bg-sec text-sec">
                    
                    </div>';
                } else {
                    echo "<p class='text-center'>No products found matching your search criteria. </p>";
                }

                $stmt->close();
            }
            ?>