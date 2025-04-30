document.addEventListener("DOMContentLoaded", function(){
    const paymentSelect = document.getElementById('paymentOption');
    const donateBtn = document.getElementById('donateBtn');;
    if (paymentSelect && donateBtn){
            paymentSelect.addEventListener('change', function(){
                const method =paymentSelect.value;
                donateBtn.textContent=method ? `Donate with ${method}` : 'Donate Now';
            });
    }

});