<?php include $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php'; ?>

<?php $record = $dataRecord->getLastRecording();
foreach ($record as $rec): ?>
    <link rel="stylesheet" href="/css/homePage.css">
    <section class="modal">
        <div class="modal__text">
            <h1>Здравствуйте, <?= $rec->nameCustomers ?>!</h1><br>
            <p>Ваш мастер: <?= $rec->nameMasters ?></p>
            <p>Вы записались на <?= date("d.m.Y", strtotime($rec->date_reg)); ?> в <?= substr($rec->time, 0, -3); ?></p>
            <p>Услуга: <?= $rec->title ?></p>
            <p>К оплате: <?= $rec->price ?>&#8381;</p><br>
            <p>Для уточнения информации о точном времени вашей записи вы можете позвонить на личный номер
                мастера <?= $rec->tel ?>
                <br> или по номеру салона +7 (908) 055-21-77</p><br>
            <a style="left: 40%" class="btn5 btn-one" href="/index.php">Вернуться</a>
        </div>
    </section>
<?php endforeach; ?>