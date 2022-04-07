var username = sessionStorage.getItem('name');
if (username) {
    $('#users').removeClass('hiddens');
    $('#users a').html(username);
    $('#logout').removeClass('hiddens');
    $('#loginbutton').addClass('hiddens');
    $('#signbutton').addClass('hiddens');
    $('#rent').removeClass('hiddens');
    $('#become').removeClass('hiddens');
    $('#contact').removeClass('hiddens');
    $('#myrentals').removeClass('hiddens');
} else {
    window.location.href = "./homePage.html"
}

function register() {
    var username = $('#username').val()
    if (!username) {
        alert('Missing parameter')
        return
    }
    var password = $('#password').val()
    if (!password) {
        alert('Missing parameter')
        return
    }
    var fullname = $('#fullname').val()
    if (!fullname) {
        alert('Missing parameter')
        return
    }
    var email = $('#email').val()
    if (!email) {
        alert('Missing parameter')
        return
    }
    var phonenumber = $('#phonenumber').val()
    if (!phonenumber) {
        alert('Missing parameter')
        return
    }

    var xhr = new XMLHttpRequest();

    xhr.open('post', 'api/register.php');
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send('username=' + username + '&password=' + password + '&fullname=' + fullname + '&phonenumber=' + phonenumber + '&email=' + email + '&action=register');
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var res = xhr.responseText;
            res = JSON.parse(res)
            if (res.code == 0) {
                alert(res.msg)
                return false;
            } else {


                $('#signUpForm').removeClass('show');
                $('#signUpForm').css('display', 'none');
                $('.modal-backdrop').removeClass('show')
                $('#signup').addClass('shows');
                var t = setTimeout("removeclass()", 2000);
                $('#loginbutton').addClass('hiddens');
                $('#signbutton').addClass('hiddens');
                $('#users').removeClass('hiddens');
                $('#users a').html(username);
                $('#logout').removeClass('hiddens');
                sessionStorage.setItem('name', username);
                $('.modal-backdrop').css('display', 'none');
                $('#rent').removeClass('hiddens');
                $('#become').removeClass('hiddens');
                $('#contact').removeClass('hiddens');
                $('#myrentals').removeClass('hiddens');
            }
        }
    };
}

function removeclass() {
    $('#signup').removeClass('shows');
    $('#login').removeClass('shows');
}

function login() {
    var username = $('#username1').val()
    if (!username) {
        alert('Missing parameter')
        return
    }
    var password = $('#password1').val()
    if (!password) {
        alert('Missing parameter')
        return
    }

    var xhr = new XMLHttpRequest();

    xhr.open('post', 'api/login.php');
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send('username=' + username + '&password=' + password + '&action=login');
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var res = xhr.responseText;
            res = JSON.parse(res)
            if (res.code == 0) {
                alert(res.msg)
                return false;
            } else {


                $('#loginForm').removeClass('show');
                $('#loginForm').css('display', 'none');
                $('.modal-backdrop').removeClass('show')
                $('#loginbutton').addClass('hiddens');
                $('#signbutton').addClass('hiddens');
                $('#login').addClass('shows');
                $('#users').removeClass('hiddens');
                var t = setTimeout("removeclass()", 2000);
                $('#users a').html(username);
                $('#logout').removeClass('hiddens');
                sessionStorage.setItem('name', username);
                $('.modal-backdrop').css('display', 'none');
                $('#rent').removeClass('hiddens');
                $('#become').removeClass('hiddens');
                $('#contact').removeClass('hiddens');
                $('#myrentals').removeClass('hiddens');
            }
        }
    };
}

function logout() {
    sessionStorage.removeItem('name');
    window.location.reload();
}