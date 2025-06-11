<style>
.navigation{
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 60vh;
    overflow: hidden;
    box-sizing: border-box;
    background: #81ecec;
}
.navigation ul{
    position: relative;
    z-index: 1;
}
.navigation ul li{
    text-align: center;
    list-style: none;
    height: 100%;
}
.navigation ul li a{
    color: #000;
    text-decoration: none;
    font-size: 3em;
    padding: 5px 20px;
    display: inline-flex;
    font-weight: 600;
    transition: 0.5s;
}
.navigation ul:hover li a{
    color: #000200;
}
.navigation ul li:hover a{
    color: #000000;
    background: #fff;
}
.navigation ul li a:before{
    content: '';
    position: absolute;
    top: 50%;
    left: 40%;
    transform: translate(-50%,-50%);
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 3.1em;
    color: rgba(0,0,0,.1);
    border-radius: 50%;
    z-index: -1;
    opacity: 0;
    font-weight: 900;
    text-transform: uppercase;
    letter-spacing: 500px;
    transition: letter-spacing 0.5s,left 0.5s;
}
.navigation ul li a:hover:before{
    content: attr(data-text);
    opacity: 1;
    left: 50%;
    letter-spacing: 2px;
    width: 1800px;
    height: 1800px;
}
.navigation ul li:nth-child(6n+1) a:before{
    background: #ff7675;
    font-size: 2.75em;
}
.navigation ul li:nth-child(6n+2) a:before{
    background: #55efc4;
    font-size: 2.9em;
}
.navigation ul li:nth-child(6n+3) a:before{
    background: #a29bfe;
}
.navigation ul li:nth-child(6n+4) a:before{
    background: #ffeaa7;
}
</style>

<?PHP include('header.php');?>
            <ul>
                <li><a href="daftarpelanggan.php" data-text="Daftar">Daftar</a></li>
                <li><a href="index.php" data-text="LogMasuk">Log Masuk</a></li>
                <li><a href="bilik.php" data-text="Bilik">Bilik</a></li>
                <li><a href="selamatdatang.php" data-text="Kembali">Kembali</a></li>
            </ul>
<?PHP include('footer.php');?>
