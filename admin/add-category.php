<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Add new Category </h1>
</div>
<hr>
<form action="<?php echo getAdminUrl("process-add-category.php") ?>" method="post">
    <div class="form-group">
        <label for="">
            Category Name:
        </label>
        <input type="text" required class="form-control" name="category_name">
    </div>
    <button type="submit" class="btn btn-primary">
        Add new Category
    </button>
</form>