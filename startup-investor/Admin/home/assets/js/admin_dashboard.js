function showDashboard() {
    document.getElementById("dashboard").style.display = "block";
    document.getElementById("Startups").style.display = "none";
    document.getElementById("Investors").style.display = "none";
    document.getElementById("Issues").style.display = "none";
    document.getElementById("Account").style.display = "none";
}
function showStartups() {
    document.getElementById("dashboard").style.display = "none";
    document.getElementById("Startups").style.display = "block";
    document.getElementById("Investors").style.display = "none";
    document.getElementById("Issues").style.display = "none";
    document.getElementById("Account").style.display = "none";
}
function showInvestors() {
    document.getElementById("dashboard").style.display = "none";
    document.getElementById("Startups").style.display = "none";
    document.getElementById("Investors").style.display = "block";
    document.getElementById("Issues").style.display = "none";
    document.getElementById("Account").style.display = "none";
}
function showIssues() {
    document.getElementById("dashboard").style.display = "none";
    document.getElementById("Startups").style.display = "none";
    document.getElementById("Investors").style.display = "none";
    document.getElementById("Issues").style.display = "block";
    document.getElementById("Account").style.display = "none";
}
function showAccount() {
    document.getElementById("dashboard").style.display = "none";
    document.getElementById("Startups").style.display = "none";
    document.getElementById("Investors").style.display = "none";
    document.getElementById("Issues").style.display = "none";
    document.getElementById("Account").style.display = "block";
}