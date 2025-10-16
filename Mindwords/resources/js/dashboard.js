// DOM Elements
const sidebar = document.querySelector('.sidebar');
const navItems = document.querySelectorAll('.nav-item');
const notificationBtn = document.querySelector('.notification-btn');

// ===========================
// Sidebar Navigation Active State
// ===========================
navItems.forEach(item => {
    item.addEventListener('click', function(e) {
        // Remove active class from all items
        navItems.forEach(nav => nav.classList.remove('active'));
        
        // Add active class to clicked item
        this.classList.add('active');
    });
});

// ===========================
// Mobile Sidebar Toggle
// ===========================
function createMobileToggle() {
    if (window.innerWidth <= 768) {
        // Create hamburger button if not exists
        if (!document.querySelector('.mobile-toggle')) {
            const toggleBtn = document.createElement('button');
            toggleBtn.className = 'mobile-toggle';
            toggleBtn.innerHTML = '☰';
            toggleBtn.style.cssText = `
                position: fixed;
                top: 20px;
                left: 20px;
                z-index: 1001;
                background: white;
                border: 2px solid #667eea;
                border-radius: 8px;
                width: 45px;
                height: 45px;
                font-size: 24px;
                cursor: pointer;
                display: flex;
                align-items: center;
                justify-content: center;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            `;
            
            document.body.appendChild(toggleBtn);
            
            // Toggle sidebar
            toggleBtn.addEventListener('click', function() {
                sidebar.classList.toggle('mobile-open');
            });
            
            // Close sidebar when clicking outside
            document.addEventListener('click', function(e) {
                if (!sidebar.contains(e.target) && !toggleBtn.contains(e.target)) {
                    sidebar.classList.remove('mobile-open');
                }
            });
        }
    } else {
        // Remove mobile toggle on desktop
        const existingToggle = document.querySelector('.mobile-toggle');
        if (existingToggle) {
            existingToggle.remove();
        }
    }
}

// Initialize mobile toggle
createMobileToggle();

// Re-initialize on window resize
window.addEventListener('resize', createMobileToggle);

// ===========================
// Notification Button
// ===========================
if (notificationBtn) {
    notificationBtn.addEventListener('click', function() {
        alert('Bạn có 3 thông báo mới!\n\n1. Bài học mới đã được thêm\n2. Bạn có một thử thách mới\n3. Chúc mừng đạt cột mốc 7 ngày');
    });
}

// ===========================
// Stats Animation on Scroll
// ===========================
const statCards = document.querySelectorAll('.stat-card');

function animateStats() {
    statCards.forEach(card => {
        const rect = card.getBoundingClientRect();
        const isVisible = rect.top < window.innerHeight && rect.bottom >= 0;
        
        if (isVisible && !card.classList.contains('animated')) {
            card.classList.add('animated');
            
            // Animate number
            const valueElement = card.querySelector('.stat-value');
            const targetValue = parseInt(valueElement.textContent);
            let currentValue = 0;
            const increment = Math.ceil(targetValue / 30);
            
            const counter = setInterval(() => {
                currentValue += increment;
                if (currentValue >= targetValue) {
                    valueElement.textContent = targetValue;
                    clearInterval(counter);
                } else {
                    valueElement.textContent = currentValue;
                }
            }, 30);
        }
    });
}

// Run animation on scroll
window.addEventListener('scroll', animateStats);
animateStats(); // Run once on load

// ===========================
// Feature Cards Interaction
// ===========================
const featureCards = document.querySelectorAll('.feature-card');

featureCards.forEach(card => {
    card.addEventListener('click', function() {
        const title = this.querySelector('h3').textContent;
        console.log(`Clicked on: ${title}`);
        
        // Add ripple effect
        const ripple = document.createElement('div');
        ripple.style.cssText = `
            position: absolute;
            border-radius: 50%;
            background: rgba(102, 126, 234, 0.3);
            width: 100px;
            height: 100px;
            pointer-events: none;
            transform: scale(0);
            animation: ripple 0.6s ease-out;
        `;
        
        this.style.position = 'relative';
        this.style.overflow = 'hidden';
        this.appendChild(ripple);
        
        setTimeout(() => ripple.remove(), 600);
    });
});

// Ripple animation
const style = document.createElement('style');
style.textContent = `
    @keyframes ripple {
        to {
            transform: scale(4);
            opacity: 0;
        }
    }
`;
document.head.appendChild(style);

// ===========================
// Random Quote Generator
// ===========================
const quotes = [
    { text: "Hôm nay bạn đã tiến xa hơn ngày hôm qua rồi 🎯", author: "Mindwords Team" },
    { text: "Học tập không bao giờ là muộn 📚", author: "Mindwords Team" },
    { text: "Mỗi từ bạn học là một bước tiến mới ⭐", author: "Mindwords Team" },
    { text: "Kiên trì là chìa khóa thành công 🔑", author: "Mindwords Team" },
    { text: "Bạn đang làm rất tốt! Cứ tiếp tục nhé 💪", author: "Mindwords Team" }
];

function updateQuote() {
    const quoteText = document.querySelector('.quote-text');
    const quoteAuthor = document.querySelector('.quote-author');
    
    if (quoteText && quoteAuthor) {
        const randomQuote = quotes[Math.floor(Math.random() * quotes.length)];
        quoteText.textContent = `"${randomQuote.text}"`;
        quoteAuthor.textContent = `- ${randomQuote.author}`;
    }
}

// Change quote every 10 seconds
setInterval(updateQuote, 10000);

// ===========================
// Activity Items Click
// ===========================
const activityItems = document.querySelectorAll('.activity-item');

activityItems.forEach(item => {
    item.addEventListener('click', function() {
        this.style.background = '#e8f4f8';
        setTimeout(() => {
            this.style.background = '';
        }, 1000);
    });
});

// ===========================
// Smooth Scroll for Navigation
// ===========================
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

console.log('Dashboard.js loaded successfully!');