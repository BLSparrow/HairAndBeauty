<link rel="stylesheet" href="/css/modalWindow.css">
<section class="fon fon_nav">
    <div class="info">
        <div class="info">
            <h3>Hair & beauty</h3><br>
            <p>Подберите стрижку для себя</p><br>
            <div class="btn5 btn-one pushmenu">
                <span>Подобрать стрижку</span>
            </div>
            <p>Учитываем индивидуальные особенности</p>
        </div>
    </div>
    <button type="button" class="scroll_down" id="scroll_down"></button>
    <script type="application/javascript">
        (function () {
            'use strict';

            var btnScrollDown = document.querySelector('#scroll_down');

            function scrollDown() {
                var windowCoords = document.documentElement.clientHeight;
                (function scroll() {
                    if (window.pageYOffset < windowCoords) {
                        window.scrollBy(0, 10);
                        setTimeout(scroll, 0);
                    }
                    if (window.pageYOffset > windowCoords) {
                        window.scrollTo(0, windowCoords);
                    }
                })();
            }

            btnScrollDown.addEventListener('click', scrollDown);
        })();
    </script>
    <?php if (isset($_GET['id'])): ?>
        <script>
            // полифилл CustomEven для IE11
            (function () {
                if (typeof window.CustomEvent === "function") return false;

                function CustomEvent(event, params) {
                    params = params || {bubbles: false, cancelable: false, detail: null};
                    var evt = document.createEvent('CustomEvent');
                    evt.initCustomEvent(event, params.bubbles, params.cancelable, params.detail);
                    return evt;
                }

                window.CustomEvent = CustomEvent;
            })();

            $modal = function (options) {
                var
                    _elemModal,
                    _eventShowModal,
                    _eventHideModal,
                    _hiding = false,
                    _destroyed = false,
                    _animationSpeed = 200;

                function _createModal(options) {
                    var
                        elemModal = document.createElement('div'),
                        modalTemplate = '<div class="modal__backdrop" data-dismiss="modal"><div class="modal__content"><div class="modal__header"><div class="modal__title" data-modal="title">{{title}}</div><span class="modal__btn-close" data-dismiss="modal" title="Закрыть">×</span></div><div class="modal__body" data-modal="content">{{content}}</div>{{footer}}</div></div>',
                        modalFooterTemplate = '<div class="modal__footer">{{buttons}}</div>',
                        modalButtonTemplate = '<button type="button" class="{{button_class}}" data-handler={{button_handler}}>{{button_text}}</button>',
                        modalHTML,
                        modalFooterHTML = '';

                    elemModal.classList.add('modal');
                    modalHTML = modalTemplate.replace('{{title}}', options.title || 'Новое окно');
                    modalHTML = modalHTML.replace('{{content}}', options.content || '');
                    if (options.footerButtons) {
                        for (var i = 0, length = options.footerButtons.length; i < length; i++) {
                            var modalFooterButton = modalButtonTemplate.replace('{{button_class}}', options.footerButtons[i].class);
                            modalFooterButton = modalFooterButton.replace('{{button_handler}}', options.footerButtons[i].handler);
                            modalFooterButton = modalFooterButton.replace('{{button_text}}', options.footerButtons[i].text);
                            modalFooterHTML += modalFooterButton;
                        }
                        modalFooterHTML = modalFooterTemplate.replace('{{buttons}}', modalFooterHTML);
                    }
                    modalHTML = modalHTML.replace('{{footer}}', modalFooterHTML);
                    elemModal.innerHTML = modalHTML;
                    document.body.appendChild(elemModal);
                    return elemModal;
                }

                function _showModal() {
                    if (!_destroyed && !_hiding) {
                        _elemModal.classList.add('modal__show');
                        document.dispatchEvent(_eventShowModal);
                    }
                }

                function _hideModal() {
                    _hiding = true;
                    _elemModal.classList.remove('modal__show');
                    _elemModal.classList.add('modal__hiding');
                    setTimeout(function () {
                        _elemModal.classList.remove('modal__hiding');
                        _hiding = false;
                    }, _animationSpeed);
                    document.dispatchEvent(_eventHideModal);
                }

                function _handlerCloseModal(e) {
                    if (e.target.dataset.dismiss === 'modal') {
                        _hideModal();
                    }
                }

                _elemModal = _createModal(options || {});


                _elemModal.addEventListener('click', _handlerCloseModal);
                _eventShowModal = new CustomEvent('show.modal', {detail: _elemModal});
                _eventHideModal = new CustomEvent('hide.modal', {detail: _elemModal});

                return {
                    show: _showModal,
                    hide: _hideModal,
                    destroy: function () {
                        _elemModal.parentElement.removeChild(_elemModal),
                            _elemModal.removeEventListener('click', _handlerCloseModal),
                            destroyed = true;
                    },
                    setContent: function (html) {
                        _elemModal.querySelector('[data-modal="content"]').innerHTML = html;
                    },
                    setTitle: function (text) {
                        _elemModal.querySelector('[data-modal="title"]').innerHTML = text;
                    }
                }
            };

            (function () {
                // создадим модальное окно 1
                var modal1 = $modal({
                    title: '<?php $record = $dataRecord->getLastRecording(); foreach ($record as $rec): ?><h3>Здравствуйте, <?= $rec->nameCustomers ?>!</h3>',
                    content: ' <p>Ваш мастер: <?= $rec->nameMaster ?></p> <p>Вы записались на <?= date("d.m.Y", strtotime($rec->date)); ?> в <?= substr($rec->time_id, 0, -3); ?></p> <p>Услуга: <?= $rec->title ?></p> <p>К оплате: <?= $rec->price ?>&#8381;</p><br> <p>Для уточнения информации о точном времени вашей записи вы можете позвонить на личный номермастера <?= $rec->tel ?> <br> или по номеру салона +7 (908) 055-21-77</p><br> <?php endforeach; ?>'
                });
                // при клике по кнопке #show-modal-1
                document.addEventListener('DOMContentLoaded', function (e) {

                    // отобразим модальное окно N1
                    modal1.show();

                });
            })();
        </script>
    <?php endif; ?>
</section>