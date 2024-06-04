const profile = document.querySelector(".user_profile");
const profileInfo = document.querySelector(".user_profile_info");

profile.addEventListener("click", () => {
    if (profileInfo.style.display === "none" || profileInfo.style.display === "") {
        profileInfo.style.display = "inline-block";
    } else {
        profileInfo.style.display = "none";
    }
});