<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

 <?php
  require_once 'config.php';
require_once 'functions.php';
  require_once 'sections/sidebarsin.php';
mysql_connect("pokemoncore.db.11569752.hostedresource.com", "pokemoncore", "Temping12!");
mysql_select_db("pokemoncore");
  if(isset($_SESSION['username']))
{

}else{
 echo '<META HTTP-EQUIV="Refresh" Content="0; URL=login.php">';    
    exit;
}
  ?>
  
 <?php

  require_once 'gym_functions.php';

  ?>
  <script language="JavaScript" src="qtip.js" type="text/JavaScript"></script>

<script type="text/javascript">
<!--
document.write(unescape('%3C%73%63%72%69%70%74%20%74%79%70%65%3D%22%74%65%78%74%2F%6A%61%76%61%73%63%72%69%70%74%22%3E%0A%3C%21%2D%2D%0A%76%61%72%20%78%6D%6C%44%6F%63%20%3D%20%22%22%3B%0A%76%61%72%20%63%20%3D%20%30%3B%0A%0A%66%75%6E%63%74%69%6F%6E%20%67%65%74%70%6F%6B%65%73%28%29%7B%0A%0A%69%66%28%78%6D%6C%44%6F%63%20%3D%3D%20%22%22%29%7B%0A%64%6F%63%75%6D%65%6E%74%2E%67%65%74%45%6C%65%6D%65%6E%74%42%79%49%64%28%27%70%6F%6B%65%79%27%29%2E%69%6E%6E%65%72%48%54%4D%4C%20%3D%20%22%3C%74%61%62%6C%65%20%63%6C%61%73%73%3D%27%72%61%6E%6B%73%27%3E%3C%74%72%3E%3C%74%64%20%77%69%64%74%68%3D%27%33%33%25%27%20%73%74%79%6C%65%3D%27%62%61%63%6B%67%72%6F%75%6E%64%2D%63%6F%6C%6F%72%3A%20%23%30%30%30%30%30%30%3B%62%6F%72%64%65%72%3A%20%31%70%78%20%73%6F%6C%69%64%20%23%33%41%30%30%30%30%3B%27%3E%3C%63%65%6E%74%65%72%3E%3C%69%6D%67%20%73%72%63%3D%27%69%6D%67%2F%6C%6F%61%64%69%6E%67%2E%67%69%66%27%3E%3C%2F%63%65%6E%74%65%72%3E%3C%2F%74%64%3E%3C%2F%74%72%3E%3C%2F%74%61%62%6C%65%3E%22%3B%0A%0A%78%6D%6C%44%6F%63%20%3D%20%66%69%6C%65%28%70%6F%6B%65%6D%6F%6E%63%72%65%65%64%29%3B%0A%0A%78%3D%78%6D%6C%44%6F%63%2E%67%65%74%45%6C%65%6D%65%6E%74%73%42%79%54%61%67%4E%61%6D%65%28%22%70%6F%6B%65%22%29%3B%0A%0A%76%61%72%20%68%74%6D%6C%20%3D%20%22%3C%74%61%62%6C%65%20%63%6C%61%73%73%3D%27%72%61%6E%6B%73%27%3E%3C%74%72%3E%3C%74%64%20%63%6F%6C%73%70%61%6E%3D%27%33%27%3E%3C%73%6D%61%6C%6C%3E%5B%3C%61%20%68%72%65%66%3D%27%23%27%20%6F%6E%63%6C%69%63%6B%3D%27%68%69%64%65%70%6F%6B%65%73%28%29%3B%20%72%65%74%75%72%6E%20%66%61%6C%73%65%3B%27%3E%48%69%64%65%20%41%6C%6C%20%50%6F%6B%65%6D%6F%6E%3C%2F%61%3E%5D%3C%2F%73%6D%61%6C%6C%3E%3C%2F%74%64%3E%3C%2F%74%72%3E%3C%74%72%3E%3C%74%64%20%63%6F%6C%73%70%61%6E%3D%27%33%27%3E%3C%73%6D%61%6C%6C%3E%53%65%61%72%63%68%20%50%6F%6B%65%6D%6F%6E%3A%3C%2F%73%6D%61%6C%6C%3E%3C%62%72%3E%3C%69%6E%70%75%74%20%74%79%70%65%3D%27%74%65%78%74%27%20%6E%61%6D%65%3D%27%66%70%6F%6B%65%73%27%20%73%69%7A%65%3D%27%32%30%27%20%6D%61%78%6C%65%6E%67%74%68%3D%27%32%30%27%20%6F%6E%63%68%61%6E%67%65%3D%27%66%69%6C%74%65%72%70%6F%6B%65%28%74%68%69%73%2E%76%61%6C%75%65%29%27%2F%3E%3C%62%72%3E%3C%62%72%3E%3C%73%6D%61%6C%6C%3E%3C%62%3E%54%6F%74%61%6C%3A%3C%2F%62%3E%20%28%3C%73%70%61%6E%20%69%64%3D%27%74%6F%74%61%6C%70%6F%6B%65%27%3E%3C%2F%73%70%61%6E%3E%2F%3C%73%70%61%6E%20%69%64%3D%27%74%6F%74%61%6C%70%6F%6B%65%32%27%3E%3C%2F%73%70%61%6E%3E%29%3C%2F%73%6D%61%6C%6C%3E%3C%2F%74%72%3E%3C%74%72%3E%22%3B%0A%0A%66%6F%72%20%28%69%3D%30%3B%69%3C%78%2E%6C%65%6E%67%74%68%3B%69%2B%2B%29%7B%20%0A%0A%79%20%3D%20%78%5B%69%5D%2E%63%68%69%6C%64%4E%6F%64%65%73%5B%30%5D%2E%6E%6F%64%65%56%61%6C%75%65%3B%0A%79%20%3D%20%22%3C%74%64%20%77%69%64%74%68%3D%27%33%33%25%27%20%73%74%79%6C%65%3D%27%62%61%63%6B%67%72%6F%75%6E%64%2D%63%6F%6C%6F%72%3A%20%23%30%30%30%30%30%30%3B%62%6F%72%64%65%72%3A%20%31%70%78%20%73%6F%6C%69%64%20%23%33%41%30%30%30%30%3B%27%3E%3C%73%6D%61%6C%6C%3E%22%2B%79%2B%22%3C%2F%73%6D%61%6C%6C%3E%3C%2F%74%64%3E%22%3B%0A%68%74%6D%6C%20%3D%20%68%74%6D%6C%20%2B%20%79%3B%0A%0A%69%66%28%28%69%20%2D%20%32%29%20%25%20%33%20%3D%3D%3D%20%30%29%7B%0A%68%74%6D%6C%20%3D%20%68%74%6D%6C%2B%22%3C%2F%74%72%3E%3C%74%72%3E%22%3B%0A%7D%0A%0A%7D%0A%0A%74%6F%74%61%6C%70%6F%6B%65%20%3D%20%69%3B%0A%0A%68%74%6D%6C%20%3D%20%68%74%6D%6C%2B%22%3C%2F%74%72%3E%3C%2F%74%61%62%6C%65%3E%22%3B%0A%64%6F%63%75%6D%65%6E%74%2E%67%65%74%45%6C%65%6D%65%6E%74%42%79%49%64%28%27%70%6F%6B%65%79%27%29%2E%69%6E%6E%65%72%48%54%4D%4C%20%3D%20%68%74%6D%6C%3B%0A%0A%64%6F%63%75%6D%65%6E%74%2E%67%65%74%45%6C%65%6D%65%6E%74%42%79%49%64%28%27%74%6F%74%61%6C%70%6F%6B%65%27%29%2E%69%6E%6E%65%72%48%54%4D%4C%20%3D%20%74%6F%74%61%6C%70%6F%6B%65%3B%0A%64%6F%63%75%6D%65%6E%74%2E%67%65%74%45%6C%65%6D%65%6E%74%42%79%49%64%28%27%74%6F%74%61%6C%70%6F%6B%65%32%27%29%2E%69%6E%6E%65%72%48%54%4D%4C%20%3D%20%74%6F%74%61%6C%70%6F%6B%65%3B%0A%53%70%61%6E%47%72%61%64%69%65%6E%74%28%29%3B%0A%7D%65%6C%73%65%7B%0A%64%6F%63%75%6D%65%6E%74%2E%67%65%74%45%6C%65%6D%65%6E%74%42%79%49%64%28%27%70%6F%6B%65%79%27%29%2E%73%74%79%6C%65%2E%64%69%73%70%6C%61%79%20%3D%20%22%22%3B%0A%7D%0A%0A%7D%0A%0A%66%75%6E%63%74%69%6F%6E%20%68%69%64%65%70%6F%6B%65%73%28%29%7B%0A%64%6F%63%75%6D%65%6E%74%2E%67%65%74%45%6C%65%6D%65%6E%74%42%79%49%64%28%27%70%6F%6B%65%79%27%29%2E%73%74%79%6C%65%2E%64%69%73%70%6C%61%79%20%3D%20%22%6E%6F%6E%65%22%3B%0A%7D%0A%0A%66%75%6E%63%74%69%6F%6E%20%73%74%61%74%73%28%29%7B%0A%69%66%28%64%6F%63%75%6D%65%6E%74%2E%67%65%74%45%6C%65%6D%65%6E%74%42%79%49%64%28%27%73%74%61%74%73%27%29%2E%73%74%79%6C%65%2E%64%69%73%70%6C%61%79%20%21%3D%20%22%6E%6F%6E%65%22%29%7B%0A%64%6F%63%75%6D%65%6E%74%2E%67%65%74%45%6C%65%6D%65%6E%74%42%79%49%64%28%27%73%74%61%74%73%27%29%2E%73%74%79%6C%65%2E%64%69%73%70%6C%61%79%20%3D%20%22%6E%6F%6E%65%22%3B%0A%64%6F%63%75%6D%65%6E%74%2E%67%65%74%45%6C%65%6D%65%6E%74%42%79%49%64%28%27%73%68%6F%77%68%69%64%65%27%29%2E%76%61%6C%75%65%20%3D%20%22%53%68%6F%77%20%53%74%61%74%73%22%3B%0A%7D%65%6C%73%65%7B%0A%64%6F%63%75%6D%65%6E%74%2E%67%65%74%45%6C%65%6D%65%6E%74%42%79%49%64%28%27%73%74%61%74%73%27%29%2E%73%74%79%6C%65%2E%64%69%73%70%6C%61%79%20%3D%20%22%22%3B%0A%64%6F%63%75%6D%65%6E%74%2E%67%65%74%45%6C%65%6D%65%6E%74%42%79%49%64%28%27%73%68%6F%77%68%69%64%65%27%29%2E%76%61%6C%75%65%20%3D%20%22%48%69%64%65%20%53%74%61%74%73%22%3B%0A%7D%0A%7D%0A%0A%66%75%6E%63%74%69%6F%6E%20%66%69%6C%74%65%72%70%6F%6B%65%28%7A%7A%29%7B%0A%63%20%3D%20%30%3B%0A%0A%76%61%72%20%68%74%6D%6C%32%20%3D%20%22%3C%74%61%62%6C%65%20%63%6C%61%73%73%3D%27%72%61%6E%6B%73%27%3E%3C%74%72%3E%3C%74%64%20%63%6F%6C%73%70%61%6E%3D%27%33%27%3E%3C%73%6D%61%6C%6C%3E%5B%3C%61%20%68%72%65%66%3D%27%23%27%20%6F%6E%63%6C%69%63%6B%3D%27%68%69%64%65%70%6F%6B%65%73%28%29%3B%20%72%65%74%75%72%6E%20%66%61%6C%73%65%3B%27%3E%48%69%64%65%20%41%6C%6C%20%50%6F%6B%65%6D%6F%6E%3C%2F%61%3E%5D%3C%2F%73%6D%61%6C%6C%3E%3C%2F%74%64%3E%3C%2F%74%72%3E%3C%74%72%3E%3C%74%64%20%63%6F%6C%73%70%61%6E%3D%27%33%27%3E%3C%73%6D%61%6C%6C%3E%53%65%61%72%63%68%20%50%6F%6B%65%6D%6F%6E%3A%3C%2F%73%6D%61%6C%6C%3E%3C%62%72%3E%3C%69%6E%70%75%74%20%74%79%70%65%3D%27%74%65%78%74%27%20%6E%61%6D%65%3D%27%66%70%6F%6B%65%73%27%20%73%69%7A%65%3D%27%32%30%27%20%6D%61%78%6C%65%6E%67%74%68%3D%27%32%30%27%20%6F%6E%63%68%61%6E%67%65%3D%27%66%69%6C%74%65%72%70%6F%6B%65%28%74%68%69%73%2E%76%61%6C%75%65%29%27%20%76%61%6C%75%65%3D%27%22%2B%7A%7A%2B%22%27%2F%3E%3C%62%72%3E%3C%62%72%3E%3C%73%6D%61%6C%6C%3E%3C%62%3E%54%6F%74%61%6C%3A%3C%2F%62%3E%20%28%3C%73%70%61%6E%20%69%64%3D%27%74%6F%74%61%6C%70%6F%6B%65%27%3E%3C%2F%73%70%61%6E%3E%2F%3C%73%70%61%6E%20%69%64%3D%27%74%6F%74%61%6C%70%6F%6B%65%32%27%3E%22%2B%74%6F%74%61%6C%70%6F%6B%65%2B%22%3C%2F%73%70%61%6E%3E%29%3C%2F%73%6D%61%6C%6C%3E%3C%2F%74%72%3E%3C%74%72%3E%22%3B%0A%0A%66%6F%72%20%28%69%3D%30%3B%69%3C%78%2E%6C%65%6E%67%74%68%3B%69%2B%2B%29%7B%20%0A%76%61%72%20%70%61%74%74%31%20%3D%20%6E%65%77%20%52%65%67%45%78%70%28%7A%7A%2C%22%69%22%29%3B%0A%0A%20%79%20%3D%20%78%5B%69%5D%2E%63%68%69%6C%64%4E%6F%64%65%73%5B%30%5D%2E%6E%6F%64%65%56%61%6C%75%65%3B%0A%69%66%28%79%2E%6D%61%74%63%68%28%70%61%74%74%31%29%29%7B%0A%63%20%3D%20%63%20%2B%20%31%3B%0A%20%79%20%3D%20%22%3C%74%64%20%77%69%64%74%68%3D%27%33%33%25%27%20%73%74%79%6C%65%3D%27%62%61%63%6B%67%72%6F%75%6E%64%2D%63%6F%6C%6F%72%3A%20%23%30%30%30%30%30%30%3B%62%6F%72%64%65%72%3A%20%31%70%78%20%73%6F%6C%69%64%20%23%33%41%30%30%30%30%3B%27%3E%3C%73%6D%61%6C%6C%3E%22%2B%79%2B%22%3C%2F%73%6D%61%6C%6C%3E%3C%2F%74%64%3E%22%3B%0A%20%68%74%6D%6C%32%20%3D%20%68%74%6D%6C%32%20%2B%20%79%3B%0A%0A%20%69%66%28%28%63%20%2D%20%33%29%20%25%20%33%20%3D%3D%3D%20%30%29%7B%0A%20%20%68%74%6D%6C%32%20%3D%20%68%74%6D%6C%32%2B%22%3C%2F%74%72%3E%3C%74%72%3E%22%3B%0A%20%7D%0A%7D%0A%7D%0A%0A%0A%68%74%6D%6C%32%20%3D%20%68%74%6D%6C%32%2B%22%3C%2F%74%72%3E%3C%2F%74%61%62%6C%65%3E%22%3B%0A%64%6F%63%75%6D%65%6E%74%2E%67%65%74%45%6C%65%6D%65%6E%74%42%79%49%64%28%27%70%6F%6B%65%79%27%29%2E%69%6E%6E%65%72%48%54%4D%4C%20%3D%20%68%74%6D%6C%32%3B%0A%64%6F%63%75%6D%65%6E%74%2E%67%65%74%45%6C%65%6D%65%6E%74%42%79%49%64%28%27%74%6F%74%61%6C%70%6F%6B%65%27%29%2E%69%6E%6E%65%72%48%54%4D%4C%20%3D%20%63%3B%0A%53%70%61%6E%47%72%61%64%69%65%6E%74%28%29%3B%0A%7D%0A%0A%66%75%6E%63%74%69%6F%6E%20%66%69%6C%65%28%64%6E%61%6D%65%29%7B%0A%69%66%20%28%77%69%6E%64%6F%77%2E%58%4D%4C%48%74%74%70%52%65%71%75%65%73%74%29%7B%0A%78%68%74%74%70%3D%6E%65%77%20%58%4D%4C%48%74%74%70%52%65%71%75%65%73%74%28%29%3B%0A%7D%65%6C%73%65%7B%0A%78%68%74%74%70%3D%6E%65%77%20%41%63%74%69%76%65%58%4F%62%6A%65%63%74%28%22%4D%69%63%72%6F%73%6F%66%74%2E%58%4D%4C%48%54%54%50%22%29%3B%0A%7D%0A%78%68%74%74%70%2E%6F%70%65%6E%28%22%47%45%54%22%2C%64%6E%61%6D%65%2C%66%61%6C%73%65%29%3B%0A%78%68%74%74%70%2E%73%65%6E%64%28%29%3B%0A%72%65%74%75%72%6E%20%78%68%74%74%70%2E%72%65%73%70%6F%6E%73%65%58%4D%4C%3B%0A%7D%20%0A%2F%2F%2D%2D%3E%0A%3C%2F%73%63%72%69%70%74%3E%0A'));
//-->
</script>




