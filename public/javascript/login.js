btn1 = document.getElementById('dn');
btn2 = document.getElementById('dk');
// btn3 = document.getElementById('dn2');
// btn4 = document.getElementById('dk2');
form1 = document.getElementById('f1');
form2 = document.getElementById('f2');
btn1.addEventListener('click', function () {
    form1.style.display = 'block';
    form2.style.display = 'none';
})
btn2.addEventListener('click', function () {
    form1.style.display = 'none';
    form2.style.display = 'block';
})
