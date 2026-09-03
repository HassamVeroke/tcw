// Add navigation bar sticky functionality
document.addEventListener('DOMContentLoaded', function () {
    const header = document.querySelector('.tcw-header');

    if (!header) return;

    function toggleSticky() {
        if (window.scrollY >= 32) {
            header.classList.add('sticky');
        } else {
            header.classList.remove('sticky');
        }
    }

    // Run on page load
    toggleSticky();

    // Run on scroll
    window.addEventListener('scroll', toggleSticky);
});

// Initialize Swiper for capabilities slider 
// new Swiper('.capabilitiesSwiper', {
//     loop: true,
//     spaceBetween: 12,
//     slidesPerView: 1,
//     navigation: {
//         nextEl: '.capabilities-next',
//         prevEl: '.capabilities-prev',
//     },
//     pagination: {
//         el: '.swiper-pagination',
//         clickable: true,
//     },
//     breakpoints: {
//         768: {
//             slidesPerView: 2
//         },
//         1200: {
//             slidesPerView: 3,
//             spaceBetween: 32,
//         }
//     }

// });

// Animate homepage hero section stats
(function() {
    function initCounters() {
        const duration = 2000; 

        const animateCounter = (counter) => {
            const target = +counter.getAttribute('data-target');
            const prefix = counter.getAttribute('data-prefix') || '';
            const suffix = counter.getAttribute('data-suffix') || '';
            
            // Safety check: if data-target failed to parse, skip it
            if (isNaN(target)) return;

            let startTimestamp = null;

            const step = (timestamp) => {
                if (!startTimestamp) startTimestamp = timestamp;
                const progress = Math.min((timestamp - startTimestamp) / duration, 1);
                const currentNumber = Math.floor(progress * target);

                // Combine prefix, current animated number, and suffix
                counter.innerText = `${prefix}${currentNumber}${suffix}`;

                if (progress < 1) {
                    window.requestAnimationFrame(step);
                }
            };
            window.requestAnimationFrame(step);
        };

        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounter(entry.target);
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.2 });

        document.querySelectorAll('.stat-num').forEach(counter => observer.observe(counter));
    }

    // Runs immediately if DOM is ready, otherwise waits for it
    if (document.readyState === "loading") {
        document.addEventListener("DOMContentLoaded", initCounters);
    } else {
        initCounters();
    }
})();

// Add particles effect to the homepage hero section
particlesJS("particles-js", {
    particles: {
        number: {
            value: 80,
            density: {
                enable: true,
                value_area: 900
            }
        },

        color: {
            value: "#2fd6ff"
        },

        shape: {
            type: "circle"
        },

        opacity: {
            value: 0.5,
            random: true
        },

        size: {
            value: 3,
            random: true
        },

        line_linked: {
            enable: true,
            distance: 150,
            color: "#2fd6ff",
            opacity: 0.35,
            width: 1
        },

        move: {
            enable: true,
            speed: 1.5,
            direction: "none",
            random: false,
            straight: false,
            out_mode: "bounce",
            attract: {
                enable: false
            }
        }
    },

    interactivity: {
        detect_on: "canvas",

        events: {
            onhover: {
                enable: true,
                mode: "grab"
            },

            onclick: {
                enable: false
            },

            resize: true
        },

        modes: {
            grab: {
                distance: 180,
                line_linked: {
                    opacity: 0.8
                }
            }
        }
    },

    retina_detect: true
});