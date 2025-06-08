//in faculty add test
function ftadd(){
  window.location="./addTest.php";
}
//in faculty add question
function fqadd(){
  window.location = "./addQuestion.php";
}


//in faculty test view of login faculty
function ftview(a){
  window.location.href="./fView.php"+'?display='+a;
}
//in faculty test view of other faculty than login
function nftview(a){
  window.location.href="./fView.php"+'?view='+a;
}
//in faculty question view from question list
function fqview(a){
  window.location.href="./fView.php"+'?question='+a;
}
//in admin and superadmin faculty profile view
function afview(a){
  window.location.href="./profileView.php"+'?afview='+a;
}
function sfview(a){
  window.location.href="./profileView.php"+'?sfview='+a;
}
//student and admin profile view in superadmin
function sview(a){
  window.location.href="./profileView.php"+'?sview='+a;
}
function aview(a){
  window.location.href="./profileView.php"+'?aview='+a;
}
//in admin and superadmin question list on click of perticular test
function aqview(a){
  window.location.href="./aView.php"+'?aQusList='+a;
}
function sqview(a){
  window.location.href="./aView.php"+'?sQusList='+a;
}
//in admin and superadmin question view on click of perticular question
function aques(a){
  window.location.href="./aView.php"+'?aques='+a;
}
function sques(a){
  window.location.href="./aView.php"+'?sques='+a;
}
//in admin and superadmin question listof perticular faculty
function aSpecial(a){
  window.location.href="./aView.php"+'?list=aftest&aSpecial='+a;
}
function sSpecial(a){
  window.location.href="./aView.php"+'?list=sftest&sSpecial='+a;
}
//in admin and superadmin navigate to question list on click of "view in list" option
function aftolist(){
  window.location.href="./aView.php"+'?list=atest';
}
function sftolist(){
  window.location.href="./aView.php"+'?list=stest';
}


//in faculty test edit
function ftedit(a){
  window.location.href="./testEdit.php"+'?test='+a;
}
//in faculty question edit
function fqedit(a){
  window.location.href="./testEdit.php"+'?question='+a;
}
//in admin and superadmin test edit
function atedit(a){
  window.location.href="./testEdit.php"+'?atedit='+a;
}
function stedit(a){
  window.location.href="./testEdit.php"+'?stedit='+a;
}
//in admin and superadmin question edit
function aqedit(a){
  window.location.href="./testEdit.php"+'?aqedit='+a;
}
function sqedit(a){
  window.location.href="./testEdit.php"+'?sqedit='+a;
}
//in superadmin faculty, student, admin edit
function sfedit(a){
  window.location.href="./profileEdit.php"+'?sfedit='+a;
}
function ssedit(a){
  window.location.href="./profileEdit.php"+'?ssedit='+a;
}
function saedit(a){
  window.location.href="./profileEdit.php"+'?saedit='+a;
}
//in admin edit profile
function apedit(a){
  window.location.href="./profileEdit.php"+'?apedit='+a;
}
//in student edit profile
function spedit(a){
  window.location.href="./profileEdit.php"+'?spedit='+a;
}
//in faculty edit profile
function fpedit(a){
  window.location.href="./profileEdit.php"+'?fpedit='+a;
}


//in faculty test delete
function ftdel(a){
  window.location.href="./delete.php"+'?test='+a;
}
//in faculty question delete
function fqdel(a){
  window.location.href="./delete.php"+'?question='+a;
}
//in admin and superadmin test delete
function atdel(a){
  window.location.href="./delete.php"+'?atdel='+a;
}
function stdel(a){
  window.location.href="./delete.php"+'?stdel='+a;
}
//in admin and superadmin question delete
function aqdel(a){
  window.location.href="./delete.php"+'?aqdel='+a;
}
function sqdel(a){
  window.location.href="./delete.php"+'?sqdel='+a;
}
//in superadmin faculty, student, admin
function sfdel(a){
  window.location.href="./delete.php"+'?sfdel='+a;
}
function ssdel(a){
  window.location.href="./delete.php"+'?ssdel='+a;
}
function sadel(a){
  window.location.href="./delete.php"+'?sadel='+a;
}


//admin request for login is accept and delete in superadmin
function dareq(a){
  window.location.href="./m-accept.php"+'?dareq='+a;
}
function careq(a){
  window.location.href="./delete.php"+'?careq='+a;
}


//in admin faculty report option action navigation
function afreport(a){
  window.location.href="./m-accept.php"+'?afreport='+a;
}
//superadmin self msg delete
function smsgdel(a){
  window.location.href="./delete.php"+'?smsgdel='+a;
}
//admin self msg delete
function amsgdel(a){
  window.location.href="./delete.php"+'?amsgdel='+a;
}
//in superadmin admin msg approve and decline
function amsgapprov(a){
  window.location.href="./m-accept.php"+'?amsgyes='+a;
}
function amsgdecline(a){
  window.location.href="./m-accept.php"+'?amsgno='+a;
}
//in admin superadmin's msg approve and decline
function smsgapprov(a){
  window.location.href="./m-accept.php"+'?smsgyes='+a;
}
function smagdecline(a){
  window.location.href="./m-accept.php"+'?smsgno='+a;
}
//from superadmin message to all admin
function amsg(){
  window.location.href="./m-accept.php"+'?amsg=true';
}
//from superadmin message to perticular admin
function samsg(a){
  window.location.href="./m-accept.php"+'?samsg='+a;
}


function logout(){
  if(confirm("Sure you want to Logout??")){
    window.location="./logout.php";
  }
}
function myFunction(y) {
  y.classList.toggle("change");
  var x = document.getElementById("nav");
  if (x.className === "abc") {
  x.className += " responsive";
  } else {
  x.className = "abc";
  }
}