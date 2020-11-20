var selectServices = [];

var services = [{
        title: "Computer Diagnostics",
        price: 123,
    }, {
        title: "Lube/oil/filter change",
        price: 543,
    }

    // "Lube/oil/filter change", "Radiator Flush & Fill Service", "Transmission Fluid Service", "A/C Recharge & Diagnostic Service", "Timing Belt Replacement", "Tire rotation and balance only", "Battery replacement", "Anti-Lock system diagnosis", "Axle Work Bearings/Seals", "Shock and Strut Replacement", "Starters/Alternators/Heater cores", "Suspension system service", "Alignments", "Anti-Lock system diagnosis", "Fleet service/maintenance", "Imports & Japanese vehicles", "Antique/classic car repair"

];

function calculateTotal() {
    var total = 0;
    for (i = 0; i < selectServices.length; i++) {
        total = total + selectServices[i].price;
    }
    return total;
}

function onDeleteBtn(item) {
    for (i = 0; i < selectServices.length; i++) {
        if (item === selectServices[i].title) {
            selectServices.splice(i, 1);
        }
    }

    $('#servicesList').empty();
    for (i = 0; i < selectServices.length; i++) {
        var title = selectServices[i].title;
        var price = selectServices[i].price;
        $('#servicesList').append("<div class=\'d-flex justify-content-between\'>" + title + "<strong>£" + price + "</strong><div class='btn btn-primary' onclick=\"onDeleteBtn('" + title + "')\">X</div></div><br>");
    }
    $('#total').html(calculateTotal());
}

function autocomplete(inp, arr) {
    /*the autocomplete function takes two arguments,
    the text field element and an array of possible autocompleted values:*/
    var currentFocus;
    /*execute a function when someone writes in the text field:*/
    inp.addEventListener("input", function(e) {
        var a, b, i, val = this.value;
        /*close any already open lists of autocompleted values*/
        closeAllLists();
        if (!val) { return false; }
        currentFocus = -1;
        /*create a DIV element that will contain the items (values):*/
        a = document.createElement("DIV");
        a.setAttribute("id", this.id + "autocomplete-list");
        a.setAttribute("class", "autocomplete-items");
        /*append the DIV element as a child of the autocomplete container:*/
        this.parentNode.appendChild(a);
        /*for each item in the array...*/
        for (i = 0; i < arr.length; i++) {

            var title = arr[i].title;
            var price = arr[i].price;
            if (val !== '' && title.substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                b = document.createElement("DIV");

                b.innerHTML = "<strong>" + title.substr(0, val.length) + "</strong>";
                b.innerHTML += title.substr(val.length);

                b.innerHTML += "<input type='hidden' value='" + i + "'>";

                b.addEventListener("click", function(e) {
                    var index = this.getElementsByTagName("input")[0].value;
                    selectServices.push(services[index]);
                    $('#servicesList').append("<div class=\'d-flex justify-content-between\'>" + services[index].title + "<strong>£" + services[index].price + "</strong><div class='btn btn-primary' onclick=\"onDeleteBtn('" + title + "')\">X</div></div><br>");

                    $('#total').html(calculateTotal());
                    inp.value = '';
                    closeAllLists();
                });
                a.appendChild(b);
            }
        }
    });
    /*execute a function presses a key on the keyboard:*/
    inp.addEventListener("keydown", function(e) {
        var x = document.getElementById(this.id + "autocomplete-list");
        if (x) x = x.getElementsByTagName("div");
        if (e.keyCode == 40) {
            /*If the arrow DOWN key is pressed,
            increase the currentFocus variable:*/
            currentFocus++;
            /*and and make the current item more visible:*/
            addActive(x);
        } else if (e.keyCode == 38) { //up
            /*If the arrow UP key is pressed,
            decrease the currentFocus variable:*/
            currentFocus--;
            /*and and make the current item more visible:*/
            addActive(x);
        } else if (e.keyCode == 13) {
            /*If the ENTER key is pressed, prevent the form from being submitted,*/
            e.preventDefault();
            if (currentFocus > -1) {
                /*and simulate a click on the "active" item:*/
                if (x) x[currentFocus].click();
            }
        }
    });

    function addActive(x) {
        /*a function to classify an item as "active":*/
        if (!x) return false;
        /*start by removing the "active" class on all items:*/
        removeActive(x);
        if (currentFocus >= x.length) currentFocus = 0;
        if (currentFocus < 0) currentFocus = (x.length - 1);
        /*add class "autocomplete-active":*/
        x[currentFocus].classList.add("autocomplete-active");
    }

    function removeActive(x) {
        /*a function to remove the "active" class from all autocomplete items:*/
        for (var i = 0; i < x.length; i++) {
            x[i].classList.remove("autocomplete-active");
        }
    }

    function closeAllLists(elmnt) {
        /*close all autocomplete lists in the document,
        except the one passed as an argument:*/
        var x = document.getElementsByClassName("autocomplete-items");
        for (var i = 0; i < x.length; i++) {
            if (elmnt != x[i] && elmnt != inp) {
                x[i].parentNode.removeChild(x[i]);
            }
        }
    }
    /*execute a function when someone clicks in the document:*/
    document.addEventListener("click", function(e) {
        closeAllLists(e.target);
    });
}

$(document).ready(function() {
    autocomplete(document.getElementById("inputSearchBar"), services);
});