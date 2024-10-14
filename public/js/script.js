const nb_Species = document.querySelector("#nb_Species");
const nb_Animals = document.querySelector("#nb_Animals");
const nb_Area = document.querySelector("#nb_Area");

const observer = new IntersectionObserver(
    (entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                let species = Number(nb_Species.innerHTML);
                let animals = Number(nb_Animals.innerHTML);
                let area = Number(nb_Area.innerHTML);

                console.log(species);

                setInterval(() => {
                    if (species < 180) {
                        species += 2;
                        nb_Species.innerHTML = species;
                    } else {
                        clearInterval();
                    }
                }, 15);
                setInterval(() => {
                    if (animals < 1060) {
                        animals += 10;

                        nb_Animals.innerHTML = animals;
                    } else {
                        clearInterval();
                    }
                }, 15);
                setInterval(() => {
                    if (area < 12000) {
                        area += 100;

                        nb_Area.innerHTML = area;
                    } else {
                        clearInterval();
                    }
                }, 15);
            }
        });
    },
    {
        threshold: 0.5,
    }
);

observer.observe(document.querySelector("#nb_Species"));