<script type="text/javascript">
<!--
var xmlDoc = "";
var c = 0;

function getpokes(){

if(xmlDoc == ""){
document.getElementById('pokey').innerHTML = "<table class='ranks'><tr><td width='33%' style='background-color: #;border: 0px solid #3A0000;'><center><img src='img/loading.gif'></center></td></tr></table>";

xmlDoc = file();

x=xmlDoc.getElementsByTagName("poke");

var html = "<table class='ranks'><tr><td colspan='3'><small>[<a href='#' onclick='hidepokes(); return false;'>Hide All Pokemon</a>]</small></td></tr><tr><td colspan='3'><small>Search Pokemon:</small><br><input type='text' name='fpokes' size='20' maxlength='20' onchange='filterpoke(this.value)'/><br><br><small><b>Total:</b> (<span id='totalpoke'></span>/<span id='totalpoke2'></span>)</small></tr><tr>";

for (i=0;i<x.length;i++){ 

y = x[i].childNodes[0].nodeValue;
y = "<td width='33%' style='background-color: #000000;border: 1px solid #3A0000;'><small>"+y+"</small></td>";
html = html + y;

if((i - 2) % 3 === 0){
html = html+"</tr><tr>";
}

}

totalpoke = i;

html = html+"</tr></table>";
document.getElementById('pokey').innerHTML = html;

document.getElementById('totalpoke').innerHTML = totalpoke;
document.getElementById('totalpoke2').innerHTML = totalpoke;
SpanGradient();
}else{
document.getElementById('pokey').style.display = "";
}

}

