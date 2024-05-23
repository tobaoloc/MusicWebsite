<?php
$getCategoriesQuery = "SELECT * FROM `categories` ORDER BY `ID` DESC";
$result = $mysql->query($getCategoriesQuery);
if ($result && $result->num_rows > 0) {
    $categories = $result;

} else {
    $categories = null;
}
?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Category</h1>
    <a href="<?php echo getAdminUrl("?action=add-category") ?>" class="btn btn-primary">
        Add Category
    </a>
</div>
<div class="row">

</div>
<div class="row">
    <table class="table table-bordered table-striped">
        <thead>
            <tr align="center">
                <th width="15px">ID</th>
                <th>NAME</th>
                <th width="200px"></th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($categories == null) { ?>
                <tr>
                    <td colspan="2">
                        No data !
                    </td>
                </tr>
            <?php } else {
                $i = 1;
                while ($category = $categories->fetch_array()) {
                    ?>
                    <tr align="center">
                        <td>
                            <?php echo $i++; ?>
                        </td>
                        <td>
                            <?php echo $category['name']; ?>
                        </td>
                        <td>
                            <a href="<?php echo getAdminUrl("?action=update-category&id=" . $category['id']) ?>"
                                class="btn btn-success me-3">
                                Edit
                            </a>
                            <a href="<?php echo getAdminUrl("delete-category.php?id=" . $category['id']) ?>"
                                class="btn btn-danger me-3">
                                Remove
                            </a>
                        </td>
                    </tr>
                <?php }
            }
            ?>
        </tbody>
    </table>
</div>