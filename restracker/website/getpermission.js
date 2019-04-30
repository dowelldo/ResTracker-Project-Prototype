function perm() {
    var p = Notification.permission; // for code compactness
    if (p === "default") {
        Notification.requestPermission().then(function (permission) {
            console.log(p);
            new Notification("Welcome!", {body : "Welcome to Floyd's Inventory!"}).show;
        });
    } else if (p === "granted" || p === "denied") { return; }
}

perm();
