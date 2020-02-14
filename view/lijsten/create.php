<?php include("../../_headerLayout.php"); ?>

<main class="container">
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <div class="form-group">
            <label for="inputName">Name</label>
            <input type="text" class="form-control" id="inputName" placeholder="Name" required>
        </div>
        <button type="submit" class="btn btn-primary">Add</button>
    </form>
</main>
<?php include("../../_footerLayout.php"); ?>