function validateForm() {
    const name = document.getElementById("name").value.trim();
    const email = document.getElementById("email").value.trim();
    const phone = document.getElementById("phone").value.trim();

    if (name === "" || email === "" || phone === "") {
        alert("All fields are required.");
        return false;
    }
    if (!/^[a-zA-Z ]+$/.test(name)) {
        alert("Name should only contain alphabets.");
        return false;
    }
    if (!/^\d{10}$/.test(phone)) {
        alert("Phone number should be 10 digits.");
        return false;
    }
    return true;
}
