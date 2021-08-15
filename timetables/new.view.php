<?php include $_SERVER['DOCUMENT_ROOT'] . '/templates/navbar.admin.php'; ?>
<style>
    .alert-success{
        display: none;
    }
</style>

<link rel="stylesheet" href="/css/formAdmin.scss">
<div class="cardsAnk">
    <div class="card2">
        <div class="row">

            <h2>Добавить время</h2>

            <form action="/timetables/insertTimetables.php" method="post" enctype="multipart/form-data">

                <p class="<?= $_SESSION['alert'] ?? '' ?>"><?= $_SESSION['msg'] ?? '' ?></p>

                <div class="col">
                    <div class="form-group">
                        <label for="master_id">Мастер</label>
                        <select id="master_id" name="master_id">
                            <option value="" disabled selected>Выберите мастера</option>
                            <?php foreach ($masters1 as $master): ?>
                                <option value="<?= $master->id ?>"><?= $master->name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>


                <div class="col">
                    <div class="form-group">
                        <label for="date">Дата</label>
                        <input type="date" name="date" id="date">
                    </div>
                </div>


                <div>
                    <p><input id="all" type="checkbox" name="all" value="all" onclick="checkAll(this)"/><label for="all">Выбрать всё</label></p>
                    <?php foreach ($times as $time): ?>
                        <p><input id="time_id" type="checkbox" name="time_id[]" value="<?= $time->id ?>"/><label for="time_id"><?= $time->time ?></label></p>
                    <?php endforeach; ?>
                </div>


                <div class="col">
                    <input type="submit" name="submit" value="Добавить">
                </div>


            </form>
        </div>
    </div>
</div>


<script type="text/javascript">
    function checkAll(obj) {
        'use strict';
        // Получаем NodeList дочерних элементов input формы:
        var items = obj.form.getElementsByTagName("input"),
            len, i;
        // Здесь, увы цикл по элементам формы:
        for (i = 0, len = items.length; i < len; i += 1) {
            // Если текущий элемент является чекбоксом...
            if (items.item(i).type && items.item(i).type === "checkbox") {
                // Дальше логика простая: если checkbox "Выбрать всё" - отмечен
                if (obj.checked) {
                    // Отмечаем все чекбоксы...
                    items.item(i).checked = true;
                } else {
                    // Иначе снимаем отметки со всех чекбоксов:
                    items.item(i).checked = false;
                }
            }
        }
    }
</script>