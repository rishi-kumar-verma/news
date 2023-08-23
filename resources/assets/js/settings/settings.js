'use strict';
$(document).ready(function(){
        listen('submit', '#socialMediaForm', function (e) {
            e.preventDefault();

            $('#socialMediaForm').find('input:text:visible:first').focus();
            let facebookUrl = $('#facebookUrl').val();
            let twitterUrl = $('#twitterUrl').val();
            let pinterestUrl = $('#pinterestUrl').val();
            let linkedInUrl = $('#linkedInUrl').val();
            let instagramUrl = $('#instagramUrl').val();
            let vkUrl = $('#vkUrl').val();
            let telegramUrl = $('#telegramUrl').val();
            let youtubeUrl = $('#youtubeUrl').val();

            let facebookExp = new RegExp(
                /^(https?:\/\/)?((m{1}\.)?)?((w{3}\.)?)facebook.[a-z]{2,3}\/?.*/i);
            let twitterExp = new RegExp(
                /^(https?:\/\/)?((m{1}\.)?)?((w{3}\.)?)twitter\.[a-z]{2,3}\/?.*/i);
            let linkedInExp = new RegExp(
                /^(https?:\/\/)?((w{3}\.)?)linkedin\.[a-z]{2,3}\/?.*/i);
            let pinterestExp = new RegExp(
                /^(https?:\/\/)?((w{3}\.)?)pinterest\.[a-z]{2,3}\/?.*/i);
            let instagramExp = new RegExp(
                /^(https?:\/\/)?((w{3}\.)?)instagram\.[a-z]{2,3}\/?.*/i);
            let vkExp = new RegExp(
                /^(https?:\/\/)?((w{3}\.)?)vk\.[a-z]{2,3}\/?.*/i);
            let telegramExp = new RegExp(
                /^(https?:\/\/)?((w{3}\.)?)telegram\.[a-z]{2,3}\/?.*/i);
            let youtubeExp = new RegExp(
                /^(https?:\/\/)?((w{3}\.)?)youtube\.[a-z]{2,3}\/?.*/i);

            urlValidation(facebookUrl, facebookExp);
            urlValidation(twitterUrl, twitterExp);
            urlValidation(pinterestUrl, pinterestExp);
            urlValidation(linkedInUrl, linkedInExp);
            urlValidation(instagramUrl, instagramExp);
            urlValidation(vkUrl, vkExp);
            urlValidation(telegramUrl, telegramExp);
            urlValidation(youtubeUrl, youtubeExp);

            if (!urlValidation(facebookUrl, facebookExp)) {
                displayErrorMessage(Lang.get('messages.setting.invalid_facebook_url'));
                return false;
            }
            if (!urlValidation(twitterUrl, twitterExp)) {
                displayErrorMessage(Lang.get('messages.setting.invalid_twitter_url'));
                return false;
            }
            if (!urlValidation(linkedInUrl, linkedInExp)) {
                displayErrorMessage(Lang.get('messages.setting.invalid_linkedin_url'));
                return false;
            }
            if (!urlValidation(pinterestUrl, pinterestExp)) {
                displayErrorMessage(Lang.get('messages.setting.invalid_pinterest_url'));
                return false;
            }
            if (!urlValidation(instagramUrl, instagramExp)) {
                displayErrorMessage(Lang.get('messages.setting.invalid_instagram_url'));
                return false;
            }
            if (!urlValidation(vkUrl, vkExp)) {
                displayErrorMessage(Lang.get('messages.setting.invalid_vk_url'));
                return false;
            }
            if (!urlValidation(telegramUrl, telegramExp)) {
                displayErrorMessage(Lang.get('messages.setting.invalid_telegram_url'));
                return false;
            }
            if (!urlValidation(youtubeUrl, youtubeExp)) {
                displayErrorMessage(Lang.get('messages.setting.invalid_youtube_url'));
                return false;
            }
            $('#socialMediaForm')[0].submit();

            return true;
        });

        listen('submit', '#cmsForm', function (e) {
            e.preventDefault();

            let terms_string = $('#terms_condition').val()
            terms_string = terms_string.replace(/<[^>]*>?/gm, '');
            terms_string = terms_string.replace(/&nbsp;/gm, '');
            if (isEmpty(terms_string.trim())) {
                displayErrorMessage(Lang.get('messages.setting.required_t&c'));
                return false;
            }

            let support_string = $('#support').val()
            support_string = support_string.replace(/<[^>]*>?/gm, '');
            support_string = support_string.replace(/&nbsp;/gm, '');
            if (isEmpty(support_string.trim())) {
                displayErrorMessage(Lang.get('messages.setting.required_support'));
                return false;
            }

            let privacy_string = $('#privacyPolicy').val()
            privacy_string = privacy_string.replace(/<[^>]*>?/gm, '');
            privacy_string = privacy_string.replace(/&nbsp;/gm, '');
            if (isEmpty(privacy_string.trim())) {
                displayErrorMessage(Lang.get('messages.setting.required_privacy'));
                return false;
            }

            $('#cmsForm')[0].submit();

            return true;
        });

    listen('change', '#show_captcha', function () {
        if (($(this).prop('checked'))) {
            $('.captchaOptions').removeClass('d-none');
        } else {
            $('.captchaOptions').addClass('d-none');
        }
    })


    listen('submit', '#contact-information-form', function () {
        let contact_address = $('#contact_address').val();
        let about_text = $('#about_text').val();
        console.log(contact_address, about_text);
        if (contact_address.length > 500) {
            toastr.error(Lang.get('messages.common.max', {attribute: 'Contact address', max: '500 characters'}));
            return false;
        } else if (about_text.length > 500) {
            toastr.error(Lang.get('messages.common.max', {attribute: 'About text', max: '500 characters'}));
            return false;
        }
        $('#contact-information-form')[0].submit();

    })
});

tinymce.init({
    mode: 'specific_textareas',
    editor_selector: 'text-description',  // change this value according to your HTML
    plugin: 'a_tinymce_plugin',
    a_plugin_option: true,
    a_configuration_option: 400,
    relative_urls: false,
    remove_script_host: false,
    convert_urls: true,
    document_base_url: "{{ config('app.url') }}",
    height: 400,
    content_style: tinymce_textarea_coler,
})
tinymce.init({
    selector: '.text-gallery-description,.text-sort_list-description',
    themes: 'modern',
    height: 200,
    content_style: tinymce_textarea_coler,
})

