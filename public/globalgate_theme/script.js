var successModal = new bootstrap.Modal(document.getElementById('successModal'));

var toastElList = [].slice.call(document.querySelectorAll('.toast'));
var toastList = toastElList.map(function (toastEl) {
    return new bootstrap.Toast(toastEl);
});


$('#packageModal').on('show.bs.modal', function (event) {
    var myVal = $(event.relatedTarget).data('package-name');
    $('#package_name').val(myVal);
});

function getIp(callback) {
    fetch('https://ipinfo.io/json?token=54f93cacb88eae', { headers: { 'Accept': 'application/json' }})
        .then((resp) => resp.json())
        .catch(() => {
            return {
                country: 'tr',
            };
        })
        .then((resp) => callback(resp.country));
}

$( document ).ready(function() {
    var country = 'tr'
    $.ajax({
        url: "http://ipinfo.io/json?token=54f93cacb88eae",
        success: function(response) {
            country = (response.country);
            $("#nationality").countrySelect({
                    defaultCountry: country.toLowerCase()
                }
            );
        },
        dataType: 'json',
        statusCode: {
            429: function() {
                alert( "Number of tries exceeded" );
            }
        }
    });
});


const phoneInputField = document.querySelector("#phone_number");
const whatsAppNumber = document.querySelector("#whatsapp_number");
const phoneInput = window.intlTelInput(phoneInputField, {
    initialCountry: "auto",
    nationalMode: true,
    geoIpLookup: getIp,
    utilsScript:
        "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
});

const whatsAppInput = window.intlTelInput(whatsAppNumber, {
    initialCountry: "auto",
    nationalMode: true,
    geoIpLookup: getIp,
    utilsScript:
        "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
});

$("#phone_number").bind('keyup',function(){
    $(this).val(phoneInput.getNumber());
});

$("#whatsapp_number").bind('keyup',function(){
    $(this).val(whatsAppInput.getNumber());
});
