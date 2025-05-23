<?php

$sql = 'SELECT * FROM `channels`';
$res = mysqli_query($connect, $sql);

$sql2 = 'SELECT * FROM `posts`';
$res2 = mysqli_query($connect, $sql2);

if (mysqli_errno($connect))
    print_r(mysqli_error($connect));

?>

<!-- Создание поста -->
<div class="container">
    <form action="index.php" method="POST">
        <input type="hidden" name="add-post">
        <div class="form-group">
            <label for="description">Текст поста</label>
            <textarea required class="form-control" id="description" rows="5" name="description"></textarea>
        </div>

        <div class="form-group">
            <label for="channel">Канал</label>
            <select class="form-control" id="channel" name="channel">
                <?php while ($row = mysqli_fetch_assoc($res)): ?>
                    <option><?= $row['name']; ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary mb-3">Написать пост</button>
    </form>
</div>

<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Пост</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = mysqli_fetch_assoc($res2)): ?>
            <tr>
                <th scope="row"><?= $row['id']; ?></th>
                <td><?= $row['description']; ?></td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>