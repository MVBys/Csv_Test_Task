<h1 class="display-5 fw-normal">Import data</h1>

<?php if (isset($_SESSION['message'])) : ?>
    <div class="alert alert-danger" role="alert">
        <?php foreach ($_SESSION['message'] as $message) : ?>
            <ul>
                <li> <?php echo $message ?></li>
            </ul>
        <?php endforeach ?>
    </div>
<?php endif ?>


<form action="records/import" enctype="multipart/form-data" method="POST">

    <input type="hidden" name="MAX_FILE_SIZE" value="1024" />
    <div class="col-12 mb-4">
        <input class="form-control form-control-lg" name="csv_file" type="file">
    </div>


    <button class="w-100 btn btn-primary btn-lg" type="submit">Import</button>

</form>

<hr class="my-4">
<a href="/records/delete" class="w-100 btn btn-danger btn-lg" type="submit">Clear all records</a>