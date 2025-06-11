<style>
.clock{
    color: #ffffff;
    display: inline-block;
}
</style>
<script>
function kalender() {
    var today = new Date();
    var hari=today.getDate();
    var bulan=today.getMonth();
    var tahun=today.getFullYear();
    var nama_hari = ['Ahad','Isnin','Selasa','Rabu','Khamis','Jumaat','Sabtu'];
    var nama_bulan = ['Januari','Februari','Mac','April','Mei','Jun','Julai','Ogos','September','Oktober','November','Disember'];
    var jam = today.getHours();
    var minit = today.getMinutes();
    var saat = today.getSeconds();
    var session = "AM"

    if(jam == 0){
        h = 12;
    }
    if(jam > 12){
        jam = jam - 12;
        session = "PM"
    }

    jam = (jam < 10) ? '0' + jam : jam;
    
    minit = checkTime(minit);
    saat = checkTime(saat);
    document.getElementById('txt').innerHTML =
    nama_hari[today.getDay()]+ ' | ' + hari + ' ' + nama_bulan[bulan] + ' ' + tahun + ' | ' + jam + ':' + minit + ':' + saat + ' ' + session;
    var t = setTimeout(kalender, 500);
}
function checkTime(i) {
    if (i < 10) {i = '0' + i};  
    return i;
}
</script>

<body onload='kalender()'>

<div id='txt' class='clock'></div>
