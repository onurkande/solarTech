// Product Image Gallery Functionality
document.querySelectorAll('.product-thumbnail').forEach(thumbnail => {
    thumbnail.addEventListener('click', function() {
        const newSrc = this.getAttribute('data-main');
        const productModal = document.getElementById('productModal');
        const productModalImage = document.getElementById('productModalImage');
        
        // Show modal with clicked thumbnail image
        productModalImage.src = newSrc;
        productModalImage.alt = this.alt;
        productModal.classList.add('active');
        document.body.style.overflow = 'hidden';
    });
});

// Product Modal Functionality
const productModal = document.getElementById('productModal');
const productModalImage = document.getElementById('productModalImage');
const productModalClose = document.getElementById('productModalClose');

// Open modal when clicking on main product images
document.querySelectorAll('.product-main-image').forEach(image => {
    image.addEventListener('click', function() {
        productModalImage.src = this.src;
        productModalImage.alt = this.alt;
        productModal.classList.add('active');
        document.body.style.overflow = 'hidden';
    });
});

// Close modal
productModalClose.addEventListener('click', function() {
    productModal.classList.remove('active');
    productModalImage.src = '';
    document.body.style.overflow = 'auto';
});

// Close modal when clicking outside
productModal.addEventListener('click', function(e) {
    if (e.target === productModal) {
        productModal.classList.remove('active');
        productModalImage.src = '';
        document.body.style.overflow = 'auto';
    }
});

// Close modal with Escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape' && productModal.classList.contains('active')) {
        productModal.classList.remove('active');
        productModalImage.src = '';
        document.body.style.overflow = 'auto';
    }
});

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
document.querySelectorAll('.product-details-btn, .btn-tech-support').forEach(btn => {
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
    document.querySelectorAll('.product-card').forEach(card => {
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



// Parallax effect for hero section (disabled on mobile for performance)
if (window.innerWidth > 768) {
    window.addEventListener('scroll', () => {
        const scrolled = window.pageYOffset;
        const heroSection = document.querySelector('.products-hero');
        if (heroSection) {
            const speed = scrolled * 0.1;
            heroSection.style.transform = `translateY(${speed}px)`;
        }
    });
}