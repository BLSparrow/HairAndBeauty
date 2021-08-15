<?php include $_SERVER['DOCUMENT_ROOT'] . '/templates/navbar.admin.php'; ?>
<link rel="stylesheet" href="/css/formAdmin.scss">
<div class="cardsAnk">
    <div class="card2">
        <div class="row">

            <h2>редактировать инфо.</h2>

            <form action="/customers/updateCustomer.php" method="post" enctype="multipart/form-data">


                <div style="display: none">
                    <label class="bold" for="id">Категория</label><br>
                    <input class="t" type="text" id="id" name="id" value="<?= $customer->id ?>">
                </div>


                <div class="col">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" value="<?= $customer->name ?>">
                    </div>
                </div>


                <div class="col">
                    <div class="form-group">
                        <label for="telephone">Telephone</label>
                        <input type="tel" name="telephone" id="telephone" value="<?= $customer->telephone ?>">
                    </div>
                </div>

                <div class="col">
                    <div class="form-group">
                        <label for="id_master">Мастера</label><br>
                        <select name="id_master" id="id_master">
                            <option value="<?= $customer->id_master ?>" disabled
                                    selected><?= $customer->nameMasters ?></option>
                            <?php foreach ($masters as $master): ?>
                                <option value="<?= $master->id ?>"><?= $master->name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>


                <input type="submit" name="submitUpdate" value="Редактировать">


            </form>
        </div>
    </div>
</div>