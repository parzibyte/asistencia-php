<?php
if (!isset($_GET["id"])) exit("No id provided");
include_once "header.php";
include_once "nav.php";
$id = $_GET["id"];
include_once "functions.php";
$employee = getEmployeeById($id);
?>
<div class="row">
    <div class="col-12">
        <h1 class="text-center">Edit employee</h1>
    </div>
    <div class="col-12">
        <form action="employee_update.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $employee->id ?>">
            <div class="form-group">
                <label for="name">Name</label>
                <input value="<?php echo $employee->name ?>" name="name" placeholder="Name" type="text" id="name" class="form-control" required>
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
