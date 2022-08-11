$(document).ready(function () {
    "use strict"; $(".repeater").repeater({
        defaultValues: { "textarea-input": "foo", "text-input": "bar", "select-input": "B", "checkbox-input": ["A", "B"], "radio-input": "B" },
        show: function () {
            $(this).slideDown()
        },
        hide: function (e) {
            $(this).slideUp(e);
        },
        ready: function (e) {

        }
    }),
        window.outerRepeater = $(".outer-repeater").repeater({
            defaultValues: { "text-input": "outer-default" },
            show: function () {
                console.log("outer show"),
                    $(this).slideDown()
            },
            hide: function (e) {
                console.log("outer delete"),
                    $(this).slideUp(e)
            },
            repeaters: [{
                selector: ".inner-repeater",
                defaultValues: { "inner-text-input": "inner-default" },
                show: function () {
                    console.log("inner show"),
                        $(this).slideDown()
                },
                hide: function (e) { console.log("inner delete"), $(this).slideUp(e) }
            }]
        })

});

$('body').on('change', '[data-action="sumJumlah"]', function () {
    evaluateTotal();
});


function evaluateTotal() {
    var total = 0;
    $('#jumlah').each(function () {
        total += $('#jumlah').val();
    });
    $('#total').val(total);
}


function calculateGrandTotal() {
    var totalQuantity = 0;
    $(".someClass").each(function () {
        totalQuantity += parseInt($(this).html());
        $(".total").html(totalQuantity);
    });
    // $("#total").val(sum);
}

