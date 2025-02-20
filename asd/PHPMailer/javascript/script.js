
const container = document.querySelector('.container');
const registerBtn = document.querySelector('.register-btn');
const loginBtn = document.querySelector('.login-btn');
registerBtn.addEventListener('click', () => 
{
container.classList.add('active');
});
loginBtn.addEventListener('click', () => 
    {
    container.classList.remove('active');
    });
    $('#register').submit(function (e) { 
        e.preventDefault();
        
    });
    function atad(){
        const email=document.getElementById("email").value;
        var formattedText = uzi.replace(/\n/g, '<br>'); 
        uzi = formattedText;
        //-----------------------
        var xhttp = new XMLHttpRequest();
            xhttp.open("GET", "level_kuld.php?c="+email, true);
            xhttp.send();
        }