<link rel="stylesheet" href="/css/input.css">
<link rel="stylesheet" href="/css/details.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="/jquery.maskedinput-master/src/jquery.maskedinput.js" type="text/javascript"></script>
<script type="text/javascript">
    jQuery(function ($) {
        $("#telephone").mask("+7 (999) 999-9999");
    });
</script>
<br>
<div class="cardsAnk">
    <div class="cardAnk">
        <form action="/recordings/insertRecording.php" method="post" enctype="multipart/form-data">
            <div id="rec">

<!--                <div>-->
<!--                    --><?php //foreach ($timesTable as $item): ?>
<!--                        <div>-->
<!--                            <img style="width: 200px;" src="/img/--><?php //= $item['imgMasters'] ?><!--" alt="img">-->
<!--                            <p>--><?php //= $item['nameMasters'] ?><!--</p>-->
<!---->
<!--                            <label for="master_id"></label>-->
<!--                            <input type="text" name="master_id" id="master_id" value="--><?php //= $item['idMasters'] ?><!--">-->
<!--                            <div>-->
<!--                                <p>--><?php //= $item['date'] ?><!--</p>-->
<!--                                <label class="radio-control">-->
<!--                                    <input type="radio" name="time_tables_id" id="time_tables_id" value="--><?php //= $item['id'] ?><!--">-->
<!--                                    <div class="radio-input">-->
<!--                                        <span>--><?php //= $item['time'] ?><!--</span>-->
<!--                                    </div>-->
<!--                                </label>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    --><?php //endforeach; ?>
<!--                </div>-->

<!--                <details>-->
<!--                    <summary>Мастер</summary>-->
<!--                    --><?php //function array_group_by($data, $key)
//                    {
//                        $result = [];
//                        foreach ($data as $item) {
//                            $result[$item[$key]][] = $item;
//                        }
//                        return $result;
//                    }
//
//                    $group_key = 'idMasters';
//
//                    $data = array_group_by($timesTable, $group_key);
//
//                    foreach ($data as $key => $list):?>
<!--                        <div class="cardMasters">-->
<!---->
<!--                            <img src="/img/--><?//= $list[0]['imgMasters'] ?><!--" alt="img">-->
<!---->
<!--                            <span>--><?//= $list[0]['nameMasters'] ?><!--</span>-->
<!---->
<!--                            --><?php //foreach ($list as $line): ?>
<!---->
<!--                                --><?php //if (date("m.d.y", strtotime($line['date'])) >= date('m.d.y')): ?>
<!---->
<!--                                    <div style="display: none">-->
<!--                                        <label for="email"></label>-->
<!--                                        <input type="text" name="email" id="email" value="--><?//= $line['email'] ?><!--">-->
<!--                                    </div>-->
<!---->
<!--                                    <details style="width: 95%;">-->
<!--                                        <summary>--><?//= date("d.m.Y", strtotime($line['date'])); ?><!--</summary>-->
<!--                                        <div class="radio-form">-->
<!--                                                                                        --><?php ////$recording = $dataRecord->getRecordingDate($line['id'], $line['date'], $key);
//                                            //                                            if (!$recording):?>
<!--                                            <div class="radio-form">-->
<!---->
<!--                                                <div style="display: ">-->
<!--                                                    <label for="master_id"></label>-->
<!--                                                    <input type="text" name="master_id" id="master_id" value="--><?//= $line['master_id'] ?><!--">-->
<!--                                                </div>-->
<!---->
<!--                                                <label class="radio-control">-->
<!--                                                    <input type="radio" name="time_tables_id" id="time_tables_id"-->
<!--                                                           value="--><?//= $line['id'] ?><!--">-->
<!--                                                    <div class="radio-input">-->
<!--                                                        <span>--><?//= substr($line['time'], 0, -3) ?><!--</span>-->
<!--                                                    </div>-->
<!--                                                </label>-->
<!--                                            </div>-->
<!--                                            <!                                         --><?php ////endif; ?>
<!--                                        </div>-->
<!--                                    </details>-->
<!--                                --><?php //endif; ?>
<!--                            --><?php //endforeach; ?>
<!--                        </div>-->
<!--                    --><?php //endforeach; ?>
<!--                </details>-->


                <details>
                    <summary>Услуга</summary>
                    <?php $group = array();
                    foreach ($haircuts as $haircut) {
                        $group[$haircut->titleService][] = $haircut;
                    }
                    ksort($group);
                    foreach ($group as $key1 => $haircut1) {
                        ksort($haircut1);
                        echo '<div class="key1">', $key1, '</div>';
                        foreach ($haircut1 as $key2) {
                            echo '<div style="margin-right: 55px" class="radio-form">';
                            echo '<label class="radio-control">';
                            echo '<input type="radio" name="id_hair" id="id_hair" value="' . $key2->id . '">';
                            echo '<div style="width: 100%;" class="radio-input">';
                            echo '<span style="margin: 0">' . $key2->title . '</span><span style="margin: 0">' . $key2->price . ' &#8381;</span>';
                            echo '</div>';
                            echo '</label>';
                            echo '</div>';
                        }
                    }
                    ?>
                </details>


                <div>
                    <input style="display: none" type="checkbox" id="next" onclick="hideshow();">
                    <label class="btn5 btn-one" for="next"><span>Продолжить</span></label>
                </div>

            </div>


            <div id="other" style="display: none">

                <div>
                    <input style="display: none" type="checkbox" id="back" onclick="showhide();">
                    <label class="btn5 btn-one" for="back">Назад</label>
                </div>

                <div>
                    <label style="display: none" for="name">Имя</label><br>
                    <input class="nameRec" type="text" placeholder="Имя" name="name" id="name" required>
                </div>

                <div>
                    <label style="display: none" for="telephone">Телефон</label><br>
                    <input class="telRec" type="tel" placeholder="Телефон" name="telephone" id="telephone" required>
                </div>

                <br>
                <div id="rule-container">
                    <input type="checkbox" required="" id="checkbox-2-1" class="checkbox"/>
                    <label for="checkbox-2-1">
                        <span id="rule">Я согласен(а) на обработку моих персональных данных</span>
                    </label>
                    <br><br>
                    <button class="btn5 btn-one"
                            style=" border: none; outline: none; background: none; color: #f4f4f4; font-size: 20px"
                            type="submit" id="btn" name="submit"
                            disabled="">Записаться
                    </button>
                </div>
            </div>
        </form>

    </div>

    <!---------------------------------------------------------------------------->

    <script>

        // $('#id_time').on('click', function () {
        //     let master = $(this).attr('data-master');
        //     let date = $(this).attr('data-date');
        //     $('#id_master').val(master);
        //     $('#date_reg').val(date);
        // });

        function hideshow() {
            document.getElementById("rec").style = "display:none";
            document.getElementById("other").style = "display:block";
        }

        function showhide() {
            document.getElementById("rec").style = "display:block";
            document.getElementById("other").style = "display:none";
        }


        $('#checkbox-2-1').on('change', function () {
            if ($(this).is(':checked')) $('#btn').attr('disabled', false);
            else $('#btn').attr('disabled', true);
        });

        var details = document.querySelectorAll("details");
        for (i = 0; i < details.length; i++) {
            details[i].addEventListener("toggle", accordion);
        }

        function accordion(event) {
            if (!event.target.open) return;
            var details = event.target.parentNode.children;
            for (i = 0; i < details.length; i++) {
                if (details[i].tagName != "DETAILS" || !details[i].hasAttribute('open') || event.target == details[i]) continue;
                details[i].removeAttribute("open");
            }
        }

    </script>