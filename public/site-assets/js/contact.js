// Form Validation and Submission
const contactForm = document.getElementById('contactForm');
const successMessage = document.getElementById('successMessage');

/*if (contactForm) {
    contactForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Reset previous validation states
        const inputs = this.querySelectorAll('.form-control');
        inputs.forEach(input => {
            input.classList.remove('error', 'success');
        });

        // Validate form
        let isValid = true;
        const requiredFields = ['firstName', 'lastName', 'email', 'phone'];
        
        requiredFields.forEach(fieldName => {
            const field = document.getElementById(fieldName);
            if (!field.value.trim()) {
                field.classList.add('error');
                isValid = false;
            } else {
                field.classList.add('success');
            }
        });

        // Email validation
        const email = document.getElementById('email');
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (email.value && !emailRegex.test(email.value)) {
            email.classList.remove('success');
            email.classList.add('error');
            isValid = false;
        }

        // Phone validation
        const phone = document.getElementById('phone');
        const phoneRegex = /^[\+]?[1-9][\d]{0,15}$/;
        if (phone.value && !phoneRegex.test(phone.value.replace(/\s/g, ''))) {
            phone.classList.remove('success');
            phone.classList.add('error');
            isValid = false;
        }

        if (isValid) {
            // Show loading state
            const button = this.querySelector('button[type="submit"]');
            const originalText = button.innerHTML;
            button.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Sending...';
            button.disabled = true;

            // Simulate form submission
            setTimeout(() => {
                // Show success message
                successMessage.classList.add('show');
                this.reset();
                
                // Reset button
                button.innerHTML = originalText;
                button.disabled = false;
                
                // Hide success message after 5 seconds
                setTimeout(() => {
                    successMessage.classList.remove('show');
                }, 5000);
                
                // Reset form validation states
                inputs.forEach(input => {
                    input.classList.remove('error', 'success');
                });
            }, 2000);
        }
    });
}*/

// Smooth scrolling for navigation links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            const navbarHeight = document.querySelector('.navbar').offsetHeight;
            const targetPosition = target.offsetTop - navbarHeight - 20;
            
            window.scrollTo({
                top: targetPosition,
                behavior: 'smooth'
            });
        }
    });
});

// Fade in animation on scroll
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('visible');
        }
    });
}, observerOptions);

// Observe all fade-in elements
document.querySelectorAll('.fade-in').forEach(el => {
    observer.observe(el);
});

// Navbar background change on scroll
window.addEventListener('scroll', () => {
    const navbar = document.querySelector('.navbar');
    if (window.scrollY > 50) {
        navbar.style.background = 'rgba(255, 255, 255, 0.98)';
        navbar.style.boxShadow = '0 2px 20px rgba(0, 0, 0, 0.15)';
    } else {
        navbar.style.background = 'rgba(255, 255, 255, 0.97)';
        navbar.style.boxShadow = '0 2px 20px rgba(18, 149, 217, 0.07)';
    }
});

// Close mobile menu when clicking on links
document.querySelectorAll('.navbar-nav .nav-link').forEach(link => {
    link.addEventListener('click', () => {
        const navbarCollapse = document.querySelector('.navbar-collapse');
        if (navbarCollapse.classList.contains('show')) {
            const bsCollapse = new bootstrap.Collapse(navbarCollapse);
            bsCollapse.hide();
        }
    });
});

// Newsletter form submission
const newsletterForm = document.querySelector('.newsletter-form');
if (newsletterForm) {
    newsletterForm.addEventListener('submit', function(e) {
        e.preventDefault();
        const button = this.querySelector('button');
        const originalText = button.textContent;
        button.textContent = 'Subscribed!';
        button.style.background = '#1ee6b8';
        
        setTimeout(() => {
            button.textContent = originalText;
            button.style.background = 'var(--secondary-color)';
            this.reset();
        }, 2000);
    });
}

// Enhanced button hover effects
document.querySelectorAll('.btn-submit, .contact-action-btn').forEach(btn => {
    btn.addEventListener('mouseenter', function() {
        this.style.transform = 'translateY(-3px) scale(1.05)';
    });
    
    btn.addEventListener('mouseleave', function() {
        this.style.transform = 'translateY(0) scale(1)';
    });
});

// Add loading animation
window.addEventListener('load', () => {
    document.body.style.opacity = '0';
    document.body.style.transition = 'opacity 0.5s ease-in-out';
    setTimeout(() => {
        document.body.style.opacity = '1';
    }, 100);
});

// Ensure WhatsApp button is always visible
function ensureWhatsAppVisibility() {
    const whatsappBtn = document.querySelector('.whatsapp-btn');
    if (whatsappBtn) {
        whatsappBtn.style.display = 'flex';
        whatsappBtn.style.zIndex = '9998';
    }
}

// Call on load and resize
window.addEventListener('load', ensureWhatsAppVisibility);
window.addEventListener('resize', ensureWhatsAppVisibility);

// Handle touch events for better mobile interaction
if ('ontouchstart' in window) {
    document.querySelectorAll('.contact-info-card, .social-link').forEach(card => {
        card.addEventListener('touchstart', function() {
            this.style.transform = 'translateY(-10px) scale(1.02)';
        });
        
        card.addEventListener('touchend', function() {
            setTimeout(() => {
                this.style.transform = 'translateY(0) scale(1)';
            }, 150);
        });
    });
}

// Real-time form validation
/*const formInputs = document.querySelectorAll('#contactForm .form-control');
formInputs.forEach(input => {
    input.addEventListener('blur', function() {
        if (this.hasAttribute('required') && !this.value.trim()) {
            this.classList.add('error');
            this.classList.remove('success');
        } else if (this.value.trim()) {
            this.classList.remove('error');
            this.classList.add('success');
        }
    });

    input.addEventListener('input', function() {
        if (this.classList.contains('error') && this.value.trim()) {
            this.classList.remove('error');
            this.classList.add('success');
        }
    });
});*/