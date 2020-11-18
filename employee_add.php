<?php
include_once "header.php";
include_once "nav.php";
?>
<div class="row">
    <div class="col-12">
        <h1 class="text-center">Add employee</h1>
    </div>
    <div class="col-12">
        <form action="employee_save.php" method="POST">
            <div class="form-group">
                <label for="name">Name</label>
                <input name="name" placeholder="Name" type="text" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <button class="btn btn-success">
                    Save <i class="fa fa-check"></i>
                </button>
            </div>
        </form>
    </div>
</div>
<?php
include_once "footer.php";
