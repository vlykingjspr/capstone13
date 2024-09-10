var totalSum = 0;

function calculateSubtotal(amountId, quantityId, subtotalId) {
    var amount = document.getElementById(amountId).value;
    var quantity = document.getElementById(quantityId).value;

    var amountNum = parseFloat(amount);
    var quantityNum = parseFloat(quantity);

    if (isNaN(amountNum) || isNaN(quantityNum)) {
        document.getElementById(subtotalId).value = "";
    } else {
        var subtotal = amountNum * quantityNum;
        document.getElementById(subtotalId).value = subtotal.toFixed(1);
    }

    calculateTotalSum();
}

function calculateTotalSum() {
    var totalSum = 0;
    for (var i = 1; i <= 14; i++) {
        var subtotal = parseFloat(document.getElementById('sub-total' + i).value);
        if (!isNaN(subtotal)) {
            totalSum += subtotal;
        }
    }
    document.getElementById('totalamount').value = totalSum.toFixed(1);
}


function addEventListeners(amountId, quantityId, subtotalId) {
    document.getElementById(amountId).addEventListener('input', function() {
        calculateSubtotal(amountId, quantityId, subtotalId);
    });

    document.getElementById(quantityId).addEventListener('input', function() {
        calculateSubtotal(amountId, quantityId, subtotalId);
    });

}

// Add event listeners for each set of fields


for (var i = 1; i <= 14; i++) {
    addEventListeners('amount' + i, 'quantity' + i, 'sub-total' + i);
}