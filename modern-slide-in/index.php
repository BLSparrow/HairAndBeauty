<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modern Slide In - Sequence.js Theme</title>
    <link href="/modern-slide-in/css/sequence-theme.modern-slide-in.css" rel="stylesheet" media="all">
    <script src="/modern-slide-in/scripts/respond.min.js"></script>
</head>
<body>
<div id="sequence" class="seq">

    <div class="seq-screen">
        <ul class="seq-canvas">
            <?php foreach ($masters as $master): ?>
                <li class="seq-in">
                    <div class="seq-model">
                        <img data-seq src="/img/<?= $master->image ?>" alt="img"/>
                    </div>

                    <div class="seq-title">
                        <h2 data-seq><?= $master->name ?></h2>
                        <h3 data-seq><?= $master->about_me ?></h3>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <fieldset class="seq-nav" aria-controls="sequence" aria-label="Slider buttons">
        <button type="button" class="seq-prev" aria-label="Previous">Previous</button>
        <button type="button" class="seq-next" aria-label="Next">Next</button>
    </fieldset>

    <ul role="navigation" aria-label="Pagination" class="seq-pagination">
        <?php foreach ($masters as $master): ?>
            <li><a href="#step1" rel="step1" title="Go to slide 1"><img src="/img/<?= $master->image ?>" alt="img"/></a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>

<script src="/modern-slide-in/scripts/imagesloaded.pkgd.min.js"></script>
<script src="/modern-slide-in/scripts/hammer.min.js"></script>
<script src="/modern-slide-in/scripts/sequence.min.js"></script>
<script src="/modern-slide-in/scripts/sequence-theme.modern-slide-in.js"></script>
<br>
</body>
</html>