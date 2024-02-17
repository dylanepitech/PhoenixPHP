function getCookie(name) {
  const cookieString = document.cookie;
  const cookies = cookieString.split(";");
  for (let i = 0; i < cookies.length; i++) {
    const cookie = cookies[i].trim();
    if (cookie.startsWith(name + "=")) {
      return cookie.substring(name.length + 1);
    }
  }
  return null;
}

const myCookieValue = getCookie("authorize");

document.addEventListener("DOMContentLoaded", () => {
  const cookie = document.querySelector(".container-cookie");
  const accepted = document.getElementById("accepted");
  const refused = document.getElementById("refused");
  if (cookie && myCookieValue == null) {
    cookie.style.transition = "transform 1s ease";
    cookie.style.transform = "translateY(-340px)";
  }
  addEventListener("click", (e) => {
    if (e.target.id == "accepted") {
      document.cookie = "authorize=true";
      cookie.style.display = "none";
    } else {
      cookie.style.display = "none";
      document.cookie = "authorize=false";
    }
  });
});