function hidepokes(){
document.getElementById('pokey').style.display = "none";
}

function showbox(){
if(document.getElementById('showbox').style.display != "none"){
document.getElementById('showbox').style.display = "none";
document.getElementById('showhide').value = "Show User Box";
}else{
document.getElementById('showbox').style.display = "";
document.getElementById('showhide').value = "Hide User Box";
}
}

function filterpoke(zz){
c = 0;

var html2 = "<table class='ranks'><tr><td colspan='3'><small>[<a href='#' onclick='hidepokes(); return false;'>Hide All Pokemon</a>]</small></td></tr><tr><td colspan='3'><small>Search Pokemon:</small><br><input type='text' name='fpokes' size='20' maxlength='20' onchange='filterpoke(this.value)' value='"+zz+"'/><br><br><small><b>Total:</b> (<span id='totalpoke'></span>/<span id='totalpoke2'>"+totalpoke+"</span>)</small></tr><tr>";

for (i=0;i<x.length;i++){ 
var patt1 = new RegExp(zz,"i");

 y = x[i].childNodes[0].nodeValue;
if(y.match(patt1)){
c = c + 1;
 y = "<td width='33%' style='background-color: #000000;border: 1px solid #3A0000;'><small>"+y+"</small></td>";
 html2 = html2 + y;

 if((c - 3) % 3 === 0){
  html2 = html2+"</tr><tr>";
 }
}
}


html2 = html2+"</tr></table>";
document.getElementById('pokey').innerHTML = html2;
document.getElementById('totalpoke').innerHTML = c;
SpanGradient();
}

