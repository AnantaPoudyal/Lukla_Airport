function displayDate() {
    const monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    const now = new Date();

    const dateStr = `${monthNames[now.getMonth()]} - ${now.getDate()}, ${now.getFullYear()}`;
    const timeStr = `${now.getHours()}:${now.getMinutes().toString().padStart(2, '0')}:${now.getSeconds().toString().padStart(2, '0')}`;
    const ampm = (now.getHours() >= 12 ? 'PM' : 'AM')+"&nbsp&nbsp";

    const timeDiv = document.getElementById("time_p");
    timeDiv.innerHTML = `${dateStr} ${timeStr} ${ampm}`;

    setTimeout(displayDate, 1000);
}

displayDate();
