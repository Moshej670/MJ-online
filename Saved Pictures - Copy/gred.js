function gred()

{
var nospam = 1; 

var username = prompt(' enter username',' my username');
var password = prompt('enter password ' ,'my password');
while( nospam < 3)
{



if (username.toLowerCase() === 'moshe' && password.toLowerCase() ==='042404'){
window.alert('welcome master moshe');
window.open('beginers website.html');
}

if (username.toLowerCase() === '' && password.toLowerCase() ===''){
window.alert('welcome ');
 window.open('beginers website.html');
}

if (username.toLowerCase() === '' && password.toLowerCase() ===''){
window.alert(' ');
window.open('beginers website.html');
}

else history.go (-1);

break;
}
nospam+=1;
var username = 
prompt('Access Denied - username or password Incorrect, Please Try Again.','username');
var password = 
prompt('username correct please enter password','password');

}
/* 
if (nospam == 3) {
history.go(-1);
} 
*/