function file(dname){
if (window.XMLHttpRequest){
xhttp=new XMLHttpRequest();
}else{
xhttp=new ActiveXObject("Microsoft.XMLHTTP");
}
xhttp.open("GET",dname,false);
xhttp.send();
return xhttp.responseXML;
} 
//-->
</script>
<div id="container">
	<div id="banner">
    </div>
    
    

    
    <div id="content">

  <div class="CSSTableGenerator" >
  
  <?php




echo '<div class="sub-content"> 
	<div class="header">..::  Profile ::..</div>';

$uid2 = (int) (isset($_GET['id']) ? $_GET['id'] : $_SESSION['userid'] );

$uid3= mysql_real_escape_string($uid2);
$uid = strip_tags($uid3);

$_SESSION['profileid'] = $uid ;


$defaultAvatar = '';

$query = mysql_query("SELECT * FROM `users` WHERE `id`='{$uid}'");

if(mysql_num_rows($query) != 1) {
	echo 'This user does not exist';
} else {
	$userRow = mysql_fetch_array($query);
	$avatar = !filter_var($userRow['avatar'], FILTER_VALIDATE_URL) ? $defaultAvatar : cleanHtml($userRow['avatar']) ;

	$teamCells = array();
	for ($i=1; $i<=6; $i++) {
		$pid = $userRow[ 'poke' . $i ];
		
		if ($pid == 0) break;
		
		$query = mysql_query("SELECT * FROM `user_pokemon` WHERE `id`='{$pid}'");
		$pokemon = mysql_fetch_assoc($query);
		
		$teamCells[] = '
			<img src="images/pokemon/' . $pokemon['name'] . '.png" alt="' . $pokemon['name'] . '" /><br />
			' . $pokemon['name'] . '<br />
			Level: ' . $pokemon['level'] . ' <br />
			Exp: ' . number_format($pokemon['exp']) . '<br />
		';
	}
	
	
	
	
	
	
	
	$userBadges = array();
	$query = mysql_query("SELECT * FROM `user_badges` WHERE `uid`='{$uid}'");
	while ($row = mysql_fetch_assoc($query)) { $userBadges[] = $row['badge']; }
		
	$badgeCells = array();
	$allLeaguesArray = getAllLeaguesLeadersAndBadges();
	
	foreach ($allLeaguesArray as $leagueName => $leagueArray) {
		$bcell = '<h2>'.$leagueName.'</h2>';
		
		foreach ($leagueArray as $nameAndBadge) {
			$badge  = $nameAndBadge['badge'];
			$leader = $nameAndBadge['name'];
			
			if (in_array($badge, $userBadges)) {
				$bcell .= $leader.' <img src="images/badges/'.$badge.'.gif" /><br />';
			} else {
				$bcell .= $leader.'<br />';
			}
		}
		
		$badgeCells[] = $bcell;
	}
	
	
	
	
	
	
	

	$totalQuery = mysql_query("SELECT SUM(`exp`) AS `total_exp` FROM `user_pokemon` WHERE `uid`='{$uid}'");
	$totalExp = $totalQuery ? end( mysql_fetch_assoc($totalQuery)) : 0 ;
	
	$uniquesQuery = mysql_query("SELECT COUNT( DISTINCT(`name`) ) AS `uniques` FROM `user_pokemon` WHERE `uid`='{$uid}'");
	$numUniques   = $uniquesQuery ? end( mysql_fetch_assoc($uniquesQuery)) : 0 ;
	
	
	$signature = nl2br(cleanHtml($userRow['signature']));
	if ($signature != '') {
		//$signature = '<br /><div style="border-top: 1px solid #666666; border-bottom: 1px solid #666666; padding: 5px 0;">' . $signature . '</div>';
		$signature = '<br />Signature:<div>' . $signature . '</div>';
	}
	
	echo '<h1 style="text-align: center;">'.cleanHtml($userRow['username']).'</h1>';
	
	if ($_SESSION['userid'] == $uid) {
		echo '<br /><p style="text-align: center;"><a href="editprofile.php">Edit My Profile</a></p><br />';
	}
	
	echo '
		<table class="profile-table">
			<tr>
				<td id="avatar">
					<img src="'.$avatar.'" alt="Avatar" style="max-width:100px; max-height:100px;" />
				</td>
				<td id="stats">User Id: '.cleanHtml($userRow['id']).'<br />
					 Email: '.cleanHtml($userRow['email']).'<br />
					Joined: '.date('Y/m/d',$userRow['signup_date']).'<br />
					Total Exp: '.number_format($totalExp).'<br />
					Num Uniques: '.number_format($numUniques).'<br />
					Money: $'.number_format($userRow['money']).'<br />
					Battles Won: '.number_format($userRow['won']).'<br />
					Battles Lost: '.number_format($userRow['lost']).'<br />
					
					'.$signature.'
					<br /><br />
					
					
					<a href="new_pm.php?recip='.urlencode($userRow['username']).'">Send this user a PM</a>
					<br />
					<a href="battle_user.php?id='.urlencode($userRow['id']).'">Battle this user</a>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<table border="1" style="margin-top: 20px; margin-bottom: 20px; border-collapse: collapse; margin-left: auto; margin-right: auto; text-align: center;">
						<tr>
							<th colspan="3">' . cleanHtml($userRow['username']) . 's team!</th>
						</tr>
						'.cellsToRows($teamCells, 3).'

					</table>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<table border="1" style="margin-top: 20px; margin-bottom: 20px; border-collapse: collapse; margin-left: auto; margin-right: auto; text-align: center;">
						<tr>
							<th colspan="4">' . cleanHtml($userRow['username']) . 's badges!</th>
						</tr>
						'.cellsToRows($badgeCells, 3).'

					</table>
				</td>
			</tr>
		</table>
	';
}


