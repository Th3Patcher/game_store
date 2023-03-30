$('document').ready(function() {
    $('.nav-item a').each(function() {
        if ('http://'+document.location.host+'/'+$(this).attr('href') == window.location.href || 'https://'+document.location.host+'/'+$(this).attr('href') == window.location.href)
        {
            $(this).addClass('active');
        }
    });
});