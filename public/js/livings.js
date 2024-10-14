const nb_Elephants = document.querySelector("#nb_Elephants");
const nb_Lions = document.querySelector("#nb_Lions");
const nb_Giraffes = document.querySelector("#nb_Giraffes");

const observer_Savane = new IntersectionObserver(
    (entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                let elephants = Number(nb_Elephants.innerHTML);
                let lions = Number(nb_Lions.innerHTML);
                let giraffes = Number(nb_Giraffes.innerHTML);

                setInterval(() => {
                    if (elephants < 24) {
                        elephants += 1;
                        nb_Elephants.innerHTML = elephants;
                    } else {
                        clearInterval();
                    }
                }, 50);
                setInterval(() => {
                    if (giraffes < 19) {
                        giraffes += 1;

                        nb_Giraffes.innerHTML = giraffes;
                    } else {
                        clearInterval();
                    }
                }, 50);
                setInterval(() => {
                    if (lions < 32) {
                        lions += 1;

                        nb_Lions.innerHTML = lions;
                    } else {
                        clearInterval();
                    }
                }, 50);
            }
        });
    },
    {
        threshold: 0.5,
    }
);

observer_Savane.observe(document.querySelector("#nb_Elephants"));

const nb_Tigers = document.querySelector("#nb_Tigers");
const nb_Monkeys = document.querySelector("#nb_Monkeys");
const nb_Toucans = document.querySelector("#nb_Toucans");

const observer_Jungle = new IntersectionObserver(
    (entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                let tigers = Number(nb_Tigers.innerHTML);
                let monkeys = Number(nb_Monkeys.innerHTML);
                let toucans = Number(nb_Toucans.innerHTML);

                setInterval(() => {
                    if (tigers < 12) {
                        tigers += 1;
                        nb_Tigers.innerHTML = tigers;
                    } else {
                        clearInterval();
                    }
                }, 50);
                setInterval(() => {
                    if (monkeys < 35) {
                        monkeys += 1;

                        nb_Monkeys.innerHTML = monkeys;
                    } else {
                        clearInterval();
                    }
                }, 50);
                setInterval(() => {
                    if (toucans < 15) {
                        toucans += 1;

                        nb_Toucans.innerHTML = toucans;
                    } else {
                        clearInterval();
                    }
                }, 50);
            }
        });
    },
    {
        threshold: 0.5,
    }
);

observer_Jungle.observe(document.querySelector("#nb_Tigers"));

const nb_Crocodiles = document.querySelector("#nb_Crocodiles");
const nb_Frogs = document.querySelector("#nb_Frogs");
const nb_Hippopotamuses = document.querySelector("#nb_Hippopotamuses");

const observer_Swamp = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        if (entry.isIntersecting) {
            let crocodiles = Number(nb_Crocodiles.innerHTML);
            let frogs = Number(nb_Frogs.innerHTML);
            let hippopotamuses = Number(nb_Hippopotamuses.innerHTML);

            setInterval(() => {
                if (crocodiles < 21) {
                    crocodiles += 1;
                    nb_Crocodiles.innerHTML = crocodiles;
                } else {
                    clearInterval();
                }
            }, 50);
            setInterval(() => {
                if (frogs < 44) {
                    frogs += 1;

                    nb_Frogs.innerHTML = frogs;
                } else {
                    clearInterval();
                }
            }, 50);
            setInterval(() => {
                if (hippopotamuses < 12) {
                    hippopotamuses += 1;

                    nb_Hippopotamuses.innerHTML = hippopotamuses;
                } else {
                    clearInterval();
                }
            }, 50);
        }
    });
});

observer_Swamp.observe(document.querySelector("#nb_Crocodiles"));