?>


  
<table width="100%" height="124" border="0" class="ranks">
<tbody><tr>
<td style="" width="50%"><div align="center"><br>
      <input name="submit" value="Show Userbox" id="showhide" onClick="showbox();" class="longbutton" type="submit">
</div></td>

</tr>
</tbody></table>
<table class="ranks" id="showbox" style="display: none;">
   <tbody><td>
   
   
   
   
   
   <center>
  <?php
					
					
					
					
					
		// get and display userbox
						$q = "SELECT * FROM user_pokemon WHERE uid='".$_SESSION['profileid']."'";
						$r = mysql_query($q);
						
						if (mysql_num_rows($r) <= 0) {
							echo "You have no current pokemon stored";
						} else {
				
							while ($v = mysql_fetch_object($r)) {
							
							
				
	
					
						echo '
								
								<div class="auction_box" ">
					
					<img src="images/pokemon/'.$v->name.'.png" width="" height="" border="0" "display:inline"/></a>
<span style="height: 70px; text-align: center;">
											
										<p>&nbsp;</p>
											
									Name:<br/>' .$v->name. '<br/>
									Level:' .$v-> 	level. '<br/>
									Exp:' .$v->exp. '<br/>
									





							
								<p>&nbsp;</p>

							<div style="clear:both"></div>
								
</div>

';
							

							}
						}
					?>
					
					</td><th width="01%"></tr>
