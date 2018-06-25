(function() {
    let nav = document.getElementById("js-menu"),
        anchor = nav.getElementsByTagName("a");

    for (let i = 0, len = anchor.length; i < len; i++) {
        anchor[i].addEventListener(
            "click",
            function() {
                let current = document.getElementsByClassName("active");
                current[0].classList.remove("active");
                this.classList.add("active");
            },
            false
        );
    }
})();

(function() {
    function time(time) {
        let mills = 1000,
            counter = new Date(time) - Date.now(),
            seconds = Math.floor((counter / mills) % 60),
            minutes = Math.floor((counter / mills / 60) % 60),
            hours = Math.floor((counter / (mills * 60 * 60)) % 24),
            days = Math.floor(counter / (mills * 60 * 60 * 24));
        return {
            counter: counter,
            seconds: seconds,
            minutes: minutes,
            hours: hours,
            days: days
        };
    }

    function initEvent(id, endTime, callback) {
        const timer = document.getElementById(id);
        let elements = ["days", "hours", "minutes", "seconds"];

        function updateEvent() {
            let date = time(endTime),
                data = {
                    days: date.days,
                    hours: date.hours,
                    minutes: date.minutes,
                    seconds: date.seconds
                };
            for (let i in elements) {
                i = elements[i];
                if (data[i] < 10) {
                    data[i] = ("00" + data[i]).slice(-2);
                }
                timer.querySelector(`.${i}`).innerHTML = data[i];
            }
            if (date.counter <= 0) {
                clearInterval(interval);
                console.log("Starting event...");
                if (typeof callback === "function") {
                    callback();
                }
            }
        }
        updateEvent();
        let interval = setInterval(updateEvent, 1000);
    }
    let eventDate = new Date('6/14/2018 08:00:00');
    initEvent('timer', eventDate);
})();