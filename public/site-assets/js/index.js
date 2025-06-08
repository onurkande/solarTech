// Hero Slider
let currentSlideIndex = 0
const slides = document.querySelectorAll(".hero-slide")
const dots = document.querySelectorAll(".slider-dot")

function showSlide(index) {
slides.forEach((slide, i) => {
    slide.classList.toggle("active", i === index)
})
dots.forEach((dot, i) => {
    dot.classList.toggle("active", i === index)
})
}

function nextSlide() {
currentSlideIndex = (currentSlideIndex + 1) % slides.length
showSlide(currentSlideIndex)
}

function prevSlide() {
currentSlideIndex = (currentSlideIndex - 1 + slides.length) % slides.length
showSlide(currentSlideIndex)
}

function currentSlide(index) {
currentSlideIndex = index - 1
showSlide(currentSlideIndex)
}

// Auto-advance slider
setInterval(nextSlide, 6000)

// Smooth scrolling for navigation links
document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
anchor.addEventListener("click", function (e) {
    e.preventDefault()
    const target = document.querySelector(this.getAttribute("href"))
    if (target) {
    // FIXED: Account for fixed navbar height
    const navbarHeight = document.querySelector(".navbar").offsetHeight
    const targetPosition = target.offsetTop - navbarHeight - 20

    window.scrollTo({
        top: targetPosition,
        behavior: "smooth",
    })
    }
})
})

// Fade in animation on scroll
const observerOptions = {
threshold: 0.1,
rootMargin: "0px 0px -50px 0px",
}

const observer = new IntersectionObserver((entries) => {
entries.forEach((entry) => {
    if (entry.isIntersecting) {
    entry.target.classList.add("visible")
    }
})
}, observerOptions)

// Observe all fade-in elements
document.querySelectorAll(".fade-in").forEach((el) => {
observer.observe(el)
})

// FIXED: Enhanced navbar background change on scroll
window.addEventListener("scroll", () => {
const navbar = document.querySelector(".navbar")
if (window.scrollY > 50) {
    navbar.style.background = "rgba(255, 255, 255, 0.98)"
    navbar.style.boxShadow = "0 2px 20px rgba(0, 0, 0, 0.15)"
} else {
    navbar.style.background = "rgba(255, 255, 255, 0.97)"
    navbar.style.boxShadow = "0 2px 20px rgba(18, 149, 217, 0.07)"
}
})

// FIXED: Close mobile menu when clicking on links
const bootstrap = window.bootstrap // Declare the bootstrap variable
document.querySelectorAll(".navbar-nav .nav-link").forEach((link) => {
link.addEventListener("click", () => {
    const navbarCollapse = document.querySelector(".navbar-collapse")
    if (navbarCollapse.classList.contains("show")) {
    const bsCollapse = new bootstrap.Collapse(navbarCollapse)
    bsCollapse.hide()
    }
})
})

// Form submission
const contactForm = document.getElementById("contactForm")
if (contactForm) {
contactForm.addEventListener("submit", function (e) {
    e.preventDefault()

    // Show success message
    const button = this.querySelector('button[type="submit"]')
    const originalText = button.innerHTML
    button.innerHTML = '<i class="fas fa-check me-2"></i>Message Sent!'
    button.style.background = "var(--secondary-color)"
    button.style.color = "var(--text-dark)"

    // Reset after 3 seconds
    setTimeout(() => {
    button.innerHTML = originalText
    button.style.background = "linear-gradient(90deg, #1295d9 60%, #27f7c6 100%)"
    button.style.color = "#fff"
    this.reset()
    }, 3000)
})
}

// Newsletter form submission
const newsletterForm = document.querySelector(".newsletter-form")
if (newsletterForm) {
newsletterForm.addEventListener("submit", function (e) {
    e.preventDefault()
    const button = this.querySelector("button")
    const originalText = button.textContent
    button.textContent = "Subscribed!"
    button.style.background = "#1ee6b8"

    setTimeout(() => {
    button.textContent = originalText
    button.style.background = "var(--secondary-color)"
    this.reset()
    }, 2000)
})
}

// Enhanced button hover effects
document.querySelectorAll(".btn-hero, .package-cta, .process-details-btn, .blog-all-btn").forEach((btn) => {
btn.addEventListener("mouseenter", function () {
    this.style.transform = "translateY(-3px) scale(1.05)"
})

btn.addEventListener("mouseleave", function () {
    this.style.transform = "translateY(0) scale(1)"
})
})

// FIXED: Improved parallax effect for hero section (disabled on mobile for performance)
if (window.innerWidth > 768) {
window.addEventListener("scroll", () => {
    const scrolled = window.pageYOffset
    const heroSlides = document.querySelectorAll(".hero-slide")
    heroSlides.forEach((slide) => {
    const speed = scrolled * 0.1 // Reduced speed for better performance
    slide.style.transform = `translateY(${speed}px)`
    })
})
}

// Add loading animation
window.addEventListener("load", () => {
document.body.style.opacity = "0"
document.body.style.transition = "opacity 0.5s ease-in-out"
setTimeout(() => {
    document.body.style.opacity = "1"
}, 100)
})

// Package CTA buttons
document.querySelectorAll(".package-cta").forEach((btn) => {
btn.addEventListener("click", () => {
    document.getElementById("contact").scrollIntoView({
    behavior: "smooth",
    block: "start",
    })
})
})

// FIXED: Prevent body scroll when mobile menu is open
const navbarToggler = document.querySelector(".navbar-toggler")
const navbarCollapse = document.querySelector(".navbar-collapse")

if (navbarToggler && navbarCollapse) {
navbarToggler.addEventListener("click", () => {
    setTimeout(() => {
    if (navbarCollapse.classList.contains("show")) {
        document.body.style.overflow = "hidden"
    } else {
        document.body.style.overflow = "auto"
    }
    }, 100)
})
}

// FIXED: Ensure WhatsApp button is always visible
function ensureWhatsAppVisibility() {
const whatsappBtn = document.querySelector(".whatsapp-btn")
if (whatsappBtn) {
    whatsappBtn.style.display = "flex"
    whatsappBtn.style.zIndex = "9998"
}
}

// Call on load and resize
window.addEventListener("load", ensureWhatsAppVisibility)
window.addEventListener("resize", ensureWhatsAppVisibility)

// FIXED: Handle touch events for better mobile interaction
if ("ontouchstart" in window) {
document.querySelectorAll(".advantage-card, .process-step, .blog-card").forEach((card) => {
    card.addEventListener("touchstart", function () {
    this.style.transform = "translateY(-10px) scale(1.02)"
    })

    card.addEventListener("touchend", function () {
    setTimeout(() => {
        this.style.transform = "translateY(0) scale(1)"
    }, 150)
    })
})
}

// Process Gallery Modal
const processModal = document.getElementById("processModal");
const processModalImg = document.getElementById("processModalImg");
const processModalClose = document.getElementById("processModalClose");

document.querySelectorAll(".process-gallery-thumb").forEach((thumb) => {
thumb.addEventListener("click", function () {
    processModalImg.src = this.src;
    processModalImg.alt = this.alt;
    processModal.classList.add("active");
    document.body.style.overflow = "hidden";
});
});

processModalClose.addEventListener("click", function () {
processModal.classList.remove("active");
processModalImg.src = "";
document.body.style.overflow = "auto";
});

processModal.addEventListener("click", function (e) {
if (e.target === processModal) {
    processModal.classList.remove("active");
    processModalImg.src = "";
    document.body.style.overflow = "auto";
}
});