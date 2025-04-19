console.log('calling homepage')

document.addEventListener('DOMContentLoaded', function() {
    const hour = new Date().getHours();
    const status = document.getElementById("office-status");
    status.textContent = (hour >= 9 && hour < 19) ? "CURRENT STATUS: OPEN UNTIL 7 PM" : "CURRENT STATUS: CLOSED UNTIL 9 AM";
});