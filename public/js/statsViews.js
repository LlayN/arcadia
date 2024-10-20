function statsViews(idAnimal) {
    fetch("/increment-view", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded",
        },
        body: "idAnimal=" + idAnimal,
    }).then((response) => {
        console.log(response);
    });
}
