$('#toast').toast('hide');

var expanded = false;
function expand() {
    if (expanded) {
        var info = document.querySelector(".info-collapsed");
        info.classList.remove('info-expanded');
        var span = document.querySelector(".span-1");
        span.innerHTML = "Internal Css";
        expanded = false;
        return
    }
    expandedTO();
}

function expandedTO() {
    var info = document.querySelector(".info-collapsed");
    var span = document.querySelector(".span-1");
    info.classList.add('info-expanded');
    setTimeout(() => {
        span.innerHTML = "An Internal style may be used to apply a unique style for a single element.";
    }, 800);
    this.expanded = true;
}

// Changes
// function expandedTO() {
//     var info = document.getElementByClassName(".info-collapsed");
//     var span = document.getElementByClassName(".span-1");
//     info.classList.add('info-expanded');
//     setTimeout(() => {
//         span.innerHTML = "An Internal style may be used to apply a unique style for a single element.";
//     }, 800);
//     this.expanded = true;
// }
