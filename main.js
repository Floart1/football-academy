document.addEventListener("DOMContentLoaded", function() {
  let lastScroll = 0;
  const navbar = document.querySelector('.navbar');

  window.addEventListener('scroll', () => {
    const currentScroll = window.pageYOffset || document.documentElement.scrollTop;

    if (currentScroll > lastScroll) {
     
      navbar.style.top = "-70px";  
    } else {
     
      navbar.style.top = "0";
    }

    lastScroll = currentScroll <= 0 ? 0 : currentScroll;
  });
});

document.addEventListener("DOMContentLoaded", () => {
  const fadeElements = document.querySelectorAll(".fade-in");

  fadeElements.forEach(el => {
    el.classList.add("show");
  });
}); 

  const form = document.getElementById("contactForm");
  const loading = document.getElementById("loading");
  const successMsg = document.getElementById("successMsg");


form.addEventListener("submit", function (e) {
  e.preventDefault();

  const name = document.getElementById("name").value.trim();
  const email = document.getElementById("email").value.trim();
  const message = document.getElementById("message").value.trim();

  let valid = true;

  document.getElementById("nameError").style.display = name ? "none" : "block";
  document.getElementById("emailError").style.display = email.includes("@") ? "none" : "block";
  document.getElementById("messageError").style.display = message.length >= 10 ? "none" : "block";

  if (!name || !email.includes("@") || message.length < 10) {
    valid = false;
  }

  if (!valid) return;

  
   loading.style.display = "block";
  successMsg.style.display = "none";

  fetch("contact.php", {
    method: "POST",
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
    body: `name=${name}&email=${email}&message=${message}`
  })
  .then(res => res.text())
  .then(data => {
    loading.style.display = "none";
    successMsg.style.display = "block";
    successMsg.style.color = "green";
    successMsg.textContent = data;
    form.reset();
  })
  .catch(() => {
    loading.style.display = "none";
    successMsg.style.display = "block";
    successMsg.style.color = "red";
    successMsg.textContent = "❌ Something went wrong.";
  });
});

document.addEventListener("DOMContentLoaded", () => {

  const joinBtn = document.getElementById("joinBtn");
  const modal = document.getElementById("joinModal");
  const closeModal = document.getElementById("closeModal");
  const joinForm = document.getElementById("joinForm");
  const success = document.getElementById("joinSuccess");

  joinBtn.addEventListener("click", () => {
    modal.style.display = "flex";
  });

  closeModal.addEventListener("click", () => {
    modal.style.display = "none";
    success.style.display = "none";
  });

  window.addEventListener("click", (e) => {
    if (e.target === modal) {
      modal.style.display = "none";
      success.style.display = "none";
    }
  });

  joinForm.addEventListener("submit", (e) => {
    e.preventDefault();

    const formData = new FormData(joinForm);

    fetch("register.php", {
      method: "POST",
      body: formData
    })
      .then(res => res.text())
      .then(data => {
  const success = document.getElementById("joinSuccess");
  success.style.display = "flex";
  success.textContent = data;

  setTimeout(() => {
    success.style.display = "none";
    joinModal.style.display = "none";
  }, 2000);

  joinForm.reset();
})
   
      .catch(() => {
        success.style.display = "block";
        success.style.color = "red";
        success.textContent = "❌ Something went wrong.";
      });
  });

});

document.addEventListener("DOMContentLoaded", () => {
  console.log("JS loaded");

  const navbar = document.querySelector(".nav");
  const navLinks = document.querySelector(".nav-links");
  const menuToggle = document.querySelector(".menu-toggle");

 
  if (navbar) {
    let lastScrollY = window.scrollY;

    window.addEventListener("scroll", () => {
      if (window.scrollY > lastScrollY) {
        navbar.classList.add("hide");
      } else {
        navbar.classList.remove("hide");
      }

      lastScrollY = window.scrollY;
    });
  }

  if (menuToggle && navLinks) {
    menuToggle.addEventListener("click", () => {
      navLinks.classList.toggle("active");
    });
  }
});

