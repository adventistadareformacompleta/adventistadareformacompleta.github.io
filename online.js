
for(i=0; i<=5000; i++) {
  setTimeout(function(i) {
  
sc_online_t(1596547,"Visitante(s) Online","#000000");
function sc_online_t(id, label, fcolor) {
    var info;
    var d = document;
    var ref =  "" + d.referrer;
    var url =  "" + window.location;
    ref = ref.substring(0, 600);
    url = url.substring(0, 300);

    if (encodeURIComponent) {
        info = '&ua=' + encodeURIComponent(navigator.userAgent);
        info = info + '&url=' + encodeURIComponent(url);
        info = info + '&ref=' + encodeURIComponent(ref);
    } else {
        info = '&ua=' + escape(navigator.userAgent);
        info = info + '&url=' + escape(url);
        info = info + '&ref=' + escape(ref);
    }

    info = info + '&sw=' + screen.width;
    info = info + '&sh=' + screen.height;
    info = info + '&rand=' + Math.round(100 * Math.random());
    info = info + '&label=' + label;
    info = info + '&fcolor=' + fcolor;

    var ga = document.createElement('script');
    ga.type = 'text/javascript';
    ga.async = "async";
    ga.src = "//www.supercounters.com/fc.php?id=" + id + "&w=1&v=1" + info;
	var a = document.getElementsByTagName("script")[0];
 
    a.parentNode.insertBefore(ga, a);
 
} },5000 * i,i);
  //1000 ms is 1 sec, here I have give 0.5 seconds as a delay.
}
 
 
function sc_onlinetext(id, out) {
 

   document.getElementById("counters_adventista").innerHTML= out;

  
}



