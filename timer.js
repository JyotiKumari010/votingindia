window.onload = function () {
    const timerElement = document.getElementById("timer");
    const timeLimit = 300; // 5 minutes
    let remainingTime = timeLimit;

    // Redirect immediately on page refresh or back
    if (performance.navigation.type === performance.navigation.TYPE_RELOAD || performance.navigation.type === performance.navigation.TYPE_BACK_FORWARD) {
        window.location.href = "home.php";
        return;
    }

    const interval = setInterval(() => {
        const minutes = Math.floor(remainingTime / 60);
        const seconds = remainingTime % 60;

        if (timerElement) {
            timerElement.textContent = `${minutes}:${seconds < 10 ? "0" : ""}${seconds}`;
        }

        remainingTime--;

        if (remainingTime < 0) {
            clearInterval(interval);
            window.location.href = "home.php";
        }
    }, 1000);

};
