<footer class="main-footer">
    <div class="container">
        <div class="main-footer__wrap">
            <div class="main-footer-item">
                <button id="modal-btn" class="btn btn--transition btn--dark" type="button">{{ $keys['msg']->translate($locale)->name }}</button>
            </div>
            <div class="main-footer-item">
                <div class="contacts">
                    <div class="contacts__item">
                        <div class="contact">
                            <b class="contact__title">Skype:</b>
                            <span class="contact__text">craftdevelop</span>
                        </div>
                    </div>
                    <div class="contacts__item">
                        <div class="contact">
                            <b class="contact__title">Viber/WhatsApp:</b>
                            <span class="contact__text">+38 (067) 970-93-43</span>
                        </div>
                    </div>
                    <div class="contacts__item">
                        <div class="contact">
                            <b class="contact__title">E-mail:</b>
                            <span class="contact__text">info.craftdevelop@gmail.com</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main-footer-item main-footer-item--first">
                <div class="copy">
                    <span class="text-yellow">Craft Development</span> All rights reserved.
                    <a href="{{ url('policy') }}" class="copy__link">Privacy policy</a>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button id="btn-close" type="button" class="btn btn--close"></button>
            <form method="POST" action="{{ url('message') }}">
                @csrf
                <div class="modal-header">
                    <b class="modal-header__title">{{ $keys['form_caption']->translate($locale)->name }}</b>
                    <span class="modal-header__text">{{ $keys['form_subtitle']->translate($locale)->name }}</span>
                </div>
                <div class="modal-body">
                    <div class="modal-form">
                        <div class="modal-form__item">
                            <div class="input-wrap">
                                <input class="form-input" name="name" autocomplete='name' placeholder="{{ $keys['form_name']->translate($locale)->name }}" type="text"  required/></div>
                        </div>
                        <div class="modal-form__item">
                            <div class="input-wrap">
                                <input class="form-input not-valid" name="email" autocomplete='email' placeholder="{{ $keys['form_edit_mail']->translate($locale)->name }}"
                                       type="email" required/>
                                {{--<div class="invalid-feedback">Error: Your email address is invalid</div>--}}
                            </div>
                        </div>
                        <div class="modal-form__item">
                            <div class="input-wrap">
                                <textarea class="form-input" name="message" placeholder="{{ $keys['form_edit_message']->translate($locale)->name }}" id="" required></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn--block btn--transition btn--light">{{ $keys['form_button']->translate($locale)->name }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
