<h1 class="display-5 fw-normal">Records</h1>
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

        <tr>
            <?php foreach ($records as $record) : ?>
                <th scope="row"><?php echo $record['uid'] ?></th>
                <td><?php echo $record['name'] ?></td>
                <td><?php echo $record['age'] ?></td>
                <td><?php echo $record['email'] ?></td>
                <td><?php echo $record['phone'] ?></td>
                <td><?php echo $record['gender'] ?></td>
            <?php endforeach ?>


        </tr>

    </tbody>



</table>

<a href="/records/export" class="btn btn-primary" target="_blank">Export to CSV</a>