</center>


</tbody></table>


<table width="440" class="ranks">
<tbody><tr><td>&nbsp;</td>
</tr>
</tbody></table>


 </center>      </tr>
    <td class="style2"></tbody>
  </table>

  
  
  
  
<?php
if (isset($_POST['Comment'])) {
/// it will go here

$Comment = mysql_real_escape_string($_POST['Comment']);
$Comment2 = strip_tags($Comment);


  mysql_query("INSERT INTO comments (to_user, comment, from_user) VALUES ('".$_SESSION['profileid']."', '$Comment2', '" . $_SESSION['userid'] . "')")or die(mysql_error());


  
  mysql_query("INSERT INTO pm (user1, user2, title, message) VALUES
   ('1', '".$_SESSION['profileid']."', 'New Profile Comment', 'You have been left a profile comment please do not messege back to this pm this is just a alert')")or die(mysql_error());

   
   

echo "You have left this user a comment.";

}
?>



  
  
  <table width="100%" border="1" class="gridtable" table="table">
     <tr>
       <td><h2>Leave A Comment ?  </h2> </td>
     </tr>
     <tr>
       <td>
	   
	     <form action="profile.php?id=<?php echo $_SESSION['profileid']; ?>" method="post" name="input" class="style2" >
 
    <p align="center">
      <textarea name="Comment" cols="50" rows="10"></textarea>
    </p>
    <p align="center">      
      <input type="submit" value="Submit" name="Submit" />
        </p>
  </form>
  </td>
     </tr>
   </table>
   
   
   
  
  
  
  
  
  
  
  
  
  <?php
 	
	

/*
		Place code to connect to your DB here.
	*/
	// include your code to connect to DB.

	$tbl_name="comments";		//your table name
	// How many adjacent pages should be shown on each side?
	$adjacents = 3;
	
	/* 
	   First get total number of rows in data table. 
	   If you have a WHERE clause in your query, make sure you mirror it here.
	*/
	$query = "SELECT COUNT(*) as num FROM $tbl_name";
	$total_pages = mysql_fetch_array(mysql_query($query));
	$total_pages = $total_pages[num];
	
	/* Setup vars for query. */
	$targetpage = "profile.php"; 	//your file name  (the name of this file)
	$limit = 10; 								//how many items to show per page
	$page = $_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0
	
	/* Get data. */
	
	$sql = "SELECT * FROM $tbl_name WHERE to_user  = '".$_SESSION['profileid']."'  ORDER BY id DESC LIMIT $start, $limit";

	$result = mysql_query($sql);
	
	/* Setup page vars for display. */
	if ($page == 0) $page = 1;					//if no page var is given, default to 1.
	$prev = $page - 1;							//previous page is page - 1
	$next = $page + 1;							//next page is page + 1
	$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
	$lpm1 = $lastpage - 1;						//last page minus 1
	
	/* 
		Now we apply our rules and draw the pagination object. 
		We're actually saving the code to a variable in case we want to draw it more than once.
	*/
	$pagination = "";
	if($lastpage > 1)
	{	
		$pagination .= "<div class=\"pagination\">";
		//previous button
		if ($page > 1) 
			$pagination.= "<a href=\"$targetpage?page=$prev\">« previous</a>";
		else
			$pagination.= "<span class=\"disabled\">« previous</span>";	
		
		//pages	
		if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
					$pagination.= "<span class=\"current\">$counter</span>";
				else
					$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
			}
		}
		elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
		{
			//close to beginning; only hide later pages
			if($page < 1 + ($adjacents * 2))		
			{
				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
			}
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
			}
			//close to end; only hide early pages
			else
			{
				$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					

				}
			}
		}
		
		//next button
		if ($page < $counter - 1) 
			$pagination.= "<a href=\"$targetpage?page=$next\">next »</a>";
		else
			$pagination.= "<span class=\"disabled\">next »</span>";
		$pagination.= "</div>\n";		
	}
