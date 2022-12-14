<h1 class="display-5 fw-normal">Records</h1>

<?php if (empty($records)) : ?>
    <div class="alert alert-danger" role="alert">
        Records table is empty
    </div>
<?php endif ?>

<table class="table">
    <thead>
        <tr>
            <th scope="col">uid</th>
            <th scope="col">name</th>
            <th scope="col">age</th>
            <th scope="col">email</th>
            <th scope="col">phone</th>
            <th scope="col">gender</th>
        </tr>
    </thead>

    <tbody>


        <?php foreach ($records as $record) : ?>
            <tr>
                <th scope="row"><?php echo $record['uid'] ?></th>
                <td><?php echo $record['name'] ?></td>
                <td><?php echo $record['age'] ?></td>
                <td><?php echo $record['email'] ?></td>
                <td><?php echo $record['phone'] ?></td>
                <td><?php echo $record['gender'] ?></td>
            </tr>
        <?php endforeach ?>




    </tbody>



</table>

<?php if (!empty($records)) : ?>
    <a href="/records/export" class="btn btn-primary" target="_blank">Export to CSV</a>
<?php endif ?>