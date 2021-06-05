let el = document.getElementById('keyDown');
if (el){
    el.addEventListener('keydown', function (e) {
        if (e.key == 'Enter') {
            this.submit();
        }
    })
}