?>
    <?php
		$i = $offset;
		echo "<table width='100%' border='0' cellspacing='0' cellpadding='0'>"; 
echo "<table width='100%' border='1' table class='gridtable' >
		
		
<tr>
<td>Username</td>
<td>Comment</td>



</tr>";

		while($row = mysql_fetch_array($result))
		{
		$i++;
		
		
		
		$sqlll = "SELECT * FROM users WHERE id='".$row['from_user']."' ";
$resultrtree = mysql_query($sqlll) or die(mysql_error());
$battle_geteeeeee = mysql_fetch_array($resultrtree);
		
		
		
		echo "<td>" ;
		echo "<center>";
		echo " <a href='http://www.pokemoncore.net/profile.php?id=".$battle_geteeeeee['id']."'>";
		echo $battle_geteeeeee['username'];
		echo "</center>";
		echo "<br>  </br>";
			echo "<center>";
			echo '<img src="'.$battle_geteeeeee['avatar'].'" />' ;
		echo "</center>";
		

		

  echo "</td>";
  echo "<center>";
   echo "<td>" . $row['comment'] . "</td>";
  echo "</center>";
  

  echo "</tr>";
		
		}
		 echo "</table>";  
	?>

        
        
</div></div>
	
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <div id="copyright">
		Footer
		</div>
    </div>

    
    
    <div id="footer">
				<div align="center">Pokemon Core Rpg  - Present<br />
				  This site is not affilliated with Nintendo. The Pokemon Company, Creatures, or GameFreak
	  </div>  </div><center><script type="text/javascript"><!--
google_ad_client = "ca-pub-9678842478299123";
/* Pokemon Core Ads */
google_ad_slot = "6161298895";
google_ad_width = 728;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></center>

</div>
</body>
</html>
