window.liveSiteAsyncInit = function () {
    LiveSite.init({
        id: 'WI-CONTA2AZX7INYK4L6A9J'
    });
};
(function (d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0],
        p = 'https://',
        r = Math.floor(new Date().getTime() / 1000000);
    if (d.getElementById(id)) { return; }
    js = d.createElement(s); js.id = id;
    js.src = p + "widgets.vcdnita.com/assets/livesite.js?" + r;
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'livesite-jssdk'));
