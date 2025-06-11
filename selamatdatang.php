<?PHP include('header.php');?>
<table>
<style>
table{
        width: 910px;
}
marquee{
        color: #030303;
        font-family: 'Fredericka the Great', cursive;
        font-size: 50px;
        margin: 20px;
}
</style>
<marquee behavior="scroll" direction="left">Selamat Datang ke Sistem Pengurusan Tempahan Homestay Demo97 !<marquee>
<tr align='center'>
    <td><img src='images/Hello.gif' width='28%' style='margin-top: -20px; padding: 20px;'></td>
</tr>
<tr align='center'>
    <td>
        <div class="mula-btn">
        <a href="menu.php" class="mula">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            Mula
        </a> 
        </div> 
</td>
</tr>
</table>
<br></br>
<style>
.mula-btn{
        display: flex;
        justify-content: center;
        align-items: center;
}
.mula-btn .mula{
    position: relative;
    display: inline-block;
    padding: 12px 24px;
    color: #030303;
    text-transform: uppercase;
    letter-spacing: 1px;
    text-decoration: none;
    font-size: 20px;
    font-weight: 700;
    overflow: hidden;
    transition: 0.2s;
    background: #f0f5f5;
}
.mula-btn .mula:hover{
    color: #255784;
    background:  #00ffff;
}
.mula-btn .mula span{
    position: absolute;
    display: block;
}
.mula-btn .mula span:nth-child(1){
    top: 0;
    left: 0;
    width: 100%;
    height: 2px;
    background: linear-gradient(to right, transparent, #1779ff, #0c002b);
    animation: animate1 2s linear infinite;
}
@keyframes animate1{
    0%{transform: translateX(-100%)}
    100%{transform: translateX(100%)}
}
.mula-btn .mula span:nth-child(2){
    top: 0;
    right: 0;
    width: 2px;
    height: 100%;
    background: linear-gradient(to bottom, transparent, #1779ff, #0c002b);
    animation: animate2 2s linear infinite;
    animation-delay: 1s;
}
@keyframes animate2{
    0%{transform: translateY(-100%)}
    100%{transform: translateY(100%)}
}
.mula-btn .mula span:nth-child(3){
    bottom: 0;
    left: 0;
    width: 100%;
    height: 2px;
    background: linear-gradient(to left, transparent, #1779ff, #0c002b);
    animation: animate3 2s linear infinite;
}
@keyframes animate3{
    0%{transform: translateX(100%)}
    100%{transform: translateX(-100%)}
}
.mula-btn .mula span:nth-child(4){
    top: 0;
    left: 0;
    width: 2px;
    height: 100%;
    background: linear-gradient(to top, transparent, #1779ff, #0c002b);
    animation: animate4 2s linear infinite;
    animation-delay: 1s;
}
@keyframes animate4{
    0%{transform: translateY(100%)}
    100%{transform: translateY(-100%)}
}
 /* latin-ext */
 @font-face {
    font-family: 'Fredericka the Great';
    font-style: normal;
    font-weight: 400;
    font-display: swap;
    src: local('Fredericka the Great'), local('FrederickatheGreat'), url(https://fonts.gstatic.com/s/frederickathegreat/v10/9Bt33CxNwt7aOctW2xjbCstzwVKsIBVV--StxbcVcg.woff2) format('woff2');
    unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
  }
  /* latin */
  @font-face {
    font-family: 'Fredericka the Great';
    font-style: normal;
    font-weight: 400;
    font-display: swap;
    src: local('Fredericka the Great'), local('FrederickatheGreat'), url(https://fonts.gstatic.com/s/frederickathegreat/v10/9Bt33CxNwt7aOctW2xjbCstzwVKsIBVV--Sjxbc.woff2) format('woff2');
    unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
  }
</style>
<?PHP include('footer.php');?>